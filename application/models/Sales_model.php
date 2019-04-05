<?php
class Sales_model extends CI_Model
{
    function customer_purchase($id)
    {
        $this->db->where('cus_id',$id);
        $query=$this->db->get('sale');
        if($query->num_rows()>0)
        {
            // print_r($id);
            // die();
            $this->db->select('name');
            $this->db->where('id', $id); 
            $this->db->from('customer');
            $query1 = $this->db->get();
            $name1 = $query1->result_array();
            $name=$name1[0]['name'];
            // print_r($name);
            //   die();
             $this->db->select('sale_id');
             $this->db->where('cus_id', $id); 
             $this->db->from('sale');
             $query = $this->db->get();
             $sale = $query->result_array();
             $sale_id=$sale[0]['sale_id'];
             $this->db->select('qty');
             $this->db->where('sale_id',$sale_id);
             $this->db->from('sale_item');
             $query=$this->db->get();
             $qty=$query->result_array();
             $quantity=$qty[0]['qty'];
            //  print_r($quantity);
            //  die();
            $detail=array(
                'name'=>$name,
                'quantity'=>$quantity
            );
            return $detail;     
        }
        else
        {
            return false;
        }
    }
}
?>