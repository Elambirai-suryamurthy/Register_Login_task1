<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
 
class Authentication extends CI_Controller {

     function __construct()
     {
          parent::__construct();
          $this->load->model('Authentication_model', 'emp');
          $this->load->helper('email');
          $this->load->helper(array('form', 'url'));
          // load form_validation library
          $this->load->library('form_validation');

 
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
          $this->load->library('form_validation');   #1
          $this->form_validation->set_rules('name','User Name','trim|required'); #2
          $this->form_validation->set_rules('password','Password','trim|required|min_length[6]|max_length[25]');
          $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
          $this->form_validation->set_rules('place','place','trim|required');
   
     if($this->form_validation->run()==true)    
     {
          $name=$this->input->post('name');
          $password=$this->input->post('password'); 
          $ep=hash('sha256', $password);
          $email=$this->input->post('email');
          
          $token = bin2hex(openssl_random_pseudo_bytes(16));
          $place=$this->input->post('place'); 
          $currentdate=date('Y-m-d');
          $date=date('Y-m-d',strtotime('+1 years'));
          $data=array(
                    'name'=>$name,
                    'password'=>$ep,
                    'email'=>$email,
                    'place'=>$place,
                    'currentdate'=>$currentdate,
                    'date'=>$date
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
               $details=array(
                    'status'=>TRUE,
                    
                    'name'=>$name,
               'token'=>$token);
               echo json_encode($details);
          
          }
     }
          else
          {
               // $err=array(
               //      'error_code'=>"400",
               //      'error_message'=>"bad request"
               // );
               // echo json_encode($err);
               $errors = validation_errors();
            echo json_encode(['error'=>$errors]);
          }

     }  

     public function update()
     {
          
          $id=$this->input->post('id');
          $name=$this->input->post('name');
          $email=$this->input->post('email');
          $place=$this->input->post('place');
          $data=array(
               
               'name'=> $name,
               'email'=>$email,
               'place'=>$place 
          );
          $result=$this->emp->update_data($id,$data);
          if($result!=FALSE)
          {
                   $status=array('status' => TRUE,
                   'message' => 'The user info has been updated successfully.'
          );
               echo json_encode($status);
          }
         else{
          $err=array(
               'error_code'=>"401",
               'error_message'=>"Some problems occurred, please try again."
          );
          echo json_encode($err);
         }
         

     }
     function user()
     {
          $id=$this->input->post('id');
          // echo $id;
          // die();
          $result=$this->emp->user($id);
         
               if($result)
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
      function logout()
      {
         $token=$this->input->post('token');
         $res=$this->emp->logout($token);
         if($res)
         {
              echo json_encode("deleted");
         }
         else{
          $err=array(
               'error_code'=>"401",
                'error_message'=>"Unauthorized"
          );  
          echo json_encode($err);  
         }
    
    

      }


} 
 

    
    
         
     
  

