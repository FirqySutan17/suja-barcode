<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
	public function __Construct() {
		parent::__construct();
	}

	public function index() {
		redirect('home');
	}

	private function list_userlogin($employee_id) {
		$data['999999'] = [
			'id'			=> 1,
			'company'		=> '01',
			'plant'			=> '0112',
			'dept'			=> '2110',
			'area'			=> '0001',
			'employee_id'	=> '999999',
			'password'		=> password_hash('1100', PASSWORD_DEFAULT),
			'full_name'		=> 'Administrator',
			'email'			=> '',
			'plant_name'	=> 'CJFC Jakarta',
			'dept_name'		=> 'IT SST',
			'area_name'		=> 'JAKARTA AREA'
		];

		return !empty($data[$employee_id]) ? $data[$employee_id] : [];
	}

	public function login() {
		redirect('login');
	}

	function login_dashboard(){
		$session_dashboard = $this->session->userdata('user_dashboard');
		if(!empty($session_dashboard)){
			return redirect('dashboard');
		}
		$employee_id 		= dbClean($this->input->post('employee_id'));
		$password 			= dbClean($this->input->post('password'));

		$user = $this->Dbhelper->selectTabelOne('*', 'cd_user', array('employee_id' => $employee_id, 'is_active' => 'Y'));

		if (empty($user)) {
			$this->session->set_flashdata('alert', 'Employee account not found');
		} else {
			if (password_verify($password, $user['password'])) {
				return $this->proceed_login($user);
			}
			$this->session->set_flashdata('alert', 'Email or password incorrect');
		}

		$this->load->view('admin/login');
	}

	private function proceed_login($user) {
		$user_access = json_decode($user['MENU_ACCESS']);
		// $user_area 	= $this->Dbhelper->selectTabel('CODE_AREA', 'CD_USER_AREA', array('EMPLOYEE_ID' => $user['EMPLOYEE_ID']));
		// $user_customer 	= $this->Dbhelper->selectTabel('CUSTOMER', 'CD_USER_CUSTOMER', array('EMPLOYEE_ID' => $user['EMPLOYEE_ID']));

		// $area = [];
		// $customer = [];
		// if (!empty($user_area)) {
		// 	foreach ($user_area as $v) {
		// 		$area[] = $v['CODE_AREA'];
		// 	}
		// }

		// if (!empty($user_customer)) {
		// 	foreach ($user_customer as $v) {
		// 		$customer[] = $v['CUSTOMER'];
		// 	}
		// }
		$data["user"] 					= $user;
		$data["user_access"] 		= !empty($user_access) ? $user_access : [];
		// $data["user_area"] 			= $area;
		// $data["user_customer"] 	= $customer;
		// $data["user_access_detail"] = $user_access_detail;
		if (!empty($this->session->userdata('user_dashboard'))) {
			$this->session->sess_destroy();
		}

		$session['user_dashboard'] = $data;
		$this->session->set_userdata($session);

		$session = $this->session->userdata('user_dashboard');
		// if ($user_group_id > 1) {
		// 	return redirect('general');
		// }
		return redirect('dashboard');
	}

	function logout(){
		$session = $this->session->userdata('user_dashboard');
		if (empty($session)) {
			$this->session->sess_destroy();
			redirect('home');
		}
		$this->session->sess_destroy();
		redirect('login_dashboard');
	}
	
}
