<?php
	class Article_model extends CI_Model{
		var $table = 'm_member';
	    var $column_order = array(null, 'm_member.nama', 'm_member.nik', 'm_member.status');
	    var $column_search = array('nama', 'nik', 'alamat'); 
	    var $order = array('id' => 'asc');
	    var $user_id = "";
	    var $verifikasi = "";

		function __construct(){
			parent::__construct();
			$this->load->database();
			$session = $this->session->userdata('user_dashboard');
			if (!empty($session)) {
				$this->user_id = $session["user"]["id"];
			}
		}

		private function _get_datatables_query() {
	        $this->db->select('id, nama, nik, status, alamat, keterangan, verified_by, created_at');
	        $this->db->from($this->table);
	        if (!empty($this->verifikasi)) {
	        	$this->db->where('status', 0);
	        }
	        $i = 0;  
	        foreach ($this->column_search as $item) {
	            if(isset($_POST['search']['value']) && !empty($_POST['search']['value'])) {
	                if($i == 0) {
	                    $this->db->group_start();
	                    $this->db->like($item, $_POST['search']['value']);
	                } else {
	                    $this->db->or_like($item, $_POST['search']['value']);
	                }
	 
	                if(count($this->column_search) - 1 == $i) {
	                    $this->db->group_end();
	                }
	            }
	            $i++;
	        }
	         
	        if(isset($_POST['order'])) {
	            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
	        } else if(isset($this->order)) {
	            $order = $this->order;
	            $this->db->order_by(key($order), $order[key($order)]);
	        }
	    }

		public function get_datatables($verifikasi = null) {
	        $this->verifikasi = $verifikasi;
	        $this->_get_datatables_query();
	        if(isset($_POST['length']) && $_POST['length'] != -1) {
		        $this->db->limit($_POST['length'], $_POST['start']);
	        }
	        $query = $this->db->get();
	        return $query->result();
	    }
	 
	    public function count_filtered() {
	        $this->_get_datatables_query();
	        $query = $this->db->get();
	        return $query->num_rows();
	    }
	 
	    public function count_all() {
	        $this->db->from($this->table);
	        return $this->db->count_all_results();
	    }

	    public function find($id) {
	    	$this->db->from($this->table);
	    	$this->db->where('id', $id);
	    	$query = $this->db->get();

	    	return $query->row();
	    }

	    public function verify($id) {
	    	$this->db->from($this->table);
	    	$this->db->where('id', $id);
	    	$this->db->where('status', 0);
	    	$query = $this->db->get();

	    	return $query->row();
	    }
	}
?>