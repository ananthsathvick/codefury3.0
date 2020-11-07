<?php

class Routes_model extends CI_Model {

	function __construct()
	{
		parent::__construct();		
	}

	function check_slug($table,$slug, $id=false)
	{
		if($id)
		{
			$this->db->where('id !=', $id);
		}
		$this->db->where('slug', $slug);
		return (bool) $this->db->count_all_results($table);
	}
	
	function validate_slug($table,$slug, $id=false, $count=false)
	{
		if($this->check_slug($table,$slug.$count, $id))
		{
			if(!$count)
			{
				$count	= 1;
			}
			else
			{
				$count++;
			}
			return $this->validate_slug($table,$slug, $id, $count);
		}
		else
		{
			return $slug.$count;
		}
	}

}
