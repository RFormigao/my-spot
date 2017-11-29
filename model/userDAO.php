<?php
	class userDAO extends conexao
	{
		function __construct()
		{
			parent:: __construct();
    }

    function inserir($user) {
      $sql = "INSERT INTO user (user, password, email, name, last_name) values (?,?,?,?,?)";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $user->getUser());
            $stmt->bindValue(2, $user->getPassword());
            $stmt->bindValue(3, $user->getEmail());
            $stmt->bindValue(4, $user->getName());
            $stmt->bindValue(5, $user->getLastName());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao inserir user");
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }

    function update($user)
    {
        $sql = "UPDATE USER SET USER = ? WHERE id_user = ?";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $user->getUser());
            $stmt->bindValue(2, $user->getIduser());
            $ret = $stmt->execute();
            $this->db = null;
            
            if(!$ret)
            {
                die("Erro ao logar user");
            }
            else
            {
                return $retorno = $stmt->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }

    function search_user($user)
    {
        $sql = "SELECT * FROM user WHERE id_user = ?";

        try
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $user->getIduser());
            $ret = $stmt->execute();
            $this->db = null;
            if(!$ret)
            {
                die("Erro ao buscar user");
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }

    function login($user)
    {
        $sql = "SELECT * FROM user WHERE user = ? AND password = ?";

        try 
        {
            $stmt = $this->db->prepare($sql);
            $stmt->bindValue(1, $user->getUser());
            $stmt->bindValue(2, $user->getPassword());

            $ret = $stmt->execute();
            $this->db = null;
            
            if(!$ret)
            {
                die("Erro ao logar user");
            }
            else
            {
                return $retorno = $stmt->fetchAll(PDO::FETCH_OBJ);
            }
        }
        catch (PDOException $e)
        {
            die ($e->getMessage());
        }
    }
  }