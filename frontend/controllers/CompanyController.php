<?php

namespace frontend\controllers;

use Yii;
use common\models\Company;
use frontend\models\CompanySearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\Companyimages;
use yii\web\UploadedFile;

/**
 * CompanyController implements the CRUD actions for Company model.
 */
class CompanyController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
               
            ],
        ];
    }

    /**
     * Lists all Company models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CompanySearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

   

    /**
     * Displays a single Company model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

public function actionSearch(){
    return $this->renderAjax('search');
}
public function actionCurrentcomp(){
    return $this->render('..\site\currentcomp');
}
public function actionAdminpage(){
    return $this->render('..\site\adminpage');
}

    /**
     * Creates a new Company model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Company();
        $image= new Companyimages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if($this->saveImage($model->companyId,
            Yii::$app->request->post()
            ['Companyimages'])){
                return $this->redirect(['site/index']);  
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    // add images

    public function actionAddimages()
{
    $model = new \frontend\models\Companyimages();

    if ($model->load(Yii::$app->request->post()) && $model->save()) {
        if($this->saveImage($model->companyId,
            Yii::$app->request->post()
            ['Companyimages'])){
            // form inputs are valid, do something here
            return;
        }
    }

    return $this->render('addimages', [
        'model' => $model,
    ]);
}

public function saveImage($companyId,$imagedata){
        
    $model = new Companyimages();
            
    if($model->load(["Companyimages"=>['imagePath'=>$imagedata['imagePath']]])){
        //generates images with unique names
        $imageName = bin2hex(openssl_random_pseudo_bytes(10));
        $model->imagePath = UploadedFile::getInstance($model, 'imagePath');
        //saves file in the root directory
        $model->imagePath->saveAs('uploads/'.$imageName.'.'.$model->imagePath->extension);
        //save in the db
        $model->imagePath='uploads/'.$imageName.'.'.$model->imagePath->extension;
        $model->companyId = $companyId;
        if($model->save()){
            return true;
        }
    }
    return false;
}
    /**
     * Updates an existing Company model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->companyId]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Company model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Company model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Company the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Company::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
