<div class="container">
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left mt-10">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <!--<div class="pull-right">
                        <a href="<?php /*echo site_url($this->config->item('admin_folder') . '/pages/form'); */?>" class="btn btn-orange btn-anim"><i class="icon-plus"></i><span class="btn-text">Add New</span></a>
                        <a href="<?php /*echo site_url($this->config->item('admin_folder') . '/pages/common_pc'); */?>" class="btn btn-success btn-anim"><i class="icon-plus"></i><span class="btn-text">Add Common Contents</span></a>
                    </div>-->
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <?php echo $this->datatables->generate(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>
</div>