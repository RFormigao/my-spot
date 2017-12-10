<?php
	class addressDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
    }

    function insert($address) {
      $sql = "INSERT INTO address (id_user, address, latitude, longitude, nickname) VALUES (?, ?, ?, ?, ?)";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $address->getUser());
            $stmt->bindValue(2, $address->getAddress());
            $stmt->bindValue(3, $address->getLatitude());
            $stmt->bindValue(4, $address->getLongitude());
            $stmt->bindValue(5, $address->getNickname());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao inserir address");
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }    

    function update($address) {
      $sql = "UPDATE address SET nickname = ? WHERE id_address = ?";
      try
      {
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $address->getNickname());
        $stmt->bindValue(2, $address->getIdaddress());
        $ret = $stmt->execute();
        $this->db = null;
        if(!$ret)
        {
          die("Erro ao atualizar address");
        }
      }
      catch (PDOException $e)
      {
          die ($e->getMessage());
      }
    }    

    function remove($address) {
      $sql = "DELETE FROM address WHERE id_address = ?";
      try
      {
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(1, $address->getIdaddress());
        $ret = $stmt->execute();
        $this->db = null;
        if(!$ret)
        {
          die("Erro ao remover address");
        }
      }
      catch (PDOException $e)
      {
          die ($e->getMessage());
      }
    }    
  }

  
  