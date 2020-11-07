
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
                            <div class="form-group">
                                <input type="text" name="mobile" class="input-text" placeholder="Alternate Number">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="c_password" class="input-text" placeholder="Confirm Password">
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
                        <?php //echo anchor_popup(site_url('secure/social_login/Facebook'), '<img src="'.theme_url("img/new-images/fb-btn.jpg").'" alt="" class="img-fluid">', $atts); ?>
                        </div>
                        <div class="form-group mb-0">
                        <?php //echo anchor_popup(site_url('secure/social_login/Google'), '<img src="'.theme_url("img/new-images/gp-btn.jpg").'" alt="" class="img-fluid">', $atts2); ?>
                        </div>                   -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Already a member? <a href="<?php echo site_url('login'); ?>">Login here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            