$(document).ready(function () {

  /****************************************************
  * Setup and Variables
  ****************************************************/

  // Algolia Setup
  var algoName = $('#algoName').val();
  var algoKey = $('#algoKey').val();
  const client = algoliasearch(algoName, algoKey);
  const index = client.initIndex('places');
  // Api Url
  var apiUrl = window.location.protocol + '//' + window.location.host + '/api/Search';
  // Dom Variables
  var container = $('#place-container');
  // Handlebars Setup
  var source = $('#places-template').html();
  var template = Handlebars.compile(source);


  // Search click
  $( ".search__btn" ).click(function() {

    $(".search").css("visibility","visible");
    // Variables Dom
    var rooms = $('#num_rooms').val();
    var beds = $('#num_beds').val();
    var lat = $('#lat').val();
    var long = $('#long').val();

    // Variables Amenities
    var amenity = [];
    if ($('#amenity-1:checkbox:checked').length > 0){
      amenity.push(document.querySelector('#amenity-1:checked').value)
    }
    if ($('#amenity-2:checkbox:checked').length > 0){
      amenity.push(document.querySelector('#amenity-2:checked').value);
    }
    if ($('#amenity-3:checkbox:checked').length > 0){
      amenity.push(document.querySelector('#amenity-3:checked').value);
    }
    if ($('#amenity-4:checkbox:checked').length > 0){
      amenity.push(document.querySelector('#amenity-4:checked').value);
    }
    if ($('#amenity-5:checkbox:checked').length > 0){
      amenity.push(document.querySelector('#amenity-5:checked').value);
    }
    if ($('#amenity-6:checkbox:checked').length > 0){
      amenity.push(document.querySelector('#amenity-6:checked').value);
    }

    // Clean Container
    container.html('');

    // Api Call Ajax
    $.ajax({
      url: apiUrl,
      method: 'GET',
      data: {
        num_rooms : rooms,
        num_beds : beds,
        'amenities[]' : amenity,
      },

      success: function (res) {
        var resArray = [];

        // Fix res if it isn't an array
        if(!Array.isArray(res)){
          for (const property in res) {
            resArray.push(res[property]);
          }
        } else{
          resArray = res;
          }

        // Geo Search
        index.search('', {
          aroundLatLng: lat + ',' + long,
          aroundRadius: 20 * 1000
        }).then(({ hits }) => {

          // Get Api Real Result
          var finalResult = [];
          for (var i = 0; i <hits.length; i++){
            for (var j = 0; j <resArray.length; j++){
              if (hits[i]['id'] == resArray[j]['id']){
                finalResult.push(resArray[j]);
              }
            }
          }
          // Handlebars to print data
          for(var i = 0; i < finalResult.length; i++) {
            var item = hits[i];
            var context = {
              title: item.title,
              city: item.city,
              address: item.address,
              description: item.description,
              price: item.price,
              place_img: item.place_img,
            }
            var output = template(context);
            container.append(output);
          }
        });
      },
      error: function () {
        console.log('errore Api');
      }
    });
  });
});
