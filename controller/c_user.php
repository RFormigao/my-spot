<?php
include_once "auto.php";

class c_user
{
  function cadastrar() {
    $id="";
    if($_POST){
        $user = new user(null ,$_POST["usuario"],$_POST["senha"],$_POST["email"],$_POST["nome"],$_POST["sobrenome"]);
        $userDAO = new userDAO();
        $userDAO -> inserir($user);
        header("Location:index.php?controller=routes&method=start");
    }
    require_once "view/register.php";
  }

  function update() {
    //so funciona se tiver echo na frfente    
   if ($_POST) {

    $id = $_POST['id'];
    $name = $_POST['name'];
    $lastname = $_POST['lastname'];
    $user = $_POST['user'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user1 = new user ($id);
    $userDAO1 = new userDAO();

    $retorno = $userDAO1 -> search_user($user1);
    
    echo $retorno[0]->;

    $_POST['name'] ? $name = $_POST['name'] : $name = $retorno[0]->name;


    $user = new user(1 ,$name,null,null,null,null);
    $userDAO = new userDAO();
    $userDAO -> update($user);    
   } 
  }

  function login()
  {
    if($_POST) {

      $userDAO = new userDAO();
      $user = new user (null, $_POST["usuario"], $_POST["senha"], null, null, null);
      
      $ret = $userDAO -> login($user);
      if(count($ret) > 0)
      {
          //se for identificado
          session_start();
          $_SESSION["id"] = $ret[0]->id_user;
          $_SESSION["name"] = $ret[0]->name;
          $_SESSION["lastname"] = $ret[0]->last_name;
          $_SESSION["email"] = $ret[0]->email;
          $_SESSION["user"] = $ret[0]->user;
          
  
          header("Location:index.php?controller=routes&method=home");          
      }
      else
      {
          echo "<script>alert('email/senha não conferem');'</script>";
      }

    }

    

    require_once "view/login.php";
  }
}

?>