<!-- Footer start --><footer class="footer">    <div class="container footer-inner">        <div class="row">            <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">                <div class="footer-item clearfix">                    <h4>Code Headed</h4>                    <ul class="contact-info">                        <li>                            <i class="flaticon-pin"></i><?php echo config_item('address'); ?>                        </li>                        <li>                            <i class="flaticon-mail"></i><a href="mailto:<?php echo config_item('email'); ?>"><?php echo config_item('email'); ?></a>                        </li>                                                <li>                            <i class="flaticon-phone"></i><a href="tel:<?php echo camelize(config_item('phone_number')) ?>"><?php echo config_item('phone_number'); ?></a>                        </li>                    </ul>                </div>            </div>            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">                <div class="footer-item">                    <h4>Helpful Links</h4>                    <ul class="links">                    <?php $footer1 = $this->Common_model->get_tbl_list('pages',array('sel'=>'id,title,template','like'=>array('display_in'=>'f1'))); ?>                    <?php foreach($footer1 as $f1){ ?>                            <li><a href="<?php echo ($f1->template=='') ? '#': full_url($f1->id); ?>"><?php echo $f1->title; ?></a></li>                        <?php } ?>                    </ul>                </div>            </div>            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">                <div class="footer-item">                    <h4>Job Seekers</h4>                    <ul class="links">                        <!-- <li>                            <a href="#">Browse Jobs</a>                        </li>                        <li>                            <a href="#">Job Search</a>                        </li> -->                        <li>                            <a href="<?php echo site_url('register');  ?>">Register Now</a>                        </li>                        <li>                            <a href="<?php echo site_url('login'); ?>">Login</a>                        </li>                         <!-- <li>                            <a href="#">Create Free Job Alert</a>                        </li> -->                    </ul>                </div>            </div>            <div class="col-xl-2 col-lg-2 col-md-4 col-sm-6">                <div class="footer-item">                    <h4>Employers</h4>                    <ul class="links">                        <li>                            <a href="<?php echo site_url('employer-login'); ?>">Create Account</a>                        </li>                        <li>                            <a href="<?php echo site_url('employer-login'); ?>">Login</a>                        </li>                        <!-- <li>                            <a href="<?php //echo site_url('employer-login'); ?>">Recruiter India</a>                        </li> -->                        <!-- <li>                            <a href="<?php //echo site_url('employer-login'); ?>">Post Jobs</a>                        </li> -->                        <li>                                                    </li>                                            </ul>                </div>            </div>            <div class="col-xl-3 col-lg-3 col-md-8 col-sm-12">                 <h4>Connect with us</h4>                    <ul class="social-list clearfix">                    <li><a target="_blank" href="<?php echo config_item('facebook'); ?>" class="facebook"><i class="fa fa-facebook"></i></a></li>                    <!-- <li><a target="_blank" href="<?php //echo config_item('twitter'); ?>" class="twitter"><i class="fa fa-twitter"></i></a></li> -->                    <!-- <li><a target="_blank" href="<?php //echo config_item('google_plus'); ?>" class="google"><i class="fa fa-google-plus"></i></a></li> -->                    <!-- <li><a target="_blank" href="<?php //echo config_item('instagram'); ?>" class="rss"><i class="fa fa-rss"></i></a></li> -->                    <li><a target="_blank" href="<?php echo config_item('linkedin'); ?>" class="linkedin"><i class="fa fa-linkedin"></i></a></li>                </ul>                </div>            </div>        </div>    </div></footer><!-- Footer end --><!-- Sub footer start --><div class="sub-footer">    <div class="container">        <div class="row">            <div class="col-lg-8 col-md-8">                <p class="copy">© 2020 Code Headed All Rights Reserved.</p>            </div>            <div class="col-lg-4 col-md-4 text-right">                </div>        </div>    </div></div><script src="<?php echo theme_url();?>js/jquery-2.2.0.min.js"></script><script src="<?php echo theme_url();?>js/popper.min.js"></script><script src="<?php echo theme_url();?>js/bootstrap.min.js"></script><script  src="<?php echo theme_url();?>js/bootstrap-submenu.js"></script><script  src="<?php echo theme_url();?>js/rangeslider.js"></script><script  src="<?php echo theme_url();?>js/jquery.mb.YTPlayer.js"></script><script  src="<?php echo theme_url();?>js/bootstrap-select.min.js"></script><script  src="<?php echo theme_url();?>js/jquery.easing.1.3.js"></script><script  src="<?php echo theme_url();?>js/jquery.scrollUp.js"></script><script  src="<?php echo theme_url();?>js/jquery.mCustomScrollbar.concat.min.js"></script><script  src="<?php echo theme_url();?>js/leaflet.js"></script><script  src="<?php echo theme_url();?>js/leaflet-providers.js"></script><script  src="<?php echo theme_url();?>js/leaflet.markercluster.js"></script><script  src="<?php echo theme_url();?>js/moment.min.js"></script><script  src="<?php echo theme_url();?>js/daterangepicker.min.js"></script><script  src="<?php echo theme_url();?>js/dropzone.js"></script><script  src="<?php echo theme_url();?>js/slick.min.js"></script><script  src="<?php echo theme_url();?>js/jquery.filterizr.js"></script><script  src="<?php echo theme_url();?>js/jquery.magnific-popup.min.js"></script><script  src="<?php echo theme_url();?>js/jquery.countdown.js"></script><script  src="<?php echo theme_url();?>js/maps.js"></script><script  src="<?php echo theme_url();?>js/app.js"></script><script src="<?php echo theme_url("js/notify.min.js");?>"></script>     <script>        $(document).on("click", ".modalbtn", function () {        var myBookId = $(this).data('id');        $(".modal-body #catenq").val(myBookId);    });    function form_submit(form) {        $('form#' + form + ' .text-danger').text('');        $('form#' + form + ' button[type="submit"]').prop('disabled', true);        $('form#' + form + ' input[type="submit"]').prop('disabled', true);        var data = new FormData($('#' + form)[0]);        $.ajax({            type: "POST",            url: $('#' + form).attr('action'),            data: data,            mimeType: "multipart/form-data",            contentType: false,            cache: false,            processData: false,            success: function (data) {                var formErrors = $.parseJSON(data);                if (typeof formErrors == 'object') {                    for (var key in formErrors) {                        if (formErrors.hasOwnProperty(key)) {                            if (key == 'success_msg_reload') {                                window.location.reload();                            }                            else if (key == 'success_msg_redirect') {                                if(form !='EnqForm') {                                    setTimeout(function () {                                        window.location.replace(formErrors[key]), 5000                                    });                                }                            }                            else if (key == 'success_msg') {                                $.notify(formErrors[key],'success');                                $('#' + form)[0].reset();                            }                            else {                                $('form#'+form+' .'+key).text(formErrors[key]);                            }                        }                    }                }                $('form#' + form + ' button[type="submit"]').prop('disabled', false);                $('form#' + form + ' input[type="submit"]').prop('disabled', false);                return false;            }        });        return false;    }</script><script>    $(document).ready(function() {        <?php if($this->session->flashdata('message')) { ?>        $.notify('<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('message')));?>','success');        <?php } ?>        <?php if($this->session->flashdata('error')) { ?>        $.notify('<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('error'))); ?>','error');        <?php } ?>        <?php if(isset($errors)) {        foreach($errors as $error) { ?>        $.notify('<?php echo trim(preg_replace('/\r|\n/', ' ',$error)); ?>','error');        <?php } } ?>    });</script></body></html>