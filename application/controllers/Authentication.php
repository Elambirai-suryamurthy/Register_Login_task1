<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Authentication extends CI_Controller {

     function __construct()
     {
          parent::__construct();
          $this->load->model('Authentication_model', 'emp'); 
     }
    
    /* function for login validation*/     
     function login_validation()  
     {   
              
          $email = $this->input->post('email');  
          $password = $this->input->post('password');   
          $ep=hash('sha256', $password);
          $token = bin2hex(openssl_random_pseudo_bytes(16));
          $this->load->model('authentication_model');

          if($this->authentication_model->can_login($email, $ep))  
          {  
                /* function call for Adding token into table when user logged in and registered*/ 
               $tokentable= $this->authentication_model->addToken($email, $ep,$token);
               $details=array(
               'token'=>$token);
               echo json_encode($details);
          } 

          else  
          {   
               $err=array
               (
                    'error_code'=>"401",
                    'error_message'=>"Invalid Credentials"
               );
               echo json_encode($err);
          }  
     }  
        

     public function register()  
     {
          $name=$this->input->post('name');
          $password=$this->input->post('password'); 
          $ep=hash('sha256', $password);
          $email=$this->input->post('email');
          $token = bin2hex(openssl_random_pseudo_bytes(16));
          $place=$this->input->post('place'); 
          $data=array(
                    'name'=>$name,
                    'password'=>$ep,
                    'email'=>$email,
                    'place'=>$place
          );

          if($this->emp->check($email))
          {
               $err=array(
                    'error_code'=>"409",
                    'error_message'=>"User already exist"
               );
               echo json_encode($err);
     
               }
          else if($this->emp->insertdata($data))
          {
               $tokentable= $this->emp->addToken($email, $ep,$token);
               $details=array('name'=>$name,
               'token'=>$token);
               echo json_encode($details);
          
          }
          else
          {
               $err=array(
                    'error_code'=>"400",
                    'error_message'=>"bad request"
               );
               echo json_encode($err);
          }

     }  

     public function dispdata()
     {
               /* function for display records*/ 
               $result=$this->emp->displayrecords();
               echo json_encode($result);
      }
} 
 

    
    
         
     
  

