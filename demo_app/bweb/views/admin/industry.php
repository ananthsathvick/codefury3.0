<div class="container">
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left mt-15">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="form-wrap text-right">
                        <form class="form-inline" method="get" action="<?php echo site_url(config_item('admin_folder').'/pages/industry'); ?>">
                            <!-- <div class="form-group mr-15">
                                <input type="text" class="form-control" value="<?php echo $this->input->get('term'); ?>" name="term"/>
                            </div> -->
                            <div class="form-group">
                                <!-- <button type="submit" class="btn btn-success btn-anim"><i class="icon-magnifier"></i><span class="btn-text"><?php //echo lang('search'); ?></span></button> -->
                                <!-- <a href="<?php //echo current_url(); ?>" class="btn btn-danger btn-anim"><i class="icon-close"></i><span class="btn-text"><?php //echo lang('reset'); ?></span></a> -->
                                <a href="<?php echo site_url(config_item('admin_folder').'/pages/industry_form'); ?>" class="btn btn-orange btn-anim"><i class="icon-plus"></i><span class="btn-text"><?php echo lang('add_new'); ?></span></a>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php echo (count($industry) < 1)?'<tr><td style="text-align:center;" colspan="8">'.lang('no_records').'</td></tr>':''?>
                                    <?php $page +=1; foreach ($industry as $res) { ?>
                                        <tr>
                                            <td><?php echo $page; ?></td>
                                            <td><?php echo $res->name; ?></td>
                                            <td><?php echo $res->status==1 ? 'Enabled' : 'Disabled'; ?></td>
                                            <td class="text-nowrap">
                                                <a href="<?php echo site_url(config_item('admin_folder').'/pages/industry_form/'.$res->id); ?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                <a href="<?php echo site_url(config_item('admin_folder').'/pages/delete_industry/'.$res->id); ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return areyousure()"> <i class="fa fa-close text-danger"></i> </a>
                                            </td>
                                        </tr>                                        
                                    <?php $page++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>
</div>