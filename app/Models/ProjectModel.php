<?php

class ProjectModel {
  
  private $tableProject = "projects";
  private $db;
  
  public function __construct()
  {
    $this->db = new Database;
  }
  
  public function getAllProject()
  {
    $this->db->query("SELECT * FROM $this->tableProject");
    return $this->db->resultSet();
  }
  
  public function deleteProject($slug)
  {
    $this->db->query("DELETE FROM $this->tableProject WHERE slug = :slug");
    $this->db->bind('slug', $slug);
    $this->db->execute();
    return $this->db->rowCount();
  }
  
  public function addProject($name, $slug, $status, $description, $source_code, $poster, $contributor, $demo)
  {
    $query = "INSERT INTO $this->tableProject
                      VALUES
              ('', :slug, :name, :status, :description, :contributor, :source_code, :demo, :poster, :created_at, '', '' )";
    $this->db->query($query);
    $this->db->bind('slug', $slug);
    $this->db->bind('name', $name);
    $this->db->bind('status', $status);
    $this->db->bind('description', $description);
    $this->db->bind('contributor', $contributor);
    $this->db->bind('source_code', $source_code);
    $this->db->bind('poster', $poster);
    $this->db->bind('demo', $demo);
    $this->db->bind('created_at', date('Y-m-d H:i:s'));
    $this->db->execute();
    return $this->db->rowCount();
  }
  
  public function editProject($id, $name, $slug, $status, $description, $contributor, $source_code, $demo, $poster)
  {
    $query = "UPDATE $this->tableProject SET
              id = :id, name = :name, slug = :slug, status = :status, description = :description, contributor = :contributor, source_code = :source_code, demo = :demo, poster = :poster, updated_at = :updated_at WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('name', $name);
    $this->db->bind('slug', $slug);
    $this->db->bind('status', $status);
    $this->db->bind('description', $description);
    $this->db->bind('contributor', $contributor);
    $this->db->bind('source_code', $source_code);
    $this->db->bind('demo', $demo);
    $this->db->bind('poster', $poster);
    $this->db->bind('id', $id);
    $this->db->bind('updated_at', date('Y-m-d H:i:s'));
    $this->db->execute();
    return $this->db->rowCount();
  }
  
  public function getProjectBySlug($slug)
  {
    $this->db->query("SELECT * FROM $this->tableProject WHERE slug = :slug");
    $this->db->bind('slug', $slug);
    return $this->db->resultSingle();
  }
  
  public function getProjectById($id)
  {
    $this->db->query("SELECT * FROM $this->tableProject WHERE id = :id");
    $this->db->bind('id', $id);
    return $this->db->resultSingle();
  }
}