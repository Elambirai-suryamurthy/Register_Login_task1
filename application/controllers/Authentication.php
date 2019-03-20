<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Authentication extends CI_Controller {

     function __construct()
     {
          parent::__construct();
          $this->load->model('Authentication_model', 'emp'); 
     }


     public function export()
     {
          $spreadsheet = new Spreadsheet();
          $sheet = $spreadsheet->getActiveSheet();
          $res= $this->emp->export();
        
          $i = 1;
         foreach ($res as $result)
         {
               $sheet->setCellValue('A'.$i,$result['id']);
               $sheet->setCellValue('B'.$i,$result['name']);
               $sheet->setCellValue('C'.$i,$result['email']);
               $sheet->setCellValue('D'.$i,$result['place']);
               $i++;
         }
         
          $writer = new Xlsx($spreadsheet);
          $filename='export.xls'; 
          header('Content-Type: application/vnd.ms-excel'); 
          header('Content-Disposition: attachment;filename="'.$filename.'"'); 
          header('Cache-Control: max-age=0');
          $writer->save('php://output');
  
     
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
              $token=$this->input->post('token'); 
         
               /* function for display records*/ 
               $result=$this->emp->displayrecords($token);
               if($result!=FALSE)
               {
                    echo json_encode($result);   
               }
               else
               {
                $err=array(
                     'error_code'=>"404",
                      'error_message'=>"No data found"
                );  
                echo json_encode($err);  
               }
               
      }
} 
 

    
    
         
     
  

