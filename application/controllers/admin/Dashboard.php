<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->cekLogin();
		$this->session_data = $this->session->userdata('user_dashboard');
	}

	public function index() {
		$data['title'] = 'DASHBOARD';
		$data['user']  = $this->session_data['user'];

		$this->template->_v('index', $data);
	}

	private function get_incomplete_plans() {
		$npk   = $this->session_data['user']['EMPLOYEE_ID'];
		$today = date('d-m-Y');

		$query = "
			SELECT P.ACTIVITY_NO, A.CUST_NAME, P.ACTIVITY_DATE
			FROM TB_PLAN P
			JOIN TB_PLAN_ACTIVITY A ON P.ACTIVITY_NO = A.ACTIVITY_NO
			WHERE P.SALES_NPK = '$npk'
			AND P.ACTIVITY_DATE = '$today'
			AND (
				A.REMARK IS NULL OR A.REMARK = '' OR
				A.IMAGE_PATH IS NULL OR A.IMAGE_PATH = '' OR
				A.ADDRESS_ACTUAL IS NULL OR A.ADDRESS_ACTUAL = ''
			)
		";

		$result = $this->db->query($query, [$npk, $today])->result_array();

		$plans = [];
		foreach ($result as $row) {
			$plans[] = [
				'ACTIVITY_DATE' => $row['ACTIVITY_DATE'],
				'CUST_NAME' => $row['CUST_NAME']
			];
		}
		// dd($query);
		return $plans;
	}


    private function _getNextSeq($req_no) {
        $this->db->select_max('SEQ');
        $this->db->where('REQ_NO', $req_no);
        $query = $this->db->get('TR_SS_ORDER_REQUEST_APPROVAL');
        $row = $query->row();

        return $row ? ($row->SEQ + 1) : 1;
    }

	private function cekLogin() {
		$session = $this->session->userdata('user_dashboard');
		if (empty($session)) {
			redirect('login_dashboard');
		}
	}
}
