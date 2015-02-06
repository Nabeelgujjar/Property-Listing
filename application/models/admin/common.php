<?php
class Common extends CI_Model
{
	function featuredproperties(){
		$sql="select * from property where `visible` = '1' and `premium` = '1'";
        $query = $this->db->query($sql);
		return $query->result();
	}


    function adminlog($ee , $pp){
        $sql="select * from admins where `email` LIKE '$ee' and `pass` LIKE '$pp'";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0):
         return $query->result_array();
        else:
            return false;
        endif;
    }
	
	function propforsale(){
		$sql="select * from property where i_want_to = '2'";
        $query = $this->db->query($sql);
		return $query->result();
	}
    
    function propviews(){
		$sql="select * from property";
        $query = $this->db->query($sql);
		return $query->result();
	}
	
    function totalpropforsale(){
		$sql="select * from property where i_want_to = '2'";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}

    function totalfeaturd(){
        $sql="select * from property where premium = '1'";
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function totalsell(){

        $sql="select * from package_sold" ;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function totalcancel(){

        $sql="select * from package_cancel" ;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function totalfeaturdtoday(){
        $date = date('Y-m-d');
        $sql="select * from property where premium = '1' AND post_date = ".$date;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }
    function totalbonzetoday(){
        $date = date('Y-m-d');
        $sql="select * from package_sold where package_id = '2' AND start_date = ".$date;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function totalsilvertoday(){
        $date = date('Y-m-d');
        $sql="select * from package_sold where package_id = '3' AND start_date = ".$date;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function totalgoldtoday(){
        $date = date('Y-m-d');
        $sql="select * from package_sold where package_id = '4' AND start_date = ".$date;
        $query = $this->db->query($sql);
        return $query->num_rows();
    }

    function bronzeprize(){
        $sql="select * from package where package_id = '2'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function silverprize(){
        $sql="select * from package where package_id = '3'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    function goldprize(){
        $sql="select * from package where package_id = '4'";
        $query = $this->db->query($sql);
        return $query->result_array();
    }
    
	function propforrent(){
		$sql="select * from property where i_want_to = '1'";
        $query = $this->db->query($sql);
		return $query->result();
	}
    
    function totalpropforrent(){
		$sql="select * from property where i_want_to = '1'";
        $query = $this->db->query($sql);
		return $query->num_rows();
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
    
    function getpackbyid($id){
		$sql="select * from user where user_id = '$id'";
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
	function amenity(){
		$sql="select * from amenity";
        $query = $this->db->query($sql);
		return $query->result();
	}
    
    function totalfeatured(){
		$sql="select * from sub_prop";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}
    
    function totalcat(){
		$sql="select * from sub_prop";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}
    
    function totalarea(){
		$sql="select * from area";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}
	function totalamenity(){
		$sql="select * from amenity";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}
    
	function delamenity($id){
		$sql="delete from amenity where amenity_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	function addamenities($data)
	{
		$this->db->insert('amenity',$data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
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
	function getpacks(){
		$sql="select * from package";
        $query = $this->db->query($sql);
		return $query->result();
	}
	function delprop($id){
		$sql="delete from property where prop_id = '$id'";
        $query = $this->db->query($sql);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}
	
	function addsubprops($data)
	{
		$this->db->insert('sub_prop',$data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}

	function delsubprop($id){
		$sql="delete from sub_prop where sub_prop_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	function addareas($data)
	{
		$this->db->insert('area',$data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}

	function delareas($id){
		$sql="delete from area where area_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	
	function users(){
		$sql="select * from user";
        $query = $this->db->query($sql);
		return $query->result();
	}

    function admins(){
        $sql="select * from admins";
        $query = $this->db->query($sql);
        return $query->result();
    }

    function app_method(){
        $sql="select * from config";
        $query = $this->db->query($sql);
        return $query->result();
    }
    
    
    function sales(){
		$sql="select * from package_sold";
        $query = $this->db->query($sql);
		return $query->result();
	}
    
	function userdetails($id){
		$sql="select * from user where user_id = '$id'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	
	function actuser($id){
		$sql="update user set status = '1' where user_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	
	function deactuser($id){
		$sql="update user set status = '0' where user_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	
	function deluser($id){
		$sql="delete from user where user_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}

    function actadmin($id){
        $sql="update admins set status = '1' where id = '$id'";
        $query = $this->db->query($sql);
        return true;
    }

    function deactadmin($id){
        $sql="update admins set status = '0' where id = '$id'";
        $query = $this->db->query($sql);
        return true;
    }

    function deladmin($id){
        $sql="delete from admins where id = '$id'";
        $query = $this->db->query($sql);
        return true;
    }

	function edituser($id){
		$sql="select * from user where user_id = '$id'";
        $query = $this->db->query($sql);
		return $query->row();
	}

    function getpropimg($id){
        $sql="select * from property where user_id = '$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function editadmin($id){
        $sql="select * from admins where id = '$id'";
        $query = $this->db->query($sql);
        return $query->row();
    }

    function getcofig(){
        $sql="select * from config where id = '1'";
        $query = $this->db->query($sql);
        return $query->row();
    }

	function update_user($id,$data){
	
		$this->db->where('user_id', $id);
		$this->db->update('user', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }

	}

    function update_admin($id,$data){

        $this->db->where('id', $id);
        $this->db->update('admins', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }

    }

	function add_user($data)
	{
		$this->db->insert('user',$data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}

    function add_admin($data)
    {
        $this->db->insert('admins',$data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
    }
	function update_homepage($data){
	
		$this->db->where('page_id', 1);
		$this->db->update('pages', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}
    
    function update_emailtemp($data){
	
		$this->db->where('email_for', $data['email_for']);
		$this->db->update('email_temp', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}
    
    function update_sociallinks($data){
	
		$this->db->where('id', 1);
		$this->db->update('social_media_setting', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}
    
    function update_metadata($data){
	
		$this->db->where('meta_id', 1);
		$this->db->update('meta', $data);
        //$this->db->insert('meta', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}

    function update_approval($data){

        $this->db->where('id', 1);
        $this->db->update('config', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
    }
    
    
	function allowprop($id){
		$sql="update property set visible = '1' where prop_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	
	function blockprop($id){
		$sql="update property set visible = '0' where prop_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	function countprop($id){
		$sql="select * from property where user_id = '$id'";
        $query = $this->db->query($sql);
		return $query->num_rows();
	}
	function userprop($id){
		$sql="select * from property where user_id = '$id'";
        $query = $this->db->query($sql);
		return $query->result();
	}
	function addpackageoptions($data)
	{
		$this->db->insert('package_options',$data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}
	function delpackopt($id){
		$sql="delete from package_options where option_id = '$id'";
        $query = $this->db->query($sql);
		return true;
	}
	function getpackopt()
	{
		$sql = "select * from package_options";
		$query  = $this->db->query($sql);
		return $query->result();
	}
	function freepack()
	{
		$sql = "select * from package where package_id = '1' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	function updatefree($data){
	
		$this->db->where('package_id', 1);
		$this->db->update('package', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }

	}
	function getoption($options, $package_id)
	{
		$sql="select * from package where options like '%,$options,%' and package_id = '".$package_id."'";
        $query = $this->db->query($sql);
		return $query->row();
	}
	function bronzepack()
	{
		$sql = "select * from package where package_id = '2' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	function updatebronze($data){
	
		$this->db->where('package_id', 2);
		$this->db->update('package', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }

	}
	function silverpack()
	{
		$sql = "select * from package where package_id = '3' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	function updatesilver($data){
	
		$this->db->where('package_id', 3);
		$this->db->update('package', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }

	}
	function goldpack()
	{
		$sql = "select * from package where package_id = '4' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	function updategold($data){
	
		$this->db->where('package_id', 4);
		$this->db->update('package', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }

	}
	function gethomepage()
	{
		$sql = "select * from pages where page_id = '1' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	
	function getsalesboard() {
		$sql = "select * from salesboard where salesboard_id = '1' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	
	function edit_saleboard($data) {
		$this->db->where('salesboard_id', "1");
		$this->db->update('salesboard', $data);
        if($this->db->affected_rows() > 0){
            return true;
        }
        else{
            return false;
        }
	}
	
	function getpages($slug) {
		$sql = "select * from pages where page_slug = '".$slug."' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	
	function updatepages($data, $slug) {
		$this->db->where('page_slug', $slug);
		$this->db->update('pages', $data);
		return true;
	}
	
	function featured() {
		$sql = "select * from featured where featured_id = '1' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
	
	function update_prop($id,$data){
		
		$this->db->where('prop_id', $id);
		$this->db->update('property', $data);
		return true;
	}


    function update_img($id,$data){

        $this->db->where('prop_id', $id);
        $this->db->update('property', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
    }
	
	function update_featured($data){
		
		$this->db->where('featured_id', 1);
		$this->db->update('featured', $data);
        if($this->db->affected_rows() > 0 ){
            return true;

        }else{

            return false;
        }
	}
	
	function featuredprop()
	{
		$sql = "select * from property where `premium`= '1' ";
		$query  = $this->db->query($sql);
		return $query->result();
	}
    
    function get_pack($id)
	{
		$sql = "select * from package where package_id = '$id' ";
		$query  = $this->db->query($sql);
		return $query->row();
	}
    
    
    function sales_cancel()
	{
		$sql = "select * from package_cancel ";
		$query  = $this->db->query($sql);
		return $query->result();
	}
}
?>