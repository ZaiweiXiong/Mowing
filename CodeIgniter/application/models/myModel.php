<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class myModel extends CI_Model{

          //residentavailability table

        public function insertdata_createAvailable($data){
          $this->load->database();
          $this->db->insert('residentavaiability',$data);
         }

         public function deleteOnefrom_r($data){

           $this->load->database();
           $this->db->delete('residentavaiability', $data); 
         }

         public function searchbyTime($data){

          $this->load->database();
          $sql = "SELECT * FROM residentavaiability WHERE date like ? "; 
          $query= $this->db->query($sql, $data);
          return $query->result();
        
        }
        
        public function searchbooking(){

          $this->load->database();
          $sql = "SELECT r_id FROM booking "; 
          $query= $this->db->query($sql);
          return $query->result();

        }
        
        public function laodToSchedule(){

          $this->load->database();
          $sql = "select id, suburb,date,time_from,time_to,hourly_rate from residentavaiability"; //residentavaiability
          $query= $this->db->query($sql);
          return $query->result();
        }

        public function updateOne($data,$id){

          $this->load->database();
          $this->db->where('id', $id);
          $this->db->update('residentavaiability', $data);
                             //residentavaiability
      }


         // for lawan contraller

         public function searchbySuburb($data){

          $this->load->database();
          $sql = "SELECT * FROM residentavaiability WHERE suburb like ? "; 
          $query= $this->db->query($sql, $data);
          return $query->result();
          //residentavaiability******
          //residentavailability
        }
    }
?>