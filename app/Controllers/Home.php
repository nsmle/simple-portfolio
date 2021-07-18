<?php 

class Home extends Controller {
    
    public function index()
    {
        $data = [
          'title'   => 'Nsmle - Fiki Pratama',
          'project' => $this->model('ProjectModel')->getAllProject()
        ];
        $this->view('Layout/Header', $data);
        $this->view('Home/Index', $data);
        $this->view('Layout/Footer');
    }
    
    
    // To acceot ajax contact
    public function contact()
  	{
      $name = $_POST['name'];
    	$email = $_POST['email'];
    	$message = $_POST['message'];
	    $phone = $_POST['phone'];
	  
	  
	    if ( !$this->model('ContactModel')->insertDataContact($name, $email, $phone, $message) ){
            echo '<p class="text-center my-5 py-5 text-danger">Please try again later...</p>';  
      }
      
      $id = $this->model('ContactModel')->getIdByEmail($email);
      
      if ( $this->sendMail('SendMail')->ContactMail($email, $name) == "OK" && $this->sendMail('SendMail')->ContactMailNotifyAdmin($email, $name, $message, $phone, $id) != 'OK') {
    	    echo '<p class="text-center my-5 py-5 text-danger">Please try again later...</p>'; 
    	} else {
    	    echo '
    	    <div class="my-5 py-4 justify-content-center">
              <p class="text-center mx-4">Thank you for contacting me ' . $name .'. I will reply to you as soon as possible once I am online.</p>
              <p class="btn-contact text-center mx-5 mt-5 py-2" onclick="resetForm()" style="border-radius:20px;">Contact me, Again?</p>
          </div>
    	    ';
        }
        
        
  	}
  	
  	
  	// To accept ajax project desctiption and return response
  	public function project()
  	{
  	  $project = $this->model('ProjectModel')->getProjectById($_POST['id']);
  	  $project = json_encode($project);
  	  echo $project;
  	}
  	
  	// To generate password for login
  	
    
}