<?php

class Projects extends Controller {
  
  public function Index()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $data = [
      'title'    => 'Nsmle - Projects',
      'project' => $this->model('ProjectModel')->getAllProject()
    ];
    
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Projects/Index', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  
  public function detail()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    
    $slug = uriSegment(3);
    
    $data = [
      'title'    => 'Nsmle - Projects | Details',
      'project' => $this->model('ProjectModel')->getProjectBySlug($slug)
    ];
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Projects/Detail', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  
  public function edit()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    
    $slug = uriSegment(3);
    
    $data = [
      'title'    => 'Nsmle - Projects | Edit',
      'project' => $this->model('ProjectModel')->getProjectBySlug($slug)
    ];
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Projects/Edit', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  public function editproject()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    
    $id = $_POST['id'];
    $name = $_POST['name'];
    $slug = strtolower(preg_replace('/\s+/', '-', $_POST['name']));
    $status = $_POST['status'];
    $description = $_POST['description'];
    $contributor = $_POST['contributor'];
    $source_code = $_POST['source_code'];
    $demo = $_POST['demo'];
    
    $project = $this->model('ProjectModel')->getProjectById($id);
    
    //MOVE LOCATION AND RENAME FILE IMAGE
    if ( $_FILES['poster']['error'] == 0 ) {
      $formatFile = array_pop(explode('.', $_FILES['poster']['name']));
  		$location = $_FILES['poster']['tmp_name'];
  		$fileName = sha1($name).'.'.$formatFile;
  		if ( move_uploaded_file($location, "assets/img/project/".$fileName) ) {
  		  echo "success";
  		  unlink('assets/img/project/' . $project['poster']);
  		} else {
  		  Flasher::setFlash("Project ". $project['name'] ." failed to edit poster image", 'danger');
        header('Location: '. BASEURL . "/admin/projects/edit/".$project['slug']);exit;
  		}
    }
    
    //var_dump($_FILES);exit;
    if ( $_FILES['poster']["error"] == 0 ) {
      if ( $this->model('ProjectModel')->editProject($id, $name, $slug, $status, $description, $contributor, $source_code, $demo, $fileName) ) {
        Flasher::setFlash("Project ". $project['name'] ." successfully edited", 'primary');
        header('Location: '. BASEURL . "/admin/projects/detail/".$project['slug']);
      }
    } elseif ( $_FILES['poster']["error"] != 0 ) {
      if ( $this->model('ProjectModel')->editProject($id, $name, $slug, $status, $description, $contributor, $source_code, $demo, $project['poster']) ) {
        Flasher::setFlash("Project ". $project['name'] ." successfully edited", 'success');
        header('Location: '. BASEURL . "/admin/projects/detail/".$project['slug']);
      }
    } else {
      Flasher::setFlash("Project ". $project['name'] ." failed to edit", 'danger');
      header('Location: '. BASEURL . "/admin/projects/edit/".$project['slug']);
    }
    
  }
  
  public function deleted()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    
    $slug = uriSegment(3);
    $project = $this->model('ProjectModel')->getProjectBySlug($slug);
    
    if ( unlink('assets/img/project/' . $project['poster']) && $this->model('ProjectModel')->deleteProject($slug) ) {
      Flasher::setFlash("Project ". $project['name'] ." successfully deleted", 'primary');
      header('Location: '. BASEURL . '/admin/projects');
      
    } else {
      Flasher::setFlash("Project ". $project['name'] ." failed to delete", 'danger');
      header('Location: '. BASEURL . "/admin/projects/detail/$slug");
    }
    
  }
  
  
  
  
  public function addProject()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    
    $name = $_POST['name'];
    $slug = strtolower(preg_replace('/\s+/', '-', $_POST['name']));
    $status = $_POST['status'];
    $description = $_POST['description'];
    $github = $_POST['source_code'];
    $contributor = $_POST['contributor'];
    $demo = $_POST['demo'];
    
    //MOVE LOCATION AND RENAME FILE IMAGE
    if ( $_FILES['poster']['error'] == 0 ) {
      $formatFile = array_pop(explode('.', $_FILES['poster']['name']));
  		$location = $_FILES['poster']['tmp_name'];
  		$fileName = sha1($name).'.'.$formatFile;
  		if (move_uploaded_file($location, "assets/img/project/".$fileName)) {
  		  echo "Success";
  		} else {
  		  echo "Failed move image";exit;
  		}
    }
    
    if ( $this->model('ProjectModel')->addProject($name, $slug, $status, $description, $github, $fileName, $contributor, $demo) ) {
      Flasher::setFlash('Project data added successfully', 'primary');
      header('Location: '. BASEURL . '/admin/projects');
    } else {
      Flasher::setFlash('Project data failed to add', 'danger');
      header('Location: '. BASEURL . '/admin/projects');
    }
    
  }
  
}