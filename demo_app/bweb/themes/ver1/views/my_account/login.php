    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">                        
                        <!-- Name -->
                        <h3>Signin to your account</h3>
                        <!-- Form start-->
                        <form action="<?php echo site_url('login'); ?>" method="POST">
                            <div class="form-group">
                                <input type="text" name="email" class="input-text" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="Password">
                                <a class="capitalize-font txt-orange block pull-right font-12" href="<?php echo site_url('secure/forgot_password'); ?>">forgot password ?</a>
                            </div>                            
                            <div class="form-group">
                                <button type="submit" class="btn-md button-theme btn-block">Signin</button>
                            </div>
                        </form>  
                        <!-- <div class="form-group text-center mb-10">
                        	<strong>OR</strong>
                        </div>  -->
                        <?php
                        //$atts = array('width'      => '800','height'     => '600','scrollbars' => 'yes','status'     => 'yes','resizable'  => 'yes','screenx'    => '0','screeny'    => '0','class' =>'f-signin');
                        //$atts2 = array('width'      => '800','height'     => '600','scrollbars' => 'yes','status'     => 'yes','resizable'  => 'yes','screenx'    => '0','screeny'    => '0','class' =>'g-signin');
                        ?>
                        <!-- <div class="form-group mb-10">
                        <?php //echo anchor_popup(site_url('secure/social_login/Facebook'), '<img src="'.theme_url("img/new-images/fb-btn.jpg").'" alt="" class="img-fluid">', $atts); ?>
                        </div>
                        <div class="form-group mb-0">
                        <?php //echo anchor_popup(site_url('secure/social_login/Google'), '<img src="'.theme_url("img/new-images/gp-btn.jpg").'" alt="" class="img-fluid">', $atts2); ?>
                        </div> -->
                                             
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>Don't have an account? <a href="<?php echo site_url('register'); ?>">Register here</a></span>
                    </div>
                </div>
                <!-- Form content box end -->
            