<div class="container">
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
<!--                    <div class="pull-left mt-15">-->
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
<!--                        <div class="clearfix"></div>-->
<!--                    </div>-->
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <?php echo form_open(current_url()); ?>
                        <?php foreach ($related as $res) { ?>
                        <div class="col-sm-4 form-group">
                            <div class="checkbox checkbox-primary">
                                <input id="checkbox<?php echo $res->id; ?>" type="checkbox" name="related[]" value="<?php echo $res->id; ?>" <?php echo set_checkbox('related[]','',in_array($res->id, $related_cats)); ?>>
                                <label for="checkbox<?php echo $res->id; ?>">
                                    <?php echo $res->title; ?>
                                </label>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                            <a href="<?php echo site_url(config_item('admin_folder') . '/pages'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
                            <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>
</div>