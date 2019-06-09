<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class version1_model extends CI_Model {
 
	public function __construct() {
        parent::__construct();
        
    }

	public function index()
	{
		echo "Testing";
	}
	
	public function login($fbUserId, $fbpassword){
		$this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('email', $fbUserId);
		$this->db->where('password', $fbpassword);
                $this->db->where('user_role',3);
		$query = $this->db->get();
		$res = $query->row();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
	
        
        public function getMachineList ($company_id){
		$query = "SELECT tbl_machines.*, tbl_booking.id as booking_id,tbl_booking.user_id,tbl_machine_images.url,tbl_booking.booking_from as start_date,tbl_booking.booking_to as end_date  
                    FROM `tbl_machines` 
                    left join tbl_machine_images on tbl_machine_images.machine_id = tbl_machines.id 
                    left join tbl_booking on tbl_booking.machine_id = tbl_machines.id and tbl_booking.is_booked=1
                    WHERE company_id = '" . $company_id . "' AND tbl_machines.isdeleted!= 1";
                    $ret = $this->db->query($query);
                    $res = $ret->result_array();
                        if($res){
                            return $res;
                        }  else {
                            return FALSE; 
                        }
                    }
       
        
         public function getWorker ($user_id){
		$this->db->select('*');
                $this->db->where("user_role='4'");
                $this->db->where('company_id',$user_id);
                $this->db->where("isdeleted='0'");
                $this->db->order_by('id', 'desc');
		$query = $this->db->get('tbl_users');
		$res = $query->result_array();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
        
        
//         public function get_by_id($id, $company_id)
//	{
//               $this->db->select('a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.is_active, a.inventory_number, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,a.isdeleted,b.url,b.title,b.description,a.created_at,a.qr_code');
//                $this->db->from('tbl_machines AS a');
//                $this->db->join('tbl_machine_images AS b', 'b.machine_id = a.id' ,'inner');
//                $this->db->where('a.qr_code',$id AND 'a.company_id',$company_id );
////                $this->db->where('a.company_id', $company_id);
//                $this->db->or_where('a.bar_code',$id);
//                $this->db->or_where('a.nfc_code',$id);
//                $query = $this->db->get();
//		return $query->row();
//	}
        
        
        public function get_by_id($company_id, $id)
	{
               $this->db->select('a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.is_active, a.inventory_number, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,a.isdeleted,b.url,b.title,b.description,a.created_at,a.qr_code');
                $this->db->from('tbl_machines AS a');
                $this->db->join('tbl_machine_images AS b', 'b.machine_id = a.id');
                $this->db->where("(a.qr_code = '" . $id . "' OR a.bar_code = '" . $id . "' OR a.nfc_code = '" . $id . "') ");
                $this->db->where('a.company_id',$company_id);
                $query = $this->db->get();
		return $query->row();
	}
        
        public function get_nfc_data($nfc)
	{
               $this->db->select('a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.is_active, a.inventory_number, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,a.isdeleted,b.url,b.title,b.description,a.created_at,a.qr_code');
                $this->db->from('tbl_machines AS a');
                $this->db->join('tbl_machine_images AS b', 'b.machine_id = a.id');
                $this->db->where('a.nfc_code',$nfc);
                $query = $this->db->get();
		return $query->row();
	}
        
        public function details_by_id($id)
	{
               $this->db->select('a.id, a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code, a.is_active, a.inventory_number, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,isdeleted,b.url,b.title,b.description,a.created_at,a.qr_code');
                $this->db->from('tbl_machines AS a');
                $this->db->join('tbl_machine_images AS b', 'b.machine_id = a.id');
                $this->db->where('a.id',$id);
                $query = $this->db->get();
		return $query->row();
	}
        
        public function worker_details($id)
	{
               $this->db->select('*');
                $this->db->from('tbl_users');
                $this->db->where('id',$id);
                $query = $this->db->get();
		return $query->row();
	}
        
        
        
        public function releasebook($machine_id,$booking_id)
	{
            $data = array(
			'is_booked' => 0,
			);
                $this->db->where('id', $machine_id);
		$this->db->update('tbl_machines', $data);
                $data = array(
			'is_booked' => 0,
			);
                $this->db->where('id', $booking_id);
		$this->db->update('tbl_booking', $data);
                
                return true;
	}
        
        public function BookMachine($user_id, $machine_id,$start_date,$end_date,$comment)
	{
            $this->db->select('*');
                $this->db->from('tbl_machines');
                $this->db->where('id',$machine_id);
                $query = $this->db->get();
                $res = $query->result_array();
                $isbooked = $res[0]['is_booked'];
                if($isbooked== 0){
            $data = array(
				'machine_id' => $machine_id,
                                'user_id' => $user_id,
                                'user_type' => 4,
                                'booking_from' =>$start_date,
                                'booking_to' => $end_date,
                                'comment' => $comment,
                                'is_booked'=>1,
			);
            $this->db->insert('tbl_booking', $data);
            $data1 = array(
                                'is_booked' => 1,
			);
                $this->db->where('id', $machine_id);
		$this->db->update('tbl_machines', $data1);
                }
                return true;
	}
        
        
        
        public function demo($obj)
	{
    
                $user_name = $obj->{"username"};
                   
                   $pass =  $obj->{"password"};
            
                $this->db->select('*');
		$this->db->from('tbl_users');
		$this->db->where('email', $user_name);
		$this->db->where('password', $pass);
		$query = $this->db->get();
		$res = $query->result_array();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
        
         public function getBookingList ($user_id){
                 $this->db->select(' b.id,b.user_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code,  a.inventory_number,b.comment,b.is_booked,b.booking_from,b.booking_to,c.url');
                $this->db->from('tbl_machines AS a');
                $this->db->join('tbl_booking AS b', 'b.machine_id = a.id' , 'left');
                $this->db->join('tbl_machine_images AS c', 'c.machine_id = a.id' , 'inner');
//                $this->db->where("a.isdeleted='0'");
                $this->db->where('b.user_id',$user_id );
                $this->db->order_by("id", "desc");
		$query = $this->db->get();
		$res = $query->result_array();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
        
        
         public function getbookmachine ($user_id){
            $this->db->select('a.id, b.user_id,a.company_id, a.machine_name, a.machine_description, a.machine_type, a.machine_code,  a.inventory_number,a.isdeleted, a.location, a.brand_name, a.serial_number, a.date_of_proof, a.next_check, a.date_of_buy, a.price,isdeleted,b.comment,a.is_booked,a.created_at,a.qr_code,b.booking_from,b.booking_to');
                $this->db->from('tbl_machines As a');
                $this->db->join('tbl_booking AS b', 'b.machine_id = a.id');
                $this->db->where("a.is_active='1'");
                $this->db->where("a.isdeleted='0'");
                 $this->db->where('a.company_id',$user_id);
                $query = $this->db->get();
		$res = $query->result_array();
		if($res){
			return $res;
		}else{
			return false;
		}
	}
        
        
        
        
     public function chat($message,$id,$broser,$version,$os,$ip)
	{
         $abc='';
         date_default_timezone_set('Asia/Kolkata');
         if($id=='undefined'){
            $data = array(
                'guest' =>'Guest',
                'browser' => $broser,
                'version' => $version,
                'os' => $os,
                'ip' => $ip,
		);
            $this->db->insert('tbl_guest_user', $data);
            $abc= $this->db->insert_id();
             $data1 = array(
                'guest_id'=>$abc,
                'message' => $message,
                'time' =>date('Y-m-d H:i:s'),
		);
            $this->db->insert('tbl_chat', $data1);
            return $abc;
        }else{
            
             $data = array(
                'guest_id'=>$id,
                'message' => $message,
                'time' =>date('Y-m-d H:i:s'),
		);
            $this->db->insert('tbl_chat', $data);
            $this->db->select('id');
            $this->db->order_by('id', 'desc');
            $this->db->limit(1);
            $query = $this->db->get('tbl_guest_user');
            $ret = $query->row();
            return $ret->id;
            
        }}
        
        
         public function getchat (){
            $this->db->select('*');
            $this->db->from('tbl_chat');
            $query = $this->db->get();
            $res = $query->result_array();
            if($res){
		return $res;
            }else{
		return false;
            }
	}
        
         public function notification (){
            $this->db->select('*');
            $this->db->from('tbl_chat');
            $this->db->where("is_read='0'");
            $query = $this->db->get();
            $res = $query->num_rows();
            if($res){
		return $res;
            }else{
		return false;
            }
	}
        
        public function update_notification()
	{
            $data = array(
                'is_read' =>1,
		);
            $this->db->update('tbl_chat', $data);
            return true;
	}
        
        public function addmsg($data)
	{
          $this->db->insert('tbl_chat', $data);
	}
        
        public function del($userid)
	{
          $this->db->where('id', $userid);
          $this->db->delete('tbl_chat');
          return $this->db->affected_rows(); 
	}
}
