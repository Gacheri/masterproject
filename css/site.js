// map
// Initialize and add the map
function initMap() {
    // The location of NAirobi
    const nairobi = { lat: -1.286389, lng: 36.817223 };
    // The map, centered at NAirobi
    const map = new google.maps.Map(document.getElementById("map"), {
      zoom: 4,
      center: nairobi,
    });
    // The marker, positioned at NAirobi
    const marker = new google.maps.Marker({
      position: nairobi,
      map: map,
    });
  }

  $('.locationbtn').click(function(e){
    e.preventDefault();
	var baseUrl = $(this).attr('baseUrl');
    $.get(baseUrl+'/../location',function(data){
        $('#location-modal').modal('show')
             .find('#locationContent')
             .html(data);
	});
});
$('.reviewbtn').click(function(e){
  e.preventDefault();
var baseUrl = $(this).attr('baseUrl');
  $.get(baseUrl+'/../../review/rating',function(data){
      $('#ratingModal').modal('show')
           .find('#ratingContent')
           .html(data);
});
});

//search 
$('.searchbtn').click(function(e){
  e.preventDefault();
var baseUrl = $(this).attr('baseUrl');
  $.get(baseUrl+'/../../company/search',function(data){
      $('#searchby').modal('show')
           .find('#searchbyContent')
           .html(data);
});
});

// review
// $('.reviewbtn').click(function(e){
//   e.preventDefault();
//  $.get('../review/rating',function(data){
//       $('#ratingModal').modal('show')
//           .find('#ratingContent')
//           .html(data);
// });
// });