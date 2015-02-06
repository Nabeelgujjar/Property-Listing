<?php
class Stat extends CI_Model
{
	function gettotalliveprop(){
		$sql="select * from property where visible = '1'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettotalpendprop(){
		$sql="select * from property where visible = '0'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
     function getpropstat($s_date , $e_date ){
        $start1 = $s_date ;
        $end1 = $e_date ;
        $start = strtotime($start1);
        $end = strtotime($end1);
        $datediff = $end - $start;
        $days = floor($datediff/(60*60*24));
        $data = array();
        for($i = 1 ; $i<= $days; $i++){
            $sql="SELECT * FROM  `property` WHERE  `post_date` = '".$start1."'";
            $query = $this->db->query($sql);
              $views = $query->num_rows();
              $data['date'] = $start1;
              $data['views'] = $views;
              $data2[] = $data;
              
              $start1 = date('Y-m-d',strtotime($start1 . "+1 days"));
            
        }
		echo json_encode($data2);
	}
    
    function propviews(){
		$sql="select * from property";
        $query = $this->db->query($sql);
		return $query->result();
	}
    
    function areaviews($id){
		$sql="select * from property where area_id = $id AND visible = '1'";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}
    
    function getallareas(){
		$sql="select * from area";
        $query = $this->db->query($sql);
        return $query->result();
	}
    
    function gettotalsoldpack(){
		$sql="select * from package_sold";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettotalcancelpack(){
		$sql="select * from package_cancel";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettotalfreepackuser(){
		$sql="select * from package_sold where package_id = '1'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettotalbronzepackuser(){
		$sql="select * from package_sold where package_id = '2'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettotalsilverpackuser(){
		$sql="select * from package_sold where package_id = '3'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettotalgoldpackuser(){
		$sql="select * from package_sold where package_id = '4'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function totalsoldprop(){
		$sql="select * from property where sold_status = '1'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}

	function gettotalusers(){
	   
		$sql="select * from user";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettodayusers(){
	   $date = date('Y-m-d');
		$sql="select * from user where registration_date = $date";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
    
    function gettodayprop(){
	   $date = date('Y-m-d');
		$sql="select * from property where post_date = $date";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0):
            return $total_users = $query->num_rows();
        else:
            return $total_users = 0;
        endif;
	}
}
?>