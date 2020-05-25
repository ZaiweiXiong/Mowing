<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class lawn extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->helper('url');
        }

    public function index(){

        $this->load->helper('url');
        $this->load->view('lawn/index');

    }

    //booking table
    public function booking(){
        $this->load->model("myModel");
        $data['m']=$this->myModel->searchbooking();
        echo json_encode( $data);
    }


    //Create Availability =>residentavailability

    public function inserInto(){

        $this->load->model("myModel");
        $s = $this->input->post('suburb');
        $p = $this->input->post('postcode');
        $a = $this->input->post('address');
        $time = $this->input->post('time');
        $newtime =  date('Y-m-d', strtotime($time));

        $st = $this->input->post('startTime');
        $et = $this->input->post('endTime');

        $pay = $this->input->post('pay');

        $residentID ="1R";
        $startTime=$st;
        $endTime=$et;

        $data = array(

            "user_id"=>$residentID,
            "id" => $p,
            "suburb"  => $s,
            //"address"  => $a,
            "date" =>  $newtime,
            "time_from"=>$startTime,
            "time_to"=>$endTime,
            "hourly_rate"  => $pay
           
            
       );
        $this->myModel->insertdata_createAvailable($data);
        echo 'ok done';
    }
    //Delete Availability =>residentavailability
    public function deleteOne(){

        $this->load->model("myModel");
        $id = $this->input->post('id');
        $data = array(

            "id"=>$id
            
       );
       $this->myModel->deleteOnefrom_r($data);
       echo 'ok, deleted...',$id;
    }

    //Search  Availability =>residentavailability
    public function search(){

        $this->load->model("myModel");
        $time = $this->input->post('time');
        $newtime =  date('Y-m-d', strtotime($time));
      
        $data = array(

            "date"=>$newtime
            
       );

       $data['m']=$this->myModel->searchbyTime($data);
       echo json_encode( $data );
    }
    // detail user  =>residentavailability
    public function detailUser(){

        $this->load->model("myModel");
        $s = $this->input->get('id');
        $data = array(

            "suburb"  => $s
            
       );

       $data['m']=$this->myModel->searchbySuburb($data);
       echo json_encode( $data );
           
    }

    // load event
    public function load(){
        //calender
        $this->load->model("myModel");
        $data['m']=$this->myModel->laodToSchedule();
        $l = sizeof($data['m']);
        for ($i=0;$i<$l;$i++){

            $data_[] = array(
                
               'id_'=>$data['m'][$i]->id,
               'id' =>$data['m'][$i]->suburb,
               'title'=>$data['m'][$i]->suburb,
                #$s=$data['m'][$i]->date+$data['m'][$i]->startTime,
               'start'=>$data['m'][$i]->date,#,startTime #date
               'end'=>$data['m'][$i]->date,  #endTime
               
               'st'=>$data['m'][$i]->time_from,
               'et'=>$data['m'][$i]->time_to,
               'pay'=>$data['m'][$i]->hourly_rate
                #date("h:i:sa")
               );

        }
        echo json_encode( $data_);
    }
    // edit
    public function editIt(){

        $id = $this->input->post('id');

        $this->load->model("myModel");
        $s = $this->input->post('suburb');

        //$s = $this->input->post('suburb');

        $p = $this->input->post('postcode');
        $a = $this->input->post('address');
        $time = $this->input->post('time');
        $newtime =  date('Y-m-d', strtotime($time));
        $st = $this->input->post('startTime');
        $et = $this->input->post('endTime');
        $pay = $this->input->post('pay');

        $data = array(
        
        //"date" =>  $newtime,
        "time_from"=>$st,
        "time_to"=>$et,
        "hourly_rate" =>  $pay
       );

       $this->myModel->updateOne($data,$id);
       echo 'update one ';
    }

    //create Method => view
    public function createAvailable(){

        $this->load->helper('url');
        $this->load->view('lawn/create');
        echo "Create Availability...";
    }
    


}


?>