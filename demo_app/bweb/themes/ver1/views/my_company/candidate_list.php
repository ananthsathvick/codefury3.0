<div class="row">
<?php include_once("sidebar.php") ?>
    <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
        <div class="content-area5">
            <div class="dashboard-content">
                <div class="dashboard-header clearfix">
                    <div class="row">
                        <div class="col-sm-12 col-md-6"><h4>Hello , <?php $usr = $this->session->userdata('company'); echo $usr['name']; ?></h4></div>
                        <div class="col-sm-12 col-md-6">
                            <div class="breadcrumb-nav">
                                <ul>
                                    <li>
                                        <a href="<?php echo site_url('employer/my_account'); ?>">Index</a>
                                    </li>
                                    <li>
                                        <a href="#" class="active">Dashboard</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                                        

                <div class="row">
                    <div class="col-lg-12">
                        <div class="dashboard-list">
                            <h3>
                                Candidate List</h3>
                            <div class="dashboard-message dashboard-table-responsive bdr clearfix ">
                                <div class="table-responsive dashboard-table-responsive">
                                    <table class="table mb-0">
                                    <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Candidate Name</th>
                                                    <th>Qualification</th>
                                                    <th>Resume Posted Date</th>
                                                    <th>Resume Updated Date</th>
                                                    <th>Viewed Date</th>
                                                    <th>Status</th> 
                                                </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $i=1; foreach($resumes as $res){ //print_a($res); 
                                                      $user = $this->Common_model->get_tbl_row('resume',$res->resume_id,'name,education,added_date,update_on');   ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
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
                                                    <?php $i++; } ?>                                                
                                                </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
					<?php echo pagination_get($total_rows,$perpage); ?>	                        
                    </nav>
                </div>
                        </div>
                    </div>
                </div>
            </div>
            <p class="sub-banner-2 text-center">© 2020 <?php echo config_item('company_name'); ?></p>
        </div>
    </div>
</div>