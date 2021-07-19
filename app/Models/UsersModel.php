<?php

class usersModel {
    
    private $tableUsers = 'users';
    private $db;
    
    
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function getUserByUsername($username)
    {
        $this->db->query("SELECT * FROM $this->tableUsers WHERE username = :username");
        $this->db->bind('username', $username);
        return $this->db->resultSingle();
    }
    
    public function addUsers($name, $username, $email, $phone, $password)
    {
        
        $created_at = date('Y-m-d H:i:s');
        $query = "INSERT INTO $this->tableUsers
                        VALUES
                  ('', :name, :username, :email, :phone, :password, :role, :created_at, '', '')";
        $this->db->query($query);
        $this->db->bind('name', $name);
        $this->db->bind('username', $username);
        $this->db->bind('email', $email);
        $this->db->bind('phone', $phone);
        $this->db->bind('password', $password);
        $this->db->bind('role', DEFAULT_ROLE_USER);
        $this->db->bind('created_at', $created_at);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function updatePassword($username)
    {
        $updated_at = date('Y-m-d H:i:s');
        $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
        
        $query = "UPDATE $this->tableUsers SET 
                password = :password, updated_at = :updated_at WHERE username = :username";
        $this->db->query($query);
        $this->db->bind('password', $password);
        $this->db->bind('updated_at', $updated_at);
        $this->db->bind('username', $username);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    
    
    /*
    public function insertDataContact($name, $email, $phone, $message)
    {
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        
        $query = "INSERT INTO $this->tableContact
                VALUES
          ('', :name, :email, :phone, :message, :created_at, :updated_at, '')";
        
        $this->db->query($query);
        $this->db->bind('name', $name);
        $this->db->bind('email', $email);
        $this->db->bind('phone', $phone);
        $this->db->bind('message', $message);
        $this->db->bind('created_at', $created_at);
        $this->db->bind('updated_at', $updated_at);
        $this->db->execute();
        return $this->db->rowCount();
    }*/
    
    
}