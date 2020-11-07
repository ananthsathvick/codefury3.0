<div class="container">
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left mt-10">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo site_url($this->config->item('admin_folder') . '/admin/form'); ?>" class="btn btn-orange btn-anim"><i class="icon-plus"></i><span class="btn-text"><?php echo lang('add_new'); ?></span></a>
                        <a href="<?php echo site_url($this->config->item('admin_folder') . '/settings/privilege_form'); ?>" class="btn btn-primary btn-anim"><i class="icon-shield"></i><span class="btn-text"> Privileges</span></a>
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
                                        <th>Email</th>
                                        <th>Username</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $i=1; foreach ($admins as $res) { ?>
                                        <tr>
                                            <td><?php echo $i; ?></td>
                                            <td><?php echo $res->name; ?></td>
                                            <td><?php echo mailto($res->email, $res->email); ?></td>
                                            <td><?php echo $res->username; ?></td>
                                            <td class="text-nowrap">
                                                <a href="<?php echo site_url(config_item('admin_folder').'/admin/form/'.$res->id); ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                <a href="<?php echo site_url(config_item('admin_folder').'/admin/delete/'.$res->id); ?>" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                            </td>
                                        </tr>
                                    <?php $i++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>
</div>