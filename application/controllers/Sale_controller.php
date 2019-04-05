<?php
defined('BASEPATH') OR exit('No direct script access allowed');



class sale_controller extends CI_Controller
{

    function __construct()
     {
          parent::__construct();
          $this->load->model('Sales_model', 'emp');
          $this->load->helper('email');
          $this->load->helper(array('form', 'url'));
          // load form_validation library
          $this->load->library('form_validation');

 
     }
     function display_customer_sale()
     {
          $id=$this->input->post('id');
          // print_r($id);
          // die();
          $res=$this->emp->customer_purchase($id);
          if(true)
          {
               $data=array(
                    'Customer_name'=>$res['name'],
                    'Total_Quantity'=>$res['quantity']
               );
               echo json_encode($data);
          }

          else
          {
               echo json_encode($Incoreect);
          }
     }
}




?>