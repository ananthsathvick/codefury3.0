<div class="content-area5 dashboard-content">

    <div class="dashboard-header clearfix">

        <div class="">


            <div class="row">


                <div class="col-lg-8 offset-lg-2">

                    <div class="select-template">

                        <table style="width:100%; padding:0px; margin:0px auto; border-collapse:collapse; border-spacing:0px; background:#f7f7f7; vertical-align:top; border:1px solid #f0f0f0; box-shadow:0px 0px 5px rgba(0,0,0,0.7); height:432px; font-size:16px; line-height: 16px;">


                            <tr>

                                <td style="padding: 0px; margin:0px; border:none;">

                                    <table style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">

                                        <tr>
                                            <td colspan="3" style="text-align:center;">
                                            <h4 style="margin: 15px 0px 5px; color: <?php echo $resume->res_color; ?>;  font-size: 80%; line-height: 90%;" class="h-color"><?php echo $resume->name; ?></h4></td>
                                        </tr>

                                        <tr>

                                            <td style="width:30%; padding: 0px 5px; background-color: #FFFFFF; vertical-align: top; font-size:14px; text-align:left;">

                                                <h4 style="margin: 15px 0px 5px; color: <?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600; font-size: 80%; line-height: 90%;"
                                                    class="h-color">Personal Information</h4>

                                                <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                    <strong>Email :</strong> <?php echo $resume->email; ?>

                                                </p>

                                                <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                    <strong>Mobile Number :</strong> <?php echo $resume->phone; ?>

                                                </p>
                                                <?php if ($resume->mobile != '') { ?>
                                                   <!-- <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                        <strong>Contact Number :</strong> <?php /*echo $resume->mobile; */?>

                                                    </p>-->
                                                <?php } ?>
                                                <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                    <strong>Address :</strong><?php echo $resume->address; ?>
                                                    <br> <?php echo $resume->city; ?> <?php //echo $resume->pincode; ?>.
                                                    <br> <?php echo $resume->state; ?>
                                                </p>

                                                <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                    <strong>Languages :</strong> <?php echo $resume->languages; ?>.

                                                </p>

                                                <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                    <strong>Gender
                                                        :</strong> <?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?>
                                                    .

                                                </p>

                                                <?php if ($resume->passport_no != '') { ?>

                                                    <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                        <strong>Passport No
                                                            :</strong> <?php echo $resume->passport_no; ?>.

                                                    </p>

                                                <?php } ?>

                                                <h4 style="margin: 15px 0px 5px;color: <?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                    class="h-color">Education</h4>

                                                <?php foreach ($education as $edu) {

                                                    if ($edu['institute'] != '') { ?>

                                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">

                                                            <strong><?php echo $edu['degree']; ?> </strong> <br>

                                                            <strong><?php echo $edu['branch']; ?> </strong> <br>

                                                            <!--<span><?php /*echo date('M Y', strtotime($edu['edu_f_date'])); */?> - <?php /*echo date('M Y', strtotime($edu['edu_t_date'])); */?> </span>-->
                                                            <span><?php echo $edu['edu_f_date'].' - ' .$edu['edu_t_date']; ?> </span>
                                                            <br>

                                                            <strong><?php echo $edu['institute']; ?></strong>

                                                        </p>

                                                    <?php }

                                                } ?>

                                                <?php if (!empty($awards)) { ?>

                                                    <h4 style="margin: 15px 0px 5px;color: <?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                        class="h-color">Certifications / Awards</h4>

                                                    <ul style="margin-top: 0px; font-size: 65%; line-height: 110%; padding-left:20px; list-style-type:disc;">

                                                        <?php foreach ($awards as $awr) { ?>

                                                            <li><?php echo $awr ?></li>

                                                        <?php } ?>

                                                    </ul>

                                                <?php } ?>

                                                <?php /*if ($resume->hobbies != '' && $resume->company_exp >= 2) { */?><!--

                                                    <h4 style="margin: 15px 0px 5px; color: <?php /*echo $resume->res_color; */?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                        class="h-color">Hobbies</h4>

                                                    <p style="margin:0px 0px 15; font-size: 65%; line-height: 110%;">

                                                        <?php /*echo $resume->hobbies; */?>

                                                    </p>

                                                --><?php /*} */?>


                                            </td>


                                            <td style="border-right: 1px solid #000000; padding:0px; margin:0px;"></td>

                                            <td style="vertical-align: top;">

                                                <table style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">

                                                    <tr>

                                                        <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                            <h4 style="margin: 15px 0px 5px; color: <?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                class="h-color">Objectives</h4>

                                                            <p style="margin:0px 0px 15; font-size: 65%; line-height: 110%;">

                                                                <?php echo $resume->objectives; ?>

                                                            </p>

                                                        </td>

                                                    </tr>

                                                    <?php $skills = explode(',', $resume->skills);

                                                    if (!empty($skills)) { ?>

                                                        <tr>

                                                            <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                                <h4 style="margin: 5px 0px 5px; color:<?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                    class="h-color">Skills</h4>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td style="padding: 0px 5px; vertical-align: top;">

                                                                <?php foreach ($skills as $ski) { ?>

                                                                    <span class="skill-color"
                                                                          style="display: inline-block; padding: 5px 15px; background:<?php echo $resume->res_color; ?>; margin-right: 5px; margin-bottom: 10px; color:#FFFFFF; border-radius:3px; font-size: 65%; line-height: 110%;"><?php echo $ski; ?></span>

                                                                <?php } ?>

                                                            </td>

                                                        </tr>

                                                    <?php } ?>

                                                    <?php //$expert =  explode(',',$resume->expertise);

                                                    //if(!empty($expert)) { ?>

                                                    <tr>

                                                        <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                            <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                class="h-color">Area of Expertise</h4>

                                                        </td>

                                                    </tr>

                                                    <tr>

                                                        <td style="padding: 0px 5px; vertical-align: top;">

                                                            <ul style="margin-top: 0px; font-size: 65%; line-height: 110%; padding-left:20px; list-style-type:disc;">

                                                                <?php //foreach ($expert as $experti){ ?>

                                                                <li><?php echo $resume->expertise; ?></li>

                                                                <?php //} ?>

                                                            </ul>

                                                        </td>

                                                    </tr>

                                                    <?php //} ?>

                                                    <?php if ($resume->company_exp > 0) { ?>

                                                        <tr>

                                                            <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                                <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                    class="h-color">Experience</h4>

                                                            </td>

                                                        </tr>

                                                        <?php foreach ($work_exp as $w_exp) {
                                                            if ($w_exp['company'] != '') { ?>

                                                                <tr>

                                                                    <td style="padding: 0px 5px; vertical-align: top;">

                                                                        <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">

                                                                            <strong class="h-color"><?php echo $w_exp['company']; ?></strong>
                                                                            | <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
                                                                            - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] !="" ) ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?>

                                                                        </p>

                                                                        <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">

                                                                            <strong><?php echo $w_exp['job_title']; ?></strong>

                                                                        </p>

                                                                        <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">

                                                                            <strong>Roles and
                                                                                Responsibilities</strong><br>

                                                                            <?php echo $w_exp['w_description']; ?>

                                                                        </p>

                                                                    </td>

                                                                </tr>

                                                            <?php }
                                                        }
                                                    } else { ?>

                                                        <tr>

                                                            <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                                <h4 style="margin: 15px 0px 5px; color:<?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                    class="h-color">College Project</h4>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td style="padding: 0px 5px; vertical-align: top;">

                                                                <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">

                                                                    <strong><?php echo $resume->cp_title; ?></strong>

                                                                </p>

                                                                <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">

                                                                    <strong>Project Details</strong><br>

                                                                    <?php echo $resume->cp_description; ?>

                                                                </p>

                                                            </td>

                                                        </tr>

                                                    <?php } ?>



                                                    <?php if (!empty($achievements)) { ?>

                                                        <tr>

                                                            <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                                <h4 style="margin: 15px 0px 5px; color: <?php echo $resume->res_color; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                    class="h-color">Key Achivements</h4>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td style="padding: 0px 5px; vertical-align: top;">

                                                                <ul style="margin-top: 0px; font-size: 65%; line-height: 110%; padding-left:20px; list-style-type:disc;">

                                                                    <?php foreach ($achievements as $achi) { ?>

                                                                        <li><?php echo $achi; ?></li>

                                                                    <?php } ?>

                                                                </ul>

                                                            </td>

                                                        </tr>

                                                    <?php } ?>



                                                   <!-- <?php /*if ($resume->hobbies != '' && $resume->company_exp < 2) { */?>

                                                        <tr>

                                                            <td style="padding: 0px 5px; text-align: left; vertical-align: top;">

                                                                <h4 style="margin: 15px 0px 5px; color:<?php /*echo $resume->res_color; */?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;"
                                                                    class="h-color">Hobbies</h4>

                                                            </td>

                                                        </tr>

                                                        <tr>

                                                            <td style="padding: 0px 5px; vertical-align: top;">

                                                                <ul style="margin-top: 0px; font-size: 65%; line-height: 110%; padding-left:20px; list-style-type:disc;">

                                                                    <li><?php /*echo $resume->hobbies; */?></li>

                                                                </ul>

                                                            </td>

                                                        </tr>

                                                    --><?php /*} */?>

                                                </table>

                                            </td>

                                        </tr>

                                    </table>

                                </td>

                            </tr>

                            <tr>

                                <td style="height: 10px; background-color: #FFFFFF;"></td>

                            </tr>

                            <tr>

                                <td style="height: 10px; padding:10px; background-color: #FFFFFF; text-align:right; font-size:12px;">
                                    Powered by <b>Code Headed</b></td>

                            </tr>

                        </table>


                    </div>

                </div>

                <?php if (!isset($adm_login)) { ?>

                    <div class="col-lg-8 offset-lg-2 mt-3">

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group">

                                    <label> <input type="checkbox" value='1' required checked="1"> Accept our Terms &
                                        conditions</label>

                                </div>

                            </div>

                        </div>

                        <div class="row">

                            <div class="col-sm-6">

                                <div class="form-group">

                                    <a href="<?php echo site_url('secure/create_resume?clr=' . $resume->color_id); ?>"
                                       class="btn btn-md button-default">Back</a>

                                </div>

                            </div>

                            <div class="col-sm-6">

                                <div class="form- text-right">
                                    <?php $user = $this->db->where('id', $this->user['id'])->get('users')->row();
                                    if (config_item('enable_payment')) {
                                        if ($user->payment_status == 1 && (date('Y-m-d', strtotime($user->expiry_date)) > date('Y-m-d'))) {
                                            ?>
                                            <a href="<?php echo site_url('/secure/my_account'); ?>"
                                               class="btn btn-md button-theme">Submit</a>
                                        <?php } else { ?>
                                            <a href="<?php echo site_url('/secure/payment'); ?>"
                                               class="btn btn-md button-theme">Pay now</a>
                                        <?php }
                                    } else {
                                        ?>
                                        <a href="<?php echo site_url('/secure/my_account'); ?>"
                                           class="btn btn-md button-theme">Submit</a>
                                    <?php } ?>

                                </div>

                            </div>

                        </div>

                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>
</div>