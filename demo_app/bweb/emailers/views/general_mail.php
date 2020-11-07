<?php $this->load->view('mail_header'); ?>		<tr>        	<td>            	<table cellpadding="0" cellspacing="0" style="width:800px; background-color:#FFFFFF; padding:60px 40px ; margin:0px auto 0px;">                	                    <tr >                    	<td style="padding:30px 20px; text-align:left; line-height:1.5; font-size:16px;">							<?php if (!empty($content)) {								if (is_array($content)) {									foreach ($content as $key => $val) 									{										echo '<p><strong>' . ucfirst($key) . ' : </strong>' . $val . '</p><br/>';									}								} else {									echo $content;								}								} ?>					</td>                    </tr>                                    </table>            </td>        </tr>

    <!-- <table style="width:100%;">
        <tr>
            <td style="text-align:left; font-size:16px;">
                <?php /*if (!empty($content)) {
                    if (is_array($content)) {
                        foreach ($content as $key => $val) {
                            echo '<p><strong>' . ucfirst($key) . ' : </strong>' . $val . '</p><br/>';
                        }
                    } else {
                        echo $content;
                    }
                }*/ ?>
            </td>
        </tr>
    </table> -->

<?php $this->load->view('mail_footer'); ?>