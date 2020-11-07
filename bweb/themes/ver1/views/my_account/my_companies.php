<div class="row">
<?php include_once("sidebar.php") ?>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5 dashboard-content">
                    <div class="dashboard-header clearfix">
                        <div class="row">
                            <div class="col-sm-12 col-md-6"><h4><?php echo $page_title; ?></h4></div>
                            <!-- <div class="col-sm-12 col-md-6">
                                <div class="breadcrumb-nav">
                                    <ul>
                                        <li>
                                            <a href="<?php //echo site_url(); ?>">Index</a>
                                        </li>
                                        <li>
                                            <a href="<?php //echo site_url('secure/my_account'); ?>">Dashboard</a>
                                        </li>
                                        <li class="active"><?php //echo $page_title; ?></li>
                                    </ul>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="submit-address dashboard-list">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Company Name</th>                                                    
                                    <th>Viewed Date</th>
                                    <th>Download Date</th>
                                    <th>Status</th> 
                                </tr>
                                </thead>
                                <tbody>
                                <?php $i=1; foreach($c_resumes as $res){ //print_a($res); 
                                    $company = $this->Common_model->get_tbl_row('company',$res->company_id,'name');   ?>
                                <tr>
                                    <td><?php echo $i; ?></td>
                                    <td><?php echo $company->name; ?></td>
                                    <td><?php echo format_common_date($res->view_on); ?></td>
                                    <td><?php echo format_common_date($res->download_on); ?></td>
                                    <?php if($res->download==1){  ?>
                                        <td><span class="text-success">Downloaded</span></td>
                                        <?php } else if($res->view==1) { ?>
                                        <td><span class="text-danger">Viewed</span></td>
                                        <?php } ?>                                                    
                                </tr>
                                <?php $i++; } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
					<?php echo pagination_get($total_rows,$perpage); ?>	                        
                    </nav>
                </div>
                    </div>
                    <p class="sub-banner-2 text-center">© 2020 Code Headed.</p>
                </div>
            </div>
        </div>