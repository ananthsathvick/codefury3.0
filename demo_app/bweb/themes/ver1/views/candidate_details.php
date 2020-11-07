<table style="width:900px; padding:0px; margin:0px auto; border-collapse:collapse; border-spacing:0px; background:#f7f7f7; vertical-align:top; font-family: Arial, Helvetica, sans-serif;  font-size:16px; line-height: 24px;" id="example">
        <td style="padding: 0px; margin:0px; border:none;">

            <table  style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">

				<tr>

					<td colspan="5" style="padding: 0px; margin:0px; border:none; background-color: #FFFFFF; text-align:center;"><h1><?php echo $resume->name; ?></h1></td></tr>

				

                <tr>

                    <td style="width:300px; padding: 0px 5px; background-color: #FFFFFF; vertical-align: top; font-size:16px; text-align:left;">

						                     

                        <h4 style="margin: 15px 0px 5px;  color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Personal Information</h4> 

                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                            <strong>Email :</strong> <?php echo $resume->email; ?>

                        </p>

                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                            <strong>Mobile Number :</strong> <?php echo $resume->phone; ?>

                        </p>

                        <!--<p style="margin:0px 0px 10px; font-size:<?php /*echo $font_size; */?>; line-height: <?php /*echo $line_height; */?>;">

                            <strong>Contact Number :</strong> <?php /*echo $resume->mobile; */?>

                        </p>-->

                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                            <strong>Address :</strong><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?> – <?php echo $resume->pincode; ?><br><?php echo $resume->state; ?>.                             

                        </p>

                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                            <strong>Languages :</strong><?php echo $resume->languages; ?>.

                        </p>

                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                            <strong>Gender :</strong> <?php echo $resume->gender==1 ? 'Male':'Female'; ?>.

                                        </p>

                                        <?php if($resume->passport_no!=''){ ?>

                                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                            <strong>Passport No :</strong> <?php echo $resume->passport_no; ?>.

                                        </p>

                                        <?php } ?>

                        <h4 style="margin: 15px 0px 5px;  color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Education</h4>                        

                        <?php foreach($education as $edu){

                            if ($edu['institute']!='') { ?>

                        <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                            <strong><?php echo $edu['degree']; ?> </strong> <br>

                            <strong><?php echo $edu['branch']; ?> </strong> <br>

                            <span><?php echo date('M Y', strtotime($edu['edu_f_date'])); ?> - <?php echo date('M Y', strtotime($edu['edu_t_date'])); ?> </span> <br>

                            <strong><?php echo $edu['institute']; ?></strong>                            

                        </p>

                         <?php }

                        } ?>

                        

                        <?php if(!empty($awards)){ ?>

                        <h4 style="margin: 15px 0px 5px;color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Certifications / Awards</h4>

                        <ul style="margin-top: 0px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>; padding-left:20px;">

                        <?php foreach($awards as $awr){ ?>

                            <li><?php echo $awr ?></li>

                            <?php } ?>

                        </ul>

                        <?php } ?>

                        <?php /*if($resume->hobbies!='' && $resume->company_exp>=2){ */?><!--

						<h4 style="margin: 15px 0px 5px;color:<?php /*echo $resume->res_color; */?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Hobbies</h4>

                        <ul style="margin-top: 0px; font-size:<?php /*echo $font_size; */?>; line-height: <?php /*echo $line_height; */?>; padding-left:20px;">

                            <li><?php /*echo $resume->hobbies; */?></li>

                        </ul>  

                        --><?php /*} */?>

                    </td>

                    <td style=" padding:0px; margin:0px; width:25px"></td>

                    <td width="1" style="border-right:2px solid #000000; padding:0px; margin:0px; width:1px"></td>

                    <td style=" padding:0px; margin:0px; width:24px"></td>

                    <td style="vertical-align: top; width:550px;">

                        <table  style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                    <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Objective</h4> 

                                    <p style="margin:0px 0px 15px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                    <?php echo $resume->objectives; ?>

                                </p>

                                </td>

                            </tr>

                            <tr>

                                <td style="padding: 0px 5px; vertical-align: top;">  

                                    <p style="margin:0px 0px 5px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                        

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

                                    <h4 style="margin: 5px 0px 5px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;">Skills</h4> 

                                </td>

                            </tr>

                            <tr>

                                <td style="padding: 0px 5px; vertical-align: top;"> 

                                <?php foreach ($skills as $ski){ if($ski!='') { ?>                                      

                               <span class="skill-color" style="display: inline-block; padding: 5px 15px; background:<?php echo $resume->res_color; ?>; margin-right: 5px; margin-bottom: 10px; color:#FFFFFF; border-radius:3px; font-size: 16px; line-height: 24px;"><?php echo $ski; ?></span>

                                <?php } } ?>

                                </td>

                            </tr>

                              

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>

                            </tr>

                                            <?php } ?> 



                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                    <h4 style="margin: 5px 0px 5px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Area of Expertise</h4> 

                                </td>

                            </tr>

                            

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>

                            </tr>

                           <tr>

                                <td style="padding: 0px 5px; vertical-align: top; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">                                       

                                <?php echo $resume->expertise; ?>

                            </td>

                            </tr>



                            <?php if($resume->company_exp>0){  ?> 

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                    <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Experience</h4> 

                                </td>

                            </tr>

                            <?php foreach($work_exp as $w_exp){ if($w_exp['company']!='') { ?>

                            <tr>

                                <td style="padding: 0px 5px; vertical-align: top;">  

                                    <p style="margin:0px 0px 5px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                    <strong><?php echo $w_exp['company']; ?></strong> | <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?> - <?php echo isset($w_exp['exp_t_date']) ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?>

                                    </p> 

                                    <p style="margin:0px 0px 5px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                    <strong><?php echo $w_exp['job_title']; ?></strong>

                                    </p> 

                                    <p style="margin:0px 0px 25px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                        <strong>Roles and Responsibilities</strong><br>

                                        <?php echo $w_exp['w_description']; ?>

                                    </p>

                                </td>

                            </tr>  



                            <?php } } } else { ?>

                                <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                    <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:28px; line-height: 28px;" >College Project</h4> 

                                </td>

                             </tr>

                                <tr>

                                <td style="padding: 0px 5px; vertical-align: top;">  

                                    <p style="margin:0px 0px 5px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                        <strong><?php echo $resume->cp_title; ?></strong>

                                    </p> 

                                    <p style="margin:0px 0px 25px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                        <strong>Project Details</strong><br>

                                        <?php echo  $resume->cp_description; ?> 

                                    </p>

                                </td>

                            </tr>    

                            <?php } ?>				

                            

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>

                            </tr>

                            

                            <?php if(!empty($achievements)) { ?>

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                    <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Key Achievements</h4> 

                                </td>

                            </tr>

                            <tr>

                                <td style="padding: 0px 5px; vertical-align: top;"> 

                                    <ul style="margin-top: 0px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>; padding-left:20px;">

                                    <?php foreach ($achievements as $achi){ ?>

                                                    <li><?php echo $achi; ?></li>

                                                    <?php } ?>

                                    </ul>

                                </td>

                            </tr>

                            <?php } ?>

                            

                            <?php /*if($resume->hobbies!='' && $resume->company_exp<2){ */?><!--

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                    <h4 style="margin: 5px 0px 5px; color:<?php /*echo $resume->res_color; */?>; font-weight: 900;  font-size:24px; line-height: 24px;" >Area of Expertise</h4>

                                </td>

                            </tr>

                            

                            <tr>

                                <td style="padding: 0px 5px; text-align: left; vertical-align: top; height:10px;"> </td>

                            </tr>

                           <tr>

                                <td style="padding: 0px 5px; vertical-align: top; font-size:<?php /*echo $font_size; */?>; line-height: <?php /*echo $line_height; */?>;">

                                <?php /*echo $resume->hobbies; */?>

                            </td>

                            </tr>

                            <?php /*} */?>  -->

                        </table>                        

                    </td>

                </tr>

            </table>

        </td>

    </tr> 

    <tr><td style="height: 10px; background-color: #FFFFFF;"></td></tr> 
    <tr><td style="text-align:right;  background-color: #FFFFFF; font-size:16px; color:#000000;">Powered by Code Headed</td></tr>
    <tr><td style="height: 10px; background-color: #FFFFFF;"></td></tr>

</table>