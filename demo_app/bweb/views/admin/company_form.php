<div class="container">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <?php echo form_open_multipart(current_url()); ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Name</label>
                                <?php
                                $data = array('name' => 'name', 'value' => set_value('name', $name), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>                           
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Email</label>
                                <?php
                                $data = array('name' => 'email', 'value' => set_value('email', $email), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Contact Number</label>
                                <?php
                                $data = array('name' => 'phone', 'value' => set_value('phone', $phone), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Alternative Number</label>
                                <?php
                                $data = array('name' => 'mobile', 'value' => set_value('mobile', $mobile), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Contact Person</label>
                                <?php
                                $data = array('name' => 'contact_person', 'value' => set_value('contact_person', $contact_person), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Desigination</label>
                                <?php
                                $data = array('name' => 'desigination', 'value' => set_value('desigination', $desigination), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Password</label>
                                <?php
                                $data = array('name' => 'password', 'value' => set_value('password'), 'class' => 'form-control');
                                echo form_password($data);
                                ?>
                            </div>                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Confirm Password</label>
                                <?php
                                $data = array('name' => 'c_password', 'value' => set_value('c_password'), 'class' => 'form-control');
                                echo form_password($data);
                                ?>
                            </div>        
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Company URL</label>
                                <?php
                                $data = array('name' => 'url', 'value' => set_value('url', $url), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Status</label>
                                <?php
                                $options = array('1' => 'Enabled', '0' => 'Disabled');
                                echo form_dropdown('status', $options, $status, 'class="form-control"');
                                ?>
                            </div>                
                            <div class="col-md-12 form-group" style="display:none">
                                <label class="control-label mb-10 text-left">Image</label>
                                <?php
                                echo form_upload('image');
                                ?>
                                <?php if($id && $image!=''){ ?>
                                    <img src="<?php echo upload_url($image,'company/'); ?>" class="img-responsive mt-10">
                                <?php } ?>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                                <a href="<?php echo site_url(config_item('admin_folder').'/company'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
                                <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>