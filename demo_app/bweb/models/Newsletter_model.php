<?php
Class Newsletter_model extends CI_Model
{
    function save_newsletter($sav)
    {
      $news = $this->db->where('email',$sav['email'])->get('newsletter')->row();
      if(isset($news->status) && $news->status==0)
      {
          $sav['status'] = 1;
          $this->db->where('email',$sav['email'])->update('newsletter',$sav);
          return true;
      }
      elseif(empty($news))
      {
          $this->db->insert('newsletter',$sav);
          return true;
      } else{
          return false;
      }
    }

    function delete($email)
    {
        $this->db->where('email',$email)->update('newsletter',array('status'=>0));
    }

}
