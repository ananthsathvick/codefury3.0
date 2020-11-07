<?php
Class Common_model extends CI_Model
{
    function get_tbl_fields($tbl)
    {
        $data = $this->db->list_fields($tbl);
        return array_fill_keys($data, '');
    }

    function get_tbl_row($tbl,$id,$sel='*')
    {
        $this->db->select($sel);
        if(is_array($id)) {
            $this->db->where($id);
        }else {
            $this->db->where('id',$id);
        }
        return $this->db->get($tbl)->row();
    }

    function get_tbl_list($tbl, $data = array(),$typ='obj')
    {
        if (!empty($data['sel'])) {
            $this->db->select($data['sel']);
        }
        if(!empty($data['where_in_key']) && !empty($data['where_in_value']))
        {
            $this->db->where_in($data['where_in_key'],$data['where_in_value']);
        }

        if(!empty($data['where']) && !empty($data['or_where'])){ $this->db->group_start(); }
        if (!empty($data['where'])) {
            $this->db->where($data['where']);
        }
        if (!empty($data['or_where'])) {
            $this->db->or_where($data['or_where']);
        }

        if(!empty($data['where']) && !empty($data['or_where'])){ $this->db->group_end(); }

        if(!empty($data['like']) && !empty($data['or_like'])){ $this->db->group_start(); }
        if (!empty($data['like'])) {
            $this->db->like($data['like']);
        }
        if (!empty($data['or_like'])) {
            $this->db->or_like($data['or_like']);
        }
        if(!empty($data['like']) && !empty($data['or_like'])){ $this->db->group_end(); }

        if (!empty($data['order_by'])) {
            $this->db->order_by($data['order_by']);
        }
        if(!empty($data['join']) && !empty($data['join_table']))
        {
            $this->db->join($data['join_table'],$data['join']);
        }
        if (!empty($data['perpage'])) {
            $this->db->limit($data['perpage']);
        }
        if (!empty($data['page'])) {
            $this->db->offset($data['page']);
        }
        if (!empty($data['count'])) {
            return $this->db->count_all_results($tbl);
        } else {
            if($typ=='obj') {
                return $this->db->get($tbl)->result();
            } else {
                return $this->db->get($tbl)->result_array();
            }
        }
    }

    function get_group($tbl,$grp,$data=array(),$sel='*')
    {
        $this->db->select($sel);
        if(!empty($data)){
            if(!empty($data['where'])){
                $this->db->where($data['where']);
            }
            if(!empty($data['or_where'])) {
                $this->db->or_where($data['or_where']);
            }
            if(!empty($data['order_by'])) {
                $this->db->order_by($data['order_by']);
            }
        }
        $pages = $this->db->get($tbl)->result();
        $results = array();
        foreach ($pages as $page) {
            $results[$page->$grp][$page->id] = $page;
        }
        return $results;
    }

    function get_tbl_tiered($tbl,$data=array())
    {
        if(!empty($data)){
            if(!empty($data['sel'])){ $this->db->select($data['sel']); }
            if(!empty($data['where'])){
                $this->db->where($data['where']);
            }
            if(!empty($data['or_where'])) {
                $this->db->or_where($data['or_where']);
            }
            if(!empty($data['order_by'])) {
                $this->db->order_by($data['order_by']);
            }
        }
        $pages = $this->db->get($tbl)->result();
        $results = array();
        foreach ($pages as $page) {
            $results[$page->parent_id][$page->id] = $page;
        }
        return $results;
    }

    function get_next_sequence($tbl,$where=false)
    {
        if($where){
            $this->db->where($where);
        }
        $row = $this->db->select('sequence')->order_by('sequence', 'DESC')->get($tbl)->row('sequence');
        return $row + 1;
    }

    function get_tbl_array($tbl,$f1,$f2,$s=false,$data=array())
    {
        if($s) $this->db->where('status',1);
        if(!empty($data['where']))
        {
            $this->db->where($data['where']);
        }
        if(!empty($data['where_in_key']) && !empty($data['where_in_value']))
        {
            $this->db->where_in($data['where_in_key'],$data['where_in_value']);
        }
        $this->db->select($f1.", ".$f2);
        $this->db->order_by($f2,'ASC');
        $result = $this->db->get($tbl)->result();

        $return = array(''=>'Select');
        foreach($result as $state)
        {
            $return[$state->$f1] = $state->$f2;
        }
        return $return;
    }

    function save_tbl($tbl,$data)
    {
        if(isset($data['id']) && $data['id']!='')
        {
            $this->db->where('id',$data['id'])->update($tbl,$data);
            return $data['id'];
        } else {
            $this->db->insert($tbl,$data);
            return $this->db->insert_id();
        }
    }

    function save_tbl_res($tbl,$data)
    {
        $count_rows = $this->db->where('user_id',$data['user_id'])->count_all_results($tbl);
        if($count_rows>0)
        {
            $added_on = $this->db->where('user_id',$data['user_id'])->get('resume')->row('added_date');
            $data['added_date'] = $added_on;
            $data['update_on'] = date('Y-m-d H:i:s');
            $this->db->where('user_id',$data['user_id'])->update($tbl,$data);
            return $data['user_id'];
        } else {
            $data['update_on'] = date('Y-m-d H:i:s');
            $user_details = array();
            $user_details['expiry_date'] = date('Y-m-d', strtotime(date('Y-m-d') . " + 365 day"));
            if (config_item('enable_payment')) {
                $user_details['user_type'] = 1;
                $user_details['searchable'] = 0;
            }else{
                $user_details['user_type'] = 2;
                $user_details['searchable'] = 0;
            }
            $this->db->insert($tbl,$data);
            $this->db->where('id',$data['user_id'])->update('users',$user_details);
            return $data['user_id'];
            // return $this->db->insert_id();
        }
    }

    function organize($data,$tbl)
    {
        foreach ($data as $sequence => $id) {
            $da = array('sequence' => $sequence);
            $this->db->where('id', $id);
            $this->db->update($tbl, $da);
        }
    }

    function check_data($table = 'customers',$data=array())
    {
        if (!empty($data['where'])) {
            $this->db->where($data['where']);
        }
        /*Group WHERE with OR conditions*/
        if(!empty($data['where']) && !empty($data['or_where'])){ $this->db->group_start(); }
        if (!empty($data['or_where'])) {
            $this->db->or_where($data['or_where']);
        }
        if(!empty($data['where']) && !empty($data['or_where'])){ $this->db->group_end(); }

        if (!empty($data['like'])) {
            $this->db->like($data['like']);
        }
        /*Group LIKE with AND and OR conditions*/
        if(!empty($data['like']) && !empty($data['or_like'])){ $this->db->group_start(); }
        if (!empty($data['or_like'])) {
            $this->db->or_like($data['or_like']);
        }
        if(!empty($data['like']) && !empty($data['or_like'])){ $this->db->group_end(); }

        $rows = $this->db->get($table)->num_rows();

        if($rows > 0)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    function delete_tbl_id($tbl,$id,$img=false)
    {
        if($img){
            $imgs = $this->db->select('image')->where('id',$id)->get('products')->row();
            if($imgs->image != '')
                {
                    $file = 'uploads/products/'.$imgs->image;
                    if(file_exists($file))
                    {
                        unlink($file);
                    }
                }
        }
        $this->db->where('id',$id)->delete($tbl);
    }

    function delete_image($tbl, $id,$image)
    {
        $this->db->set($image,'');
        $this->db->where('id',$id);
        $this->db->update($tbl);
    }

    function get_ratings($id)
    {
        $this->db->select('count(id) as total,AVG(rating) as avg_rating');
        $this->db->where('cat_id', $id);
        $this->db->where('status', 1);
        $ratings = $this->db->get('reviews')->row_array();
        if (empty($ratings)) {
            $rts['total'] = 0;
            $rts['round_rating'] = 0;
            $rts['avg_rating'] = 0;
        } else {
            $rts['total'] = $ratings['total'];
            $rts['round_rating'] = round($ratings['avg_rating'], 0);
            $rts['avg_rating'] = round($ratings['avg_rating'], 2);
        }
        return $rts;
    }

    function similar_resumes($skills)
    {
        $val = explode(',',$skills);
        if (!empty($val)) {
            foreach ($val as $va) {
                $this->db->or_like('skills', $va);
            }
        }
        $this->db->limit(5);
        return $this->db->get('resume')->result();
    }


}
