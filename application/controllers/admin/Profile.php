<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	var $user_access_detail = "";
	var $table = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 3;
		$this->session_data = $this->session->userdata('user_dashboard');
		$this->user_access_detail = $this->session_data['user_access_detail'];

		$this->cekLogin();
		$this->own_link = admin_url('profile');
		$this->load->model('configuration/User_model');
		$this->table = "m_pegawai";
	}

	public function index() {
		$user_access_detail = $this->user_access_detail;
		$user_id = $this->session_data["user"]["id"];
		$model = $this->User_model->user_data($user_id);
		$data['judul'] 		= 'Profile';
		$data['subjudul'] 	= 'Data';
		$data['own_link'] 	= $this->own_link;
		$data['model']		= $model;
		$this->template->_v('profile/index', $data);
	}

	public function do_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$id = (int) $post["id"];
			$this->privilege('is_update');
			$post_data = [];
			foreach ($post as $key => $value) {
				$val = dbClean($value);
				$post_data[$key] = $val;
			}
			$validation 	= $this->validation($post_data);
			$htmlMessage 	= "";
			if (count($validation) > 0) {
				$htmlMessage .= "<ul>";
				foreach ($validation as $value) {
					$htmlMessage .= "<li>".$value."</li>";
				}
				$htmlMessage .= "</ul>";
				$this->session->set_flashdata('alert', $htmlMessage);
				return redirect($this->own_link."/edit/".$id);
			}
			$post_data["updated_at"] = date("Y-m-d H:i:s");
			$post_data["password"] 	= password_hash($post_data["new_password"], PASSWORD_DEFAULT);
			if (empty($post_data["new_password"])) {
				unset($post_data["password"]);
			}
			unset($post_data["id"]);
			unset($post_data["current_password"]);
			unset($post_data["new_password"]);
			// dd($post_data);
			$save = $this->Dbhelper->updateData($this->table, array('id'=>$id), $post_data);
			if ($save) {
				$this->session->set_flashdata('success', "Update data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link);
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	// CHANGE NECESSARY POINT
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}

		$user_access = $session['user_access'];
		if (!in_array($this->menu_id, $user_access)) {
			redirect('dashboard');
		}
	}

	private function validation($post_data) {
		$errMessage 	= [];
		$id 			= $post_data["id"];
		$name			= $post_data["name"];

		if (!empty($id)) {
			$data = $this->User_model->user_Data($id);
			if (empty($data)) {
				$this->session->set_flashdata('error', "Data not found");
	        	return redirect($this->own_link);
	        }
	        if (!empty($post_data["current_password"]) && !empty($post_data["new_password"])) {
	        	if (!password_verify($post_data["current_password"], $data->password)) {
	        		$errMessage[] = "Wrong current password";
	        	}
	        }
		}

		if (empty($name)) {
			$errMessage[] = "Name is required";
		}

		return $errMessage;
	}
}
