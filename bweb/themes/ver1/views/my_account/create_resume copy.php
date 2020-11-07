<?php $edu_count = !empty($resume['education']) ? count($resume['education']):1; ?>
<?php $achv_count = !empty($resume['achievements']) ? count($resume['achievements']):1; ?>
<?php $awards_count = !empty($resume['awards']) ? count($resume['awards']):1; ?>
<div class="content-area5 dashboard-content">
                <div class="dashboard-header clearfix">
                    <div class="row create-resume" ng-controller="ResCtrl">
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs nav-justified" id="nav-tab" role="tablist">
                                    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Personal Info</a>
                                    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Profession</a>
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
                                                            <label>Name <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="50" class="input-text" name="name" ng-model="name" value="<?php echo set_value('name',$resume['name']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Email id <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="100" class="input-text" name="email" ng-model="email" ng-pattern="/^([6-9]{1}[0-9]{9}|[^\s@]+@[^\s@]+\.[^\s@]{2,})$/" value="<?php echo set_value('email',$resume['email']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Phone Number  <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="10" class="input-text" name="phone" ng-model="phone" value="<?php echo set_value('phone',$resume['phone']); ?>">
                                                         </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label>Alternate Phone Number</label>
                                                            <input type="text" maxlength="10" class="input-text" name="mobile" ng-model="mobile" value="<?php echo set_value('mobile',$resume['mobile']); ?>">
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
                                                            <label>Objectives</label>
                                                            <input type="text" maxlength="200" class="input-text" name="objectives" ng-model="objectives" value="<?php echo set_value('objectives',$resume['objectives']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Languages your are fluent with <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="70" class="input-text" name="languages" ng-model="languages" value="<?php echo set_value('languages',$resume['languages']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Address <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="250" class="input-text" name="address" ng-model="address" value="<?php echo set_value('address',$resume['address']); ?>">
                                                       </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>City <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="30" class="input-text" name="city" ng-model="city" value="<?php echo set_value('city',$resume['city']); ?>">
                                                        </div>
                                                    </div>  
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>State <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="25" class="input-text" name="state" ng-model="state" value="<?php echo set_value('state',$resume['state']); ?>">
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label>Zipcode <sup class="text-danger">*</sup></label>
                                                            <input type="text" maxlength="6" class="input-text" name="pincode" ng-model="pincode" value="<?php echo set_value('pincode',$resume['pincode']); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <!-- <a href="step2.php" class="btn btn-md button-default">Back</a> -->
                                                        </div>
                                                    </div> 
                                                    <div class="col-md-6">
                                                        <div class="form- text-right">
                                                        <a href="javascript:;" onclick="$('#nav-profile-tab').click()" class="btn btn-md button-theme">Next : Work Histroy</a>
                                                            <!-- <a href="step2.php" class="btn btn-md button-theme">Next : Work Histroy</a> -->
                                                        </div>
                                                    </div> 
                                                </div>
                                            </div>

                                            <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group row">
                                                            <label class="col-md-6">Number of Companies you have worked <sup class="text-danger">*</sup> (Enter only numbers. Max 5 companies)</label>
                                                            <input type="text" maxlength="1" class="input-text col-md-4" name="company_exp" ng-model="company_exp" value="<?php echo set_value('company_exp',$resume['company_exp']); ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                                <fieldset ng-show="company_exp>=1">
                                                    <legend>Current Company</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Job Title <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="70" class="input-text" name="work_exp[1][job_title]" ng-model="jt_1" value="<?php echo set_value('work_exp[1][job_title]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Company Name <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="50" class="input-text" name="work_exp[1][company]" ng-model="cmp_1" value="<?php echo set_value('work_exp[1][cmp_1]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[1][exp_f_date]" ng-model="exp_f_date_1" value="<?php echo set_value('work_exp[1][exp_f_date]'); ?>">
                                                        </div>
                                                        </div>                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>End Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[1][exp_t_date]" ng-model="exp_t_date_1" value="<?php echo set_value('work_exp[1][exp_t_date]'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Roles and Responsibilities<sup class="text-danger">*</sup></label>
                                                                <textarea class="input-text" maxlength="250" name="work_exp[1][w_description]" ng-model="w_description_1"><?php echo set_value('work_exp[1][w_description]'); ?></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset ng-show="company_exp>=2">
                                                    <legend>Company 2</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Job Title <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="70" class="input-text" name="work_exp[2][job_title]" ng-model="jt_2" value="<?php echo set_value('work_exp[2][job_title]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Company Name <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="50" class="input-text" name="work_exp[2][company]" ng-model="cmp_2" value="<?php echo set_value('work_exp[2][cmp_1]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[2][exp_f_date]" ng-model="exp_f_date_2" value="<?php echo set_value('work_exp[2][exp_f_date]'); ?>">
                                                        </div>
                                                        </div>                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>End Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[2][exp_t_date]" ng-model="exp_t_date_2" value="<?php echo set_value('work_exp[2][exp_t_date]'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Roles and Responsibilities<sup class="text-danger">*</sup></label>
                                                                <textarea class="input-text" maxlength="250" name="work_exp[2][w_description]" ng-model="w_description_2"><?php echo set_value('work_exp[2][w_description]'); ?></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset ng-show="company_exp>=3">
                                                    <legend>Company 3</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Job Title <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="70" class="input-text" name="work_exp[3][job_title]" ng-model="jt_3" value="<?php echo set_value('work_exp[3][job_title]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Company Name <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="50" class="input-text" name="work_exp[3][company]" ng-model="cmp_3" value="<?php echo set_value('work_exp[3][cmp_1]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[3][exp_f_date]" ng-model="exp_f_date_3" value="<?php echo set_value('work_exp[3][exp_f_date]'); ?>">
                                                        </div>
                                                        </div>                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>End Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[3][exp_t_date]" ng-model="exp_t_date_3" value="<?php echo set_value('work_exp[3][exp_t_date]'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Roles and Responsibilities<sup class="text-danger">*</sup></label>
                                                                <textarea class="input-text" maxlength="250" name="work_exp[3][w_description]" ng-model="w_description_3"><?php echo set_value('work_exp[3][w_description]'); ?></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset ng-show="company_exp>=4">
                                                    <legend>Company 4</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Job Title <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="70" class="input-text" name="work_exp[4][job_title]" ng-model="jt_4" value="<?php echo set_value('work_exp[4][job_title]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Company Name <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="50" class="input-text" name="work_exp[4][company]" ng-model="cmp_4" value="<?php echo set_value('work_exp[4][cmp_1]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[4][exp_f_date]" ng-model="exp_f_date_4" value="<?php echo set_value('work_exp[4][exp_f_date]'); ?>">
                                                        </div>
                                                        </div>                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>End Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[4][exp_t_date]" ng-model="exp_t_date_4" value="<?php echo set_value('work_exp[4][exp_t_date]'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Roles and Responsibilities<sup class="text-danger">*</sup></label>
                                                                <textarea class="input-text" maxlength="250" name="work_exp[4][w_description]" ng-model="w_description_4"><?php echo set_value('work_exp[4][w_description]'); ?></textarea>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </fieldset>

                                                <fieldset ng-show="company_exp>=5">
                                                    <legend>Company 5</legend>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Job Title <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="70" class="input-text" name="work_exp[5][job_title]" ng-model="jt_5" value="<?php echo set_value('work_exp[5][job_title]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Company Name <sup class="text-danger">*</sup></label>
                                                                <input type="text" maxlength="50" class="input-text" name="work_exp[5][company]" ng-model="cmp_5" value="<?php echo set_value('work_exp[5][cmp_1]'); ?>">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Start Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[5][exp_f_date]" ng-model="exp_f_date_5" value="<?php echo set_value('work_exp[5][exp_f_date]'); ?>">
                                                        </div>
                                                        </div>                                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>End Date</label>
                                                                <input type="month" placeholder="YYYY-MM" class="input-text" name="work_exp[5][exp_t_date]" ng-model="exp_t_date_5" value="<?php echo set_value('work_exp[5][exp_t_date]'); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Roles and Responsibilities<sup class="text-danger">*</sup></label>
                                                                <textarea class="input-text" maxlength="250" name="work_exp[5][w_description]" ng-model="w_description_5"><?php echo set_value('work_exp[5][w_description]'); ?></textarea>
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
                                                <div class="education-sec">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>College Name</label>
                                                                <input type="text" class="input-text" name="education[1][institute]" ng-model="inst_1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Degree</label>
                                                                <select class="input-text" name="education[1][degree]" ng-model="degree_1"><option>--Select--</option><option>Phd</option><option>B.E</option><option>BSc</option><option>BCom</option><option>Other</option></select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 text-centre">
                                                            <label class="in-sec"><span>In</span></label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Branch</label>
                                                                <input type="text" class="input-text" name="education[1][branch]" ng-model="branch_1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input type="text" placeholder="YYYY-MM" class="input-text" name="education[1][edu_f_date]" ng-model="edu_f_date_1">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <input type="text" placeholder="YYYY-MM" class="input-text" name="education[1][edu_t_date]" ng-model="edu_t_date_1">
                                                            </div>
                                                        </div>
                                                    </div>  
                                                    <?php if($edu_count>1){  for($i=2; $i<=$edu_count; $i++){ ?>
                                                        <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>College Name</label>
                                                                <input type="text" class="input-text" name="education[<?php echo $i; ?>][institute]" ng-model="inst_<?php echo $i; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Degree</label>
                                                                <select class="input-text" name="education[<?php echo $i; ?>][degree]" ng-model="degree_<?php echo $i; ?>"><option>--Select--</option><option>Phd</option><option>B.E</option><option>BSc</option><option>BCom</option><option>Other</option></select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-1 text-centre">
                                                            <label class="in-sec"><span>In</span></label>
                                                        </div>
                                                        <div class="col-md-5">
                                                            <div class="form-group">
                                                                <label>Branch</label>
                                                                <input type="text" class="input-text" name="education[<?php echo $i; ?>][branch]" ng-model="branch_<?php echo $i; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>From</label>
                                                                <input type="text" placeholder="YYYY-MM" class="input-text" name="education[<?php echo $i; ?>][edu_f_date]" ng-model="edu_f_date_<?php echo $i; ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>To</label>
                                                                <input type="text" placeholder="YYYY-MM" class="input-text" name="education[<?php echo $i; ?>][edu_t_date]" ng-model="edu_t_date_<?php echo $i; ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php  } } ?>                                                  
                                                </div>
                                                
                                                <div class="row">
                                                    <div class="col-md-12 text-right">
                                                        <div class="form-group"><button type="button" class="btn btn-primary" onclick="add_edu();" id="addedu">Add </button></div>
                                                    </div>
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
                                                            <label>Enter your Skills</label>
                                                            <textarea class="input-text" name="skills" ng-model="skills"><?php echo set_value('skills'); ?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label>Area of Expertise</label>
                                                            <textarea class="input-text" name="expertise" ng-model="expertise"><?php echo set_value('expertise'); ?></textarea>
                                                        </div>
                                                    </div>
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
                                                        <div class="col-md-12 award_sec">
                                                            <div class="form-group add-extra">
                                                                <button type="button" class="btn btn-primary" id="addawr" onclick="add_awr()">+</button>
                                                                <label>Certifications / Awards</label>  
                                                                <input type="text" class="input-text" name="awards[]" ng-model="awar1">   
                                                            </div> 
                                                            <?php if(!empty($resume['awards'])) {  for($i=2; $i<=$awards_count; $i++){ ?>
                                                            <div class="form-group add-extra" id="awrdiv<?php echo $i; ?>">
                                                            <button type="button" class="btn btn-danger" onclick="remawr('<?php echo $i; ?>')">X</button>
                                                            <label>Certifications / Awards</label>  
                                                                <input type="text" class="input-text" name="awards[]" ng-model="awar<?php echo $i; ?>">   
                                                            </div>
                                                            <?php } } ?>                                                            
                                                        </div>  
                                                        
                                                        <div class="col-md-12 ach_sec">
                                                            <div class="form-group add-extra">
                                                                <button type="button" class="btn btn-primary" id="addach" onclick="add_ach()">+</button>
                                                                <label>Key Achievements</label>
                                                                <input type="text" class="input-text" name="achievements[]" ng-model="ach1">
                                                            </div>
                                                            <?php if(!empty($resume['achievements'])) {  for($i=2; $i<=$achv_count; $i++){ ?>
                                                            <div class="form-group add-extra" id="achdiv<?php echo $i; ?>">
                                                            <button type="button" class="btn btn-danger" onclick="remach('<?php echo $i; ?>')">X</button>
                                                            <label>Key Achievements</label>  
                                                                <input type="text" class="input-text" name="achievements[]" ng-model="ach<?php echo $i; ?>">   
                                                            </div>
                                                            <?php } } ?> 
                                                        </div>
                                                       
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                            <a href="javascript:;" onclick="$('#nav-profile1-tab').click()" class="btn btn-md button-default">Back</a>
                                                        </div>
                                                        </div> 
                                                        <div class="col-md-6">
                                                            <div class="form- text-right">
                                                            <input type="hidden" name="res_color" value="<?php echo $resume_clr; ?>">
                                                            <input type="hidden" name="color_id" value="<?php echo $color_id; ?>">
                                                                <button type="submit" class="btn btn-md button-theme">Preview</button>
                                                            </div>
                                                        </div>                                                        
                                                                                                                
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-5">
                                        <div class="resume-sec">
                                        <table style="width:100%; padding:0px; margin:0px auto; border-collapse:collapse; border-spacing:0px; background:#f7f7f7; vertical-align:top; border:1px solid #f0f0f0; box-shadow:none; font-size:12px; line-height: 16px;">
                    
                    <tr><td style="height: 10px; background-color: #FFFFFF;"></td></tr> 
                    <tr>
                        <td style="padding: 0px; margin:0px; border:none;">
                            <table  style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">
                                <tr>
                                    <td style="width:30%; padding: 0px 5px; background-color: #FFFFFF; vertical-align: top; font-size:14px; text-align:right;">
                                        <h4 style="margin: 5px 0px 10px; color: <?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600; font-size: 80%; line-height: 90%;" class="h-color">Personal Information</h4>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong><i class="fa fa-user"></i> :</strong> {{name}}
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong><i class="fa fa-envelope"></i> :</strong> {{email}}
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong><i class="fa fa-mobile"></i>  :</strong> {{phone}}
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong><i class="fa fa-phone"></i>  :</strong> {{mobile}}
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong><i class="fa fa-map-marker"></i>  :</strong>  {{address}},<br> {{city}} – {{pincode}}.                                
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong>Languages :</strong>{{languages}}.
                                        </p>
            
                                        <h4 style="margin: 25px 0px 10px;color: <?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color">Education</h4>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong ng-bind="degree_1"></strong> <br>
                                            <strong ng-bind="branch_1"></strong> <br>
                                            <span><span ng-bind="edu_f_date_1 | date:'MMMM yyyy'"></span> - <span ng-bind="edu_t_date_1 | date:'MMMM yyyy'"></span> </span> <br>
                                            <strong ng-bind="inst_1"></strong>                         
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong ng-bind="degree_2"></strong> <br>
                                            <strong ng-bind="branch_2"></strong> <br>
                                            <span><span ng-bind="edu_f_date_2 | date:'MMMM yyyy'"></span> - <span ng-bind="edu_t_date_2 | date:'MMMM yyyy'"></span> </span> <br>
                                            <strong ng-bind="inst_2"></strong>            
                                        </p>
                                        <p style="margin:0px 0px 10px; font-size: 65%; line-height: 110%;">
                                            <strong ng-bind="degree_3"></strong> <br>
                                            <strong ng-bind="branch_3"></strong> <br>
                                            <span><span ng-bind="edu_f_date_3 | date:'MMMM yyyy'"></span> - <span ng-bind="edu_t_date_3 | date:'MMMM yyyy'"></span> </span> <br>
                                            <strong ng-bind="inst_3"></strong>            
                                        </p>
            
                                        <h4 style="margin: 25px 0px 10px; color: <?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color"> Certifications / Awards</h4>
                                        <ul style="font-size: 65%; line-height: 110%;" id="apnt_awrd">
                                        <?php if(!empty($resume['awards'])) {
                                            for ($i=1; $i<=$awards_count; $i++) { ?>
                                            <li id="viewawr<?php echo $i; ?>" ng-bind="awar<?php echo $i; ?>"></li>
                                        <?php } } ?>
                                        </ul> 
                                    </td>
            
                                    <td style="border-right: 1px solid #000000; padding:0px; margin:0px;"></td>
            
                                    <td style="vertical-align: top;">
                                        <table  style="width:100%; border-collapse:collapse; border-spacing:0px; background-color:#FFFFFF; vertical-align:top; border:none; box-shadow:none;">
                                            <tr>
                                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                                    <h4 style="margin: 5px 0px 10px; color: <?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color">Objectives</h4> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; vertical-align: top;">  
                                                   
                                                    <p style="margin:0px 0px 15px; font-size: 65%; line-height: 110%;">{{objectives}}</p>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                                    <h4 style="margin: 5px 0px 10px; color: <?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color">Skills</h4> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; vertical-align: top;">
                                                    <span class="skill-color" style="display: inline-block; padding: 5px 15px; background:<?php echo $resume_clr; ?>; margin-right: 5px; margin-bottom: 10px; color:#FFFFFF; border-radius:3px; font-size: 65%; line-height: 110%;" ng-repeat="skil in (skills | customSplitString)">{{skil}}</span>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                                    <h4 style="margin: 15px 0px 10px; color:<?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color">Area of Expertise</h4> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; vertical-align: top;"> 
                                                    <ul style="margin-top: 0px; font-size: 65%; line-height: 110%; padding-left:20px;">
                                                        {{expertise}}
                                                    </ul>
                                                </td>
                                            </tr>
                                            
                                            <tr>
                                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                                    <h4 style="margin: 15px 0px 10px; color: <?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color">Experience</h4> 
                                                </td>
                                            </tr>
                                            <tr ng-show="company_exp>=1">
                                                <td style="padding: 0px 5px; vertical-align: top;">  
                                                    <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                        <strong>{{cmp_1}}</strong> |  <span ng-bind="exp_f_date_1 | date:'MMMM yyyy'"></span> - Present 
                                                    </p> 
                                                    <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                        <strong>{{jt_1}}</strong>
                                                    </p> 
                                                    <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">
                                                        <strong>Roles and Responsibilities</strong><br>
                                                        {{w_description_1}}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr ng-show="company_exp>=2">
                                                <td style="padding: 0px 5px; vertical-align: top;">  
                                                    <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                        <strong>{{cmp_2}}</strong> | <span ng-bind="exp_f_date_2 | date:'MMMM yyyy'"></span> - <span ng-bind="exp_t_date_2 | date:'MMMM yyyy'"></span>
                                                    </p> 
                                                    <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                        <strong>{{jt_2}}</strong>
                                                    </p> 
                                                    <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">
                                                        <strong>Roles and Responsibilities</strong><br>
                                                        {{w_description_2}}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr ng-show="company_exp>=3">
                                                <td style="padding: 0px 5px; vertical-align: top;">  
                                                    <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                    <strong>{{cmp_3}}</strong> | <span ng-bind="exp_f_date_3 | date:'MMMM yyyy'"></span> - <span ng-bind="exp_t_date_3 | date:'MMMM yyyy'"></span>
                                                    </p> 
                                                    <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                        <strong>{{jt_3}}</strong>
                                                    </p>
                                                    <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">
                                                        <strong>Roles and Responsibilities</strong><br>
                                                        {{w_description_3}}
                                                    </p>
                                                </td>
                                            </tr>
                                            <tr ng-show="company_exp>=4">
                                                                        <td style="padding: 0px 5px; vertical-align: top;">
                                                                            <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                                                <strong>{{cmp_4}}</strong> | <span ng-bind="exp_f_date_4 | date:'MMMM yyyy'"></span> - <span ng-bind="exp_t_date_4 | date:'MMMM yyyy'"></span>
                                                                            </p>
                                                                            <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                                                <strong>{{jt_4}}</strong>
                                                                            </p>
                                                                            <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">
                                                                                <strong>Roles and Responsibilities</strong><br>
                                                                                {{w_description_4}}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                                                    <tr ng-show="company_exp>=5">
                                                                        <td style="padding: 0px 5px; vertical-align: top;">
                                                                            <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                                                <strong>{{cmp_5}}</strong> | <span ng-bind="exp_f_date_5 | date:'MMMM yyyy'"></span> - <span ng-bind="exp_t_date_5 | date:'MMMM yyyy'"></span>
                                                                            </p>
                                                                            <p style="margin:0px 0px 5px; font-size: 65%; line-height: 110%;">
                                                                                <strong>{{jt_5}}</strong>
                                                                            </p>
                                                                            <p style="margin:0px 0px 25px; font-size: 65%; line-height: 110%;">
                                                                                <strong>Roles and Responsibilities</strong><br>
                                                                                {{w_description_5}}
                                                                            </p>
                                                                        </td>
                                                                    </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; text-align: left; vertical-align: top;">
                                                    <h4 style="margin: 15px 0px 10px; color:<?php echo $resume_clr; ?>; font-size: 1.2rem; font-weight: 600;  font-size: 80%; line-height: 90%;" class="h-color">Key Achievements</h4> 
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="padding: 0px 5px; vertical-align: top;"> 
                                                    <ul style="margin-top: 0px; font-size: 65%; line-height: 110%; padding-left:20px;" id="apnt_ach">
                                                    <?php if(!empty($resume['achievements'])) {
                                            for ($i=1; $i<=$achv_count; $i++) { ?>
                                            <li id="viewach<?php echo $i; ?>" ng-bind="ach<?php echo $i; ?>"></li>
                                        <?php } } ?>
                                                    </ul>
                                                </td>
                                            </tr>
                                        </table>
            
                                        
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr> 
                    <tr><td style="height: 10px; background-color: #FFFFFF;"></td></tr> 
                </table>
                                        </div>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<script>
var ed =<?php echo $edu_count; ?>;
var edc = <?php echo $edu_count; ?>+1;
var aw = <?php echo $awards_count; ?>+1; 
var awc = <?php echo $awards_count; ?>; 
var ach = <?php echo $achv_count; ?>+1;
var achc = <?php echo $achv_count; ?>;
$(document).ready(function(){
    if(ed==3){
        hidebtn('addedu');
     }    
     if(aw==5){
        hidebtn('addawr');
     }  
     if(ach==5){
        hidebtn('addach');
     }      
});
function add_edu()
{
    $('.education-sec').append('<div class="row" id="edudiv'+edc+'"><div class="col-md-12"><div class="form-group"><label>College Name</label><input type="text" class="input-text" name="education['+edc+'][institute]"></div></div><div class="col-md-6"><div class="form-group"><label>Degree</label><select class="input-text" name="education['+edc+'][degree]"><option value="">--Select--</option><option value="Phd">Phd</option><option value="B.E">B.E</option><option value="BSc">BSc</option><option value="BCom">BCom</option><option value="Other">Other</option></select></div></div><div class="col-md-1 text-centre"><label class="in-sec"><span>In</span></label></div><div class="col-md-5"><div class="form-group"><label>Branch</label><input type="text" class="input-text" name="education['+edc+'][branch]"></div></div><div class="col-md-6"><div class="form-group"><label>From</label><input type="text" class="input-text" name="education['+edc+'][edu_f_date]" placeholder="YYYY-MM"></div></div><div class="col-md-6"><div class="form-group"><label>To</label><input type="text" class="input-text" name="education['+edc+'][edu_t_date]" placeholder="YYYY-MM"></div></div></div>');
    // $('#edushow'+edc).show();
    ed++; edc++;
     if(ed==3){
        hidebtn('addedu');
     }                                               
}

function add_awr()
{
    $('.award_sec').append('<div class="form-group add-extra" id="awrdiv'+aw+'"><button type="button" class="btn btn-danger" onclick="remawr('+aw+')">X</button><label>Certifications / Awards</label><input type="text" class="input-text" name="awards[]" ng-model="awar'+aw+'" onkeyup="pass_awar(this.value,'+aw+')"> </div>');
    $('#apnt_awrd').append('<li id="viewawr'+aw+'" ng-bind="awar'+aw+'"></li>');    
    aw++;
    awc++;
     if(awc==5){
        hidebtn('addawr');
     }                                               
}
function pass_awar(val,id){
$('#viewawr'+id).text(val);
}
function add_ach()
{
    $('.ach_sec').append('<div class="form-group add-extra" id="achdiv'+ach+'"><button type="button" class="btn btn-danger" onclick="remach('+ach+')">X</button><label>Key Achievements</label><input type="text" class="input-text" name="achievements[]" ng-model="ach'+ach+'" onkeyup="pass_ach(this.value,'+ach+')"> </div>');
    $('#apnt_ach').append('<li id="viewach'+ach+'" ng-bind="ach'+ach+'"></li>');  
    ach++;
    achc++;
     if(achc==5){
        hidebtn('addach');
     }                                               
}
function pass_ach(val,id){
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
</script>