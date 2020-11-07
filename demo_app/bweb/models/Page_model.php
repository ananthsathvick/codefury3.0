<?php
Class Page_model extends CI_Model
{
    function get_pages_tiered($status=false,$menu=false)
    {
        if($status) $this->db->where('status',$status);
        $this->db->order_by('sequence', 'ASC');
        if($menu)$this->db->like('display_in',$menu);
        $pages = $this->db->get('pages')->result();
//        echo $this->db->last_query();
        $results = array();
        foreach ($pages as $page) {
            if ($this->uri->segment(1) == $page->slug) {
                $page->active = true;
            }
            elseif($this->uri->segment(1) =='' && $page->slug=='home'){
                $page->active = true;
            }
            else {
                $page->active = false;
            }
            $results[$page->parent_id][$page->id] = $page;
        }
        return $results;
    }

    function get_sub_pages($pid=false,$status=false,$limit=false,$sub=false)
    {
        if($pid) $this->db->where('parent_id',$pid);
        if($status) $this->db->where('status',$status);
        if($limit) $this->db->limit($limit);
        $this->db->order_by('sequence', 'ASC');
        $pages = $this->db->get('pages')->result();
//        echo $this->db->last_query();
        $results = $pages;
        if($sub){
        foreach ($pages as $page) {
            $this->db->where('parent_id',$page->id);
            if($status) $this->db->where('status',$status);
            $this->db->order_by('sequence', 'ASC');
            $sub_pages = $this->db->get('pages')->result();
            if(!empty($sub_pages)){
                $results = array_merge($pages,$sub_pages);
            }
        }
        }
        return $results;
    }

    function get_related_cats($id,$sel='*',$where=false)
    {
        $this->db->select($sel);
        $this->db->where('template','projects_sub1');
        $this->db->or_where('template','course');
        return $this->db->where('id !=',$id)->get('pages')->result();
    }

    function get_search($term=false)
    {
        $this->db->like('title',$term);
        $this->db->or_like('tags',$term);
        $this->db->where('status',1);
        return $this->db->get('pages')->result();
    }

    function delete($id)
    {
        $this->db->where('id',$id)->delete('pages');
        $this->db->where('parent_id',$id)->delete('pages');
    }

    function get_group($data=array(),$sel='*')
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
        $pages = $this->db->get('page_contents')->result();
        $results = array();
        foreach ($pages as $page) {
            if($page->section==3){
                $results[$page->section][$page->tags][$page->id] = $page;    
            } else {
            $results[$page->section][$page->id] = $page;
            }
        }
        return $results;
    }

}