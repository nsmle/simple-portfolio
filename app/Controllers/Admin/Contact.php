<?php

class Contact extends Controller {
  
  public function index()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $data = [
      'title'   => 'Nsmle - Contact',
      'contact' => $this->model('ContactModel')->getAll(),
      'allContact' => $this->model('ContactModel')->getAllContact()
    ];
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Contact/Index', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  public function detail()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $id = uriSegment(3);
    $data = [
      'title'   => 'Nsmle - Contact | Detail',
      'contact' => $this->model('ContactModel')->detail($id),
    ];
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Contact/Detail', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  public function reply()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $id = uriSegment(3);
    $data = [
      'title'   => 'Nsmle - Contact | Reply',
      'contact' => $this->model('ContactModel')->detail($id),
    ];
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Contact/Reply', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  public function replymessage()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $subject = $_POST['subject'];
    $replyMessage = $_POST['replyMessage'];
    
    if ( $this->sendMail('SendMail')->replyMessage($name, $email, $message, $subject, $replyMessage) !== "OK" ) {
      Flasher::setFlash('Email failed to send', 'danger');
      header('Location: ' . BASEURL . "/admin/contact/reply/$id");
    } elseif ( $this->model('ContactModel')->updateReplyMessage($id, $replyMessage) !== 1) {
      Flasher::setFlash("Contact by id $id, failed to update at row updated_at", 'danger');
      header('Location: ' . BASEURL . "/admin/contact/reply/$id");
    } else {
      Flasher::setFlash("Email successfully sent and data updated successfully", 'primary');
      header('Location: ' . BASEURL . "/admin/contact");
    }
  }
  
  
  
  public function edit()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $id = uriSegment(3);
    $data = [
      'title'   => 'Nsmle - Contact | Ubah',
      'contact' => $this->model('ContactModel')->detail($id)
    ];
    $this->view('Admin/Layout/Header', $data);
    $this->view('Admin/Contact/Edit', $data);
    $this->view('Admin/Layout/Footer');
  }
  
  public function editContact()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $message = $_POST['message'];
    
    if ( $this->model('ContactModel')->updateContact($id, $name, $email, $phone, $message) ) {
      Flasher::setFlash('Data changed successfully', 'primary');
      header('Location: ' . BASEURL . "/admin/contact/edit/$id");
    } else {
      Flasher::setFlash('Data failed to change', 'danger');
      header('Location: ' . BASEURL . "/admin/contact/edit/$id");
    }
    
  }
  
  public function deleted()
  {
    // CHECK LOGIN
    $this->authentication()->checkSignin();
    $id = uriSegment(3);
    if ($this->model('ContactModel')->deleteById($id)) {
      Flasher::setFlash('Data deleted successfully', 'primary');
      header('Location: ' . BASEURL . "/admin/contact");
    } else {
      Flasher::setFlash('Data failed to delete', 'danger');
      header('Location: ' . BASEURL . "/admin/contact");
    }
  }
  
}