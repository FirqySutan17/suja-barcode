<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __Construct() {
		parent::__construct();
		$this->session_data = $this->session->userdata('user_dashboard');
		$this->load->library('upload');
	}

	public function index() {
		$is_login = empty($this->session_data) ? FALSE : TRUE;
		$data = [
			'is_login'	=> $is_login
		];
		$this->load->view('welcome', $data);
	}

	public function profile() {
		$this->cekLogin();
		$data['title'] 	= 'My Profile';
		$data['user']	= $this->session_data['user'];
		$this->template->_v('profile/index', $data);
	}

	public function profile_update() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$update_data = [];

			$user = $this->session_data['user'];
			if (!password_verify($post['CURRENT_PASSWORD'], $user['PASSWORD'])) {
				$this->session->set_flashdata('error', "Update data failed");
				return redirect(base_url()."/profile");
			}

			if (!empty($post['NEW_PASSWORD'])) {
				$update_data['PASSWORD'] = password_hash(dbClean($post['NEW_PASSWORD']), PASSWORD_DEFAULT);
			}

			if (!empty($update_data)) {
				$save 	= $this->Dbhelper->updateData("CD_USER", array('EMPLOYEE_ID' => $user['EMPLOYEE_ID']), $update_data);		
				if ($save) {
					$this->session->set_flashdata('success', "Update data success");
					return redirect(base_url('dashboard'));
				}
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect(base_url()."/profile");
		}
		$this->session->set_flashdata('error', "Access denied");
				return redirect(base_url('dashboard'));
	}

	private function onlyRequestPost() {
		$session = $this->session_data;
		if (empty($session) || $this->input->server('REQUEST_METHOD') != 'POST') {
			return false;
		}
		return true;
	}

	// DONT CHANGE THIS
	private function cekLogin() {
		$session = $this->session_data;
		if (empty($session)) {
			redirect('login_dashboard');
		}
	}
	private function validation($post_data) {
		$errMessage 	= [];
		$id 			= isset($post_data["id"]) ? $post_data["id"] : null;
		$surat_id		= isset($post_data['surat_id']) ? $post_data['surat_id'] : null;

		if (!empty($id)) {
			$data = $this->Surat_model->find($id);
			if (empty($data)) {
				$this->session->set_flashdata('error', "Data not found");
						return redirect('pengajuan-surat');
					}
					$user = $this->session_data['user'];
					if ($data->user_id != $user['id']) {
						$this->session->set_flashdata('error', "Data not found");
						return redirect('pengajuan-surat');
					}
		}

		return $errMessage;
	}
}
