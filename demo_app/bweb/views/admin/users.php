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
                        <form class="form-inline" method="get" action="<?php echo site_url(config_item('admin_folder').'/users'); ?>">
                            <div class="form-group mr-15">
                                <!--<input type="text" class="form-control" value="<?php /*echo $this->input->get('term'); */?>" name="term"/>-->
                                <select class="form-control" name="term">
                                    <option value="">Select User Type</option>
                                    <option value="1" <?php echo ($this->input->get('term')==1)?"selected":''; ?>>Paid User</option>
                                    <option value="2" <?php echo ($this->input->get('term')==2)?"selected":''; ?>>Free User</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-anim"><i class="icon-magnifier"></i><span class="btn-text"><?php echo lang('search'); ?></span></button>
                                <a href="<?php echo current_url(); ?>" class="btn btn-danger btn-anim"><i class="icon-close"></i><span class="btn-text"><?php echo lang('reset'); ?></span></a>
                                <a href="<?php echo site_url(config_item('admin_folder').'/users/download_csv'); ?>" class="btn btn-primary btn-anim"><i class="icon-cloud-download"></i><span class="btn-text"><?php echo lang('download'); ?></span></a>
                                <!-- <a href="<?php //echo site_url(config_item('admin_folder').'/users/form'); ?>" class="btn btn-orange btn-anim"><i class="icon-plus"></i><span class="btn-text">Add New</span></a> -->
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
                                        <th>Phone No</th>
                                        <th>Email</th>
                                        <th>Resume Status</th>
                                        <th>User Resume Type</th>
                                        <th>Search Status</th>
                                        <th>Account Status</th>
                                        <th>Added Date</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php echo (count($users) < 1)?'<tr><td style="text-align:center;" colspan="5">'.lang('no_records').'</td></tr>':''?>
                                    <?php $page +=1; foreach ($users as $res) { ?>
                                        <tr>
                                            <td><?php echo $page; ?></td>
                                            <td><?php echo $res->name; ?></td>
                                            <td><?php echo $res->phone; ?></td>
                                            <td><?php echo mailto($res->email, $res->email); ?></td>
                                            <td><?php $re = $this->Common_model->get_tbl_row('resume', array('user_id' => $res->id)); echo ($re)?'Uploaded':'Pending';?></td>
                                            <td><?php if($res->user_type==1){echo 'Paid User';}if($res->user_type==2){echo 'Free User';}?></td>
                                            <td><?php echo ($res->searchable==1)?'Enabled':'Disabled';?></td>
                                            <td><?php echo $res->status==1 ? 'Active' : 'Deactive'; ?></td>
                                            <td><?php echo format_common_date($res->added_date); ?></td>
                                            <td class="text-nowrap">
                                            <?php //if($page->template=='projects_sub1' || $page->template=='courses'){ ?>
                                                <?php $resume = $this->Common_model->get_tbl_row('resume', array('user_id' => $res->id)); if($resume){?>
                                                <a href="<?php echo site_url('secure/resume_preview_admin/'.$res->id); ?>" target="_blank" class="mr-25" data-toggle="tooltip"  data-original-title="View Resume"> <i class="fa fa-file-image-o text-success m-r-10"></i> </a>
                                            <?php } ?>
                                                <a href="<?php echo site_url(config_item('admin_folder').'/users/form/'.$res->id); ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                <a href="<?php echo site_url(config_item('admin_folder').'/users/delete/'.$res->id); ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return areyousure()"> <i class="fa fa-close text-danger"></i> </a>
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