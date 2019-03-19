<?php  
class Authentication_model extends CI_Model  
{  
     /* function for login validation*/ 
     function can_login($name, $password)  
     {  
          $this->db->where('email', $name);  
          $this->db->where('password', $password);  
          $query = $this->db->get('login1');  
         
          if($query->num_rows() > 0)  
          {  
               return true;  
          }  
          else  
          {  
               return false;       
          }  
     }  

     /* function for Adding token into table when user logged in and registered*/ 
     public function addToken($email ,$ep, $token)
     {
          $this->db->select('id');
          $this->db->where('email', $email); 
          $this->db->from('login1');
          $query = $this->db->get();
          $id = $query->result_array();
          $id1=$id[0]['id'];
                   
          $data=array(
               'id'=>$id1,
               'token'=>$token   
          );
                     
          $this->db->insert('authtoken1',$data);
          return true;
     }

     /* function for display records*/ 
     function displayrecords()
     {
          $query=$this->db->query("select name from login1");
          return $query->result();
     }
     /* function for checking the email existance*/ 
     function check($email)
     {
          $this->db->where('email', $email);   
          $query = $this->db->get('login1');
          if($query->num_rows() > 0) 
          {
               return true;
          }
          else  
          {  
               return false;       
          } 
     }
     /* function for inserting data*/ 
     function insertdata($data)
     {  
          $this->db->insert('login1', $data);
          return true;
     }
}
?>