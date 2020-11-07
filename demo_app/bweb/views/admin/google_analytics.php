<link href="<?php echo base_url('') ?>/app-assets/vendors/css/charts/morris.css" rel="stylesheet">

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('upcoming', {'packages':['geochart']});
    google.charts.setOnLoadCallback(drawRegionsMap);

    function drawRegionsMap() {

        var data = google.visualization.arrayToDataTable([
            ['Country', 'Sessions','Users'],
            <?php foreach($country_session as $country_sess){ ?>
            ['<?php echo $country_sess->getcountry(); ?>', <?php echo $country_sess->getsessions(); ?>,<?php echo $country_sess->getUsers(); ?>],
            <?php } ?>
        ]);

        var options = {};

        var chart = new google.visualization.GeoChart(document.getElementById('regions_div'));

        chart.draw(data, options);
    }
</script>
<div class="container">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim"><?php echo $tot_session; ?></span></span>
                                                <span class="capitalize-font block">Total Session</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-globe data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        <div class="progress-anim">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-orange
                                                wow animated progress-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim"><?php echo $tot_users; ?></span></span>
                                                <span class="capitalize-font block">Total Users</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-user data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        <div class="progress-anim">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-orange
                                                wow animated progress-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim"><?php echo $tot_visits; ?></span></span>
                                                <span class="capitalize-font block">Total Visits</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-eye  data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        <div class="progress-anim">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-orange
                                                wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim"><?php echo $tot_pageviews; ?></span></span>
                                                <span class="capitalize-font block">Total Page Views</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-book-open data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        <div class="progress-anim">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-orange
                                                wow animated progress-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><?php echo gmdate("i:s", $avg_session_duration); ?></span>
                                                <span class="capitalize-font block">Avg. Session Duration</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-clock  data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        <div class="progress-anim">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-orange
                                                wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default card-view pa-0">
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body pa-0">
                                <div class="sm-data-box">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-xs-6 text-center pl-0 pr-0 data-wrap-left">
                                                <span class="txt-dark block counter"><span class="counter-anim"><?php echo round($bounce_rate,2); ?></span>%</span>
                                                <span class="capitalize-font block">bounce rate</span>
                                            </div>
                                            <div class="col-xs-6 text-center  pl-0 pr-0 data-wrap-right">
                                                <i class="icon-eye  data-right-rep-icon"></i>
                                            </div>
                                        </div>
                                        <div class="progress-anim">
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-orange
                                                wow animated progress-animated" role="progressbar" aria-valuenow="<?php echo round($bounce_rate,2); ?>" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default border-panel card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">user statistics</h6>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="pull-left inline-block refresh mr-15">
                                    <i class="zmdi zmdi-replay"></i>
                                </a>
                                <a href="#" class="pull-left inline-block full-screen mr-15">
                                    <i class="zmdi zmdi-fullscreen"></i>
                                </a>
                                
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                            <div id="morris-area-chart" class="" style="height:326px;"></div>
                                <ul class="flex-stat mt-40">
                                    <li>
                                        <i class="fa fa-circle m-r-5" style="color: #00bfc7;"></i> <span class="block">Users</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle m-r-5" style="color: #fdc006;"></i> <span class="block">Sessions</span>
                                    </li>
                                    <li>
                                        <i class="fa fa-circle m-r-5" style="color: #9675ce;"></i> <span class="block">Pageviews</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-lg-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default border-panel card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Audience Geo location</h6>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="pull-left inline-block refresh mr-15">
                                    <i class="zmdi zmdi-replay"></i>
                                </a>
                                <a href="#" class="pull-left inline-block full-screen mr-15">
                                    <i class="zmdi zmdi-fullscreen"></i>
                                </a>
                                <div class="pull-left inline-block dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>option 1</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>option 2</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>option 3</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div  id="regions_div" style="height: 385px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-sm-12 col-xs-12">
                    <div class="panel panel-default border-panel card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Returning & New Visitors</h6>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body">
                                <div id="sparkline11" class="text-center" style="margin:32px;"></div>
                                <!-- <hr class="light-grey-hr row mt-10 mb-0"/>
                                <div class="label-chatrs">
                                    <div class="pt-30 pb-10">
                                        <div class="pull-left"><span class="block txt-dark weight-600 font-24">$<span class="counter-anim">15,678</span></span></div>
                                        <div class="pull-right"><span class="block pt-5"><i class="zmdi zmdi-trending-up txt-success font-18 mr-5"></i><span class="weight-500 uppercase-font">growth</span></span></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div> -->
                            </div>	
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12">
                    <div class="panel panel-default border-panel card-view panel-refresh">
                        <div class="refresh-container">
                            <div class="la-anim-1"></div>
                        </div>
                        <div class="panel-heading">
                            <div class="pull-left">
                                <h6 class="panel-title txt-dark">Browsers wise Visits</h6>
                            </div>
                            <div class="pull-right">
                                <a href="#" class="pull-left inline-block refresh mr-15">
                                    <i class="zmdi zmdi-replay"></i>
                                </a>
                                <a href="#" class="pull-left inline-block full-screen mr-15">
                                    <i class="zmdi zmdi-fullscreen"></i>
                                </a>
                                <div class="pull-left inline-block dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-expanded="false" role="button"><i class="zmdi zmdi-more-vert"></i></a>
                                    <ul class="dropdown-menu bullet dropdown-menu-right"  role="menu">
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-reply" aria-hidden="true"></i>Edit</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-share" aria-hidden="true"></i>Delete</a></li>
                                        <li role="presentation"><a href="javascript:void(0)" role="menuitem"><i class="icon wb-trash" aria-hidden="true"></i>New</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-wrapper collapse in">
                            <div class="panel-body row pa-0">
                                <div class="table-wrap">
                                    <div class="table-responsive">
                                        <table class="table table-hover mb-0">
                                            <thead>
                                                <tr>
                                                <th>Browser</th>
                                                <th>Pageviews</th>
                                                <th>Visits</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php foreach($browser_pv_v as $pv_res){ ?>
                                                <tr>
                                                    <td><?php echo $pv_res; ?></td>
                                                    <td><?php echo $pv_res->getPageviews(); ?></td>
                                                    <td><?php echo $pv_res->getVisits(); ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>	
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <!-- /Row -->

</div>

<script src="<?php echo base_url('') ?>/app-assets/vendors/js/charts/jquery.sparkline.min.js"></script>
<!--<script src="--><?php //echo base_url('') ?><!--assets/plugins/bower_components/jquery-sparkline/jquery.charts-sparkline.js"></script>-->
<script>
    $(document).ready(function() {
        $('#sparkline11').sparkline([<?php echo $tot_new_sessions ?>, <?php echo $tot_session-$tot_new_sessions ?>], {
            type: 'pie',
            height: '320',
            resize: true,
            tooltipFormat: '{{offset:offset}}  {{value}} Sessions ({{percent.2}}%)',
            tooltipValueLookups: {
                'offset': {
                    0: 'New Visitor :',
                    1: 'Returning Visitor :'
                }},
            sliceColors: ['#E3E0F0', '#C2223A']
        });
        $('#sparklinedash, #sparklinedash1, #sparklinedash2, #sparklinedash3, #sparklinedash5').sparkline([ 0, 5, 6, 10, 9, 12, 4, 9], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#00c292'
        });

        $('#sparklinedash4').sparkline([ 0, 5, 6, 10, 9, 6, 14, 2], {
            type: 'bar',
            height: '30',
            barWidth: '4',
            resize: true,
            barSpacing: '5',
            barColor: '#fb9678'
        });
    });
</script>

<!--Morris JavaScript -->
<script src="<?php echo base_url('') ?>/app-assets/vendors/js/charts/morris.min.js"></script>
<script src="<?php echo base_url('') ?>/app-assets/vendors/js/charts/raphael-min.js"></script>
<!--<script src="<?php //echo base_url('') ?>assets/pages/morris.init.js"></script>-->

<script type="text/javascript">
    $(window).bind("load", function() {
        Morris.Area({
            element: 'morris-area-chart',
            parseTime:false,
            data: [
                <?php foreach ($days_user as $day_usr) { $gdte=$day_usr->getDate(); ?>
                {
                    period: '<?php echo date('M-d',strtotime($gdte)); ?>',
                    user: <?php echo $day_usr->getUsers(); ?>,
                    session: <?php echo $day_usr->getSessions(); ?>,
                    pviews: <?php echo $day_usr->getPageviews(); ?>
                },
                <?php } ?>
            ],
            lineColors: ['#6164C1', '#13DAFE', '#99D683'],
            xkey: 'period',
            ykeys: ['user', 'session', 'pviews'],
            labels: ['Users', 'Sessions', 'Pageviews'],
            pointSize: 3,
            fillOpacity: 0,
            pointStrokeColors:['#00bfc7', '#fdc006', '#9675ce'],
            behaveLikeLine: true,
            gridLineColor: '#e0e0e0',
            lineWidth: 1,
            hideHover: 'auto',
            lineColors: ['#00bfc7', '#fdc006', '#9675ce'],
            resize: true
        });

//        Morris.Line({
//            element: 'morris-line-chart',
//            resize: true,
//            parseTime:false,
//            data: [
//
//            ],
//            xkey: 'y',
//            ykeys: ['item1'],
//            labels: ['Item 1'],
//            gridLineColor: '#eef0f2',
//            lineColors: ['#a3a4a9'],
//            lineWidth: 1,
//            hideHover: 'auto'
//        });
    });
</script>