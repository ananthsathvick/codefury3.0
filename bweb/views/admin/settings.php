<div class="container">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="col-sm-2 mt-15">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="col-sm-10 form-wrap text-right">
                        <form class="form-inline">
                            <div class="form-group mr-15">
                                <select class="form-control" id="edit_options">
                                    <option value=''>Select</option>
                                    <?php foreach ($w_config as $conf) { ?>
                                        <option value='<?php echo $conf->id; ?>'><?php echo $conf->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group text-right">
                                <button type="button"
                                        onclick="window.location='<?php echo site_url($this->config->item('admin_folder') . '/settings/form'); ?>/'+$('#edit_options').val();"
                                        class="btn btn-success btn-anim"><i class="icon-pencil"></i><span
                                            class="btn-text"><?php echo lang('edit'); ?></span></button>
                                <a href="<?php echo site_url($this->config->item('admin_folder') . '/settings/form'); ?>"
                                   class="btn btn-orange btn-anim"><i class="icon-plus"></i><span
                                            class="btn-text"><?php echo lang('add_new'); ?></span></a>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <?php echo form_open_multipart($this->config->item('admin_folder') . '/settings?t=' . $cod, 'class="form-horizontal"'); ?>
                            <?php foreach ($w_config as $con) { ?>
                                <?php if ($con->type == 'text') { ?>
                                    <div class="form-group">
                                        <label class="mb-10 col-sm-2"
                                               for="email_hr"><strong><?php echo $con->name; ?> </strong>(<?php echo $con->setting_key; ?>
                                            )</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="<?php echo $con->setting_key; ?>"
                                                   class="form-control"
                                                   value="<?php echo set_value($con->setting_key, $con->setting); ?>">
                                        </div>
                                    </div>
                                <?php }
                                if ($con->type == 'select') { ?>
                                    <div class="form-group">
                                        <label class="mb-10 col-sm-2"
                                               for="pwd_hr"><strong><?php echo $con->name; ?></strong>
                                            (<?php echo $con->setting_key; ?>)</label>
                                        <div class="col-sm-10">
                                            <?php
                                            $options = array();
                                            if ($con->setting_key == "theme") {
                                                $options = $themes;
                                            } else if ($con->options != '') {
                                                if(is_array($con->options))
                                                {
                                                    $opts =$con->options;
//                                                        print_a($con->options);
                                                } else {
                                                    $opts = explode(",", $con->options);
                                                }
//                                                array_fill_keys($opts, $opts);
                                                foreach ($opts as $opt) {
                                                    $options[$opt] = $opt;
                                                }
                                            }
                                            echo form_dropdown($con->setting_key, $options, set_value($con->setting_key, $con->setting), 'class="form-control select2"');
                                            ?>
                                        </div>
                                    </div>
                                <?php }
                                if ($con->type == 'textarea') { ?>
                                    <div class="form-group">
                                        <label class="mb-10 col-sm-2"><strong><?php echo $con->name; ?> </strong>(<?php echo $con->setting_key; ?>
                                            )</label>
                                        <div class="col-sm-10">
                                            <textarea name="<?php echo $con->setting_key; ?>" cols="40" rows="3"
                                                      class="form-control"><?php echo set_value($con->setting_key, html_entity_decode($con->setting)); ?></textarea>
                                        </div>
                                    </div>
                                <?php }
                                if ($con->type == 'file') { ?>
                                    <div class="form-group">
                                        <label class="mb-10 col-sm-2"><strong><?php echo $con->name; ?> </strong>(<?php echo $con->setting_key; ?>
                                            )</label>
                                        <div class="col-sm-4">
                                            <?php echo form_upload(array('name' => $con->setting_key, 'class' => 'upload')); ?>
                                        </div>
                                        <?php if ($con->setting != '') { ?>
                                            <div class="col-sm-6">
                                                <img src="<?php echo base_url($con->setting); ?>" alt="img"
                                                     class="img-responsive">
                                            </div>
                                        <?php } ?>
                                    </div>
                                <?php }
                                if ($con->type == 'checkbox') { ?>
                                    <div class="form-group">
                                        <label class="mb-10 col-sm-2"><strong><?php echo $con->name; ?> </strong>(<?php echo $con->setting_key; ?>
                                            )</label>
                                        <div class="col-sm-10">
                                            <div class="checkbox checkbox-success">
                                                <?php echo form_checkbox($con->setting_key, '1', set_value($con->setting_key, $con->setting), 'id="' . $con->setting_key . '"'); ?>
                                                <label for="<?php echo $con->setting_key; ?>">
                                                    <!--                                                    -->
                                                    <?php //echo $con->name;?><!-- (-->
                                                    <?php //echo $con->setting_key;?><!--)-->
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                <?php }
                                if ($con->type == 'text_editor') { ?>
                                    <div class="form-group">
                                        <label class="mb-10 col-sm-2"><strong><?php echo $con->name; ?> </strong>(<?php echo $con->setting_key; ?>
                                            )</label>
                                        <div class="col-sm-10">
                                            <textarea name="<?php echo $con->setting_key; ?>" class="mymce"
                                                      class="form-control"><?php echo set_value($con->setting_key, html_entity_decode($con->setting)); ?></textarea>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="form-group mb-0 text-right">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-orange btn-anim"><i
                                                class="icon-rocket"></i><span class="btn-text">submit</span></button>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /Row -->
</div>