var teste = $('.btn-modal');
teste.on("click", function() {
  var controle= this.innerHTML;

  if (controle == "Adicionar") {
    insert_address();
  }
  else if (controle == "Atualizar") {
    update_address();
  }
});

function insert_address(){
  
  var lat = document.getElementsByName("lat");  
  var id = document.getElementsByName("id");      
  var lon = document.getElementsByName("lon");
  var nickname = document.getElementsByName("nickname");
  var address = document.getElementsByName("address");  
  
  $.ajax({
    url: "index.php?controller=c_address&method=insert",
    type: "POST",
    data: "id="+id[0].value+"&lat="+lat[0].value+"&lon="+lon[0].value+"&nickname="+nickname[0].value+"&address="+address[0].value,
    dataType: "html"

  }).done(function(resposta) {
    console.log(resposta);
    window.location.reload();

  }).fail(function(jqXHR, textStatus ) {
      console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  }); 
}

function update_address() {

  var id = document.getElementsByName("id_address");      
  var nickname = document.getElementsByName("nickname");
  
  $.ajax({
    url: "index.php?controller=c_address&method=update",
    type: "POST",
    data: "id="+id[0].value+"&nickname="+nickname[0].value,
    dataType: "html"

  }).done(function(resposta) {
    console.log(resposta);
    window.location.reload();

  }).fail(function(jqXHR, textStatus ) {
      console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  }); 
}

function remove_address() {
  
    var id = document.getElementsByName("id_raddress");      
    
    $.ajax({
      url: "index.php?controller=c_address&method=remove",
      type: "POST",
      data: "id="+id[0].value,
      dataType: "html"
  
    }).done(function(resposta) {
      console.log(resposta);
      window.location.reload();
  
    }).fail(function(jqXHR, textStatus ) {
        console.log("Request failed: " + textStatus);
  
    }).always(function() {
        console.log("completou");
    }); 
  }

