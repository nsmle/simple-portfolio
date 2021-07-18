<?php 

class Controller {
    public function view($view, $data = [] )
    {
        require_once('app/Views/' . $view . '.php');
    }
    
    public function model($model)
    {
        require_once('app/Models/' . $model . '.php');
        return new $model;
    }
    
    public function sendMail($mail)
    {
        require_once('app/Mails/' . $mail . '.php');
        return new $mail;
    }
    
    public function authentication()
    {
        require_once('app/Core/Authentication.php');
        return new Authentication();
    }
    
}