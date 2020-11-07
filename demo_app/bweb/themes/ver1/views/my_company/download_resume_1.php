<table style="width:900px; padding:0px; margin:0px auto; border-collapse:collapse; border-spacing:0px; background:#f7f7f7; vertical-align:top; font-family: Arial, Helvetica, sans-serif;  font-size:16px; line-height: 16px;">
    <tr>
        <td style="padding: 0px; margin:0px; border:none;">
            <table  style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">
                <tr>
                    <td style="width:300px; padding: 0px 5px; background-color: #FFFFFF; vertical-align: top; font-size:16px; text-align:right;">
						<h4 style="margin: 15px 0px 10px;  color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;"><b>Personal Information</b></h4>
                        
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong style="font-weight: bold;">Name :</strong> <?php echo $resume->name; ?>
                        </p>
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong style="font-weight: bold;">Email :</strong> <?php echo $resume->email; ?>
                        </p>
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong style="font-weight: bold;">Mobile Number :</strong> <?php echo $resume->phone; ?>
                        </p>
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong style="font-weight: bold;">Contact Number :</strong> <?php echo $resume->mobile; ?>
                        </p>
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong style="font-weight: bold;">Address :</strong><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?> – <?php echo $resume->pincode; ?>.                                
                        </p>
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong style="font-weight: bold;">Languages :</strong> <?php echo $resume->languages; ?>.
                        </p>
                        
                        <h4 style="margin: 25px 0px 10px;  color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Education</h4>
                        <?php foreach($education as $edu){ ?>
                        <p style="margin:0px 0px 10px; font-size:16px; line-height: 24px;">
                            <strong><?php echo $edu['degree']; ?> </strong> <br>
                            <strong><?php echo $edu['branch']; ?> </strong> <br>
                            <span><?php echo date('M Y', strtotime($edu['edu_f_date'])); ?> - <?php echo date('M Y', strtotime($edu['edu_t_date'])); ?> </span> <br>
                            <strong><?php echo $edu['institute']; ?></strong>                            
                        </p>
                        <?php } ?>                      
                        <?php if(!empty($awards)){ ?>
                        <h4 style="margin: 25px 0px 10px;color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Certifications / Awards</h4>
                        <ul style="margin-top: 0px; font-size:16px; line-height: 24px; padding-left:20px;">
                                        <?php foreach($awards as $awr){ ?>
                                            <li><?php echo $awr ?></li>
                                        <?php } ?>
                        </ul>
                        <?php } ?>                                       
                    </td>
                    <td style=" padding:0px; margin:0px; width:25px"></td>
                    <td width="1" style="border-right:2px solid #000000; padding:0px; margin:0px; width:1px"></td>
                    <td style=" padding:0px; margin:0px; width:24px"></td>
                    <td style="vertical-align: top; width:550px;">
                        <table  style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                    <h4 style="margin: 15px 0px 10px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Objective</h4> 
                                    <p style="margin:0px 0px 15px; font-size:16px; line-height: 24px;">
                                    <?php echo $resume->objectives; ?>
                                </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; vertical-align: top;">  
                                    <p style="margin:0px 0px 5px; font-size:16px; line-height: 24px;">
                                        
                                    </p>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>
                            </tr>
                            <?php  $skills =  explode(',',$resume->skills); 
                                            if(!empty($skills)) { ?>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                    <h4 style="margin: 5px 0px 10px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;">Skills</h4> 
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; vertical-align: top;">                                       
                                <?php foreach ($skills as $ski){ if($ski!='') { ?>
                                    <span class="skill-color" style="display: inline-block; padding: 5px 15px; background:<?php echo $resume->res_color; ?>; margin-right: 5px; margin-bottom: 10px; color:#FFFFFF; border-radius:3px; font-size:16px; line-height: 24px;"><?php echo $ski; ?></span>
                                                <?php } } ?>
                                </td>
                            </tr>
                                            <?php } ?>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                    <h4 style="margin: 5px 0px 10px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Area of Expertise<h4> 
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; vertical-align: top;">  <li><?php echo $resume->expertise; ?></li> </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>
                            </tr>
                            <?php if($resume->company_exp>0){  ?> 
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                    <h4 style="margin: 15px 0px 10px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Experience</h4> 
                                </td>
                            </tr>
                            <?php foreach($work_exp as $w_exp){ if($w_exp['company']!='') { ?>
                            <tr>
                                <td style="padding: 0px 5px; vertical-align: top;">  
                                    <p style="margin:0px 0px 5px; font-size:16px; line-height: 24px;">
                                        <strong><?php echo $w_exp['company']; ?></strong> | <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?> - <?php echo isset($w_exp['exp_t_date']) ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?>
                                    </p> 
                                    <p style="margin:0px 0px 5px; font-size:16px; line-height: 24px;">
                                        <strong><?php echo $w_exp['job_title']; ?></strong>
                                    </p> 
                                    <p style="margin:0px 0px 25px; font-size:16px; line-height: 24px;">
                                        <strong>Roles and Responsibilities</strong><br>
                                        <?php echo $w_exp['w_description']; ?> 
                                    </p>
                                </td>
                            </tr>                           
                            <?php } } } ?>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>
                            </tr>
                            <?php if(!empty($achievements)) { ?>
                            <tr>
                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                    <h4 style="margin: 15px 0px 10px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Key Achievements</h4> 
                                </td>
                            </tr>
                            <tr>
                                <td style="padding: 0px 5px; vertical-align: top;"> 
                                    <ul style="margin-top: 0px; font-size:16px; line-height: 24px; padding-left:20px;">
                                    <?php foreach ($achievements as $achi){ ?>
                                                    <li><?php echo $achi; ?></li>
                                                    <?php } ?>
                                    </ul>
                                </td>
                            </tr>
                            <?php } ?>
                        </table>

                        
                    </td>
                </tr>
            </table>
        </td>
    </tr> 
    <tr><td style="height: 10px; background-color: #FFFFFF;"></td></tr> 
</table>