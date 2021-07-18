<?php

namespace Mail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions


class BaseMail {
    
    public $mails;
    
    public function __construct()
    {
      $this->mails = new PHPMailer(true);
    }
    
    public function sendMail($Email, $Name, $Subject, $Body, $AltBody)
    {
        try {
            //Server settings
            $this->mails->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $this->mails->isSMTP();                                            //Send using SMTP
            $this->mails->Host       = MAIL_HOST;                     //Set the SMTP server to send through
            $this->mails->SMTPAuth   = true;                                   //Enable SMTP authentication
            $this->mails->Username   = MAIL_USERNAME;                     //SMTP username
            $this->mails->Password   = MAIL_PASSWORD;                               //SMTP password
            $this->mails->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $this->mails->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            $this->mails->SMTPDebug = MAIL_DEBUG;
            
            //Recipients
            $this->mails->setFrom(MAIL_FROMEMAIL, MAIL_FROMNAME);
            $this->mails->addAddress($Email, $Name);     //Add a recipient
            //$this->mails->addAddress('ellen@example.com');               //Name is optional
            //$this->mails->addReplyTo('info@example.com', 'Information');
            //$this->mails->addCC('cc@example.com');
            //$this->mails->addBCC('bcc@example.com');
        
            //Attachments
            //$this->mails->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$this->mails->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
            $this->mails->setLanguage( 'id' , 'vendor/phpmailer/phpmailer/language/phpmailer.lang-id.php' );
            //Content
            $this->mails->isHTML(true);                                  //Set email format to HTML
            $this->mails->Subject = $Subject;
            $this->mails->Body    = $Body;
            $this->mails->AltBody = $AltBody;
        
            $this->mails->send();
            return 'OK';
        } catch (Exception $e) {
            return "FALSE";
            //return "Message could not be sent. Mailer Error: {$this->mails->ErrorInfo}";
        }
    }
    
    
}
