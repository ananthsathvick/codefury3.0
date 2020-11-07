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
<!--                            <form class="form-horizontal">-->
                                <?php echo form_open(current_url()); ?>
                                <div class="form-group mb-0">
                                    <div class="col-sm-12">
                                        <?php $priv = $privilege[0];
                                        foreach($priv as $cval){ ?>
                                            <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label mb-10">Controller Name</label>
                                                <input type="text" class="form-control" name="code[<?php echo $cval->id; ?>]" value="<?php echo $cval->code; ?>" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label mb-10">Display Name</label>
                                                <input type="text" class="form-control" name="name[<?php echo $cval->id; ?>]" value="<?php echo $cval->name; ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label mb-10">Active Privilege</label>
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox<?php echo $cval->id; ?>" type="checkbox" name="active[<?php echo $cval->id; ?>]" value="1" <?php echo $cval->active==1 ? 'checked':''; ?>>
                                                    <label for="checkbox<?php echo $cval->id; ?>">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                            <hr>
                                            <?php $priv_method = $privilege[$cval->id];
                                            //print_a($cval);
                                            foreach ($priv_method as $fun) { ?>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label mb-10">Function Name</label>
                                                <input type="text" class="form-control" name="code[<?php echo $fun->id; ?>]" value="<?php echo $fun->code; ?>" readonly>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label mb-10">Display Name</label>
                                                <input type="text" class="form-control" name="name[<?php echo $fun->id; ?>]" value="<?php echo $fun->name=='index' ? 'List':$fun->name; ?>">
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="control-label mb-10">Active Privilege</label>
                                                <div class="checkbox checkbox-primary">
                                                    <input id="checkbox<?php echo $fun->id; ?>" type="checkbox" name="active[<?php echo $fun->id; ?>]" value="1" <?php echo $fun->active==1 ? 'checked':''; ?>>
                                                    <label for="checkbox<?php echo $fun->id; ?>">
                                                        Yes
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <?php } } ?>
                                    </div>

                                    <div class="col-sm-12 mt-10">
                                    <div class="row pull-right">
                                        <a href="<?php echo site_url(config_item('admin_folder') . '/admin'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
                                        <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                                    </div>
                                    </div>
                                </div>
                                <?php echo form_close(); ?>
<!--                            </form>-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>