jQuery(document).ready(function(){

  var latlng = new google.maps.LatLng(4.6097100, -74.0817500);
  var myOptions = {
    zoom: 9,
    center: latlng,
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI:true,
    disableDoubleClickZoom:true,
    navigationControl:true
  };

  var map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

  var input = document.getElementById('place');
  var autocomplete = new google.maps.places.Autocomplete(input);
  
  autocomplete.bindTo('bounds', map);

  var infowindow = new google.maps.InfoWindow
    ({     
      maxWidth: 500
    });
 
  var marker = new google.maps.Marker
    ({
      position: latlng,
      map: map
    });
 
 
  /**/
  google.maps.event.addListener(autocomplete, 'place_changed', function() 
  {
   
    infowindow.close();
    var place = autocomplete.getPlace();
   
    if (place.geometry.viewport) 
    {
      map.fitBounds(place.geometry.viewport);
    } 
    else 
    {
      map.setCenter(place.geometry.location);
      map.setZoom(15);  // Why 17? Because it looks good.
    }
 
    var image = new google.maps.MarkerImage(
                  place.icon,
                  new google.maps.Size(71, 71),
                  new google.maps.Point(0, 0),
                  new google.maps.Point(17, 34),
                  new google.maps.Size(35, 35));
                  marker.setIcon(image);
                  marker.setPosition(place.geometry.location
                );
 
    var address = '';
    if (place.address_components) 
    {
      address = [(place.address_components[0] &&
                  place.address_components[0].short_name || ''),
                  (place.address_components[1] &&
                  place.address_components[1].short_name || ''),
                  (place.address_components[2] &&
                  place.address_components[2].short_name || '')
                ].join(' ');
    }
 
    infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    infowindow.open(map, marker);
  });
});