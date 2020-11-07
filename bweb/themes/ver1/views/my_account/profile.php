<div class="row">
            <?php include_once("sidebar.php") ?>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4><?php echo $page_title; ?></h4></div>
                            <!-- <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                    <li><a href="<?php //echo site_url(); ?>">Index</a></li>
                                    <li><a href="<?php //echo site_url('secure/my_account'); ?>">Dashboard</a></li>
                                    <li class="active"><?php //echo $page_title; ?></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <form action="<?php echo current_url(); ?>" method="POST">                           
                            <div class="search-form">
                                <div class="row pad-20">
                                    <div class="col-lg-6 col-md-8 offset-lg-3 offset-md-2 col-sm-12">
                                        <div class="form-group">
                                            <label>Name</label>     
                                            <div class="edit-profile">                                       
                                            <input type="text" class="input-text" name="name" value="<?php echo set_value('name',$user->name); ?>">
                                            <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                        </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <!-- <div class="edit-profile"> -->
                                                <input type="text" class="input-text" name="email" value="<?php echo set_value('email',$user->email); ?>" readonly>
                                                <!-- <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a> -->
                                            <!-- </div> -->
                                        </div>
                                        <div class="form-group">
                                            <label>Mobile Number</label>
                                            <!-- <div class="edit-profile"> -->
                                                <input type="text" class="input-text" name="phone" value="<?php echo set_value('phone',$user->phone); ?>" readonly>
                                                <!-- <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a> -->
                                            <!-- </div> -->
                                        </div>
                                        <!--<div class="form-group">
                                            <label>Optional Number</label>
                                            <div class="edit-profile">
                                                <input type="text" class="input-text" name="mobile" value="<?php //echo set_value('mobile',$user->mobile); ?>">
                                                <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </div>  -->
                                        <div class="form-group">
                                            <label>Password</label>
                                            <div class="edit-profile">
                                                <input type="password" class="input-text" name="password" value="<?php echo set_value('password'); ?>">
                                                <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </div>  
                                        <div class="form-group">
                                            <label>Confirm Password</label>
                                            <div class="edit-profile">
                                                <input type="password" class="input-text" name="c_password" value="<?php echo set_value('c_password'); ?>">
                                                <a href="javascript:void(0)" class="btn btn-success"><i class="fa fa-edit"></i></a>
                                            </div>
                                        </div>                                        
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="form-group text-center">
                                            <!-- <a href="<?php echo site_url('secure/deactive_acc'); ?>" class="btn btn-warning" onclick="return de_account();">Deactivate</a> -->
                                            <button class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>                                  
                                </div>
                            </div>
                        </form>
                    </div>
                    <p class="sub-banner-2 text-center">© 2020 Code Headed.</p>
                </div>
            </div>
        </div>

        <script>
        function de_account() {
        return confirm('Are you sure want to deactivate your account?');
    }
        </script>