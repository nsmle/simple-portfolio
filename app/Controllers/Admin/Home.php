<?php

class Home extends Controller {
    
    public function index()
    {
        // CHECK LOGIN
        $this->authentication()->checkSignin();
        
        $data = [
          'title'   => 'Nsmle - Home',
          'contact' => $this->model('ContactModel')->getAll(),
          'project' => $this->model('ProjectModel')->getAllProject()
        ];
        
        $this->view('Admin/Layout/Header', $data);
        $this->view('Admin/Home/Index', $data);
        $this->view('Admin/Layout/Footer');
    }
    
}