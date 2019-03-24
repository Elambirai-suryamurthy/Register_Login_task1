<?php  
class Authentication_model extends CI_Model  
{  
     /* function for login validation*/ 
     function can_login($email, $ep)  
     {  
          // print_r($ep);
          // print_r($email);
          // die();
          $this->db->where('email', $email);  
          $this->db->where('password', $ep);  
          $query = $this->db->get('login1');  
         
          if($query->num_rows() > 0)  
          {  
               
               $this->db->select('date');
               $this->db->where('email', $email); 
               $this->db->from('login1');
               $query = $this->db->get();
               $date = $query->result_array();
               $exp_date=$date[0]['date'];
               $currentdate=date('Y-m-d');
             if($currentdate<$exp_date)
             {
               // $query1=$this->db->query("select name,email,place from login1 where id=".$id);
               return TRUE;
               
             }
             else
             {
                  return false;
             }    
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


     function export()
     {
         $query =$this->db->query("select id,name,email,place from login1");
         return $query->result_array();
     }

     function update_data($id,$data)
     {
    
          $this->db->where('id',$id);
          $query=$this->db->get('login1');
          if($query->num_rows()>0)
          {

               $this->db->select('date');
               $this->db->where('id', $id); 
               $this->db->from('login1');
               $query = $this->db->get();
               $date = $query->result_array();
               $exp_date=$date[0]['date'];
               $currentdate=date('Y-m-d');
             if($currentdate<$exp_date)
             {
               // $query1=$this->db->query("select name,email,place from login1 where id=".$id);
               $this->db->where('id',$id);
               $update_result=$this->db->update('login1', $data);
               return TRUE;
               
             }
             else
             {
                  return false;
             }   
          }
          else
          {
               return false;
          }
     }
     /* function for display records*/ 
     function displayrecords($token)
     {
          $this->db->where('token', $token);
          $query=$this->db->get('authtoken1');
          if($query->num_rows()>0)
          {
          $query1=$this->db->query("select name,email,place from login1");
          return $query1->result();
          }
          else 
          {
               return false;
          }
     }
     function user($id)
     {
     //     echo $id;
     //     die();
          $this->db->where('id',$id);
          $query=$this->db->get('login1');
          if($query->num_rows()>0)
          {
               $this->db->select('date');
               $this->db->where('id', $id); 
               $this->db->from('login1');
               $query = $this->db->get();
               $date = $query->result_array();
               $exp_date=$date[0]['date'];
               $currentdate=date('Y-m-d');
             if($currentdate<$exp_date)
             {
               // $query1=$this->db->query("select name,email,place from login1 where id=".$id);
               $this->db->select('name');
               $this->db->select('email');
               $this->db->select('place');
               $this->db->where('id',$id);
               $query=$this->db->get('login1');
               return $query->result();
               
             }
               else
               {
                    return false;
               }
               }
          
               else 
               {
                    return false;
               }
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
     function logout($token)
     {
          // $this->db->where('token', $token);   
      
          $this->db->where('token', $token);
          $query=$this->db->get('authtoken1');
          if($query->num_rows()>0)
          {
          $this->db->where('token', $token);
          $this->db->delete('authtoken1') ;
          return true;
          }
          else 
          {
               return false;
          }     
     
     }
}
?>
