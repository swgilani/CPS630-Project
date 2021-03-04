function show_items()
{
 var ddl = document.getElementById("start");
 var selectedValue = ddl.options[ddl.selectedIndex].value;
    if (selectedValue == "Forest of Flowers Mississauga")
   {
    document.getElementById('forest_flower_shop').style.display = 'block';
    document.getElementById('flower_creation_shop').style.display = 'none';
    document.getElementById('oakville_florist_shop').style.display = 'none';
    document.getElementById('tim_hortons_shop').style.display = 'none';
    document.getElementById('starbucks_shop').style.display = 'none';
    document.getElementById('second_cup_shop').style.display = 'none';
   }
  else if (selectedValue == "Flower Creations Mississauga")
   {
    document.getElementById('forest_flower_shop').style.display = 'none';
    document.getElementById('flower_creation_shop').style.display = 'block';
    document.getElementById('oakville_florist_shop').style.display = 'none';
    document.getElementById('tim_hortons_shop').style.display = 'none';
    document.getElementById('starbucks_shop').style.display = 'none';
    document.getElementById('second_cup_shop').style.display = 'none';
   }
   else if (selectedValue == "Oakville Florist Shop")
   {
    document.getElementById('forest_flower_shop').style.display = 'none';
    document.getElementById('flower_creation_shop').style.display = 'none';
    document.getElementById('oakville_florist_shop').style.display = 'block';
    document.getElementById('tim_hortons_shop').style.display = 'none';
    document.getElementById('starbucks_shop').style.display = 'none';
    document.getElementById('second_cup_shop').style.display = 'none';
   }
  else  if (selectedValue == "Tim Hortons Mississauga")
   {
    document.getElementById('forest_flower_shop').style.display = 'none';
    document.getElementById('flower_creation_shop').style.display = 'none';
    document.getElementById('oakville_florist_shop').style.display = 'none';
    document.getElementById('tim_hortons_shop').style.display = 'block';
    document.getElementById('starbucks_shop').style.display = 'none';
    document.getElementById('second_cup_shop').style.display = 'none';
   }
   else if (selectedValue == "Starbucks Mississauga")
   {
    document.getElementById('forest_flower_shop').style.display = 'none';
    document.getElementById('flower_creation_shop').style.display = 'none';
    document.getElementById('oakville_florist_shop').style.display = 'none';
    document.getElementById('tim_hortons_shop').style.display = 'none';
    document.getElementById('starbucks_shop').style.display = 'block';
    document.getElementById('second_cup_shop').style.display = 'none';
   }
   else if (selectedValue == "Second Cup Mississauga")
   {
    document.getElementById('forest_flower_shop').style.display = 'none';
    document.getElementById('flower_creation_shop').style.display = 'none';
    document.getElementById('oakville_florist_shop').style.display = 'none';
    document.getElementById('tim_hortons_shop').style.display = 'none';
    document.getElementById('starbucks_shop').style.display = 'none';
    document.getElementById('second_cup_shop').style.display = 'block';
   }

}



//initializing and creating a route using the google maps api
function initMap() {
    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 9,
      center: {lat: 43.7272, lng: -79.4121}
    });

    directionsDisplay.setMap(map);

    var onChangeHandler = function() {
      calculateAndDisplayRoute(directionsService, directionsDisplay);
    };

    document.getElementById('start').addEventListener('change', onChangeHandler);
    document.getElementById('end').addEventListener('change', onChangeHandler);
  }

  function calculateAndDisplayRoute(directionsService, directionsDisplay) {
    directionsService.route({
      origin: document.getElementById('start').value,
      destination: document.getElementById('end').value,
      travelMode: 'DRIVING'
    }, function(response, status) {
      if (status === 'OK') {
        directionsDisplay.setDirections(response);
        
      }
    });
  }