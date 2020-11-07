<?php
Class Report_model extends CI_Model
{
    function count_newsletters($status = FALSE)
    {
        $this->db->select('COUNT(id) as total_ids');
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->get('newsletter')->row();
    }

    function count_enquires($data = array())
    {
        $this->db->select('COUNT(id) as total_ids');
        if (!empty($data['type'])) {
            $this->db->where('type', $data['type']);
        }
        if (!empty($data['status'])) {
            $this->db->where('status', $data['status']);
        }
        return $this->db->get('enquires')->row();
    }

    function count_emp($status = FALSE)
    {
        $this->db->select('COUNT(id) as total_ids');
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->get('company')->row();
    }

    function count_users($status = FALSE)
    {
        $this->db->select('COUNT(id) as total_ids');
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->get('users')->row();
    }

    function count_resumes($status = FALSE)
    {
        $this->db->select('COUNT(id) as total_ids');
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->get('users')->row();
    }

    function count_testimonials($status = FALSE)
    {
        $this->db->select('COUNT(id) as total_ids');
        if ($status) {
            $this->db->where('status', $status);
        }
        return $this->db->get('testimonials')->row();
    }
}
