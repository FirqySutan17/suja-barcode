<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CommonCode extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M001';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/common_code');
	}

	public function index() {
		$headcode = "";
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$headcode = $this->input->post('headcode');
		}
		$data['headcode'] 			= $headcode;
		$data['title'] 				= 'COMMON CODE';
		$data['user']				= $this->session_data['user'];
		$data['datatable']			= $this->datatable($headcode);
		$data['datatable_headcode'] = $this->Dbhelper->selectTabel('HEAD_CODE, CODE_NAME', 'CD_CODE', array('CODE' => '*'), 'HEAD_CODE', 'ASC');
		$this->template->_v('master/common_code/index', $data);
	}

	public function create() {

		$data['title'] 			= 'Create Common Code';
		$data['head_code'] 		= $this->Dbhelper->selectTabel('HEAD_CODE, CODE_NAME', 'CD_CODE', array('CODE' => '*'), 'CODE_NAME', 'ASC');
		
		$this->template->_v('master/common_code/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				$key = strtoupper($key);
				if ($key != 'DESC1') {
					$value = strtoupper($value);
				}
				$post_data[$key] = dbClean($value);
			}

			// $validation 	= $this->validation($post_data);
			// $htmlMessage 	= "";
			// if (count($validation) > 0) {
			// 	$htmlMessage .= "<ul>";
			// 	foreach ($validation as $value) {
			// 		$htmlMessage .= "<li>".$value."</li>";
			// 	}
			// 	$htmlMessage .= "</ul>";
			// 	$this->session->set_flashdata('alert', $htmlMessage);
			// 	return redirect($this->own_link."/create");
			// }

			// $post_data['PASSWORD'] = password_hash('init1234', PASSWORD_DEFAULT);

			$save = $this->Dbhelper->insertData('CD_CODE', $post_data);
			if ($save) {
				$this->session->set_flashdata('success', "Create data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Create data failed");
			return redirect($this->own_link."/create");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function edit($codeid) {
		$explode_ids = explode("_", $codeid);
		$data['title'] 			= 'Edit Common Code';
		$data['model']			= $this->Dbhelper->selectTabelOne('*', 'CD_CODE', array('HEAD_CODE' => $explode_ids[0], 'CODE' => $explode_ids[1]));
		$this->template->_v('master/common_code/edit', $data);
	}

	public function do_update() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				$key = strtoupper($key);
				if ($key != 'DESC1') {
					$value = strtoupper($value);
				}
				$post_data[$key] = dbClean($value);
			}
			// $validation 	= $this->validation($post_data);
			// $htmlMessage 	= "";
			// if (count($validation) > 0) {
			// 	$htmlMessage .= "<ul>";
			// 	foreach ($validation as $value) {
			// 		$htmlMessage .= "<li>".$value."</li>";
			// 	}
			// 	$htmlMessage .= "</ul>";
			// 	$this->session->set_flashdata('alert', $htmlMessage);
			// 	return redirect($this->own_link."/create");
			// }

			// $update_data = [
			// 	'PLANT'		=> $post_data['PLANT'],
			// 	'REGION'	=> $post_data['REGION'],
			// 	'FULL_NAME'	=> $post_data['FULL_NAME'],
			// 	'EMAIL'		=> $post_data['EMAIL'],
			// 	'MENU_ACCESS'	=> $post_data['MENU_ACCESS'],
			// ];
			$save 	= $this->Dbhelper->updateData("CD_CODE", array('HEAD_CODE' => $post_data['HEAD_CODE'], 'CODE' => $post_data['CODE']), $post_data);		
			if ($save) {
				$this->session->set_flashdata('success', "Update data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Update data failed");
			$cods = $post_data['HEAD_CODE']."_".$post_data['CODE'];
			return redirect($this->own_link."/edit/".$cods);
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function do_delete($codeid) {
		$explode_ids = explode("_", $codeid);
		$model = $this->Dbhelper->selectTabelOne('*', 'CD_CODE', array('HEAD_CODE' => $explode_ids[0], 'CODE' => $explode_ids[1]));
        if (empty($model)) {
			$this->session->set_flashdata('error', "Data not found");
        	return redirect($this->own_link);
        }

		$delete = $this->db->delete('CD_CODE', array('HEAD_CODE' => $model['HEAD_CODE'], 'CODE' => $model['CODE']));
		if ($delete) {
			$this->session->set_flashdata('success', "Delete data success");
		}
		return redirect($this->own_link);
	}

	public function datatable($headcode) {
		// $data = $this->Dbhelper->selectTabel('HEAD_CODE, CODE, CODE_NAME', 'CD_CODE', array(), 'HEAD_CODE', 'ASC');
		$this->db->select('
			CD_CODE.HEAD_CODE,
			CD_CODE.CODE,
			CD_CODE.CODE_NAME,
			CD_CODE.USE_YN
		');
        $this->db->from('CD_CODE');
        $this->db->where('CD_CODE.CODE !=', '*');
        $this->db->where('CD_CODE.HEAD_CODE', $headcode);
        $this->db->order_by('CD_CODE.HEAD_CODE', 'ASC');
        $data = $this->db->get()->result_array();
		return $data;
	}

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		if (!in_array($this->menu_id, $user_access) && !in_array('*', $user_access)) {
			redirect('dashboard');
		}
	}
}

