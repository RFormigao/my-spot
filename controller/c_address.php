<?php
  include_once "auto.php";
class c_address
{ 
  function insert()
  {
    if ($_POST) {
      $id_user = $_POST["id"];
      $lat = $_POST["lat"];
      $lon = $_POST["lon"];
      $nickname = $_POST["nickname"];
      $user_address = $_POST["address"];

      $address = new address (null, $id_user, $user_address, $lat, $lon, $nickname);
      $addressDAO = new addressDAO ();
      $retorno = $addressDAO->insert($address);    
    }
  }

  function update () {
    if ($_POST) {
      $id_address = $_POST["id"];
      $nickname = $_POST["nickname"];

      $address = new address ($id_address,null , null, null, null, $nickname);
      $addressDAO = new addressDAO ();
      $retorno = $addressDAO->update($address);    
    }
  }

  function remove () {
    if ($_POST) {
      $id_address = $_POST["id"];

      $address = new address ($id_address);
      $addressDAO = new addressDAO ();
      $retorno = $addressDAO->remove($address);    
    }
  }
}