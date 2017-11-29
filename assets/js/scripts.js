google.maps.event.addDomListener(window, 'load', carrega_mapa);

function configModal(m, c, d, z1, z2, o) {
  document.getElementById(m).style.display = d;
  document.getElementById(c).style.zIndex = z1;
  document.getElementById("container_home").style.zIndex = z2;
  document.getElementById("container_home").style.opacity = o;
}

function carrega_mapa() {
  var mapProp = {
    center: new google.maps.LatLng(-22.688942, -48.673043), 
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var mapa = new google.maps.Map(document.getElementById("map"), mapProp);

  google.maps.event.addListener(mapa, 'click', function(event) {
   configModal("modal_map", "container_map", "block", "2", "1", "0.2"); 
  });
}

function pegar_icon() {
  var elemento = this.getAttribute("test");
  console.log(elemento);
}






