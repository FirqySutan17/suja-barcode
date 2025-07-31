<?php
    class Plan_model extends CI_Model
    {
        public function insert_plan($data)
        {
            $this->db->insert('TB_PLAN', $data);
        }

        public function insert_plan_activity($data)
        {
            $this->db->insert('TB_PLAN_ACTIVITY', $data);
        }
    }
?>