<?php
	class Dbhelper extends CI_Model{
		function __construct(){
			parent::__construct();
			$this->load->database();
		}
		function selectTabel($select=false,$tabel=false,$where=false,$order=false,$orderMethod=false,$limit=false){
			$this->db->select($select);
			if ($where==true) {
				if(count($where)>0){
					$this->db->where($where);
				}
			}
			if($order==true){
				$this->db->order_by($order,$orderMethod);
			}
			if ($limit) {
				$this->db->limit($limit);
			}
			$hasil = $this->db->get($tabel);
			return $hasil->result_array();
		}

		function selectTabelOne($select=false,$tabel=false,$where=false,$order=false,$orderMethod=false,$limit=false){
			$this->db->select($select);
			if ($where==true) {
				if(count($where)>0){
					$this->db->where($where);
				}
			}
			if($order==true){
				$this->db->order_by($order,$orderMethod);
			}
			if ($limit) {
				$this->db->limit($limit);
			}
			$hasil = $this->db->get($tabel);
			return $hasil->row_array();
		}

		public function get_districts_with_regencies($code) {
			$query = $this->db->query("
				SELECT 
					A.ID_DISTRICTS, 
					A.DISTRICS as DISTRICT_NAME, 
					A.PLANT_AREA, 
					A.SEGMENT,
					B.REGENCIES as REGENCIES_NAME,
					C.PROVINCE as PROVINCE_NAME
				FROM 
					CD_DISTRICTS A
				JOIN 
					CD_REGENCIES B ON A.REGENCIES_ID = B.ID_REGENCIES
				JOIN 
					CD_PROVINCE C ON B.PROVINCE_ID = C.ID_PROVINCE
				WHERE 
					A.ID_DISTRICTS = ?", array($code)); // Filter berdasarkan $code
			
			return $query->row_array(); // Mengembalikan satu baris data
		}

		public function get_all_survey_data() {
			$this->db->select('*');
			$this->db->from('SURVEY');
			$query = $this->db->get();
			return $query->result_array(); // Mengembalikan data dalam bentuk array
		}
	
		// Fungsi untuk mendapatkan data yang mendekati status selanjutnya berdasarkan kondisi waktu
		public function get_near_next_status($umur_tanam, $current_phase_date) {
			// Hitung selisih hari dari current_phase_date sampai sekarang
			$today = new DateTime(); // Tanggal hari ini
			$phase_date = new DateTime($current_phase_date); // Ubah current_phase_date menjadi objek DateTime
			$interval = $phase_date->diff($today); // Selisih waktu
			$days_passed = $interval->days; // Jumlah hari yang telah berlalu
			
			// Tambahkan selisih hari ke umur_tanam
			$updated_umur_tanam = $umur_tanam + $days_passed;
	
			// Tentukan status kondisi dan kondisi selanjutnya
			if ($updated_umur_tanam >= 1 && $updated_umur_tanam <= 25) {
				$current_status = 'VEGETATIF AWAL';
				$next_status = 'VEGETATIF AKHIR';
				$next_min = 26;
				$next_max = 50;
			} elseif ($updated_umur_tanam >= 26 && $updated_umur_tanam <= 50) {
				$current_status = 'VEGETATIF AKHIR';
				$next_status = 'GENETATIF AWAL';
				$next_min = 51;
				$next_max = 70;
			} elseif ($updated_umur_tanam >= 51 && $updated_umur_tanam <= 70) {
				$current_status = 'GENETATIF AWAL';
				$next_status = 'GENETATIF AKHIR';
				$next_min = 71;
				$next_max = 110;
			} elseif ($updated_umur_tanam >= 71 && $updated_umur_tanam <= 110) {
				$current_status = 'GENETATIF AKHIR';
				$next_status = null;
				$next_min = null;
				$next_max = null;
			} else {
				return []; // Jika umur_tanam di luar kisaran
			}
	
			// Hitung jarak 5 hari sebelum status kondisi selanjutnya
			if ($next_min !== null && $next_max !== null) {
				$target_days_before_next_status = $next_min - 5;
	
				// Jika umur_tanam berada dalam 5 hari sebelum status selanjutnya
				if ($updated_umur_tanam >= $target_days_before_next_status && $updated_umur_tanam < $next_min) {
					// Dapatkan data yang memenuhi kriteria dari tabel survey
					$this->db->select('*');
					$this->db->from('SURVEY');
					$this->db->where('UMUR_TANAM', $umur_tanam); // Gunakan nilai umur_tanam asli dari database
					$query = $this->db->get();
	
					// Ambil hasil query
					$result = $query->result_array();
	
					// Tambahkan status selanjutnya dan interval jarak ke setiap data
					foreach ($result as &$row) {
						$row['next_status'] = $next_status;
						$row['interval_to_next_status'] = $next_min - $updated_umur_tanam; // Hitung jarak dalam angka
					}
					
					return $result;
				}
			}
			
			return []; // Jika tidak ada data yang mendekati status selanjutnya
		}
		
		function selectRawQuery($query) {
			return $this->db->query($query)->result_array();
		}

		function selectOneRawQuery($query) {
			return $this->db->query($query)->row_array();
		}

		function selectTabelDistinct($select=false,$tabel=false,$distinct=false){
			$this->db->select($select);
			if ($distinct==true) {
				$this->db->distinct();
			}
			$hasil = $this->db->get($tabel);
			// debugCode($hasil->result_array());
			return $hasil->result_array();
		}

		function getCountById($tabel=false,$where=false){
			$this->db->select('*');
			if(count($where)>0){
				$this->db->where($where);
			}
			$hasil = $this->db->get($tabel);
			return $hasil->num_rows();
		}
		function updateData($tabel=false,$where=false,$data=false){
			if(count($where)>0){
				$this->db->where($where);
			}
			$hasil = $this->db->update($tabel,$data);
			return $hasil;
		}
		function insertData($tabel=false,$data=false){
			$hasil = $this->db->insert($tabel, $data);

			// if (!$hasil) {
			// 	echo 'Query Gagal: ' . $this->db->last_query() . '<br>';
			// 	echo 'DB Error: <pre>' . print_r($this->db->error(), true) . '</pre>';
			// 	exit;
			// }
			return $hasil;
		}
		function insertDataWithReturnID($tabel=false,$data=false,$id=false){
			$this->db->insert($tabel,$data);
			$sql = "SELECT MAX($id) AS MAX_ID FROM $tabel";
			$query = $this->db->query($sql);
			$result = $query->result();
			return $result[0]->MAX_ID;
		}
		function deleteData($tabel,$where){
			$sql = "DECLARE child_exists EXCEPTION; PRAGMA EXCEPTION_INIT(child_exists, -2292); BEGIN DELETE $tabel WHERE $where; EXCEPTION WHEN child_exists THEN null; END;";
			$this->db->query($sql);
		}
		function updateDataClob($tabel,$kolom_update,$kolom_key,$kolom_val,$databaru){
			$SQL = "UPDATE $tabel SET $kolom_update = $kolom_update || to_clob('$databaru') WHERE $kolom_key = $kolom_val";
			$this->db->query($SQL);
		}
	}
?>