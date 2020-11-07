<link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load("current", {
        packages: ["corechart"]
    });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        var data = google.visualization.arrayToDataTable([
            ['Task', 'Actions'],
            ['Viewed', <?php echo $tot_download; ?>],
            ['Download', <?php echo $tot_view; ?>]
        ]);
        var options = {
            title: 'Candidate Resumes',
            is3D: true,
        };
        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
    }
</script>
<div class="row"> <?php //include_once("sidebar.php") 
                    ?>
    <div class="col-lg-12 col-md-12 col-sm-12 col-pad">
        <div class="content-area5">
            <div class="dashboard-content">
                <div class="dashboard-header clearfix">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <h4>Hello ,<?php $usr = $this->session->userdata('company');
                                        echo $usr['name']; ?></h4>
                        </div>
                        <div class="col-sm-12 col-md-6 text-center">
                            <h4>If you offered to anyone Please
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#informus">CLICK HERE</a> to Inform us
                            </h4>
                        </div> <!-- <div class="col-sm-12 col-md-6">                                    <div class="breadcrumb-nav">                                        <ul>                                            <li>                                                <a href="<?php //echo site_url(); 
                                                                                                                                                                                                                                                                                            ?>">Index</a>                                            </li>                                            <li>                                                <a href="<?php //echo site_url('employer/my_account'); 
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    ?>" class="active">Dashboard</a>                                            </li>                                        </ul>                                    </div>                                </div> -->
                    </div>
                </div> <!-- Modal -->
                <div id="informus" class="modal fade" role="dialog">
                    <div class="modal-dialog">
                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title text-left">Any Comments</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <form method="post" action="<?php echo site_url('employer/send_admin_email'); ?>">
                                    <div class="form-group">
                                        <textarea name="email_content" class="form-control" rows="5" required></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-success">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="piechart_3d" style="width: 900px; height: 400px;"></div>
                    </div>
                    <div class="col-lg-5 offset-lg-1">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="ui-item bg-success">
                                    <div class="left">
                                        <h4>
                                            <a href="<?php echo site_url('candidate-list'); ?>">Click Here</a></h4>
                                        <p>to search candidate profiles</p>
                                    </div>
                                    <div class="right"><i class="fa fa-map-marker"></i></div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="ui-item bg-warning">
                                    <div class="left">
                                        <h4>
                                            <a href="<?php echo site_url('employer/my_profile'); ?>">Click Here</a></h4>
                                        <p>to edit your profile</p>
                                    </div>
                                    <div class="right"><i class="fa fa-eye"></i></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row" id="tblsd">
                    <div class="col-lg-12">
                        <div class="dashboard-list">
                            <h3>Latest Downloaded & viewed profiles</h3>
                            <form action="<?php echo current_url(); ?>#tblsd" method="GET">
                                <div class="row">
                                    <div class='col-lg-8 offset-lg-1 picker'>
                                        <div class="row">
                                            <div class="col-lg-1 offset-lg-1 col-md-2 offset-md-1 text-center">
                                                <label for="fromperiod">From</label>
                                            </div>
                                            <div class="col-lg-4 col-xl-3 col-md-3 input-group  " id="fromperiodp">
                                                <input type="text" id="fromperiod" class="form-control  " name="from" value="<?php echo $this->input->get('from'); ?>" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>

                                            </div>
                                            <div class="col-lg-1 offset-lg-1 col-md-2 offset-md-1 text-center">
                                                <label for="toperiod">to</label>
                                            </div>
                                            <div class=" col-lg-4 col-xl-3  col-md-3 input-group" id="toperiodp">
                                                <input type="text" id="toperiod" name="to" class="form-control " value="<?php echo $this->input->get('to'); ?>" autocomplete="off">
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-2">
                                        <button class="btn btn-success" type="submit">Search</button>
                                        <a href="<?php echo site_url('employer/my_account'); ?>" class="btn btn-danger">Reset</a>
                                    </div>
                                </div>
                            </form>
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
                                                <th>Downloaded/Viewed Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody> <?php $i = 1;
                                                foreach ($resumes as $res) {
                                                    $user = $this->Common_model->get_tbl_row('resume', $res->resume_id, 'user_id,name,education,added_date,update_on');                                                       ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo !empty($user) ? $user->name : 'Deleted'; ?></td>
                                                    <td><?php $edu = !empty($user) ? json_decode($user->education, true) : array(); ?> <?php echo isset($edu[1]['degree']) ? $edu[1]['degree'] : ''; ?> (<?php echo isset($edu[1]['branch']) ? $edu[1]['branch'] : ''; ?>)</td>
                                                    <td><?php echo !empty($user) ? format_common_date($user->added_date) : 'Deleted'; ?> </td>
                                                    <td><?php echo !empty($user) ? format_common_date($user->update_on) : 'Deleted'; ?> </td> <?php if ($res->download == 1) { ?>
                                                        <td><?php echo format_common_date($res->download_on); ?></td>
                                                        <td><a href="<?php echo !empty($user->user_id) ? site_url('download-resume?K=' . base64_encode($res->resume_id)) : '#'; ?>"><span class="text-success">Downloaded</span></a></td>
                                                    <?php } else if ($res->view == 1) { ?>
                                                        <td><?php echo format_common_date($res->view_on); ?></td>
                                                        <td><span class="text-danger">Viewed</span>
                                                        </td> <?php } ?>
                                                    <td>
                                                        <?php if ($res->download == 0) { ?>
                                                            <a href="<?php echo !empty($user->user_id) ? site_url('download-resume?K=' . base64_encode($res->resume_id))  : '#'; ?>">Download Resume / </a>
                                                        <?php } ?>
                                                        <a href="<?php echo !empty($user->user_id) ? site_url('canditate-details?K=' . base64_encode($res->resume_id)) : '#'; ?>" target="_blank">View Profile</a>

                                                    </td>
                                                </tr> <?php $i++;
                                                    } ?> </tbody>
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
<script>
    $(function() {
        $('#fromperiodp').click(function() {
            $("#fromperiod").focus();
        });
        $('#toperiodp').click(function() {
            $("#toperiod").focus();
        });
        $("#fromperiod").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            maxDate: 0,
            onClose: function(selectedDate) {
                $("#toperiod").datepicker("option", "minDate", selectedDate);
            }
        });
        $("#toperiod").datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 1,
            maxDate: 0,
            onClose: function(selectedDate) {
                $("#fromperiod").datepicker("option", "maxDate", selectedDate);
            }
        });
    });
</script>