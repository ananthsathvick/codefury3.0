

<div class="row">
            <?php include_once("sidebar.php") ?>
            <div class="col-lg-9 col-md-12 col-sm-12 col-pad">
                <div class="content-area5">
                    <div class="dashboard-content">
                        <div class="dashboard-header clearfix">
                            <div class="row">
                                <div class="col-sm-12 col-md-6"><h4>Hello , <?php $usr = $this->session->userdata('user'); echo $usr['name']; ?></h4>
                                
                                </div>
                                <div class="col-sm-12 col-md-6">
                                <?php if(!empty($resume)){ ?>
                                <?php //$oneYearOn = date('d-m-Y',strtotime(date("Y-m-d", strtotime($resume->added_date)). " + 365 day")); ?>
                                <!--<h4>Your resume expires on <?php //echo $oneYearOn; ?></h4> -->
                                <?php $usrd = $this->session->userdata('user'); $oneYearOn = $this->db->get_where('users',array('id'=>$usr['id']))->row(); ?>
                               
                                <?php } ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                       
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="ui-item bg-success">
                                    <div class="left">
                                        <h4><?php echo $tot_download; ?></h4>
                                        <p>Company resume downloaded</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <div class="ui-item bg-warning">
                                    <div class="left">
                                        <h4><?php echo $tot_view; ?></h4>
                                        <p>Company resume viewed</p>
                                    </div>
                                    <div class="right">
                                        <i class="fa fa-eye"></i>
                                    </div>
                                </div>
                            </div>                                                        
                        </div>                        

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="dashboard-list">
                                    <h3>
                                        Latest viewed profiles</h3>
                                    <div class="dashboard-message dashboard-table-responsive bdr clearfix ">
                                        <div class="table-responsive dashboard-table-responsive">
                                            <table class="table mb-0">
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="sub-banner-2 text-center">© 2020 <?php echo config_item('company_name'); ?></p>
                </div>
            </div>
        </div>