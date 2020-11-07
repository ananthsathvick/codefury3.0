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
                        <form class="form-inline" method="get">
                            <div class="form-group">
                                <a href="#" class="btn btn-primary"><span class="btn-text">Viewed : <?php echo $viewed; ?></span></a>
                                <a href="#" class="btn btn-orange"><span class="btn-text">Download : <?php echo $downloaded; ?></span></a>
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
                                        <th>Candidate Name</th>
                                                    <th>Qualification</th>
                                                    <th>Resume Posted Date</th>
                                                    <th>Resume Updated Date</th>
                                                    <th>Viewed Date</th>
                                                    <th>Status</th>                                  
                                        <!-- <th class="text-nowrap">Action</th> -->
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php echo (count($resumes) < 1)?'<tr><td style="text-align:center;" colspan="8">'.lang('no_records').'</td></tr>':''?>
                                    <?php $page +=1; foreach ($resumes as $res) {
                                        $user = $this->Common_model->get_tbl_row('resume',$res->resume_id,'name,education,added_date,update_on'); ?>
                                        <tr>
                                            <td><?php echo $page; ?></td>
                                            <td><?php echo $user->name; ?></td>
                                                    <td><?php $edu = json_decode($user->education,true); ?> <?php echo isset($edu[1]['degree']) ? $edu[1]['degree']:''; ?> (<?php echo isset($edu[1]['branch']) ? $edu[1]['branch']:''; ?>)</td>
                                                    <td><?php echo format_common_date($user->added_date); ?></td>
                                                    <td><?php echo format_common_date($user->update_on); ?></td>
                                                    <?php if($res->download==1){  ?>
                                                        <td><?php echo format_common_date($res->download_on); ?></td>
                                                        <td><span class="text-success">Downloaded</span></td>
                                                        <?php } else if($res->view==1) { ?>
                                                        <td><?php echo format_common_date($res->view_on); ?></td>
                                                        <td><span class="text-danger">Viewed</span></td>
                                                        <?php } ?>
                                                    </tr>
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