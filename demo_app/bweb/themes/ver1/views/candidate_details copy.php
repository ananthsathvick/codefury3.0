<!-- Sub banner start -->
<div class="sub-banner bg-color-full">
	<div class="sub-banner-img" style="background-image:url(<?php echo theme_url(); ?>img/new-images/banner-3.jpg);"></div>
    <div class="container">
        <div class="breadcrumb-area">            
            <ul class="breadcrumbs">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active"><a href="<?php echo site_url('candidate-list'); ?>">Candidates Listing</a></li>
                <li class="active">Candidates Details</li>
            </ul>            
        </div>
        <div class="row">
        	<div class="col-lg-8">
            <form action="<?php echo site_url('candidate-list') ?>">
            	<div class="row main-search">
                    <div class="col-md-4 pr-0">
                        <div class="form-group">
                        	<?php echo  form_dropdown('d', $industries, $this->input->get('d'),'class="form-control"');
                             ?>
                        </div>
                    </div>
                    <div class="col-md-2 p-0">
                    	<div class="form-group">
                        	<select class="form-control" name="f1">
                            <option value=''>Location</option>
                            <?php foreach($location as $key=>$loc){ ?> 
                                <option value="<?php echo $key; ?>" <?php echo (isset($_GET['f1']) && $_GET['f1'] == $key) ? 'selected=selected':''; ?>><?php echo $loc; ?></option>
                                <?php }?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 p-0">
                    	<div class="form-group">
                        <select class="form-control" name="f3">
                            <option value=''>Experience</option>
                            <?php for($i=0; $i<15; $i++){ ?>
                                <option value="<?php echo $i; ?>" <?php echo (isset($_GET['f3']) && $_GET['f3'] == $i) ? 'selected=selected':''; ?>><?php echo $i.' Yr - '.($i+1).' Yr'; ?></option>
                            <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 p-0">
                    	<div class="form-group">
                        <select class="form-control" name="f4">
                                <option value="">Gender</option>
                                <option value="1" <?php echo (isset($_GET['f4']) && $_GET['f4'] == 1) ? 'selected=selected':''; ?>>Male</option>
                                <option value="2" <?php echo (isset($_GET['f4']) && $_GET['f4'] == 2) ? 'selected=selected':''; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2 p-0">
                    	<button type="submit" class="btn btn-block btn-primary text-uppercase">Search</button>
                        <span>Advance Search</span>
                    </div>
                </div>
                </form>

            </div>
            <!-- <div class="col-sm-12">
            	<h6 class="text-white"><small>Related Searches</small></h6>
                <span class="tag-sea">Brand Management</span> <span class="tag-sea">Team Management</span> <span class="tag-sea">Manager Sales and Marketing</span>
            </div> -->
        </div>
    </div>
</div>
<!-- Sub banner end -->
<div class="candidate-section content-area pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <!-- job box start -->
                <div class="candidate-box">
                    <div class="company-logo">
                        <img src="<?php echo theme_url(); ?>img/new-images/male.jpg" alt="avatar">
                    </div>
                    <div class="description detailed">                        
                        <h5 class="title"><?php echo $resume->name; ?></h5>
                        <div class="row">
                            <div class="col-lg-4">
                                <p><i class="fa fa-mobile"></i> <?php echo $resume->phone; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <p><i class="fa fa-envelope"></i> <?php echo $resume->email; ?></p>
                            </div>
                            <div class="col-lg-4">
                                <p><i class="fa fa-phone"></i> <?php echo $resume->mobile; ?></p>
                            </div>                                                     
                        </div>                                                
                    </div>
                    <div class="text-right">
                    	<a href="<?php echo site_url('download-resume/'.$resume->id); ?>" class="btn btn-primary btn-sm" >Download CV </a>
                    </div>                    
                </div>
              
                <!-- about me start -->
                <div class="d-box about-me mb-40">
                    <h3 class="heading-2">Personal Information</h3>
                    <div class="s-border"></div>
                    <!-- <p>Father Name : <strong>Rajesh Kumar</strong></p> -->
                    <!-- <p>Mother Name : <strong>Rekha</strong></p> -->
                    <p>Languages : <strong><?php echo $resume->languages; ?></strong></p>
                    <p>Address : <strong><?php echo $resume->address; ?></strong></p>
					<!-- <p>Hobbies : <strong>Playing cricket, Listening Songs</strong></p> -->
                </div>
                <div class="d-box about-me mb-40">
                    <h3 class="heading-2">Other Details</h3>
                    <div class="s-border"></div>
                    <!-- <p>Salary Expectation : <strong>Rs 12,000 - Rs 25,000</strong></p> -->
                    <!-- <p>Job Type : <strong>Full time</strong></p> -->
                    <p>Qualification : <strong><?php echo isset($education[1]['degree']) ? $education[1]['degree']:''; ?> (<?php echo isset($education[1]['branch']) ? $education[1]['branch']:''; ?>)</strong></p>
                    <p>Experience : <strong><?php echo $resume->tot_experience; ?>  years</strong></p>
                    <p>Key Skills : <strong><?php echo $resume->skills; ?> </strong></p>
                </div>
                <!-- Education start-->
                <div class="d-box education mb-50">
                    <h3 class="heading-2">Education</h3>
                    <div class="s-border"></div>
                    <?php foreach($education as $edu){ ?>
                    <div class="education-box mt-3">
                        <div class="icon">
                            <i class="flaticon-mortarboard"></i>
                        </div>
                        <div class="employer-info">
                        	<h5><?php echo $edu['institute']; ?> <span> / <?php echo $edu['degree']; ?> - <?php echo $edu['branch']; ?></span></h5>
                            <h6><?php echo date('Y',strtotime($edu['edu_f_date'])); ?> - <?php echo date('Y',strtotime($edu['edu_t_date'])); ?></h6>
                            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus tincidunt aliquam. Aliquam gravida massa at sem vulputate interdum.</p> -->
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <?php if(!empty($work_exp)){ ?>
                <!-- Work experiance start-->
                <div class="d-box work-experiance mb-50">
                    <h3 class="heading-2">Work Experiance</h3>
                    <div class="s-border"></div>
                    <?php foreach($work_exp as $work_ex) { if($work_ex->job_title!=''){ ?>
                    <div class="education-box mt-3">
                        <div class="icon">
                            <i class="flaticon-work"></i>
                        </div>
                        <div class="employer-info">
                          	 <h5><?php echo $work_ex->job_title; ?> <span> / <?php echo $work_ex->company; ?></span></h5>
                            <h6><?php echo date('Y',strtotime($work_ex->exp_f_date)); ?> - <?php echo date('Y',strtotime($work_ex->exp_t_date)); ?></h6>
                            <p><?php echo $work_ex->w_description; ?></p>  
                        </div>
                    </div>
                    <?php } } ?>
                    </div>   
                <?php } ?>             
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="sidebar-right-2">
                    <div class="job-overview widget">
                        <h3 class="sidebar-title">Similar Candidates</h3>
                        <div class="s-border"></div>
                        <?php foreach($similar_resumes as $sim_res){ 
                            $edu = json_decode($sim_res->education,true); ?>
                        <div class="similar-candidates">
                        	<div class="company-logo">
                                <img src="<?php echo theme_url(); ?>img/new-images/male.jpg" alt="avatar">
                            </div>
                            <div class="description">                        
                                <h5 class="title"><a href="<?php echo site_url('canditate-details/'.$sim_res->id); ?>"><?php echo $sim_res->name; ?></a></h5>
                                <p><i class="fa fa-graduation-cap"></i>  <?php echo isset($edu[1]['degree']) ? $edu[1]['degree']:''; ?> (<?php echo isset($edu[1]['branch']) ? $edu[1]['branch']:''; ?>)</p>
                                <p><i class="fa fa-calendar"></i> Passout : <?php echo isset($edu[1]['edu_t_date']) ? date('Y',strtotime($edu[1]['edu_t_date'])):''; ?></p>
                                <p><i class="fa fa-calendar-plus-o"></i> Experience : <?php echo $resume->tot_experience; ?> yrs</p>                           
                            </div>
                            <a href="<?php echo site_url('download-resume/'.$resume->id); ?>" class="btn btn-primary btn-sm btn-block">Download CV</a>
                            <!-- <a href="javascript:void(0)" class="btn btn-primary btn-sm btn-block"  data-toggle="modal" data-target="#cvdownload">Download CV</a> -->
                        </div>
                        <?php } ?>
                    </div>
                    <div class="clearfix"></div>                    
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Candidate section end -->
