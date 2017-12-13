function update_user(){
  
  var id = document.getElementsByName("id");    
  var name = document.getElementsByName("name");
  var lastname = document.getElementsByName("lastname");
  var user = document.getElementsByName("user");    
  var email = document.getElementsByName("email");
  var password_current = document.getElementsByName("password_current");  
  var password_new = document.getElementsByName("password_new");  
  var password_new_confirm = document.getElementsByName("password_new_confirm");  
  
  $.ajax({
    url: "index.php?controller=c_user&method=update",
    type: "POST",
    data: "id="+id[0].value+"&name="+name[0].value+"&lastname="+lastname[0].value+"&user="+user[0].value+"&email="+email[0].value+"&password_new="+password_new[0].value+"&password_current="+password_current[0].value+"&password_new_confirm="+password_new_confirm[0].value,
    dataType: "html"

  }).done(function(resposta) {

    alert(resposta);

  }).fail(function(jqXHR, textStatus ) {
      console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
}

function insert_user(nome,email,user) {
  var name = nome.split(" ");

  $.ajax({
    url: "index.php?controller=c_user&method=insert_fb",
    type: "POST",
    data: "name="+name[0]+"&lastname="+name[1]+"&email="+email+"&user="+user,
    dataType: "html"

  }).done(function(resposta) {
    console.log(resposta);
    window.location="index.php?controller=routes&method=home&id=" + resposta;
  }).fail(function(jqXHR, textStatus ) {
      console.log("Request failed: " + textStatus);

  }).always(function() {
      console.log("completou");
  });
}


