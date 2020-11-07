<?php $this->load->view('mail_header'); ?>
<table style="width:800px; margin:0px auto; background:#FFFFFF; " cellpadding="0" cellspacing="0">
    <tr><td style="text-align:center;">
            <table style="width:100%; padding:0px 0px 20px; border-left:1px solid #f7f7f5; border-right:1px solid #f7f7f5;" cellpadding="0" cellspacing="0">
                <tr><td style="text-align:center;"><img src="<?php echo upload_url('logo.png','emailers/') ?>" alt="<?php echo config_item('company_name'); ?>"></td></tr>
            </table>
        </td>
    </tr>
    <?php if(isset($image) && $image !=''){ ?>
    <tr>
        <td style="text-align:center;">
            <table style="width:100%; padding:0px 0px 10px;" cellpadding="0" cellspacing="0">
                <tr><td style="text-align:center;"><img src="<?php echo upload_url($image,'emailers/') ?>" alt="<?php echo config_item('company_name'); ?>" width="800" height="372"></td></tr>
            </table>
        </td>
    </tr>
    <?php } ?>
    <tr>
        <td style="text-align:center;">
            <table style="width:100%; padding:0px 0px 20px; border-left:1px solid #f7f7f5; border-right:1px solid #f7f7f5;" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="text-align:center; padding:5px 20px;">
                        <?php if(!empty($content)){
                            if(is_array($content)){
                                foreach ($content as $key=>$val){
                                    echo '<p><strong>'.ucfirst($key).' : </strong>'.$val.'</p><br/>';
                                }
                            }
                            else{
                                echo $content;
                            }
                        } ?>
                    </td>
                </tr>
            </table>
        </td>
    </tr>
    <tr><td style="text-align:center;">
            <table style="width:100%; padding:15px 0px 10px; background:#f7f7f5; border-left:1px solid #f7f7f5; border-right:1px solid #f7f7f5;" cellpadding="0" cellspacing="0">
                <tr>
                    <td style="text-align:center;">
                        <?php if(config_item('facebook')!=''){ ?>
                        <a href="<?php echo config_item('facebook'); ?>" target="_blank"><img src="<?php echo upload_url('facebook.png','emailers/'); ?>" alt=""></a>&nbsp;&nbsp;
                        <?php } if(config_item('twitter')!=''){ ?>
                        <a href="<?php echo config_item('twitter'); ?>" target="_blank"><img src="<?php echo upload_url('twitter.png','emailers/'); ?>" alt=""></a> &nbsp;&nbsp;
                        <?php } if(config_item('google_plus')!=''){ ?>
                            <a href="<?php echo config_item('google_plus'); ?>" target="_blank"><img src="<?php echo upload_url('google.png','emailers/'); ?>" alt=""></a> &nbsp;&nbsp;
                        <?php } if(config_item('linked_in')!=''){ ?>
                            <a href="<?php echo config_item('linked_in'); ?>" target="_blank"><img src="<?php echo upload_url('linkdin.png','emailers/'); ?>" alt=""></a> &nbsp;&nbsp;
                        <?php } if(config_item('youtube')!=''){ ?>
                            <a href="<?php echo config_item('youtube'); ?>" target="_blank"><img src="<?php echo upload_url('you-tube.png','emailers/'); ?>" alt=""></a>
                    <?php } ?>
                    </td>
                </tr>
            </table>
        </td></tr>
</table>
<?php $this->load->view('mail_footer'); ?>