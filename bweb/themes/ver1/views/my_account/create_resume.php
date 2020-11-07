<?php $edu_count = !empty($resume['education']) ? count($resume['education']):1; ?>

<?php $achv_count = !empty($resume['achievements']) ? count($resume['achievements']):1; ?>

<?php $awards_count = !empty($resume['awards']) ? count($resume['awards']):1; 
 $user_header =  $this->session->userdata('user');
$check_res = $this->db->where('user_id',$user_header['id'])->get('resume')->row(); ?>

<div class="content-area5 dashboard-content">

    <div class="dashboard-header clearfix">

        <div class="row create-resume">

            <div class="col-lg-12">

                <nav>

                    <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">

                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</a>

                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profession Info</a>

                        <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Education</a>

                        <a class="nav-item nav-link" id="nav-profile1-tab" data-toggle="tab" href="#nav-profile1" role="tab" aria-controls="nav-profile1" aria-selected="false">Skills</a>

                        <a class="nav-item nav-link" id="nav-contact1-tab" data-toggle="tab" href="#nav-contact1" role="tab" aria-controls="nav-contact1" aria-selected="false">Additional Information</a>

                    </div>

                </nav>

                <div class="tab-content" id="nav-tabContent">

                    <div class="row">

                        <div class="col-lg-7 p-4  submit-address">

                            <form name="ResumeForm" action="<?php echo site_url('secure/resform'); ?>" method="post" id="resForm" onsubmit="return form_submit('resForm')">

                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">

                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Name <sup class="text-danger">*</sup><span class ="text-danger">(You can only edit once)</span></label>

                                                <input type="text"  maxlength="24" <?php if($check_res) echo"readonly"; ?> class="input-text" name="name" id="name" value="<?php echo set_value('name',$resume['name']); ?>" onkeyup="onkup('v_name',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Email id <sup class="text-danger">*</sup><span class ="text-danger">(You can only edit once)</span></label>

                                                <input type="text" <?php if($check_res) echo"readonly"; ?> maxlength="100" class="input-text" name="email" id="email" ng-pattern="/^([6-9]{1}[0-9]{9}|[^\s@]+@[^\s@]+\.[^\s@]{2,})$/" value="<?php echo set_value('email',$resume['email']); ?>" onkeyup="onkup('v_email',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Phone Number  <sup class="text-danger">*</sup></label>

                                                <input type="text" maxlength="10" class="input-text" name="phone" id="phone" value="<?php echo set_value('phone',$resume['phone']); ?>" onkeyup="onkup('v_phone',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Alternate Phone Number</label>

                                                <input type="text" maxlength="10" class="input-text" name="mobile" id="mobile" value="<?php echo set_value('mobile',$resume['mobile']); ?>" onkeyup="onkup('v_mobile',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Gender</label>

                                                <?php $arr= array('Male'=>'Male','Female'=>'Female');

                                                echo form_dropdown('gender',$arr,set_value('gender',$resume['gender']),'class="input-text" id="gender" onchange="onkup(\'v_gender\',this.value)"'); ?>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Passport Number</label>

                                                <input type="text" class="input-text" name="passport_no" id="passport_no" value="<?php echo set_value('passport_no',$resume['passport_no']); ?>" onkeyup="onkup('v_passport_no',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Industry</label>

                                                <?php echo form_dropdown('industry',$industries,set_value('industry',$resume['industry_id']),'class="input-text"'); ?>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <label>Total Years Of Experience</label>

                                                <input type="text" maxlength="10" class="input-text" name="tot_experience" value="<?php echo set_value('tot_experience',$resume['tot_experience']); ?>">

                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <label>Objectives (Max 200 Characters)</label>

                                                <input type="text" maxlength="200" class="input-text" name="objectives" id="objectives" value="<?php echo set_value('objectives',$resume['objectives']); ?>" onkeyup="onkup('v_objectives',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <label>Languages your are fluent with (Max Length : 30) <sup class="text-danger">*</sup></label>

                                                <input type="text" maxlength="30" class="input-text" name="languages" id="languages" value="<?php echo set_value('languages',$resume['languages']); ?>" onkeyup="onkup('v_languages',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <label>Address (Max Length : 250) <sup class="text-danger">*</sup></label>

                                                <input type="text" maxlength="250" class="input-text" name="address" id="address" value="<?php echo set_value('address',$resume['address']); ?>" onkeyup="onkup('v_address',this.value)">

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">
                                                <label>State <sup class="text-danger">*</sup></label>
                                                <?php
                                                $st_arr= array(""=>"Select State", "Andaman & Nicobar"=>"Andaman & Nicobar", "Andhra Pradesh"=>"Andhra Pradesh", "Arunachal Pradesh"=>"Arunachal Pradesh", "Assam"=>"Assam", "Bihar"=>"Bihar", "Chandigarh", "Chhattisgarh"=>"Chhattisgarh", "Dadra & Nagar Haveli"=>"Dadra & Nagar Haveli", "Daman & Diu"=>"Daman & Diu", "Delhi"=>"Delhi", "Goa"=>"Goa", "Gujarat"=>"Gujarat", "Haryana"=>"Haryana", "Himachal Pradesh"=>"Himachal Pradesh", "Jammu & Kashmir"=>"Jammu & Kashmir", "Jharkhand"=>"Jharkhand", "Karnataka"=>"Karnataka", "Kerala"=>"Kerala", "Lakshadweep"=>"Lakshadweep", "Madhya Pradesh"=>"Madhya Pradesh", "Maharashtra"=>"Maharashtra", "Manipur"=>"Manipur", "Meghalaya"=>"Meghalaya", "Mizoram"=>"Mizoram", "Nagaland"=>"Nagaland", "Orissa"=>"Orissa", "Pondicherry"=>"Pondicherry", "Punjab"=>"Punjab", "Rajasthan"=>"Rajasthan", "Sikkim"=>"Sikkim", "Tamil Nadu"=>"Tamil Nadu", "Tripura"=>"Tripura", "Uttar Pradesh"=>"Uttar Pradesh", "Uttaranchal"=>"Uttaranchal", "West Bengal"=>"West Bengal");
                                                echo form_dropdown('state', $st_arr,set_value('state',$resume['state']),'class="input-text" id="state" onchange="onkup(\'v_state\',this.value);print_city(\'city\', this.selectedIndex);"'); ?>
                                                <!--<select class="input-text" name="state" id="state" onchange="onkup('v_state',this.value); print_city('city', this.selectedIndex);">-->
                                                
                                                <!--</select>-->
                                                <!--<input type="text" maxlength="30" class="input-text" name="city" id="city" value="<?php //echo set_value('city',$resume['city']); ?>" onkeyup="onkup('v_city',this.value)">-->

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">

                                                <label>City <sup class="text-danger">*</sup></label>

                                                <!-- <input type="text" maxlength="25" class="input-text" name="state" id="state" value="<?php echo set_value('state',$resume['state']); ?>" onkeyup="onkup('v_state',this.value)">-->
                                                <select class="input-text" name="city" id="city" onchange="onkup('v_city',this.value)">
                                                <option value="<?php echo set_value('city',$resume['city']); ?>"><?php echo set_value('city',$resume['city']); ?></option>
                                                </select>

                                            </div>

                                        </div>

                                        <div class="col-md-4">

                                            <div class="form-group">

                                                <!--<label>Zipcode <sup class="text-danger">*</sup></label>-->

                                                <input type="hidden" maxlength="6" class="input-text" name="pincode" id="pincode" value="<?php echo set_value('pincode',$resume['pincode']); ?>" onkeyup="onkup('v_pincode',this.value)">
                                                <input type="hidden" class="input-text" name="tmp_id" id="tmp_id" value="<?php echo set_value('tmp_id',$tmp_id); ?>">

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <!-- <a href="step2.php" class="btn btn-md button-default">Back</a> -->

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form- text-right">

                                                <a href="javascript:;" onclick="$('#nav-profile-tab').click()" class="btn btn-md button-theme">Next : Work History</a>

                                                <!-- <a href="step2.php" class="btn btn-md button-theme">Next : Work History</a> -->

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group row">

                                                <label class="col-md-6">Number of Companies you have worked <sup class="text-danger">*</sup> (Max 4 companies)</label>

                                                <select class="input-text col-md-4" name="company_exp" id="company_exp" onchange="show_cmpexp_div()">

                                                    <option value="0">0</option>

                                                    <option value="1" <?php echo ($resume['company_exp']==1) ? 'selected':''; ?>>1</option>

                                                    <option value="2" <?php echo ($resume['company_exp']==2) ? 'selected':''; ?>>2</option>

                                                    <option value="3" <?php echo ($resume['company_exp']==3) ? 'selected':''; ?>>3</option>

                                                    <option value="4" <?php echo ($resume['company_exp']==4) ? 'selected':''; ?>>4</option>

                                                    <!--<option value="5" <?php /*echo ($resume['company_exp']==5) ? 'selected':''; */?>>5</option>-->

                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <fieldset class="company_exp_div">

                                        <legend>College Project</legend>

                                        <div class="row">

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Project Title <sup class="text-danger">*</sup>(Maximum 70 Characters)</label>

                                                    <input type="text" maxlength="70" class="input-text" name="cp_title" id="cp_title" value="<?php echo set_value('cp_tile',isset($resume['cp_title']) ? $resume['cp_title']:''); ?>" onkeyup="onkup('v_cp_title',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Project Details<sup class="text-danger">*</sup>(Maximum 500 Characters)</label>

                                                    <textarea  rows = "10" class="input-text" maxlength="500" name="cp_description" id="cp_description" onkeyup="onkup('v_cp_description',this.value)"><?php echo set_value('cp_description',$resume['cp_description']); ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>

                                    <fieldset class="company_exp_div1">

                                        <legend>Current Company</legend>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Job Title (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[1][job_title]" id="jt_1" value="<?php echo set_value('work_exp[1][job_title]',isset($resume['work_exp'][1]['job_title']) ? $resume['work_exp'][1]['job_title']:''); ?>" onkeyup="onkup('v_jt_1',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Company Name (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[1][company]" id="cmp_1" value="<?php echo set_value('work_exp[1][company]',isset($resume['work_exp'][1]['company']) ? $resume['work_exp'][1]['company']:''); ?>" onkeyup="onkup('v_cmp_1',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Start Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[1][exp_f_date]" id="exp_f_date_1" value="<?php echo set_value('work_exp[1][exp_f_date]',isset($resume['work_exp'][1]['exp_f_date']) ? $resume['work_exp'][1]['exp_f_date']:''); ?>" onclick="onkup('v_exp_f_date_1',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>End Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[1][exp_t_date]" id="exp_t_date_1" value="<?php echo set_value('work_exp[1][exp_t_date]',isset($resume['work_exp'][1]['exp_t_date']) ? $resume['work_exp'][1]['exp_t_date']:''); ?>" onclick="onkup('v_exp_t_date_1',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Roles and Responsibilities (Max Length : 190)<sup class="text-danger">*</sup></label>

                                                    <textarea class="input-text" maxlength="190" name="work_exp[1][w_description]" id="w_description_1" onkeyup="onkup('v_w_description_1',this.value)"><?php echo set_value('work_exp[1][w_description]',isset($resume['work_exp'][1]['w_description']) ? $resume['work_exp'][1]['w_description']:''); ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>



                                    <fieldset class="company_exp_div2">

                                        <legend>Company 2</legend>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Job Title (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[2][job_title]" id="jt_2" value="<?php echo set_value('work_exp[2][job_title]',isset($resume['work_exp'][2]['job_title']) ? $resume['work_exp'][2]['job_title']:''); ?>" onkeyup="onkup('v_jt_2',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Company Name (Max Length : 30) <sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[2][company]" id="cmp_2" value="<?php echo set_value('work_exp[2][company]',isset($resume['work_exp'][2]['company']) ? $resume['work_exp'][2]['company']:''); ?>" onkeyup="onkup('v_cmp_2',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Start Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[2][exp_f_date]" id="exp_f_date_2" value="<?php echo set_value('work_exp[2][exp_f_date]',isset($resume['work_exp'][2]['exp_f_date']) ? $resume['work_exp'][2]['exp_f_date']:''); ?>" onclick="onkup('v_exp_f_date_2',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>End Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[2][exp_t_date]" id="exp_t_date_2" value="<?php echo set_value('work_exp[2][exp_t_date]',isset($resume['work_exp'][2]['exp_t_date']) ? $resume['work_exp'][2]['exp_t_date']:''); ?>" onclick="onkup('v_exp_t_date_2',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Roles and Responsibilities (Max Length : 190)<sup class="text-danger">*</sup></label>

                                                    <textarea class="input-text" maxlength="190" name="work_exp[2][w_description]" id="w_description_2" onkeyup="onkup('v_w_description_2',this.value)"><?php echo set_value('work_exp[2][w_description]',isset($resume['work_exp'][2]['w_description']) ? $resume['work_exp'][2]['w_description']:''); ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>



                                    <fieldset class="company_exp_div3">

                                        <legend>Company 3</legend>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Job Title (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[3][job_title]" id="jt_3" value="<?php echo set_value('work_exp[3][job_title]',isset($resume['work_exp'][3]['job_title']) ? $resume['work_exp'][3]['job_title']:''); ?>" onkeyup="onkup('v_jt_3',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Company Name (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[3][company]" id="cmp_3" value="<?php echo set_value('work_exp[3][company]',isset($resume['work_exp'][3]['company']) ? $resume['work_exp'][3]['company']:''); ?>" onkeyup="onkup('v_cmp_3',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Start Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[3][exp_f_date]" id="exp_f_date_3" value="<?php echo set_value('work_exp[3][exp_f_date]',isset($resume['work_exp'][3]['exp_f_date']) ? $resume['work_exp'][3]['exp_f_date']:''); ?>" onclick="onkup('v_exp_f_date_3',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>End Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[3][exp_t_date]" id="exp_t_date_3" value="<?php echo set_value('work_exp[3][exp_t_date]',isset($resume['work_exp'][3]['exp_t_date']) ? $resume['work_exp'][3]['exp_t_date']:''); ?>" onclick="onkup('v_exp_t_date_3',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Roles and Responsibilities (Max Length : 190)<sup class="text-danger">*</sup></label>

                                                    <textarea class="input-text" maxlength="190" name="work_exp[3][w_description]" id="w_description_3" onkeyup="onkup('v_w_description_3',this.value)"><?php echo set_value('work_exp[3][w_description]',isset($resume['work_exp'][3]['w_description']) ? $resume['work_exp'][3]['w_description']:''); ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>



                                    <fieldset class="company_exp_div4">

                                        <legend>Company 4</legend>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Job Title (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[4][job_title]" id="jt_4" value="<?php echo set_value('work_exp[4][job_title]',isset($resume['work_exp'][4]['job_title']) ? $resume['work_exp'][4]['job_title']:''); ?>" onkeyup="onkup('v_jt_4',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Company Name (Max Length : 30)<sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[4][company]" id="cmp_4" value="<?php echo set_value('work_exp[4][company]',isset($resume['work_exp'][4]['company']) ? $resume['work_exp'][4]['company']:''); ?>" onkeyup="onkup('v_cmp_4',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Start Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[4][exp_f_date]" id="exp_f_date_4" value="<?php echo set_value('work_exp[4][exp_f_date]',isset($resume['work_exp'][4]['exp_f_date']) ? $resume['work_exp'][4]['exp_f_date']:''); ?>" onclick="onkup('v_exp_f_date_4',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>End Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[4][exp_t_date]" id="exp_t_date_4" value="<?php echo set_value('work_exp[4][exp_t_date]',isset($resume['work_exp'][4]['exp_t_date']) ? $resume['work_exp'][4]['exp_t_date']:''); ?>" onclick="onkup('v_exp_t_date_4',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Roles and Responsibilities (Max Length : 190)<sup class="text-danger">*</sup></label>

                                                    <textarea class="input-text" maxlength="190" name="work_exp[4][w_description]" id="w_description_4" onkeyup="onkup('v_w_description_4',this.value)"><?php echo set_value('work_exp[4][w_description]',isset($resume['work_exp'][4]['w_description']) ? $resume['work_exp'][4]['w_description']:''); ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>



                                    <fieldset class="company_exp_div5">

                                        <legend>Company 5</legend>

                                        <div class="row">

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Job Title <sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[5][job_title]" id="jt_5" value="<?php echo set_value('work_exp[5][job_title]',isset($resume['work_exp'][5]['job_title']) ? $resume['work_exp'][5]['job_title']:''); ?>" onkeyup="onkup('v_jt_5',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Company Name <sup class="text-danger">*</sup></label>

                                                    <input type="text" maxlength="30" class="input-text" name="work_exp[5][company]" id="cmp_5" value="<?php echo set_value('work_exp[5][company]',isset($resume['work_exp'][5]['company']) ? $resume['work_exp'][5]['company']:''); ?>" onkeyup="onkup('v_cmp_5',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>Start Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[5][exp_f_date]" id="exp_f_date_5" value="<?php echo set_value('work_exp[5][exp_f_date]',isset($resume['work_exp'][5]['exp_f_date']) ? $resume['work_exp'][5]['exp_f_date']:''); ?>" onclick="onkup('v_exp_f_date_5',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <label>End Date</label>

                                                    <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[5][exp_t_date]" id="exp_t_date_5" value="<?php echo set_value('work_exp[5][exp_t_date]',isset($resume['work_exp'][5]['exp_t_date']) ? $resume['work_exp'][5]['exp_t_date']:''); ?>" onclick="onkup('v_exp_t_date_5',this.value)">

                                                </div>

                                            </div>

                                            <div class="col-md-12">

                                                <div class="form-group">

                                                    <label>Roles and Responsibilities<sup class="text-danger">*</sup></label>

                                                    <textarea class="input-text" maxlength="190" name="work_exp[5][w_description]" id="w_description_5" onkeyup="onkup('v_w_description_5',this.value)"><?php echo set_value('work_exp[5][w_description]',isset($resume['work_exp'][5]['w_description']) ? $resume['work_exp'][5]['w_description']:''); ?></textarea>

                                                </div>

                                            </div>

                                        </div>

                                    </fieldset>



                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <a href="javascript:;" onclick="$('#nav-home-tab').click()" class="btn btn-md button-default">Back</a>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form- text-right">

                                                <a href="javascript:;" onclick="$('#nav-contact-tab').click()" class="btn btn-md button-theme">Next : Education</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>



                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group row">

                                                <label class="col-md-6">Level Of Education <sup class="text-danger">*</sup> (Max 2 Level)</label>

                                                <select class="input-text col-md-4" name="edu_level" id="edu_level" onchange="show_edu_div()">

                                                    <option value="1" <?php echo ($resume['edu_level']==1) ? 'selected':''; ?>>1</option>

                                                    <option value="2" <?php echo ($resume['edu_level']==2) ? 'selected':''; ?>>2</option>

                                                   
                                                </select>

                                            </div>

                                        </div>

                                    </div>

                                    <div class="education-sec">

                                        <fieldset class="edu_div1">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <label>College Name (Max Length : 60)</label>

                                                        <input type="text" maxlength="60" class="input-text" name="education[1][institute]" id="inst_1" value="<?php echo set_value('education[1][institute]',isset($resume['education'][1]['institute']) ? $resume['education'][1]['institute']:''); ?>" onkeyup="onkup('v_inst_1',this.value)">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>Degree</label>

                                                        <?php echo form_dropdown('education[1][degree]',config_item('edu_array'),set_value('education[1][degree]',isset($resume['education'][1]['degree']) ? $resume['education'][1]['degree']:''),'class="input-text" id="degree_1" onchange="onkup(\'v_degree_1\',this.value)"'); ?>

                                                    </div>

                                                </div>

                                                <div class="col-md-1 text-centre">

                                                    <label class="in-sec"><span>In</span></label>

                                                </div>

                                                <div class="col-md-5">

                                                    <div class="form-group">

                                                        <label>Branch</label>

                                                        <input type="text" maxlength="45" class="input-text" name="education[1][branch]" id="branch_1" value="<?php echo set_value('education[1][branch]',isset($resume['education'][1]['branch']) ? $resume['education'][1]['branch']:''); ?>" onkeyup="onkup('v_branch_1',this.value)">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>From</label>

                                                        <select class="input-text" name="education[1][edu_f_date]" id="edu_f_date_1" onchange="onkup('v_edu_f_date_1',this.value)">

                                                            <?php for($i=1995; $i<=date('Y'); $i++){ ?>

                                                                <option value="<?php echo $i; ?>" <?php echo (isset($resume['education'][1]['edu_f_date']) && $resume['education'][1]['edu_f_date']==$i) ? 'selected':''; ?>><?php echo $i; ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>To</label>

                                                        <select class="input-text" name="education[1][edu_t_date]" id="edu_t_date_1" onchange="onkup('v_edu_t_date_1',this.value)">

                                                            <?php for($i=1995; $i<=date('Y'); $i++){ ?>

                                                                <option value="<?php echo $i; ?>" <?php echo (isset($resume['education'][1]['edu_t_date']) && $resume['education'][1]['edu_t_date']==$i) ? 'selected':''; ?>><?php echo $i; ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </fieldset>



                                        <fieldset class="edu_div2">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <label>College Name (Max Length : 60)</label>

                                                        <input type="text" maxlength="60" class="input-text" name="education[2][institute]" id="inst_2" value="<?php echo set_value('education[2][institute]',isset($resume['education'][2]['institute']) ? $resume['education'][2]['institute']:''); ?>" onkeyup="onkup('v_inst_2',this.value)">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>Degree</label>

                                                        <?php echo form_dropdown('education[2][degree]',config_item('edu_array'),set_value('education[2][degree]',isset($resume['education'][2]['degree']) ? $resume['education'][2]['degree']:''),'class="input-text" id="degree_2" onchange="onkup(\'v_degree_2\',this.value)"'); ?>

                                                    </div>

                                                </div>

                                                <div class="col-md-1 text-centre">

                                                    <label class="in-sec"><span>In</span></label>

                                                </div>

                                                <div class="col-md-5">

                                                    <div class="form-group">

                                                        <label>Branch</label>

                                                        <input type="text" maxlength="45" class="input-text" name="education[2][branch]" id="branch_2" value="<?php echo set_value('education[2][branch]',isset($resume['education'][2]['branch']) ? $resume['education'][2]['branch']:''); ?>" onkeyup="onkup('v_branch_2',this.value)">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>From</label>

                                                        <select class="input-text" name="education[2][edu_f_date]" id="edu_f_date_2" onchange="onkup('v_edu_f_date_2',this.value)">

                                                            <?php for($i=1995; $i<=date('Y'); $i++){ ?>

                                                                <option value="<?php echo $i; ?>" <?php echo (isset($resume['education'][2]['edu_f_date']) && $resume['education'][2]['edu_f_date']==$i) ? 'selected':''; ?>><?php echo $i; ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>To</label>

                                                        <select class="input-text" name="education[2][edu_t_date]" id="edu_t_date_2" onchange="onkup('v_edu_t_date_2',this.value)">

                                                            <?php for($i=1995; $i<=date('Y'); $i++){ ?>

                                                                <option value="<?php echo $i; ?>" <?php echo (isset($resume['education'][2]['edu_t_date']) && $resume['education'][2]['edu_t_date']==$i) ? 'selected':''; ?>><?php echo $i; ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </fieldset>



                                        <fieldset class="edu_div3">

                                            <div class="row">

                                                <div class="col-md-12">

                                                    <div class="form-group">

                                                        <label>College Name</label>

                                                        <input type="text" class="input-text" name="education[3][institute]" id="inst_3" value="<?php echo set_value('education[3][institute]',isset($resume['education'][3]['institute']) ? $resume['education'][3]['institute']:''); ?>" onkeyup="onkup('v_inst_3',this.value)">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>Degree</label>

                                                        <?php echo form_dropdown('education[3][degree]',config_item('edu_array'),set_value('education[3][degree]',isset($resume['education'][3]['degree']) ? $resume['education'][3]['degree']:''),'class="input-text" id="degree_3" onkeyup="onkup(\'v_degree_3\',this.value)"'); ?>

                                                    </div>

                                                </div>

                                                <div class="col-md-1 text-centre">

                                                    <label class="in-sec"><span>In</span></label>

                                                </div>

                                                <div class="col-md-5">

                                                    <div class="form-group">

                                                        <label>Branch</label>

                                                        <input type="text" class="input-text" name="education[3][branch]" id="branch_3" value="<?php echo set_value('education[3][branch]',isset($resume['education'][3]['branch']) ? $resume['education'][3]['branch']:''); ?>" onkeyup="onkup('v_branch_3',this.value)">

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>From</label>

                                                        <select class="input-text" name="education[3][edu_f_date]" id="edu_f_date_3" onchange="onkup('v_edu_f_date_3',this.value)">

                                                            <?php for($i=1995; $i<=date('Y'); $i++){ ?>

                                                                <option value="<?php echo $i; ?>" <?php echo (isset($resume['education'][3]['edu_f_date']) && $resume['education'][3]['edu_f_date']==$i) ? 'selected':''; ?>><?php echo $i; ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                                <div class="col-md-6">

                                                    <div class="form-group">

                                                        <label>To</label>

                                                        <select class="input-text" name="education[3][edu_t_date]" id="edu_t_date_3" onchange="onkup('v_edu_t_date_3',this.value)">

                                                            <?php for($i=1995; $i<=date('Y'); $i++){ ?>

                                                                <option value="<?php echo $i; ?>" <?php echo (isset($resume['education'][3]['edu_t_date']) && $resume['education'][3]['edu_t_date']==$i) ? 'selected':''; ?>><?php echo $i; ?></option>

                                                            <?php } ?>

                                                        </select>

                                                    </div>

                                                </div>

                                            </div>

                                        </fieldset>

                                    </div>



                                    <div class="row">

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <a href="javascript:;" onclick="$('#nav-profile-tab').click()" class="btn btn-md button-default">Back</a>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form- text-right">

                                                <a href="javascript:;" onclick="$('#nav-profile1-tab').click()" class="btn btn-md button-theme">Next : Skills</a>

                                            </div>

                                        </div>

                                    </div>



                                </div>

                                <div class="tab-pane fade" id="nav-profile1" role="tabpanel" aria-labelledby="nav-profile1-tab">

                                    <div class="row">

                                        <div class="col-md-12">

                                            <div class="form-group">

                                                <label>Enter your Skills (Comma Seperated)</label>

                                                <textarea class="input-text"  maxlength="60" name="skills" id="skills" onkeyup="onkup_skills()"><?php echo set_value('skills',$resume['skills']); ?></textarea>

                                            </div>

                                        </div>

                                        <!-- <div class="col-md-12">

                                            <div class="form-group">

                                                <label>Area of Expertise</label>

                                                <textarea class="input-text" name="expertise" id="expertise" onkeyup="onkup('v_expertise',this.value)"><?php echo set_value('expertise',$resume['expertise']); ?></textarea>

                                            </div>

                                        </div> -->

                                        <div class="col-md-6">

                                            <div class="form-group">

                                                <a href="javascript:;" onclick="$('#nav-contact-tab').click()" class="btn btn-md button-default">Back</a>

                                            </div>

                                        </div>

                                        <div class="col-md-6">

                                            <div class="form- text-right">

                                                <a href="javascript:;" onclick="$('#nav-contact1-tab').click()" class="btn btn-md button-theme">Next : Additional Info</a>

                                            </div>

                                        </div>

                                    </div>

                                </div>

                                <div class="tab-pane fade" id="nav-contact1" role="tabpanel" aria-labelledby="nav-contact1-tab">

                                    <div class="add-info">

                                        <div class="row">

                                            <!--<div class="col-md-12 ">

                                                            <div class="form-group add-extra">

                                                            <label>Hobbies</label>

                                                            <textarea class="input-text" name="hobbies" id="hobbies" onkeyup="onkup('v_hobbies',this.value)"><?php /*echo set_value('hobbies',$resume['hobbies']); */?></textarea>

                                                            </div>

                                                        </div>-->

                                            <div class="col-md-12 award_sec">

                                                <div class="form-group add-extra">

                                                    <button type="button" class="btn btn-primary" id="addawr" onclick="add_awr()">+</button>

                                                    <label>Certifications / Key Achievements</label>

                                                    <input type="text" required maxlength="65" class="input-text" name="awards[]" id="awar0" value="<?php echo set_value('awards[]',isset($resume['awards'][0]) ? $resume['awards'][0]:''); ?>" onkeyup="pass_awar('0',this.value)">

                                                </div>

                                                <?php if(!empty($resume['awards'])) {  for($i=1; $i<$awards_count; $i++){ ?>

                                                    <div class="form-group add-extra" id="awrdiv<?php echo $i; ?>">

                                                        <button type="button" class="btn btn-danger" onclick="remawr('<?php echo $i; ?>')">X</button>

                                                        <label>Certifications / Awards</label>

                                                        <input type="text" class="input-text" required maxlength="65" name="awards[]" id="awar<?php echo $i; ?>" value="<?php echo set_value('awards[]',isset($resume['awards'][($i)]) ? $resume['awards'][($i)]:''); ?>" onkeyup="pass_awar('<?php echo $i; ?>',this.value)">

                                                    </div>

                                                <?php } } ?>

                                            </div>



                                            <!-- <div class="col-md-12 ach_sec">

                                                <div class="form-group add-extra">

                                                    <button type="button" class="btn btn-primary" id="addach" onclick="add_ach()">+</button>

                                                    <label>Key Achievements</label>

                                                    <input type="text" class="input-text" name="achievements[]" id="ach0" value="<?php echo set_value('achievements[]',isset($resume['achievements'][0]) ? $resume['achievements'][0]:''); ?>" onkeyup="pass_ach('0',this.value)">

                                                </div>

                                                <?php if(!empty($resume['achievements'])) {  for($i=1; $i<$achv_count; $i++){ ?>

                                                    <div class="form-group add-extra" id="achdiv<?php echo $i; ?>">

                                                        <button type="button" class="btn btn-danger" onclick="remach('<?php echo $i; ?>')">X</button>

                                                        <label>Key Achievements</label>

                                                        <input type="text" class="input-text" name="achievements[]" id="ach<?php echo $i; ?>" value="<?php echo set_value('achievements[]',isset($resume['achievements'][($i-1)]) ? $resume['achievements'][($i-1)]:''); ?>" onkeyup="pass_ach('<?php echo $i; ?>',this.value)">

                                                    </div>

                                                <?php } } ?>

                                            </div> -->



                                            <div class="col-md-6">

                                                <div class="form-group">

                                                    <a href="javascript:;" onclick="$('#nav-profile1-tab').click()" class="btn btn-md button-default">Back</a>

                                                </div>

                                            </div>

                                            <div class="col-md-6">

                                                <div class="form- text-right">

                                                    <input type="hidden" name="res_color" value="<?php echo $resume_clr; ?>">

                                                    <input type="hidden" name="color_id" value="<?php echo $color_id; ?>">

                                                    <button type="submit" class="btn btn-md button-theme">Choose Template To Preview</button>

                                                </div>

                                            </div>



                                        </div>

                                    </div>

                                </div>

                            </form>

                        </div>

                        

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>



<script>

    var aw = <?php echo $awards_count; ?>;

    var awc = <?php echo $awards_count; ?>;

    var ach = <?php echo $achv_count; ?>;

    var achc = <?php echo $achv_count; ?>;
   var s_a = new Array();
   var state_arr = new Array("Andaman & Nicobar", "Andhra Pradesh", "Arunachal Pradesh", "Assam", "Bihar", "Chandigarh", "Chhattisgarh", "Dadra & Nagar Haveli", "Daman & Diu", "Delhi", "Goa", "Gujarat", "Haryana", "Himachal Pradesh", "Jammu & Kashmir", "Jharkhand", "Karnataka", "Kerala", "Lakshadweep", "Madhya Pradesh", "Maharashtra", "Manipur", "Meghalaya", "Mizoram", "Nagaland", "Orissa", "Pondicherry", "Punjab", "Rajasthan", "Sikkim", "Tamil Nadu", "Tripura", "Uttar Pradesh", "Uttaranchal", "West Bengal");
        

    $(document).ready(function(){
    
        s_a[0]="";
        s_a[1]=" Alipur | Andaman Island | Anderson Island | Arainj-Laka-Punga | Austinabad | Bamboo Flat | Barren Island | Beadonabad | Betapur | Bindraban | Bonington | Brookesabad | Cadell Point | Calicut | Chetamale | Cinque Islands | Defence Island | Digilpur | Dolyganj | Flat Island | Geinyale | Great Coco Island | Haddo | Havelock Island | Henry Lawrence Island | Herbertabad | Hobdaypur | Ilichar | Ingoie | Inteview Island | Jangli Ghat | Jhon Lawrence Island | Karen | Kartara | KYD Islannd | Landfall Island | Little Andmand | Little Coco Island | Long Island | Maimyo | Malappuram | Manglutan | Manpur | Mitha Khari | Neill Island | Nicobar Island | North Brother Island | North Passage Island | North Sentinel Island | Nothen Reef Island | Outram Island | Pahlagaon | Palalankwe | Passage Island | Phaiapong | Phoenix Island | Port Blair | Preparis Island | Protheroepur | Rangachang | Rongat | Rutland Island | Sabari | Saddle Peak | Shadipur | Smith Island | Sound Island | South Sentinel Island | Spike Island | Tarmugli Island | Taylerabad | Titaije | Toibalawe | Tusonabad | West Island | Wimberleyganj | Yadita";
        s_a[2]=" Achampet | Adilabad | Adoni | Alampur | Allagadda | Alur | Amalapuram | Amangallu | Anakapalle | Anantapur | Andole | Araku | Armoor | Asifabad | Aswaraopet | Atmakur | B. Kothakota | Badvel | Banaganapalle | Bandar | Bangarupalem | Banswada | Bapatla | Bellampalli | Bhadrachalam | Bhainsa | Bheemunipatnam | Bhimadole | Bhimavaram | Bhongir | Bhooragamphad | Boath | Bobbili | Bodhan | Chandoor | Chavitidibbalu | Chejerla | Chepurupalli | Cherial | Chevella | Chinnor | Chintalapudi | Chintapalle | Chirala | Chittoor | Chodavaram | Cuddapah | Cumbum | Darsi | Devarakonda | Dharmavaram | Dichpalli | Divi | Donakonda | Dronachalam | East Godavari | Eluru | Eturnagaram | Gadwal | Gajapathinagaram | Gajwel | Garladinne | Giddalur | Godavari | Gooty | Gudivada | Gudur | Guntur | Hindupur | Hunsabad | Huzurabad | Huzurnagar | Hyderabad | Ibrahimpatnam | Jaggayyapet | Jagtial | Jammalamadugu | Jangaon | Jangareddygudem | Jannaram | Kadiri | Kaikaluru | Kakinada | Kalwakurthy | Kalyandurg | Kamalapuram | Kamareddy | Kambadur | Kanaganapalle | Kandukuru | Kanigiri | Karimnagar | Kavali | Khammam | Khanapur (AP) | Kodangal | Koduru | Koilkuntla | Kollapur | Kothagudem | Kovvur | Krishna | Krosuru | Kuppam | Kurnool | Lakkireddipalli | Madakasira | Madanapalli | Madhira | Madnur | Mahabubabad | Mahabubnagar | Mahadevapur | Makthal | Mancherial | Mandapeta | Mangalagiri | Manthani | Markapur | Marturu | Medachal | Medak | Medarmetla | Metpalli | Mriyalguda | Mulug | Mylavaram | Nagarkurnool | Nalgonda | Nallacheruvu | Nampalle | Nandigama | Nandikotkur | Nandyal | Narasampet | Narasaraopet | Narayanakhed | Narayanpet | Narsapur | Narsipatnam | Nazvidu | Nelloe | Nellore | Nidamanur | Nirmal | Nizamabad | Nuguru | Ongole | Outsarangapalle | Paderu | Pakala | Palakonda | Paland | Palmaneru | Pamuru | Pargi | Parkal | Parvathipuram | Pathapatnam | Pattikonda | Peapalle | Peddapalli | Peddapuram | Penukonda | Piduguralla | Piler | Pithapuram | Podili | Polavaram | Prakasam | Proddatur | Pulivendla | Punganur | Putturu | Rajahmundri | Rajampeta | Ramachandrapuram | Ramannapet | Rampachodavaram | Rangareddy | Rapur | Rayachoti | Rayadurg | Razole | Repalle | Saluru | Sangareddy | Sathupalli | Sattenapalle | Satyavedu | Shadnagar | Siddavattam | Siddipet | Sileru | Sircilla | Sirpur Kagaznagar | Sodam | Sompeta | Srikakulam | Srikalahasthi | Srisailam | Srungavarapukota | Sudhimalla | Sullarpet | Tadepalligudem | Tadipatri | Tanduru | Tanuku | Tekkali | Tenali | Thungaturthy | Tirivuru | Tirupathi | Tuni | Udaygiri | Ulvapadu | Uravakonda | Utnor | V.R. Puram | Vaimpalli | Vayalpad | Venkatgiri | Venkatgirikota | Vijayawada | Vikrabad | Vinjamuru | Vinukonda | Visakhapatnam | Vizayanagaram | Vizianagaram | Vuyyuru | Wanaparthy | Warangal | Wardhannapet | Yelamanchili | Yelavaram | Yeleswaram | Yellandu | Yellanuru | Yellareddy | Yerragondapalem | Zahirabad ";
        s_a[3]=" Along | Anini | Anjaw | Bameng | Basar | Changlang | Chowkhem | Daporizo | Dibang Valley | Dirang | Hayuliang | Huri | Itanagar | Jairampur | Kalaktung | Kameng | Khonsa | Kolaring | Kurung Kumey | Lohit | Lower Dibang Valley | Lower Subansiri | Mariyang | Mechuka | Miao | Nefra | Pakkekesang | Pangin | Papum Pare | Passighat | Roing | Sagalee | Seppa | Siang | Tali | Taliha | Tawang | Tezu | Tirap | Tuting | Upper Siang | Upper Subansiri | Yiang Kiag ";
        s_a[4]=" Abhayapuri | Baithalangshu | Barama | Barpeta Road | Bihupuria | Bijni | Bilasipara | Bokajan | Bokakhat | Boko | Bongaigaon | Cachar | Cachar Hills | Darrang | Dhakuakhana | Dhemaji | Dhubri | Dibrugarh | Digboi | Diphu | Goalpara | Gohpur | Golaghat | Guwahati | Hailakandi | Hajo | Halflong | Hojai | Howraghat | Jorhat | Kamrup | Karbi Anglong | Karimganj | Kokarajhar | Kokrajhar | Lakhimpur | Maibong | Majuli | Mangaldoi | Mariani | Marigaon | Moranhat | Morigaon | Nagaon | Nalbari | Rangapara | Sadiya | Sibsagar | Silchar | Sivasagar | Sonitpur | Tarabarihat | Tezpur | Tinsukia | Udalgiri | Udalguri | UdarbondhBarpeta";
        s_a[5]=" Adhaura | Amarpur | Araria | Areraj | Arrah | Arwal | Aurangabad | Bagaha | Banka | Banmankhi | Barachakia | Barauni | Barh | Barosi | Begusarai | Benipatti | Benipur | Bettiah | Bhabhua | Bhagalpur | Bhojpur | Bidupur | Biharsharif | Bikram | Bikramganj | Birpur | Buxar | Chakai | Champaran | Chapara | Dalsinghsarai | Danapur | Darbhanga | Daudnagar | Dhaka | Dhamdaha | Dumraon | Ekma | Forbesganj | Gaya | Gogri | Gopalganj | H.Kharagpur | Hajipur | Hathua | Hilsa | Imamganj | Jahanabad | Jainagar | Jamshedpur | Jamui | Jehanabad | Jhajha | Jhanjharpur | Kahalgaon | Kaimur (Bhabua) | Katihar | Katoria | Khagaria | Kishanganj | Korha | Lakhisarai | Madhepura | Madhubani | Maharajganj | Mahua | Mairwa | Mallehpur | Masrakh | Mohania | Monghyr | Motihari | Motipur | Munger | Muzaffarpur | Nabinagar | Nalanda | Narkatiaganj | Naugachia | Nawada | Pakribarwan | Pakridayal | Patna | Phulparas | Piro | Pupri | Purena | Purnia | Rafiganj | Rajauli | Ramnagar | Raniganj | Raxaul | Rohtas | Rosera | S.Bakhtiarpur | Saharsa | Samastipur | Saran | Sasaram | Seikhpura | Sheikhpura | Sheohar | Sherghati | Sidhawalia | Singhwara | Sitamarhi | Siwan | Sonepur | Supaul | Thakurganj | Triveniganj | Udakishanganj | Vaishali | Wazirganj";
        s_a[6]=" Chandigarh | Mani Marja";
        s_a[7]=" Ambikapur | Antagarh | Arang | Bacheli | Bagbahera | Bagicha | Baikunthpur | Balod | Balodabazar | Balrampur | Barpalli | Basana | Bastanar | Bastar | Bderajpur | Bemetara | Berla | Bhairongarh | Bhanupratappur | Bharathpur | Bhatapara | Bhilai | Bhilaigarh | Bhopalpatnam | Bijapur | Bilaspur | Bodla | Bokaband | Chandipara | Chhinagarh | Chhuriakala | Chingmut | Chuikhadan | Dabhara | Dallirajhara | Dantewada | Deobhog | Dhamda | Dhamtari | Dharamjaigarh | Dongargarh | Durg | Durgakondal | Fingeshwar | Gariaband | Garpa | Gharghoda | Gogunda | Ilamidi | Jagdalpur | Janjgir | Janjgir-Champa | Jarwa | Jashpur | Jashpurnagar | Kabirdham-Kawardha | Kanker | Kasdol | Kathdol | Kathghora | Kawardha | Keskal | Khairgarh | Kondagaon | Konta | Korba | Korea | Kota | Koyelibeda | Kuakunda | Kunkuri | Kurud | Lohadigundah | Lormi | Luckwada | Mahasamund | Makodi | Manendragarh | Manpur | Marwahi | Mohla | Mungeli | Nagri | Narainpur | Narayanpur | Neora | Netanar | Odgi | Padamkot | Pakhanjur | Pali | Pandaria | Pandishankar | Parasgaon | Pasan | Patan | Pathalgaon | Pendra | Pratappur | Premnagar | Raigarh | Raipur | Rajnandgaon | Rajpur | Ramchandrapur | Saraipali | Saranggarh | Sarona | Semaria | Shakti | Sitapur | Sukma | Surajpur | Surguja | Tapkara | Toynar | Udaipur | Uproda | Wadrainagar";
        s_a[8]=" Amal | Amli | Bedpa | Chikhli | Dadra & Nagar Haveli | Dahikhed | Dolara | Galonda | Kanadi | Karchond | Khadoli | Kharadpada | Kherabari | Kherdi | Kothar | Luari | Mashat | Rakholi | Rudana | Saili | Sili | Silvassa | Sindavni | Udva | Umbarkoi | Vansda | Vasona | Velugam ";
        s_a[9]=" Brancavare | Dagasi | Daman | Diu | Magarvara | Nagwa | Pariali | Passo Covo ";
        s_a[10]=" Central Delhi | East Delhi | New Delhi | North Delhi | North East Delhi | North West Delhi | South Delhi | South West Delhi | West Delhi ";
        s_a[11]=" Canacona | Candolim | Chinchinim | Cortalim | Goa | Jua | Madgaon | Mahem | Mapuca | Marmagao | Panji | Ponda | Sanvordem | Terekhol ";
        s_a[12]=" Ahmedabad | Ahwa | Amod | Amreli | Anand | Anjar | Ankaleshwar | Babra | Balasinor | Banaskantha | Bansada | Bardoli | Bareja | Baroda | Barwala | Bayad | Bhachav | Bhanvad | Bharuch | Bhavnagar | Bhiloda | Bhuj | Billimora | Borsad | Botad | Chanasma | Chhota Udaipur | Chotila | Dabhoi | Dahod | Damnagar | Dang | Danta | Dasada | Dediapada | Deesa | Dehgam | Deodar | Devgadhbaria | Dhandhuka | Dhanera | Dharampur | Dhari | Dholka | Dhoraji | Dhrangadhra | Dhrol | Dwarka | Fortsongadh | Gadhada | Gandhi Nagar | Gariadhar | Godhra | Gogodar | Gondal | Halol | Halvad | Harij | Himatnagar | Idar | Jambusar | Jamjodhpur | Jamkalyanpur | Jamnagar | Jasdan | Jetpur | Jhagadia | Jhalod | Jodia | Junagadh | Junagarh | Kalawad | Kalol | Kapad Wanj | Keshod | Khambat | Khambhalia | Khavda | Kheda | Khedbrahma | Kheralu | Kodinar | Kotdasanghani | Kunkawav | Kutch | Kutchmandvi | Kutiyana | Lakhpat | Lakhtar | Lalpur | Limbdi | Limkheda | Lunavada | M.M.Mangrol | Mahuva | Malia-Hatina | Maliya | Malpur | Manavadar | Mandvi | Mangrol | Mehmedabad | Mehsana | Miyagam | Modasa | Morvi | Muli | Mundra | Nadiad | Nakhatrana | Nalia | Narmada | Naswadi | Navasari | Nizar | Okha | Paddhari | Padra | Palanpur | Palitana | Panchmahals | Patan | Pavijetpur | Porbandar | Prantij | Radhanpur | Rahpar | Rajaula | Rajkot | Rajpipla | Ranavav | Sabarkantha | Sanand | Sankheda | Santalpur | Santrampur | Savarkundla | Savli | Sayan | Sayla | Shehra | Sidhpur | Sihor | Sojitra | Sumrasar | Surat | Surendranagar | Talaja | Thara | Tharad | Thasra | Una-Diu | Upleta | Vadgam | Vadodara | Valia | Vallabhipur | Valod | Valsad | Vanthali | Vapi | Vav | Veraval | Vijapur | Viramgam | Visavadar | Visnagar | Vyara | Waghodia | Wankaner ";
        s_a[13]=" Adampur Mandi | Ambala | Assandh | Bahadurgarh | Barara | Barwala | Bawal | Bawanikhera | Bhiwani | Charkhidadri | Cheeka | Chhachrauli | Dabwali | Ellenabad | Faridabad | Fatehabad | Ferojpur Jhirka | Gharaunda | Gohana | Gurgaon | Hansi | Hisar | Jagadhari | Jatusana | Jhajjar | Jind | Julana | Kaithal | Kalanaur | Kalanwali | Kalka | Karnal | Kosli | Kurukshetra | Loharu | Mahendragarh | Meham | Mewat | Mohindergarh | Naraingarh | Narnaul | Narwana | Nilokheri | Nuh | Palwal | Panchkula | Panipat | Pehowa | Ratia | Rewari | Rohtak | Safidon | Sirsa | Siwani | Sonipat | Tohana | Tohsam | Yamunanagar ";
        s_a[14]=" Amb | Arki | Banjar | Bharmour | Bilaspur | Chamba | Churah | Dalhousie | Dehra Gopipur | Hamirpur | Jogindernagar | Kalpa | Kangra | Kinnaur | Kullu | Lahaul | Mandi | Nahan | Nalagarh | Nirmand | Nurpur | Palampur | Pangi | Paonta | Pooh | Rajgarh | Rampur Bushahar | Rohru | Shimla | Sirmaur | Solan | Spiti | Sundernagar | Theog | Udaipur | Una";
        s_a[15]=" Akhnoor | Anantnag | Badgam | Bandipur | Baramulla | Basholi | Bedarwah | Budgam | Doda | Gulmarg | Jammu | Kalakot | Kargil | Karnah | Kathua | Kishtwar | Kulgam | Kupwara | Leh | Mahore | Nagrota | Nobra | Nowshera | Nyoma | Padam | Pahalgam | Patnitop | Poonch | Pulwama | Rajouri | Ramban | Ramnagar | Reasi | Samba | Srinagar | Udhampur | Vaishno Devi ";
        s_a[16]=" Bagodar | Baharagora | Balumath | Barhi | Barkagaon | Barwadih | Basia | Bermo | Bhandaria | Bhawanathpur | Bishrampur | Bokaro | Bolwa | Bundu | Chaibasa | Chainpur | Chakardharpur | Chandil | Chatra | Chavparan | Daltonganj | Deoghar | Dhanbad | Dumka | Dumri | Garhwa | Garu | Ghaghra | Ghatsila | Giridih | Godda | Gomia | Govindpur | Gumla | Hazaribagh | Hunterganj | Ichak | Itki | Jagarnathpur | Jamshedpur | Jamtara | Japla | Jharmundi | Jhinkpani | Jhumaritalaiya | Kathikund | Kharsawa | Khunti | Koderma | Kolebira | Latehar | Lohardaga | Madhupur | Mahagama | Maheshpur Raj | Mandar | Mandu | Manoharpur | Muri | Nagarutatri | Nala | Noamundi | Pakur | Palamu | Palkot | Patan | Rajdhanwar | Rajmahal | Ramgarh | Ranchi | Sahibganj | Saraikela | Simaria | Simdega | Singhbhum | Tisri | Torpa ";
        s_a[17]=" Afzalpur | Ainapur | Aland | Alur | Anekal | Ankola | Arsikere | Athani | Aurad | Bableshwar | Badami | Bagalkot | Bagepalli | Bailhongal | Bangalore | Bangalore Rural | Bangarpet | Bantwal | Basavakalyan | Basavanabagewadi | Basavapatna | Belgaum | Bellary | Belthangady | Belur | Bhadravati | Bhalki | Bhatkal | Bidar | Bijapur | Biligi | Chadchan | Challakere | Chamrajnagar | Channagiri | Channapatna | Channarayapatna | Chickmagalur | Chikballapur | Chikkaballapur | Chikkanayakanahalli | Chikkodi | Chikmagalur | Chincholi | Chintamani | Chitradurga | Chittapur | Cowdahalli | Davanagere | Deodurga | Devangere | Devarahippargi | Dharwad | Doddaballapur | Gadag | Gangavathi | Gokak | Gowribdanpur | Gubbi | Gulbarga | Gundlupet | H.B.Halli | H.D. Kote | Haliyal | Hampi | Hangal | Harapanahalli | Hassan | Haveri | Hebri | Hirekerur | Hiriyur | Holalkere | Holenarsipur | Honnali | Honnavar | Hosadurga | Hosakote | Hosanagara | Hospet | Hubli | Hukkeri | Humnabad | Hungund | Hunsagi | Hunsur | Huvinahadagali | Indi | Jagalur | Jamkhandi | Jewargi | Joida | K.R. Nagar | Kadur | Kalghatagi | Kamalapur | Kanakapura | Kannada | Kargal | Karkala | Karwar | Khanapur | Kodagu | Kolar | Kollegal | Koppa | Koppal | Koratageri | Krishnarajapet | Kudligi | Kumta | Kundapur | Kundgol | Kunigal | Kurugodu | Kustagi | Lingsugur | Madikeri | Madugiri | Malavalli | Malur | Mandya | Mangalore | Manipal | Manvi | Mashal | Molkalmuru | Mudalgi | Muddebihal | Mudhol | Mudigere | Mulbagal | Mundagod | Mundargi | Murugod | Mysore | Nagamangala | Nanjangud | Nargund | Narsimrajapur | Navalgund | Nelamangala | Nimburga | Pandavapura | Pavagada | Puttur | Raibag | Raichur | Ramdurg | Ranebennur | Ron | Sagar | Sakleshpur | Salkani | Sandur | Saundatti | Savanur | Sedam | Shahapur | Shankarnarayana | Shikaripura | Shimoga | Shirahatti | Shorapur | Siddapur | Sidlaghatta | Sindagi | Sindhanur | Sira | Sirsi | Siruguppa | Somwarpet | Sorab | Sringeri | Sriniwaspur | Srirangapatna | Sullia | T. Narsipur | Tallak | Tarikere | Telgi | Thirthahalli | Tiptur | Tumkur | Turuvekere | Udupi | Virajpet | Wadi | Yadgiri | Yelburga | Yellapur ";
        s_a[18]=" Adimaly | Adoor | Agathy | Alappuzha | Alathur | Alleppey | Alwaye | Amini | Androth | Attingal | Badagara | Bitra | Calicut | Cannanore | Chetlet | Ernakulam | Idukki | Irinjalakuda | Kadamath | Kalpeni | Kalpetta | Kanhangad | Kanjirapally | Kannur | Karungapally | Kasargode | Kavarathy | Kiltan | Kochi | Koduvayur | Kollam | Kottayam | Kovalam | Kozhikode | Kunnamkulam | Malappuram | Mananthodi | Manjeri | Mannarghat | Mavelikkara | Minicoy | Munnar | Muvattupuzha | Nedumandad | Nedumgandam | Nilambur | Palai | Palakkad | Palghat | Pathaanamthitta | Pathanamthitta | Payyanur | Peermedu | Perinthalmanna | Perumbavoor | Punalur | Quilon | Ranni | Shertallai | Shoranur | Taliparamba | Tellicherry | Thiruvananthapuram | Thodupuzha | Thrissur | Tirur | Tiruvalla | Trichur | Trivandrum | Uppala | Vadakkanchery | Vikom | Wayanad ";
        s_a[19]=" Agatti Island | Bingaram Island | Bitra Island | Chetlat Island | Kadmat Island | Kalpeni Island | Kavaratti Island | Kiltan Island | Lakshadweep Sea | Minicoy Island | North Island | South Island ";
        s_a[20]=" Agar | Ajaigarh | Alirajpur | Amarpatan | Amarwada | Ambah | Anuppur | Arone | Ashoknagar | Ashta | Atner | Babaichichli | Badamalhera | Badarwsas | Badnagar | Badnawar | Badwani | Bagli | Baihar | Balaghat | Baldeogarh | Baldi | Bamori | Banda | Bandhavgarh | Bareli | Baroda | Barwaha | Barwani | Batkakhapa | Begamganj | Beohari | Berasia | Berchha | Betul | Bhainsdehi | Bhander | Bhanpura | Bhikangaon | Bhimpur | Bhind | Bhitarwar | Bhopal | Biaora | Bijadandi | Bijawar | Bijaypur | Bina | Birsa | Birsinghpur | Budhni | Burhanpur | Buxwaha | Chachaura | Chanderi | Chaurai | Chhapara | Chhatarpur | Chhindwara | Chicholi | Chitrangi | Churhat | Dabra | Damoh | Datia | Deori | Deosar | Depalpur | Dewas | Dhar | Dharampuri | Dindori | Gadarwara | Gairatganj | Ganjbasoda | Garoth | Ghansour | Ghatia | Ghatigaon | Ghorandogri | Ghughari | Gogaon | Gohad | Goharganj | Gopalganj | Gotegaon | Gourihar | Guna | Gunnore | Gwalior | Gyraspur | Hanumana | Harda | Harrai | Harsud | Hatta | Hoshangabad | Ichhawar | Indore | Isagarh | Itarsi | Jabalpur | Jabera | Jagdalpur | Jaisinghnagar | Jaithari | Jaitpur | Jaitwara | Jamai | Jaora | Jatara | Jawad | Jhabua | Jobat | Jora | Kakaiya | Kannod | Kannodi | Karanjia | Kareli | Karera | Karhal | Karpa | Kasrawad | Katangi | Katni | Keolari | Khachrod | Khajuraho | Khakner | Khalwa | Khandwa | Khaniadhana | Khargone | Khategaon | Khetia | Khilchipur | Khirkiya | Khurai | Kolaras | Kotma | Kukshi | Kundam | Kurwai | Kusmi | Laher | Lakhnadon | Lamta | Lanji | Lateri | Laundi | Maheshwar | Mahidpurcity | Maihar | Majhagwan | Majholi | Malhargarh | Manasa | Manawar | Mandla | Mandsaur | Manpur | Mauganj | Mawai | Mehgaon | Mhow | Morena | Multai | Mungaoli | Nagod | Nainpur | Narsingarh | Narsinghpur | Narwar | Nasrullaganj | Nateran | Neemuch | Niwari | Niwas | Nowgaon | Pachmarhi | Pandhana | Pandhurna | Panna | Parasia | Patan | Patera | Patharia | Pawai | Petlawad | Pichhore | Piparia | Pohari | Prabhapattan | Punasa | Pushprajgarh | Raghogarh | Raghunathpur | Rahatgarh | Raisen | Rajgarh | Rajpur | Ratlam | Rehli | Rewa | Sabalgarh | Sagar | Sailana | Sanwer | Sarangpur | Sardarpur | Satna | Saunsar | Sehore | Sendhwa | Seondha | Seoni | Seonimalwa | Shahdol | Shahnagar | Shahpur | Shajapur | Sheopur | Sheopurkalan | Shivpuri | Shujalpur | Sidhi | Sihora | Silwani | Singrauli | Sirmour | Sironj | Sitamau | Sohagpur | Sondhwa | Sonkatch | Susner | Tamia | Tarana | Tendukheda | Teonthar | Thandla | Tikamgarh | Timarani | Udaipura | Ujjain | Umaria | Umariapan | Vidisha | Vijayraghogarh | Waraseoni | Zhirnia ";
        s_a[21]=" Achalpur | Aheri | Ahmednagar | Ahmedpur | Ajara | Akkalkot | Akola | Akole | Akot | Alibagh | Amagaon | Amalner | Ambad | Ambejogai | Amravati | Arjuni Merogaon | Arvi | Ashti | Atpadi | Aurangabad | Ausa | Babhulgaon | Balapur | Baramati | Barshi Takli | Barsi | Basmatnagar | Bassein | Beed | Bhadrawati | Bhamregadh | Bhandara | Bhir | Bhiwandi | Bhiwapur | Bhokar | Bhokardan | Bhoom | Bhor | Bhudargad | Bhusawal | Billoli | Brahmapuri | Buldhana | Butibori | Chalisgaon | Chamorshi | Chandgad | Chandrapur | Chandur | Chanwad | Chhikaldara | Chikhali | Chinchwad | Chiplun | Chopda | Chumur | Dahanu | Dapoli | Darwaha | Daryapur | Daund | Degloor | Delhi Tanda | Deogad | Deolgaonraja | Deori | Desaiganj | Dhadgaon | Dhanora | Dharani | Dhiwadi | Dhule | Dhulia | Digras | Dindori | Edalabad | Erandul | Etapalli | Gadhchiroli | Gadhinglaj | Gaganbavada | Gangakhed | Gangapur | Gevrai | Ghatanji | Golegaon | Gondia | Gondpipri | Goregaon | Guhagar | Hadgaon | Hatkangale | Hinganghat | Hingoli | Hingua | Igatpuri | Indapur | Islampur | Jalgaon | Jalna | Jamkhed | Jamner | Jath | Jawahar | Jintdor | Junnar | Kagal | Kaij | Kalamb | Kalamnuri | Kallam | Kalmeshwar | Kalwan | Kalyan | Kamptee | Kandhar | Kankavali | Kannad | Karad | Karjat | Karmala | Katol | Kavathemankal | Kedgaon | Khadakwasala | Khamgaon | Khed | Khopoli | Khultabad | Kinwat | Kolhapur | Kopargaon | Koregaon | Kudal | Kuhi | Kurkheda | Kusumba | Lakhandur | Langa | Latur | Lonar | Lonavala | Madangad | Madha | Mahabaleshwar | Mahad | Mahagaon | Mahasala | Mahaswad | Malegaon | Malgaon | Malgund | Malkapur | Malsuras | Malwan | Mancher | Mangalwedha | Mangaon | Mangrulpur | Manjalegaon | Manmad | Maregaon | Mehda | Mekhar | Mohadi | Mohol | Mokhada | Morshi | Mouda | Mukhed | Mul | Mumbai | Murbad | Murtizapur | Murud | Nagbhir | Nagpur | Nahavara | Nanded | Nandgaon | Nandnva | Nandurbar | Narkhed | Nashik | Navapur | Ner | Newasa | Nilanga | Niphad | Omerga | Osmanabad | Pachora | Paithan | Palghar | Pali | Pandharkawada | Pandharpur | Panhala | Paranda | Parbhani | Parner | Parola | Parseoni | Partur | Patan | Pathardi | Pathari | Patoda | Pauni | Peint | Pen | Phaltan | Pimpalner | Pirangut | Poladpur | Pune | Pusad | Pusegaon | Radhanagar | Rahuri | Raigad | Rajapur | Rajgurunagar | Rajura | Ralegaon | Ramtek | Ratnagiri | Raver | Risod | Roha | Sakarwadi | Sakoli | Sakri | Salekasa | Samudrapur | Sangamner | Sanganeshwar | Sangli | Sangola | Sanguem | Saoner | Saswad | Satana | Satara | Sawantwadi | Seloo | Shahada | Shahapur | Shahuwadi | Shevgaon | Shirala | Shirol | Shirpur | Shirur | Shirwal | Sholapur | Shri Rampur | Shrigonda | Shrivardhan | Sillod | Sinderwahi | Sindhudurg | Sindkheda | Sindkhedaraja | Sinnar | Sironcha | Soyegaon | Surgena | Talasari | Talegaon S.Ji Pant | Taloda | Tasgaon | Thane | Tirora | Tiwasa | Trimbak | Tuljapur | Tumsar | Udgir | Umarkhed | Umrane | Umrer | Urlikanchan | Vaduj | Velhe | Vengurla | Vijapur | Vita | Wada | Wai | Walchandnagar | Wani | Wardha | Warlydwarud | Warora | Washim | Wathar | Yavatmal | Yawal | Yeola | Yeotmal ";
        s_a[22]=" Bishnupur | Chakpikarong | Chandel | Chattrik | Churachandpur | Imphal | Jiribam | Kakching | Kalapahar | Mao | Mulam | Parbung | Sadarhills | Saibom | Sempang | Senapati | Sochumer | Taloulong | Tamenglong | Thinghat | Thoubal | Ukhrul ";
        s_a[23]=" Amlaren | Baghmara | Cherrapunjee | Dadengiri | Garo Hills | Jaintia Hills | Jowai | Khasi Hills | Khliehriat | Mariang | Mawkyrwat | Nongpoh | Nongstoin | Resubelpara | Ri Bhoi | Shillong | Tura | Williamnagar";
        s_a[24]=" Aizawl | Champhai | Demagiri | Kolasib | Lawngtlai | Lunglei | Mamit | Saiha | Serchhip";
        s_a[25]=" Dimapur | Jalukie | Kiphire | Kohima | Mokokchung | Mon | Phek | Tuensang | Wokha | Zunheboto ";
        s_a[26]=" Anandapur | Angul | Anugul | Aska | Athgarh | Athmallik | Attabira | Bagdihi | Balangir | Balasore | Baleswar | Baliguda | Balugaon | Banaigarh | Bangiriposi | Barbil | Bargarh | Baripada | Barkot | Basta | Berhampur | Betanati | Bhadrak | Bhanjanagar | Bhawanipatna | Bhubaneswar | Birmaharajpur | Bisam Cuttack | Boriguma | Boudh | Buguda | Chandbali | Chhatrapur | Chhendipada | Cuttack | Daringbadi | Daspalla | Deodgarh | Deogarh | Dhanmandal | Dharamgarh | Dhenkanal | Digapahandi | Dunguripali | G. Udayagiri | Gajapati | Ganjam | Ghatgaon | Gudari | Gunupur | Hemgiri | Hindol | Jagatsinghapur | Jajpur | Jamankira | Jashipur | Jayapatna | Jeypur | Jharigan | Jharsuguda | Jujumura | Kalahandi | Kalimela | Kamakhyanagar | Kandhamal | Kantabhanji | Kantamal | Karanjia | Kashipur | Kendrapara | Kendujhar | Keonjhar | Khalikote | Khordha | Khurda | Komana | Koraput | Kotagarh | Kuchinda | Lahunipara | Laxmipur | M. Rampur | Malkangiri | Mathili | Mayurbhanj | Mohana | Motu | Nabarangapur | Naktideul | Nandapur | Narlaroad | Narsinghpur | Nayagarh | Nimapara | Nowparatan | Nowrangapur | Nuapada | Padampur | Paikamal | Palla Hara | Papadhandi | Parajang | Pardip | Parlakhemundi | Patnagarh | Pattamundai | Phiringia | Phulbani | Puri | Puruna Katak | R. Udayigiri | Rairakhol | Rairangpur | Rajgangpur | Rajkhariar | Rayagada | Rourkela | Sambalpur | Sohela | Sonapur | Soro | Subarnapur | Sunabeda | Sundergarh | Surada | T. Rampur | Talcher | Telkoi | Titlagarh | Tumudibandha | Udala | Umerkote ";
        s_a[27]=" Bahur | Karaikal | Mahe | Pondicherry | Purnankuppam | Valudavur | Villianur | Yanam ";
        s_a[28]=" Abohar | Ajnala | Amritsar | Balachaur | Barnala | Batala | Bathinda | Chandigarh | Dasua | Dinanagar | Faridkot | Fatehgarh Sahib | Fazilka | Ferozepur | Garhashanker | Goindwal | Gurdaspur | Guruharsahai | Hoshiarpur | Jagraon | Jalandhar | Jugial | Kapurthala | Kharar | Kotkapura | Ludhiana | Malaut | Malerkotla | Mansa | Moga | Muktasar | Nabha | Nakodar | Nangal | Nawanshahar | Nawanshahr | Pathankot | Patiala | Patti | Phagwara | Phillaur | Phulmandi | Quadian | Rajpura | Raman | Rayya | Ropar | Rupnagar | Samana | Samrala | Sangrur | Sardulgarh | Sarhind | SAS Nagar | Sultanpur Lodhi | Sunam | Tanda Urmar | Tarn Taran | Zira ";
        s_a[29]=" Abu Road | Ahore | Ajmer | Aklera | Alwar | Amber | Amet | Anupgarh | Asind | Aspur | Atru | Bagidora | Bali | Bamanwas | Banera | Bansur | Banswara | Baran | Bari | Barisadri | Barmer | Baseri | Bassi | Baswa | Bayana | Beawar | Begun | Behror | Bhadra | Bharatpur | Bhilwara | Bhim | Bhinmal | Bikaner | Bilara | Bundi | Chhabra | Chhipaborad | Chirawa | Chittorgarh | Chohtan | Churu | Dantaramgarh | Dausa | Deedwana | Deeg | Degana | Deogarh | Deoli | Desuri | Dhariawad | Dholpur | Digod | Dudu | Dungarpur | Dungla | Fatehpur | Gangapur | Gangdhar | Gerhi | Ghatol | Girwa | Gogunda | Hanumangarh | Hindaun | Hindoli | Hurda | Jahazpur | Jaipur | Jaisalmer | Jalore | Jhalawar | Jhunjhunu | Jodhpur | Kaman | Kapasan | Karauli | Kekri | Keshoraipatan | Khandar | Kherwara | Khetri | Kishanganj | Kishangarh | Kishangarhbas | Kolayat | Kota | Kotputli | Kotra | Kotri | Kumbalgarh | Kushalgarh | Ladnun | Ladpura | Lalsot | Laxmangarh | Lunkaransar | Mahuwa | Malpura | Malvi | Mandal | Mandalgarh | Mandawar | Mangrol | Marwar-Jn | Merta | Nadbai | Nagaur | Nainwa | Nasirabad | Nathdwara | Nawa | Neem Ka Thana | Newai | Nimbahera | Nohar | Nokha | Onli | Osian | Pachpadara | Pachpahar | Padampur | Pali | Parbatsar | Phagi | Phalodi | Pilani | Pindwara | Pipalda | Pirawa | Pokaran | Pratapgarh | Raipur | Raisinghnagar | Rajgarh | Rajsamand | Ramganj Mandi | Ramgarh | Rashmi | Ratangarh | Reodar | Rupbas | Sadulshahar | Sagwara | Sahabad | Salumber | Sanchore | Sangaria | Sangod | Sapotra | Sarada | Sardarshahar | Sarwar | Sawai Madhopur | Shahapura | Sheo | Sheoganj | Shergarh | Sikar | Sirohi | Siwana | Sojat | Sri Dungargarh | Sri Ganganagar | Sri Karanpur | Sri Madhopur | Sujangarh | Taranagar | Thanaghazi | Tibbi | Tijara | Todaraisingh | Tonk | Udaipur | Udaipurwati | Uniayara | Vallabhnagar | Viratnagar ";
        s_a[30]=" Barmiak | Be | Bhurtuk | Chhubakha | Chidam | Chubha | Chumikteng | Dentam | Dikchu | Dzongri | Gangtok | Gauzing | Gyalshing | Hema | Kerung | Lachen | Lachung | Lema | Lingtam | Lungthu | Mangan | Namchi | Namthang | Nanga | Nantang | Naya Bazar | Padamachen | Pakhyong | Pemayangtse | Phensang | Rangli | Rinchingpong | Sakyong | Samdong | Singtam | Siniolchu | Sombari | Soreng | Sosing | Tekhug | Temi | Tsetang | Tsomgo | Tumlong | Yangang | Yumtang ";
        s_a[31]=" Ambasamudram | Anamali | Arakandanallur | Arantangi | Aravakurichi | Ariyalur | Arkonam | Arni | Aruppukottai | Attur | Avanashi | Batlagundu | Bhavani | Chengalpattu | Chengam | Chennai | Chidambaram | Chingleput | Coimbatore | Courtallam | Cuddalore | Cumbum | Denkanikoitah | Devakottai | Dharampuram | Dharmapuri | Dindigul | Erode | Gingee | Gobichettipalayam | Gudalur | Gudiyatham | Harur | Hosur | Jayamkondan | Kallkurichi | Kanchipuram | Kangayam | Kanyakumari | Karaikal | Karaikudi | Karur | Keeranur | Kodaikanal | Kodumudi | Kotagiri | Kovilpatti | Krishnagiri | Kulithalai | Kumbakonam | Kuzhithurai | Madurai | Madurantgam | Manamadurai | Manaparai | Mannargudi | Mayiladuthurai | Mayiladutjurai | Mettupalayam | Metturdam | Mudukulathur | Mulanur | Musiri | Nagapattinam | Nagarcoil | Namakkal | Nanguneri | Natham | Neyveli | Nilgiris | Oddanchatram | Omalpur | Ootacamund | Ooty | Orathanad | Palacode | Palani | Palladum | Papanasam | Paramakudi | Pattukottai | Perambalur | Perundurai | Pollachi | Polur | Pondicherry | Ponnamaravathi | Ponneri | Pudukkottai | Rajapalayam | Ramanathapuram | Rameshwaram | Ranipet | Rasipuram | Salem | Sankagiri | Sankaran | Sathiyamangalam | Sivaganga | Sivakasi | Sriperumpudur | Srivaikundam | Tenkasi | Thanjavur | Theni | Thirumanglam | Thiruraipoondi | Thoothukudi | Thuraiyure | Tindivanam | Tiruchendur | Tiruchengode | Tiruchirappalli | Tirunelvelli | Tirupathur | Tirupur | Tiruttani | Tiruvallur | Tiruvannamalai | Tiruvarur | Tiruvellore | Tiruvettipuram | Trichy | Tuticorin | Udumalpet | Ulundurpet | Usiliampatti | Uthangarai | Valapady | Valliyoor | Vaniyambadi | Vedasandur | Vellore | Velur | Vilathikulam | Villupuram | Virudhachalam | Virudhunagar | Wandiwash | Yercaud ";
        s_a[32]=" Agartala | Ambasa | Bampurbari | Belonia | Dhalai | Dharam Nagar | Kailashahar | Kamal Krishnabari | Khopaiyapara | Khowai | Phuldungsei | Radha Kishore Pur | Tripura ";
        s_a[33]=" Achhnera | Agra | Akbarpur | Aliganj | Aligarh | Allahabad | Ambedkar Nagar | Amethi | Amiliya | Amroha | Anola | Atrauli | Auraiya | Azamgarh | Baberu | Badaun | Baghpat | Bagpat | Baheri | Bahraich | Ballia | Balrampur | Banda | Bansdeeh | Bansgaon | Bansi | Barabanki | Bareilly | Basti | Bhadohi | Bharthana | Bharwari | Bhogaon | Bhognipur | Bidhuna | Bijnore | Bikapur | Bilari | Bilgram | Bilhaur | Bindki | Bisalpur | Bisauli | Biswan | Budaun | Budhana | Bulandshahar | Bulandshahr | Capianganj | Chakia | Chandauli | Charkhari | Chhata | Chhibramau | Chirgaon | Chitrakoot | Chunur | Dadri | Dalmau | Dataganj | Debai | Deoband | Deoria | Derapur | Dhampur | Domariyaganj | Dudhi | Etah | Etawah | Faizabad | Farrukhabad | Fatehpur | Firozabad | Garauth | Garhmukteshwar | Gautam Buddha Nagar | Ghatampur | Ghaziabad | Ghazipur | Ghosi | Gonda | Gorakhpur | Gunnaur | Haidergarh | Hamirpur | Hapur | Hardoi | Harraiya | Hasanganj | Hasanpur | Hathras | Jalalabad | Jalaun | Jalesar | Jansath | Jarar | Jasrana | Jaunpur | Jhansi | Jyotiba Phule Nagar | Kadipur | Kaimganj | Kairana | Kaisarganj | Kalpi | Kannauj | Kanpur | Karchhana | Karhal | Karvi | Kasganj | Kaushambi | Kerakat | Khaga | Khair | Khalilabad | Kheri | Konch | Kumaon | Kunda | Kushinagar | Lalganj | Lalitpur | Lucknow | Machlishahar | Maharajganj | Mahoba | Mainpuri | Malihabad | Mariyahu | Math | Mathura | Mau | Maudaha | Maunathbhanjan | Mauranipur | Mawana | Meerut | Mehraun | Meja | Mirzapur | Misrikh | Modinagar | Mohamdabad | Mohamdi | Moradabad | Musafirkhana | Muzaffarnagar | Nagina | Najibabad | Nakur | Nanpara | Naraini | Naugarh | Nawabganj | Nighasan | Noida | Orai | Padrauna | Pahasu | Patti | Pharenda | Phoolpur | Phulpur | Pilibhit | Pitamberpur | Powayan | Pratapgarh | Puranpur | Purwa | Raibareli | Rampur | Ramsanehi Ghat | Rasara | Rath | Robertsganj | Sadabad | Safipur | Sagri | Saharanpur | Sahaswan | Sahjahanpur | Saidpur | Salempur | Salon | Sambhal | Sandila | Sant Kabir Nagar | Sant Ravidas Nagar | Sardhana | Shahabad | Shahganj | Shahjahanpur | Shikohabad | Shravasti | Siddharthnagar | Sidhauli | Sikandra Rao | Sikandrabad | Sitapur | Siyana | Sonbhadra | Soraon | Sultanpur | Tanda | Tarabganj | Tilhar | Unnao | Utraula | Varanasi | Zamania ";
        s_a[34]=" Almora | Bageshwar | Bhatwari | Chakrata | Chamoli | Champawat | Dehradun | Deoprayag | Dharchula | Dunda | Haldwani | Haridwar | Joshimath | Karan Prayag | Kashipur | Khatima | Kichha | Lansdown | Munsiari | Mussoorie | Nainital | Pantnagar | Partapnagar | Pauri Garhwal | Pithoragarh | Purola | Rajgarh | Ranikhet | Roorkee | Rudraprayag | Tehri Garhwal | Udham Singh Nagar | Ukhimath | Uttarkashi ";
        s_a[35]=" Adra | Alipurduar | Amlagora | Arambagh | Asansol | Balurghat | Bankura | Bardhaman | Basirhat | Berhampur | Bethuadahari | Birbhum | Birpara | Bishanpur | Bolpur | Bongoan | Bulbulchandi | Burdwan | Calcutta | Canning | Champadanga | Contai | Cooch Behar | Daimond Harbour | Dalkhola | Dantan | Darjeeling | Dhaniakhali | Dhuliyan | Dinajpur | Dinhata | Durgapur | Gangajalghati | Gangarampur | Ghatal | Guskara | Habra | Haldia | Harirampur | Harishchandrapur | Hooghly | Howrah | Islampur | Jagatballavpur | Jalpaiguri | Jhalda | Jhargram | Kakdwip | Kalchini | Kalimpong | Kalna | Kandi | Karimpur | Katwa | Kharagpur | Khatra | Krishnanagar | Mal Bazar | Malda | Manbazar | Mathabhanga | Medinipur | Mekhliganj | Mirzapur | Murshidabad | Nadia | Nagarakata | Nalhati | Nayagarh | Parganas | Purulia | Raiganj | Rampur Hat | Ranaghat | Seharabazar | Siliguri | Suri | Takipur | Tamluk";

        $('#v_name').text($('#name').val());

        $('#v_email').text($('#email').val());

        $('#v_phone').text($('#phone').val());

        $('#v_mobile').text($('#mobile').val());

        $('#v_languages').text($('#languages').val());

        $('#v_address').text($('#address').val());

        $('#v_city').text($('#city').val());

        $('#v_state').text($('#state').val());

        $('#v_pincode').text($('#pincode').val());

        $('#v_objectives').text($('#objectives').val());

        $('#v_passport_no').text($('#passport_no').val());

        $('#v_gender').text($('#gender').val());

        $('#v_hobbies').text($('#hobbies').val());



        $('#v_cp_title').text($('#cp_title').val());

        $('#v_cp_description').text($('#cp_description').val());

        $('#v_jt_1').text($('#jt_1').val());

        $('#v_cmp_1').text($('#cmp_1').val());

        $('#v_exp_f_date_1').text($('#exp_f_date_1').val());

        $('#v_exp_t_date_1').text($('#exp_t_date_1').val());

        $('#v_w_description_1').text($('#w_description_1').val());

        $('#v_jt_2').text($('#jt_2').val());

        $('#v_cmp_2').text($('#cmp_2').val());

        $('#v_exp_f_date_2').text($('#exp_f_date_2').val());

        $('#v_exp_t_date_2').text($('#exp_t_date_2').val());

        $('#v_w_description_2').text($('#w_description_2').val());

        $('#v_jt_3').text($('#jt_3').val());

        $('#v_cmp_3').text($('#cmp_3').val());

        $('#v_exp_f_date_3').text($('#exp_f_date_3').val());

        $('#v_exp_t_date_3').text($('#exp_t_date_3').val());

        $('#v_w_description_3').text($('#w_description_3').val());



        $('#v_inst_1').text($('#inst_1').val());

        $('#v_degree_1').text($('#degree_1').val());

        $('#v_branch_1').text($('#branch_1').val());

        $('#v_edu_f_date_1').text($('#edu_f_date_1').val());

        $('#v_edu_t_date_1').text($('#edu_t_date_1').val());

        $('#v_inst_2').text($('#inst_2').val());

        $('#v_degree_2').text($('#degree_2').val());

        $('#v_branch_2').text($('#branch_2').val());

        $('#v_edu_f_date_2').text($('#edu_f_date_2').val());

        $('#v_edu_t_date_2').text($('#edu_t_date_2').val());

        $('#v_inst_3').text($('#inst_3').val());

        $('#v_degree_3').text($('#degree_3').val());

        $('#v_branch_3').text($('#branch_3').val());

        $('#v_edu_f_date_3').text($('#edu_f_date_3').val());

        $('#v_edu_t_date_3').text($('#edu_t_date_3').val());



        onkup_skills();

        $('#v_expertise').text($('#expertise').val());



        if(aw==5){

            hidebtn('addawr');

        }

        if(ach==5){

            hidebtn('addach');

        }

        print_city_load("city","0");
    });

    function print_state(state_id,selected_state){
    	// given the id of the <select> tag as function argument, it inserts <option> tags
    	var option_str = document.getElementById(state_id);
    	option_str.length=0;
    	option_str.options[0] = new Option('Select State','');
    	for (var i=0; i<state_arr.length; i++) {
    		option_str.options[option_str.length] = new Option(state_arr[i],state_arr[i]);
    	}
    	console.log(option_str.options);
    	option_str.selectedIndex = "2";
    }
    function print_city(city_id, city_index){
        
    	var option_str = document.getElementById(city_id);
    	option_str.length=0;	// Fixed by Julian Woods
    	option_str.options[0] = new Option('Select City','');
    	option_str.selectedIndex = 0;
    	var city_arr = s_a[city_index].split("|");
    	for (var i=0; i<city_arr.length; i++) {
    		option_str.options[option_str.length] = new Option(city_arr[i],city_arr[i]);
    	}
    }
    function print_city_load(city_id, city_index){
        var e = document.getElementById("state");
        var city_index1 = e.options[e.selectedIndex].index;
        var city_selected = "<?php echo $resume['city'];?>";
    	var option_str = document.getElementById(city_id);
    	option_str.length=0;	// Fixed by Julian Woods
    	option_str.options[0] = new Option('Select City','');
    	var city_arr = s_a[city_index1].split("|");
        var city_index_sel = 0;
    	for (var i=0; i<city_arr.length; i++) {
    		option_str.options[option_str.length] = new Option(city_arr[i],city_arr[i]);
    		console.log(option_str.options[i].value+"__"+city_selected);
    		if((option_str.options[i].value).trim() == city_selected){
    		    city_index_sel = i;
    		}
    	}
    	option_str.selectedIndex = city_index_sel;
    }

    function onkup(id,val){

        // alert(id);

        $('#'+id).text(val);

    }



    function onkup_skills()

    {

        var app_skills='';

        var arr = $('#skills').val().split(',');

        $.each( arr, function( key, value ) {

            app_skills+='<span class="skill-color" style="display: inline-block; padding: 5px 15px; background:<?php echo $resume_clr; ?>; margin-right: 5px; margin-bottom: 10px; color:#FFFFFF; border-radius:3px; font-size: 65%; line-height: 110%;">'+value+'</span>'

        });

        $('#v_skills').html(app_skills);

    }



    function add_awr()

    {

        $('.award_sec').append('<div class="form-group add-extra" id="awrdiv'+aw+'"><button type="button" class="btn btn-danger" onclick="remawr('+aw+')">X</button><label>Certifications / Awards</label><input type="text" class="input-text" name="awards[]" id="awar'+aw+'" onkeyup="pass_awar('+aw+',this.value)"> </div>');

        $('#apnt_awrd').append('<li id="viewawr'+aw+'"></li>');

        aw++;

        awc++;

        if(awc==3){

            hidebtn('addawr');

        }

    }

    function pass_awar(id,val){

        $('#viewawr'+id).text(val);

    }

    function add_ach()

    {

        $('.ach_sec').append('<div class="form-group add-extra" id="achdiv'+ach+'"><button type="button" class="btn btn-danger" onclick="remach('+ach+')">X</button><label>Key Achievements</label><input type="text" class="input-text" name="achievements[]" id="ach'+ach+'" onkeyup="pass_ach('+ach+',this.value)"> </div>');

        $('#apnt_ach').append('<li id="viewach'+ach+'" id="ach'+ach+'"></li>');

        ach++;

        achc++;

        if(achc==5){

            hidebtn('addach');

        }

    }

    function pass_ach(id,val){

        $('#viewach'+id).text(val);

    }



    function remawr(i)

    {

        $('#awrdiv'+i).remove();

        $('#viewawr'+i).remove();

        awc--;

        showbtn('addawr');

    }



    function remach(i)

    {

        $('#achdiv'+i).remove();

        $('#viewach'+i).remove();

        achc--;

        showbtn('addach');

    }



    function hidebtn(id)

    {

        $('#'+id).hide();

    }

    function showbtn(id)

    {

        $('#'+id).show();

    }





    $(document).ready(function(){

        show_cmpexp_div();

        show_edu_div();

    });



    function show_cmpexp_div()

    {

        var val = $('#company_exp').val();

        $('.company_exp_div').hide();

        $('.company_exp_div1').hide();

        $('.company_exp_div2').hide();

        $('.company_exp_div3').hide();

        $('.company_exp_div4').hide();

        $('.company_exp_div5').hide();

        if(val==0 || val==''){

            $('.company_exp_div').show();

        } else{

            for(var i=1; i<=val; i++){

                $('.company_exp_div'+i).show();

            }

        }

    }

    function show_edu_div()

    {

        var val = $('#edu_level').val();

        $('.edu_div1').hide();

        $('.edu_div2').hide();

        $('.edu_div3').hide();

        for(var i=1; i<=val; i++){

            $('.edu_div'+i).show();

        }

    }
    

</script>
