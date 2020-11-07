<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css">
<div class="row">
                    <div class="col-lg-6">
                        <!-- Form content box start -->
                        <div class="form-content-box">
                            <!-- details -->
                            <div class="details">                        
                                <!-- Name -->
                                <h3>Signin to your account</h3>
                                <!-- Form start-->
                                <form action="<?php echo site_url('employer/login'); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="email" class="input-text" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="input-text" placeholder="Password">
                                        <a class="capitalize-font txt-orange block pull-right font-12" href="<?php echo site_url('employer/forgot_password'); ?>">forgot password ?</a>
                                    </div>                            
                                    <div class="form-group">
                                        <button type="submit" class="btn-md button-theme btn-block">Signin</button>
                                    </div>
                                </form>                                                 
                            </div>                        
                        </div>
                        <!-- Form content box end -->
                    </div>
                
                    <div class="col-lg-6">
                        <!-- Form content box start -->
                        <div class="form-content-box">
                            <!-- details -->
                            <div class="details">                       
                                <!-- Name -->
                                <h3>Create an account</h3>
                                <!-- Form start-->
                                <form action="<?php echo site_url('employer/register'); ?>" method="POST">
                                    <div class="form-group">
                                        <input type="text" name="name" class="input-text" placeholder="Comapny Name" value="<?php echo set_value('name'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="url" class="input-text" placeholder="Company Website" value="<?php echo set_value('url'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="contact_person" class="input-text" placeholder="Contact Name" value="<?php echo set_value('contact_person'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="desigination" class="input-text" placeholder="Designation" value="<?php echo set_value('desigination'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="email" name="email" class="input-text" placeholder="Email" value="<?php echo set_value('email'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="phone" class="input-text" placeholder="Contact Number" value="<?php echo set_value('phone'); ?>">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" name="mobile" class="input-text" placeholder="Alternate Number" value="<?php echo set_value('mobile'); ?>">
                                    </div>
                                    <div class="form-group text-left mb-10">
                                        <label><input type="checkbox"  name="tc" value="1"> Accept terms &amp; conditions</label>
                                    </div>
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn-md button-theme btn-block">Signup</button>
                                    </div>
                                </form>                       
                            </div>                            
                        </div>
                        <!-- Form content box end -->
        
                    </div>
                </div>