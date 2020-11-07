<!-- Form content box start -->
<div class="form-content-box">
    <!-- details -->
    <div class="details">
        <!-- Name -->
        <h3>Create an account</h3>
        <!-- Form start-->
        <form action="<?php echo site_url('register'); ?>" method="POST">
            <div class="form-group">
                <input type="text" name="name" class="input-text" placeholder="Name">
            </div>
            <div class="form-group">
                <input type="email" name="email" class="input-text" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="text" name="phone" class="input-text" placeholder="Contact Number">
            </div>
            <!--<div class="form-group">
                                <input type="text" name="mobile" class="input-text" placeholder="Alternate Number">
                            </div>-->
            <div class="form-group">
                <input type="password" name="password" class="input-text" placeholder="Password">
            </div>
            <div class="form-group">
                <input type="password" name="c_password" class="input-text" placeholder="Confirm Password">
            </div>
            <div class="form-group form-check">
                
                <label class="form-check-label" for="exampleCheck1">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                    Agree to <a type="" class="" data-toggle="modal" data-target="#exampleModal">

                       <u> terms and conditions</u>
                    </a></label>
            </div>

            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Terms and conditions</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body text-left">
                            
1. Registration with Code Headed  means that your candidature details have been added to our Database.<br/>
2. Registration with Code Headed  doesn’t mean that you will be guaranteed placed somewhere or we are assuring you about job placement. Registration fees is just a facilitation charges to keep your details in our database and to intimate you about any suitable vacancy.<br/> 
3. Code Headed  and its job center do not take any guarantee of your placement or selection against any vacancy as selection is totally depends upon the skills of jobseekers and this is sole right of HR of Code Headed  or HR of its client to select or reject any candidate.<br/> 
4. If any of our job center or HR assure you that they will place you or take it’s guarantee, please intimate the company for same and consider that statement as false & Code Headed  do no support such false commitment as selection or joining is not in the hand of any job center or in the hand of any HR. It’s totally depend upon the skills of job seekers and the requirement of HR of our client. We can’t force him to select or reject any particular person. Code Headed  will take appropriate action against people who found involve in such false commitment.<br/>
5.You give authority to Code Headed  to intimate you about jobs via SMS<br/>
6. If a candidate is selected for a job through Code Headed  he/she will be solely the employee of the concerning organization and Code Headed  will be not responsible for any legal/dispute or any other matter between the candidate and the organization.<br/> 
7.The Registration is valid up to one year only from the date of Registration.<br/> 
8.All subject to Bangalore jurisdiction.<br/> 
                            
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group">
                <button type="submit" class="btn-md button-theme btn-block">Signup</button>
            </div>
        </form>
        <!-- <div class="form-group text-center mb-10">
                        	<strong>OR</strong>
                        </div>  -->
        <?php
        // $atts = array('width'      => '800','height'     => '600','scrollbars' => 'yes','status'     => 'yes','resizable'  => 'yes','screenx'    => '0','screeny'    => '0','class' =>'f-signin');
        // $atts2 = array('width'      => '800','height'     => '600','scrollbars' => 'yes','status'     => 'yes','resizable'  => 'yes','screenx'    => '0','screeny'    => '0','class' =>'g-signin');
        ?>
        <!-- <div class="form-group mb-10">
                        <?php //echo anchor_popup(site_url('secure/social_login/Facebook'), '<img src="'.theme_url("img/new-images/fb-btn.jpg").'" alt="" class="img-fluid">', $atts); 
                        ?>
                        </div>
                        <div class="form-group mb-0">
                        <?php //echo anchor_popup(site_url('secure/social_login/Google'), '<img src="'.theme_url("img/new-images/gp-btn.jpg").'" alt="" class="img-fluid">', $atts2); 
                        ?>
                        </div>                   -->
    </div>
    <!-- Footer -->
    <div class="footer">
        <span>Already a member? <a href="<?php echo site_url('login'); ?>">Login here</a></span>
    </div>
</div>
<!-- Form content box end -->