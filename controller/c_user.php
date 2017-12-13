<?php
include_once "auto.php";

class c_user
{
  function cadastrar() {
    $id="";
    if($_POST){
      $senha = $_POST["senha"];
      $confirm_senha= $_POST["confirm_senha"];

      if($senha == $confirm_senha) {
        $user = new user(null ,$_POST["usuario"],$senha,$_POST["email"],$_POST["nome"],$_POST["sobrenome"]);
        $userDAO = new userDAO();
        $userDAO -> inserir($user);
        header("Location:index.php?controller=routes&method=start");
      }
      else {
        echo"<script>alert('As senhas inseridas precisam ser iguais!');</script>";
      }
        
    }
    require_once "view/register.php";
  }

  function insert_fb() {

    if($_POST){
        $user = new user(null ,null,null,$_POST["email"],$_POST["name"]);
        $userDAO = new userDAO();
        $ret = $userDAO -> checkLogin($user);

        if (!$ret) {
          $user1 = new user(null ,$_POST["user"],null,$_POST["email"],$_POST["name"], $_POST["lastname"]);
          $userDAO1 = new userDAO();
          $userDAO1 -> inserir_fb($user1);
        }

        $user2 = new user(null ,null,null,$_POST["email"],$_POST["name"]);
        $userDAO2 = new userDAO();
        $ret2 = $userDAO2 -> checkLogin($user2);

        session_start();
        $_SESSION["id"] = $ret2[0]->id_user;
        $_SESSION["name"] = $ret2[0]->name;
        $_SESSION["lastname"] = $ret2[0]->last_name;
        $_SESSION["email"] = $ret2[0]->email;
        $_SESSION["user"] = $ret2[0]->user;

        $id = $_SESSION["id"];     

       return print_r($id);
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

    
    $password_new = $_POST['password_new'];
    $password_current = $_POST['password_current'];
    $password_new_confirm = $_POST['password_new_confirm'];

    $user1 = new user ($id);
    $userDAO1 = new userDAO();
    $retorno = $userDAO1 -> search_user($user1);

    if($password_current == $retorno[0]->password) 
    {
      $_POST['id'] ? $id = $_POST['id'] : $id = $retorno[0]->id;
      $_POST['name'] ? $name = $_POST['name'] : $name = $retorno[0]->name;
      $_POST['lastname'] ? $lastname = $_POST['lastname'] : $lastname = $retorno[0]->last_name;    
      $_POST['user'] ? $user = $_POST['user'] : $user = $retorno[0]->user;
      $_POST['email'] ? $email = $_POST['email'] : $email = $retorno[0]->email;
      $_POST['password_new'] ? $password = $_POST['password_new'] : $password = $retorno[0]->password;
      
      if($password_new == $password_new_confirm){
        $user = new user($id, $user, $password, $email, $name, $lastname);
        $userDAO = new userDAO();
        $userDAO -> update($user);
      }
      else {
        echo "A nova senha não confere";
      }

      echo "Atualização feita com sucesso!";
    
    }
    else {
      echo "A senha inserida nao confere com a atual";
    }
    
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

          $teta = $_SESSION["id"];

          header("Location:index.php?controller=routes&method=home&id=$teta");       
      }
      else
      {
          echo "<script>alert('email/senha não conferem');'</script>";
      }

    }  
    require_once "view/login.php";
  }

  function test()
  {
    $user = new user($_SESSION["id"]);
    $userDAO2 = new userDAO();
    $retorno = $userDAO2 -> search_address($user);
    require_once "view/home.php";    
  }

  function logout()
  {
    session_destroy();
    require_once "controller/routes.php";
		$routes = new routes();
		$routes->start();
  }
}

?>