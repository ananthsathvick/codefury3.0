<!-- Footer -->

<footer class="footer pl-30 pr-30">

    <div class="container">

        <div class="row">

            <div class="col-sm-12 text-right">

                <p><?php echo date('Y'); ?> &copy; <?php echo config_item('company_name'); ?>.</p>

            </div>

            <!--<div class="col-sm-6 text-right">

                <p>Follow Us</p>

                <a href="#"><i class="fa fa-facebook"></i></a>

                <a href="#"><i class="fa fa-twitter"></i></a>

                <a href="#"><i class="fa fa-google-plus"></i></a>

            </div>-->

        </div>

    </div>

</footer>

<!-- /Footer -->

</div>

<!-- /Main Content -->

</div>

<!-- /#wrapper -->



<div class="pre-loader" style="display: none">

    <img src="<?php echo base_url(); ?>/assets/img/preloader.gif" alt="Preloader" />

</div>



<!-- JavaScript -->

<!-- Bootstrap Core JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

<!-- Data table JavaScript -->

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>-->



<!-- Slimscroll JavaScript -->

<script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>

<script src="<?php echo base_url(); ?>assets/js/jquery.repeater.min.js"></script>



<!-- Progressbar Animation JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>



<!-- Fancy Dropdown JS -->

<script src="<?php echo base_url(); ?>assets/js/dropdown-bootstrap-extended.js"></script>



<!-- Sparkline JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>



<!-- Owl JavaScript -->

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>-->



<!-- Bootstrap Tagsinput JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"></script>

<!-- Select2 JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/select2/dist/js/select2.full.min.js"></script>



<!-- Switchery JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>



<!-- Vector Maps JavaScript -->

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/vectormap/jquery-jvectormap-2.0.2.min.js"></script>-->

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/vectormap/jquery-jvectormap-us-aea-en.js"></script>-->

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/vectormap/jquery-jvectormap-world-mill-en.js"></script>-->

<!--<script src="--><?php //echo base_url(); ?><!--assets/js/vectormap-data.js"></script>-->



<!-- Toast JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>



<!-- Piety JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/peity/jquery.peity.min.js"></script>

<script src="<?php echo base_url(); ?>assets/js/peity-data.js"></script>



<!-- Chartist JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/chartist/dist/chartist.min.js"></script>



<!-- Morris Charts JavaScript -->

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/raphael/raphael.min.js"></script>

<script src="<?php echo base_url(); ?>assets/vendors/bower_components/morris.js/morris.min.js"></script>

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>-->



<!-- ChartJS JavaScript -->

<!--<script src="--><?php //echo base_url(); ?><!--assets/vendors/chart.js/Chart.min.js"></script>-->



<!-- Init JavaScript -->

<script src="<?php echo base_url(); ?>assets/js/init.js"></script>



<script src="<?php echo base_url(); ?>assets/vendors/bower_components/bootstrap/dist/js/bootstrap3-typeahead.min.js"></script>



<script>

    $(document).ready(function () {

        <?php if($this->session->flashdata('message')) { ?>

        $.toast({

            heading: 'Success',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('message')));?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'success',

            hideAfter: 3500,

            stack: 6

        });

        <?php } ?>

        <?php if($this->session->flashdata('error')) { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('error'))); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'error',

            hideAfter: 3500

        });

        <?php } ?>

        <?php if(function_exists('validation_errors') && validation_errors() != '') { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', validation_errors())); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'error',

            hideAfter: 35000000

        });

        <?php } ?>

        <?php if(!empty($error)) { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $error)); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'error',

            hideAfter: 3500

        });

        <?php } ?>

        <?php if($this->session->flashdata('info_message')) { ?>

        $.toast({

            heading: '',

            text: '<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('info_message'))); ?>',

            position: 'top-right',

            loaderBg: '#ff6849',

            icon: 'info',

            hideAfter: 3000,

            stack: 6

        });

        <?php } ?>



    });

</script>



<?php $tinymce_upload = parse_url(base_url()); ?>

<script src="<?php echo base_url('assets'); ?>/vendors/bower_components/tinymce/tinymce.min.js"></script>

<script>

    $(document).ready(function () {

        $(".select2").select2();

    });

    $(document).ready(function () {

        if ($(".mymce").length > 0) {

            tinymce.init({

                selector: "textarea.mymce",

                theme: "modern",

                height: 300,

                /*content_css: '//netdna.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css',*/

                /*noneditable_noneditable_class: 'fa',*/

                plugins: [

                    "advlist autolink link image imagetools lists charmap print preview hr anchor pagebreak spellchecker",

                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",

                    "save table contextmenu directionality emoticons template paste textcolor noneditable"

                ],

                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | l      ink image | print preview media fullpage | forecolor backcolor emoticons",

                extended_valid_elements: 'span[*]',

                relative_urls: false,

                browser_spellcheck: true,

                external_filemanager_path: "<?php echo $tinymce_upload['path']; ?>assets/filemanager/",

                filemanager_title: "Responsive Filemanager",

                external_plugins: {"filemanager": "<?php echo $tinymce_upload['path']; ?>assets/filemanager/plugin.min.js"},

                media_url_resolver: function (data, resolve/*, reject*/) {

                    if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {

                        var embedHtml = '<iframe src="' + data.url +

                            '" width="400" height="400" ></iframe>';

                        resolve({html: embedHtml});

                    } else {

                        resolve({html: ''});

                    }

                }

            });

        }

    });



    function areyousure_back()

    {

        return confirm('Are you sure want to go back?');

    }

    function areyousure() {

        return confirm('Are you sure want to delete this content?');

    }



    function form_submit(form) {

        $('form#' + form + ' button[type="submit"]').prop('disabled', true);

        $('form#' + form + ' input[type="submit"]').prop('disabled', true);

        var data = new FormData($('#'+form)[0]);

        $.ajax({

            type: "POST",

            url: $('#' + form).attr('action'),

            data: data,

            mimeType: "multipart/form-data",

            contentType: false,

            cache: false,

            processData: false,

            success: function (data) {

                var formErrors = $.parseJSON(data);

                if (typeof formErrors == 'object') {

                    for (var key in formErrors) {

                        if (formErrors.hasOwnProperty(key)) {

                            if (key == 'success_msg_reload') {

                                window.location.reload();

                            }

                            else if (key == 'success_msg_redirect') {

                                window.location.replace(formErrors[key]);

                            }

                            else if (key == 'success_msg') {

                                $.toast({heading: '',text: formErrors[key],position: 'top-right',loaderBg: '#ff6849',icon: 'success',hideAfter: 35000000});

                                $('#' + form)[0].reset();

                            }

                            else {

                                $.toast({heading: '',text: formErrors[key],position: 'top-right',loaderBg: '#ff6849',icon: 'error',hideAfter: 35000000});

                            }

                        }

                    }

                }

                $('form#' + form + ' button[type="submit"]').prop('disabled', false);

                $('form#' + form + ' input[type="submit"]').prop('disabled', false);

                return false;

            }

        });

        return false;

    }

</script>

<script>

    $(function() {

        // setTimeout() function will be fired after page is loaded

        // it will wait for 5 sec. and then will fire

        // $("#successMessage").hide() function

        setTimeout(function() {

            $(".pre-loader").hide()

        }, 5000);

    });





    (function () { var timeoutSession; document.addEventListener('mousemove', function (e) { clearTimeout(timeoutSession); timeoutSession = setTimeout(function () { window.location="<?php echo site_url('admin/login/logout'); ?>"; }, 600000); /* 10 min */}, true); })();

</script>
<?php if (isset($ajax_tables)): ?>
    <script src="<?php echo base_url('assets/vendors/js/tables/datatable/datatables.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/datatable/dataTables.buttons.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/jszip.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/pdfmake.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/vfs_fonts.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/buttons.flash.min.js'); ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/buttons.html5.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/buttons.print.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('assets/vendors/js/tables/buttons.colVis.min.js') ?>" type="text/javascript"></script>
    <?php $this->datatables->jquery(); endif; ?>

</body>

</html>

