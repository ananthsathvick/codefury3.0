<!-- Sub banner start -->
<div class="sub-banner">
	<div class="sub-banner-img" style="background-image:url(<?php echo theme_url(); ?>img/new-images/banner-3.jpg);"></div>
    <div class="container">
        <div class="breadcrumb-area">
            <ul class="breadcrumbs">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="active"><?php echo $page_title; ?></li>
            </ul>
        </div>
        <div class="row">
           
        	<div class="col-lg-8">
            <form action="<?php echo current_url(); ?>" method="GET">
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
                            <?php for($i=0; $i<13; $i++){ ?>
                                <option value="<?php echo $i; ?>" <?php echo (isset($_GET['f3']) && $_GET['f3'] == $i) ? 'selected=selected':''; ?>><?php echo $i.'+ Yrs'; ?></option>
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

<!-- Candidate listing section start -->
<div class="candidate-listing-section content-area pt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-12 position-relative">
                <div class="sidebar-right">
                    <!-- Advanced search start -->
                    <div class="widget-4 advanced-search">                       
                    <form action="<?php echo site_url('pages/quick_enquiry'); ?>" method="post" id="EnqForm" onsubmit="return form_submit('EnqForm')">
                        <div class="campus-placement">
                            <h4>We are well connected with reputed colleges in India. If looking for Campus Recruitment Drive, kindly fill the form mentioned below.</h4>
                            <div class="form-group">
                                <lable>Name</lable>
                                <input type="text" class="form-control" name="name">
                                <span class="text-danger name"></span>
                            </div>
                            <div class="form-group">
                                <lable>Email</lable>
                                <input type="text" class="form-control" name="email">
                                <span class="text-danger email"></span>
                            </div>
                            <div class="form-group">
                                <lable>Contact Number</lable>
                                <input type="text" class="form-control" name="phone">
                                <span class="text-danger phone"></span>
                            </div>
                            <div class="form-group">
                                <lable>Company Name</lable>
                                <input type="text" class="form-control" name="company_name">
                                <span class="text-danger company_name"></span>
                            </div>
                            <div class="form-group">
                                <lable>Message</lable>
                                <textarea class="form-control" name="description"></textarea>
                                <span class="text-danger description"></span>
                            </div>
                            <div class="form-group text-right">
                            <input type="hidden" name="url" value="<?php echo current_url(); ?>">
                            <input type="hidden" name="type" value="3">
                            <input type="hidden" name="pid" value="0">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div> 
                        </div>
                    </form>
                    </div>                    
                </div>
            </div>

            <div class="col-lg-8 col-md-12">
                <!-- Option bar start -->
                <div class="d-none d-xl-block d-lg-block d-md-block d-sm-block mb-30 t-filter">
                	<div class="row">
                    	<div class="col-lg-7 pr-2">
                        	<span><?php echo $cpage+1; ?> - <?php echo $cpage+count($resumes); ?> of <?php echo $total_rows; ?></span> 
							<span class="h-title">Results</span> 
							<!-- <span class="h-title">Jobs in Bangalore</span> -->
                        </div>
                        <div class="col-lg-3 pl-2 pr-2">
                        	<!-- Sort by <select><option>Relevance</option>
                                    <option>Newest</option>
                                    <option>Oldest</option>
                                    <option>Random</option></select> -->
                        </div>
                        <div class="col-lg-2 pl-2 text-right">
                        	<!-- <a href="javascript:void(0)" class="s-fd" title="Detailed view"><i class="fa fa-list-ul"></i> </a>
                            <a href="javascript:void(0)" class="h-fd ml-2" title="List view"><i class="fa fa-list"></i> </a> -->
                        </div>
                    </div>
                </div>
                <!-- Candidate box start -->
				<?php foreach($resumes as $resume){
					$edu = json_decode($resume->education,true);
					// $edu = $edu->1;
					// print_a($edu); ?>
                <div class="candidate-box">
                    <div class="company-logo">
                        <img src="<?php echo theme_url(); ?>img/new-images/male.jpg" alt="avatar">
                    </div>
                    <div class="description">
                        <!--<div class="f-left">-->
                            <h5 class="title"><a href="<?php echo site_url('canditate-details/'.$resume->id); ?>"><?php echo $resume->name; ?></a></h5>
                            <div class="row">
                            	<div class="col-lg-5">
                            		<p><i class="fa fa-graduation-cap"></i> <?php echo isset($edu[1]['degree']) ? $edu[1]['degree']:''; ?> (<?php echo isset($edu[1]['branch']) ? $edu[1]['branch']:''; ?>)</p>
                                </div>
                                <div class="col-lg-3">
                            		<p><i class="fa fa-calendar"></i> Passout : <?php echo isset($edu[1]['edu_t_date']) ? $edu[1]['edu_t_date']:''; ?></p>
                                </div>
                                <div class="col-lg-4">
                            		<p><i class="fa fa-calendar-plus-o"></i> Experience : <?php echo $resume->tot_experience; ?> yrs</p>
                                </div>
                            </div>
                            <div class="row f-details">
                            	<div class="col-lg-8">
                                    <p><i class="fa fa-user-plus"></i> Skills : <?php echo $resume->skills; ?></p>
                            	</div>
                                <div class="col-lg-4">
                            		<!-- <p><i class="fa fa-rupee"></i> 1,50,000 - 2,50,000</p> -->
                                </div>
                            </div>
                        <!--</div>-->
                       <!--<a href="candidate-details.php" class="apply-button">View Resume</a>-->
                    </div>
                    <div class="text-right mt-2">
                        <?php $comp_res_f = $this->session->userdata('company'); $check_download = $this->db->select('view,download')->where(array('resume_id'=>$resume->id,'company_id'=>$comp_res_f['id']))->get('company_resume')->row();?>
                        <?php if(!$check_download || $check_download->download==0){?>
                    	<a href="<?php echo site_url('download-resume?K='.base64_encode($resume->id)); ?>" class="btn btn-primary btn-sm">Download CV</a>
                        <?php } ?>
						<a href="<?php echo site_url('canditate-details?K='.base64_encode($resume->id)); ?>" target="_blank" class="btn btn-warning btn-sm">View Resume</a>
                    </div>
                </div>
				<?php } ?>                
                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
					<?php echo pagination_get($total_rows,$perpage); ?>	                        
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Candidate listing section start -->

<script>
    function get_url_strings(title_id)
    {
        var result = {};
        var location = window.location.href.split('#');
        var parts = location[0].replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            if(key!=title_id && value!='//') {
                result [key] = value;
            }
        });
        var uri_string='';
        jQuery.each(result , function (index, value){
            uri_string += '&' + index + '=' + value;
        });
        return uri_string;
        // console.log(result);
    }
    function getsequence(by)
    {
        var url_s=get_url_strings('by');
        window.location='<?php echo site_url('candidate-list'); ?>?by='+by+url_s;
    }
    function getFilter(title_id)
    {
        var filter = jQuery('.fiter_pro_'+title_id+':checked').map(function() {
            return jQuery(this).val();
        }).get().join('/');
        var url_s=get_url_strings('f'+title_id);
        window.location='<?php echo site_url('candidate-list'); ?>?f'+title_id+'=/'+filter+'/'+url_s;
    }
</script>