<?php

class ContactModel {
    
    private $tableContact = 'contact';
    private $db;
    
    
    
    public function __construct()
    {
        $this->db = new Database;
    }
    
    public function insertDataContact($name, $email, $phone, $message)
    {
        $created_at = date('Y-m-d H:i:s');
        
        $query = "INSERT INTO $this->tableContact
                VALUES
          ('', :name, :email, :phone, :message, :reply_message, :created_at, '', '')";
        
        $this->db->query($query);
        $this->db->bind('name', $name);
        $this->db->bind('email', $email);
        $this->db->bind('phone', $phone);
        $this->db->bind('message', $message);
        $this->db->bind('reply_message', null);
        $this->db->bind('created_at', $created_at);
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function getIdByEmail($email)
    {
      $this->db->query("SELECT * FROM $this->tableContact WHERE email LIKE :email");
      $this->db->bind('email', $email);
      $id = $this->db->resultSingle();
      return $id['id'];
    }
    
    public function getAll()
    {
      $this->db->query("SELECT * FROM $this->tableContact WHERE reply_message IS NULL ORDER BY id DESC");
      return $this->db->resultSet();
    }
    
    public function getAllContact()
    {
      $this->db->query("SELECT * FROM $this->tableContact");
      return $this->db->resultSet();
    }
    
    public function detail($id)
    {
      $this->db->query("SELECT * FROM $this->tableContact WHERE id = :id");
      $this->db->bind('id', $id);
      return $this->db->resultSingle();
    }
    
    public function updateContact($id, $name, $email, $phone, $message)
    {
      $query = "UPDATE $this->tableContact SET 
                name = :name, email = :email, phone = :phone, message = :message, updated_at = :updated_at WHERE id = :id";
      
      $this->db->query($query);
      $this->db->bind('name', $name);
      $this->db->bind('email', $email);
      $this->db->bind('phone', $phone);
      $this->db->bind('message', $message);
      $this->db->bind('updated_at', date('Y-m-d H:i:s'));
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
    
    public function deleteById($id)
    {
      // ADD LOG FOR ACTION DELETE
      $usr = $this->detail($id);
      $d = [
        'id' => $usr['id'],
        'name' => $usr['name'],
        'email' => $usr['email'],
        'phone' => $us['phone'],
        'message' => $usr['message'],
        'reply_message' => $usr['reply_message'],
      ];
      logs('Data dengan keterangan ' . json_encode($d) . ' Dihapus dari Database.');
      
      $this->db->query("DELETE FROM $this->tableContact WHERE id = :id");
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
    
    public function updateReplyMessage($id, $replyMessage)
    {
      $this->db->query("UPDATE $this->tableContact SET reply_message = :reply_message, updated_at = :updated_at WHERE id = :id");
      $this->db->bind('reply_message', $replyMessage);
      $this->db->bind('updated_at', date('Y-m-d H:i:s'));
      $this->db->bind('id', $id);
      $this->db->execute();
      return $this->db->rowCount();
    }
    
}