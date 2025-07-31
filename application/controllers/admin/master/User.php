<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class User extends CI_Controller {
	var $menu_id = "";
	var $session_data = "";
	public function __Construct() {
		parent::__construct();
		$this->menu_id = 'M004';
		$this->session_data = $this->session->userdata('user_dashboard');

		$this->cekLogin();
		$this->own_link = admin_url('master/user');
	}

	public function index() {

		$data['title'] 			= 'DATA USER';
		$data['user']				= $this->session_data['user'];
		$data['datatable']	= $this->datatable();
		$this->template->_v('master/user/index', $data);
	}

	public function create() {

		$data['title'] 			= 'Create User';
		$data['plant'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['region'] 		= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'CS02'), 'CODE', 'ASC');
		$data['menu_access']	= $this->menu_listdata();
		
		$this->template->_v('master/user/create', $data);
	}

	public function do_create() {
		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();

			$post_data = [];
			foreach ($post as $key => $value) {
				$post_data[strtoupper($key)] = dbClean($value);
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
				return redirect($this->own_link."/create");
			}

			$post_data['PASSWORD'] = password_hash('init1234', PASSWORD_DEFAULT);
			$save = $this->Dbhelper->insertData('CD_USER', $post_data);
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

	public function edit($employee_id) {

		$data['title'] 				= 'Edit User';
		$data['plant'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'AB'), 'CODE', 'ASC');
		$data['region'] 			= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'CS02'), 'CODE', 'ASC');
		$data['menu_access']	= $this->menu_listdata();
		$data['model']				= $this->Dbhelper->selectTabelOne('*', 'CD_USER', array('EMPLOYEE_ID' => $employee_id));
		$data['area'] 				= $this->Dbhelper->selectTabel('CODE, CODE_NAME', 'CD_CODE', array('HEAD_CODE' => 'SA01'), 'CODE', 'ASC');
		$data['model_area'] 				= $this->Dbhelper->selectTabel('CODE_AREA', 'CD_USER_AREA', array('EMPLOYEE_ID' => $employee_id));
		$this->template->_v('master/user/edit', $data);
	}

	public function do_update() {

		if ($this->input->server('REQUEST_METHOD') === 'POST') {
			$post = $this->input->post();
			$post_data = [];
			foreach ($post as $key => $value) {
				if ($key != 'sales_area') {
					$key = strtoupper($key);
					if ($key == 'MENU_ACCESS') {
						$post_data[$key] = in_array('*', $value) ? json_encode(['*']) : json_encode($value);
					} else {
						$post_data[$key] = dbClean($value);
					}
				}
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
				return redirect($this->own_link."/create");
			}

			$update_data = [
				'PLANT'		=> $post_data['PLANT'],
				'REGION'	=> $post_data['REGION'],
				'FULL_NAME'	=> $post_data['FULL_NAME'],
				'EMAIL'		=> $post_data['EMAIL'],
				'ROLE'		=> $post_data['ROLE'],
				'MENU_ACCESS'	=> $post_data['MENU_ACCESS'],
			];

			if (!empty($post['sales_area'])) {
				$area_batch = [];
				foreach ($post['sales_area'] as $v) {
					$area_batch[] = [
						'EMPLOYEE_ID'	=> $post_data['EMPLOYEE_ID'],
						'CODE_AREA'		=> $v
					];
				}
				$this->db->delete('CD_USER_AREA', array('EMPLOYEE_ID' => $post_data['EMPLOYEE_ID']));
				$this->db->insert_batch('CD_USER_AREA', $area_batch);
			}

			if (!empty($post_data['NEW_PASSWORD'])) {
				$update_data['PASSWORD'] = password_hash($post_data['NEW_PASSWORD'], PASSWORD_DEFAULT);
			}
			$save 	= $this->Dbhelper->updateData("CD_USER", array('EMPLOYEE_ID' => $post_data['EMPLOYEE_ID']), $update_data);		
			if ($save) {
				$this->session->set_flashdata('success', "Update data success");
				return redirect($this->own_link);
			}
			$this->session->set_flashdata('error', "Update data failed");
			return redirect($this->own_link."/create");
		}
		$this->session->set_flashdata('error', "Access denied");
        return redirect($this->own_link);
	}

	public function excel() {
		$menu_list 	= $this->menu_listdata();
		$datatable	= $this->datatable_excel();
		unset($menu_list['*']);
		unset($menu_list['TR002']);
		unset($menu_list['TR003']);

		$spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

		$styleBorder = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
		    ],
		];

		$styleTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
		    ],
		];

		$styleAMT = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
		    ],
		];

		$styleFTH = [
		    'borders' => [
		        'allBorders' => [
		            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
		            'color' => ['argb' => '00000000'],
		        ],
		    ],
		    'font' => [
		        'bold' => false,
		        'size' => 11,
		        'name'	=> 'CJ ONLYONE NEW 본문 Light'
		    ],
		    'alignment' => [
		    	'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
		        'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_RIGHT,
		    ],
		];

		// dd($datatable);


		// HEADER REPORT
		$sheet->setCellValue('A1', 'SITE');
		$sheet->mergeCells('A1:A2');
		$sheet->setCellValue('B1', 'COMPANY NAME');
		$sheet->mergeCells('B1:B2');
		$sheet->setCellValue('C1', 'EMPLOYEE ID');
		$sheet->mergeCells('C1:C2');
		$sheet->setCellValue('D1', 'EMPLOYEE NAME');
		$sheet->mergeCells('D1:D2');
		$sheet->setCellValue('E1', 'EMAIL');
		$sheet->mergeCells('E1:E2');

		$sheet->setCellValue('F1', 'MENU MASTER');
		$sheet->mergeCells('F1:I1');
		$sheet->setCellValue('J1', 'MENU ENTRY');
		$sheet->setCellValue('K1', 'MENU REPORT');
		$sheet->mergeCells('K1:M1');

		$alphabetCol = "F";
		foreach ($menu_list as $m_code => $m_name) {
			$m_name_exp = explode(" - ", $m_name);
			$m_name = $m_name_exp[1]; 
			$sheet->setCellValue($alphabetCol.'2', $m_name);
			$alphabetCol++;
		}
		$alphabetCol--;
		$sheet->getStyle('A1:'.$alphabetCol.'2')->applyFromArray($styleTH)->getAlignment()->setWrapText(true);
		
		// LIST DATA
		if (!empty($datatable)) {
			$rowNumber = 3;
			foreach ($datatable as $v) {
				$v['MENU_ACCESS'] = json_decode($v['MENU_ACCESS']);
				$user_access = $v['MENU_ACCESS'];

				$sheet->setCellValue('A'.$rowNumber, $v['COMPANY_ID']);
				$sheet->setCellValue('B'.$rowNumber, $v['COMPANY_NAME']);
				$sheet->setCellValue('C'.$rowNumber, $v['EMPLOYEE_ID']);
				$sheet->setCellValue('D'.$rowNumber, $v['EMPLOYEE_NAME']);
				$sheet->setCellValue('E'.$rowNumber, $v['EMAIL']);
				$alphabetCol = "F";
				foreach ($menu_list as $m_code => $m_name) {
					$check_access = (in_array($m_code, $user_access) || in_array('*', $user_access)) ? 'Y' : '';
					$sheet->setCellValue($alphabetCol.$rowNumber, $check_access);
					$alphabetCol++;
				}
				$alphabetCol--;
				$sheet->getStyle('A'.$rowNumber.':'.$alphabetCol.$rowNumber)->applyFromArray($styleBorder)->getAlignment()->setWrapText(true);

				$rowNumber++;
			}
		}
		// FOOTER REPORT


		$sheet->getColumnDimension('A')->setWidth(12, 'px');
		$sheet->getColumnDimension('B')->setWidth(20, 'px');
		$sheet->getColumnDimension('C')->setWidth(15, 'px');
		$sheet->getColumnDimension('D')->setWidth(30, 'px');
		$writer = new Xlsx($spreadsheet);
 		$filename = "userlist-".strtotime(date('YmdHis'));
		ob_end_clean();

		header('Content-Type: application/vnd.ms-excel'); // generate excel file
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output');
		exit();
	}

	private function datatable_excel() {
		$query = "
			SELECT
				PLANT as COMPANY_ID,
				CASE WHEN PLANT = '*' THEN 'ALL PLANT' ELSE FN_CODE_NAME('AB' , PLANT) END as COMPANY_NAME,
				EMPLOYEE_ID,
				FULL_NAME as EMPLOYEE_NAME,
				EMAIL,
				MENU_ACCESS
			FROM CD_USER
			ORDER BY PLANT ASC, EMPLOYEE_ID ASC
		";
		$result = $this->db->query($query);
		return $result->result_array();
	}

	private function datatable() {
		$this->db->select('
			CD_USER.PLANT as COMPANY_CODE,
			CD_USER.EMPLOYEE_ID as EMPLOYEE_ID,
			CD_USER.FULL_NAME as FULL_NAME,
			CD_USER.REGION as REGION_CODE,
			CD_USER.EMAIL,
			CD_USER.ROLE
		');
        $this->db->from('CD_USER');
        $this->db->where('CD_USER.EMPLOYEE_ID !=', '999999');
        $this->db->where('CD_USER.IS_ACTIVE', 'Y');
        $data = $this->db->get()->result_array();
		return $data;
	}

	private function validation($post_data) {
		$errMessage 	= [];
		$full_name		= $post_data["FULL_NAME"];
		$employee_id	= $post_data["EMPLOYEE_ID"];
		$plant	= $post_data["PLANT"];
		$region	= $post_data["REGION"];
		$role	= $post_data["ROLE"];

		if (empty($full_name)) {
			$errMessage[] = "Full Name is required";
		}
		if (empty($employee_id)) {
			$errMessage[] = "Employee ID is required";
		}
		if (empty($plant) || empty($region)) {
			$errMessage[] = "Plant or Region are required";
		}
		if (empty($role)) {
			$errMessage[] = "Role ID is required";
		}

		return $errMessage;
	}

	private function menu_listdata() {
		return [
			'*' 	=> 'ALL MENU',
			'M001'	=> 'Master - Data Common Code',
			'M004'	=> 'Master - Data User',
			'SA001'	=> 'QR GENERATE',
			'SA002'	=> 'REPORT ACTIVITY',
		];
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

