<?php
class Dbcommon extends CI_Model
{
	function featuredproperties(){
		$sql="select * from property where `visible` = '1' and `premium` = '1'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function recentproperties(){
		$sql="select * from property where `visible` = '1' order by `prop_id` desc";
        $query = $this->db->query($sql);
		return $query->result();
	}
	function subprop(){
		$sql="select * from sub_prop";
        $query = $this->db->query($sql);
		return $query->result();
	}
	function getsubpropbyid($id){
		$sql="select * from sub_prop where sub_prop_id = '$id'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	function getsubpropbyname($name){
		$sql="select * from sub_prop where sub_prop_name like '%$name%'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	function area(){
		$sql="select * from area";
        $query = $this->db->query($sql);
		return $query->result();
	}
	function getareabyid($id){
		$sql="select * from area where area_id = '$id'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	function getallamenities() {
		$sql="select * from amenity";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
	function getpropamenity($ame_id, $prop_id) {
		$sql="select * from property where ameni_id like '%,$ame_id,%' and prop_id = '".$prop_id."'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	function searchresults($where) {
		echo $sql="select * from property ".$where;
        $query = $this->db->query($sql);
		return $query->result();
	}
	function propertydetails($id)
	{
		$sql="select * from property where prop_id = '$id'";
        $query = $this->db->query($sql);
		return $query->row();
	
	}
	function getpropertybyarea($area_id){
		$sql="select * from property where `visible` = '1' and area_id = '$area_id'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	function homepagedetails() {
		$sql="select * from pages where page_id = '1'";
		$query = $this->db->query($sql);
		return $query->row();
	}
	function propforsale($limit) {
		$sql="select * from property where i_want_to = '2' and visible = '1' $limit";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function propforrent($limit) {
		$sql="select * from property where i_want_to = '1' and visible = '1' $limit";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function allprops($limit) {
		$sql="select * from property where  visible = '1' $limit";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function getdetails($usr,$pwd)
	{
		$sql="select * from user where email = '$usr' and password = '$pwd'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	function add_prop($data)
	{
		$this->db->insert('property',$data);
        return $this->db->insert_id();
	}
	function add_images($data)
	{
		$this->db->insert('images',$data);
		return true;
	}
    function accountemaildetails() {
		$sql="select * from email_temp where id = '1'";
		$query = $this->db->query($sql);
		return $query->row();
	}

    function socialmediadetails() {
        $sql="select * from social_media_setting where id = '1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function metadetails() {
        $sql="select * from meta where meta_id = '1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function passemaildetails() {
		$sql="select * from email_temp where id = '2'";
		$query = $this->db->query($sql);
		return $query->row();
	}

    function newpropemaildetails() {
        $sql="select * from email_temp where id = '4'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function propappemaildetails() {
        $sql="select * from email_temp where id = '5'";
        $query = $this->db->query($sql);
        return $query->row();
    }


    function propdisappemaildetails() {
        $sql="select * from email_temp where id = '6'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function packpaysuccemaildetails() {
        $sql="select * from email_temp where id = '7'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function packpayunsuccemaildetails() {
        $sql="select * from email_temp where id = '8'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function featpaysuccemaildetails() {
        $sql="select * from email_temp where id = '9'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function featpayunsuccemaildetails() {
        $sql="select * from email_temp where id = '10'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function salepaysuccemaildetails() {
        $sql="select * from email_temp where id = '11'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function salepayunsuccemaildetails() {
        $sql="select * from email_temp where id = '12'";
        $query = $this->db->query($sql);
        return $query->row();
    }



    function payemaildetails() {
		$sql="select * from email_temp where id = '3'";
		$query = $this->db->query($sql);
		return $query->row();
	}

    function register_user($data)
    {

        $this->db->insert('user', $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

}