function update_user(){
  
    var id = document.getElementsByName("id");    
    var name = document.getElementsByName("name");
    var lastname = document.getElementsByName("lastname");
    var user = document.getElementsByName("user");    
    var email = document.getElementsByName("email");
    var password = document.getElementsByName("password");    
    

  console.log(name[0].value);


  $.ajax({
    url: "index.php?controller=c_user&method=update",
    type: "POST",
    data: "id="+id[0].value+"&name="+name[0].value+"&lastname="+lastname[0].value+"&user="+user[0].value+"&email="+email[0].value+"&password="+password[0].value,
    dataType: "html"

  }).done(function(resposta) {
    console.log(resposta);

    var test = JSON.stringify(resposta);

    console.log(test);

    //window.location.reload();

}).fail(function(jqXHR, textStatus ) {
    console.log("Request failed: " + textStatus);

}).always(function() {
    console.log("completou");
});


}