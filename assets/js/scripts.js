google.maps.event.addDomListener(window, 'load', carrega_mapa);


var spot = $('li');
$('.counter_spot')[0].innerText = "Você possui " + spot.length + " spots no mapa";
console.log(spot.length);

console.log($('.counter_spot'));


function configModal(type,m, c, d, z1, z2, o) {
  
  document.getElementById(m).style.display = d;
  document.getElementById(c).style.zIndex = z1;
  document.getElementById("container_home").style.zIndex = z2;
  document.getElementById("container_home").style.opacity = o;
  
  if(type == "I") {
    $('.title_spot')[0].innerText='Insira o seu Spot';
    $(".btn-modal")[0].innerText="Adicionar";
  }
  else if (type=="U") {
    $('.title_spot')[0].innerText = "Atualize seu Spot";
    $(".btn-modal")[0].innerText="Atualizar";    
  }

  else if(type =="L") {
    document.getElementsByName("nickname")[0].value ='';    
    document.getElementsByName("name")[0].value ='';
    document.getElementsByName("lastname")[0].value='';
    document.getElementsByName("user")[0].value='';
    document.getElementsByName("email")[0].value='';
    document.getElementsByName("password_current")[0].value='';
    document.getElementsByName("password_new")[0].value='';
    document.getElementsByName("password_new_confirm")[0].value='';
    
  }
}




var link = $(".options_info .update");
link.on("click", function() {
  var elemento = $(this).attr("value");
  var add = elemento.split('/');
  $("#id_address").val(add[0]) ;
  $("#address").val(add[1]) ;
  $("#lat").val(add[2]) ;
  $("#lon").val(add[3]) ;
  $("#nickname").val(add[4]) ;
  configModal("U","modal_map", "container_map", "block", "2", "1", "0.2"); 
  
});

var remove = $(".options_info .delete");
remove.on("click", function(){
  var elemento = $(this).attr("value");  
  $("#id_raddress").val(elemento);
  configModal("U","modal_remove", "container_remove", "block", "2", "1", "0.2");   
});

var localizar = $(".options_info .location");
localizar.on("click",function(){
  var elemento = $(this).attr("value"); 
  add = elemento.split('/');
  var mapProp = {
    center: new google.maps.LatLng(add[0], add[1]), 
    zoom: 17,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }; 
  
  var mapa = new google.maps.Map(document.getElementById("map"), mapProp);
  
  mostrar_pontos(mapa);  
  
})

function carrega_mapa() {
 
  var mapProp = {
    center: new google.maps.LatLng(-22.30275, -48.57554909999999), 
    zoom: 10,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }; 
  
  var mapa = new google.maps.Map(document.getElementById("map"), mapProp);
  
  var geocoder = new google.maps.Geocoder();    
  document.getElementById('input_search').addEventListener('keypress', function(e) {
    if(e.which == 13){
      geocodeAddress(geocoder, mapa);
    }
  },false);

  mostrar_pontos(mapa);  
}  

function geocodeAddress(geocoder, resultsMap) {

  var address = document.getElementById('input_search').value;
  geocoder.geocode({'address': address}, function(results, status) {
    if (status === google.maps.GeocoderStatus.OK) {
      var lat = results[0].geometry.location.lat();
      var long = results[0].geometry.location.lng();
      resultsMap.setCenter(results[0].geometry.location);

      document.getElementById("lat").value = lat;
      document.getElementById("lon").value = long;

      var latlgn = {lat: lat,lng: long};
      
      geocoder.geocode({'location': latlgn},function(results,status){
        document.getElementById("address").value = results[0].formatted_address ;
      });

      configModal("I","modal_map", "container_map", "block", "2", "1", "0.2"); 

    } else {
      alert('Geocode was not successful for the following reason: ' + status);
    }
  });
}

function mostrar_pontos(mapa)
{
  for(var x=0; x<address.length;x++)
  {
    var marca = new google.maps.Marker({
      position: {lat: parseFloat(address[x].latitude), 
      lng: parseFloat(address[x].longitude)},
      map: mapa,
      title: address[x].nickname,
    });		
  }//for
}




