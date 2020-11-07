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
                            <?php echo form_open(current_url()); ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Name</label>
                                <?php
                                $data = array('name' => 'name', 'value' => set_value('name', $name), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Username</label>
                                <?php
                                $data = array('name' => 'username', 'value' => set_value('username', $username), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Phone No</label>
                                <?php
                                $data = array('name' => 'phone_no', 'value' => set_value('phone_no', $phone_no), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Email </label>
                                <?php
                                $data = array('name' => 'email', 'value' => set_value('email', $email), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Password</label>
                                <?php
                                $data = array('name' => 'password', 'class' => 'form-control');
                                echo form_password($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Confirm Password</label>
                                <?php
                                $data = array('name' => 'confirm', 'class' => 'form-control');
                                echo form_password($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Status</label>
                                <?php
                                $options = array('1' => 'Enabled', '0' => 'Disabled');
                                echo form_dropdown('status', $options, $status, 'class="form-control"');
                                ?>
                            </div>

                            <div class="clearfix"></div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mt-10">
                                <label class="control-label text-left">Privileges</label>
                            </div>
                            <?php $priv = (!empty($all_privileges[0])) ? $all_privileges[0]:array();
                            foreach ($priv as $cval) { ?>
                                <div class="col-sm-12 form-group">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox<?php echo $cval->id; ?>" type="checkbox" value="<?php echo $cval->id; ?>" onclick="chk_priv(this.value);">
                                        <label for="checkbox<?php echo $cval->id; ?>">
                                            <strong><?php echo $cval->name; ?></strong>
                                        </label>
                                    </div>
                                </div>
                                <?php $priv_method = (!empty($all_privileges[$cval->id])) ? $all_privileges[$cval->id]:array();
                                foreach ($priv_method as $fun) { ?>
                                    <div class="col-sm-4 form-group">
                                        <div class="checkbox checkbox-primary">
                                            <input class="myCheck<?php echo $cval->id; ?>" id="checkbox<?php echo $fun->id; ?>" type="checkbox" name="privilege[]" value="<?php echo $cval->code.'_'.$fun->code; ?>" <?php echo set_checkbox('privilege[]','',in_array($cval->code.'_'.$fun->code, $privilege)); ?>>
                                            <label for="checkbox<?php echo $fun->id; ?>">
                                                <?php echo $fun->name; ?>
                                            </label>
                                        </div>
                                    </div>
                                <?php }
                            } ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                                <a href="<?php echo site_url(config_item('admin_folder') . '/admin'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
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

<script>
    function chk_priv(val) {
        if($('#checkbox'+val).prop("checked") == true){
            $(".myCheck"+val).prop("checked", true);
        } else{
            $(".myCheck"+val).prop("checked", false);
        }
    }
</script>