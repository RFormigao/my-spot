google.maps.event.addDomListener(window, 'load', carrega_mapa);

function configModal(d, z1, z2, o) {
  document.getElementById("modal_map").style.display = d;
  document.getElementById("container_modal").style.zIndex = z1;
  document.getElementById("container_home").style.zIndex = z2;
  document.getElementById("container_home").style.opacity = o;
}

function carrega_mapa() {
  var mapProp = {
    center: new google.maps.LatLng(-22.317570, -49.067875), 
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var mapa = new google.maps.Map(document.getElementById("map"), mapProp);

  google.maps.event.addListener(mapa, 'click', function(event) {
   configModal("block", "2", "1", "0.2"); 
  });
}







