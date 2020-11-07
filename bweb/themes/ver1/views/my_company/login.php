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


                    <div class="form-group text-left form-check">

                        <label class="" for="">
                            <input type="checkbox" name="tc" value="1" class="" id="exampleCheck1" required>
                            Agree to <a type="" class="" data-toggle="modal" data-target="#exampleModal">

                                <u> terms and conditions</u>
                            </a></label>
                    </div>

                    <div class="modal" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Terms and conditions</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body text-left">
                                1)This is legally binding document outlining the working relationship between  "Code Headed"   and your firm. <br>
2)" Code Headed"   is not Charging any Professional Fees  For Recruitment Of Candidates .<br />
3)Client can access "Code Headed"    Data Base with free of cost . <br />
 (only One access for a Client).<br />
4)"Code Headed"   will not shortlist candidates  or schedule any interview.<br />
5)"Code Headed"   will not give any Replacement of Candidates.<br />
6)"Code Headed"   Request  you to inform us once the candidate gets an offer .This is only for our Records.<br />
7)“Code Headed” does not take responsibility of any activity of the candidate during pre- or post-employment. Employer will not hold “Code Headed” responsible for any deeds or misdeeds of the employee. It is the total responsibility and discretion of employer to appoint or remove the candidate at their will.<br/>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="form-group">
                                        <input type="text" name="mobile" class="input-text" placeholder="Alternate Number" value="<?php //echo set_value('mobile'); 
                                                                                                                                    ?>">
                                    </div>-->
                    <!-- <div class="form-group text-left mb-10">
                                        <label><input type="checkbox"  name="tc" value="1"> Accept terms &amp; conditions</label>
                                    </div> -->
                    <div class="form-group mb-0">
                        <button type="submit" class="btn-md button-theme btn-block">Signup</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- Form content box end -->

    </div>
</div>