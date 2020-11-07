</div>
</div>
<!-- Dashboard end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="https://storage.googleapis.com/themevessel-items/jobb/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<script src="<?php echo theme_url();?>js/popper.min.js"></script>
<script src="<?php echo theme_url();?>js/bootstrap.min.js"></script>
<script  src="<?php echo theme_url();?>js/bootstrap-submenu.js"></script>
<script  src="<?php echo theme_url();?>js/rangeslider.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.mb.YTPlayer.js"></script>
<script  src="<?php echo theme_url();?>js/bootstrap-select.min.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.easing.1.3.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.scrollUp.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.mCustomScrollbar.concat.min.js"></script>
<script  src="<?php echo theme_url();?>js/leaflet.js"></script>
<script  src="<?php echo theme_url();?>js/leaflet-providers.js"></script>
<script  src="<?php echo theme_url();?>js/leaflet.markercluster.js"></script>
<script  src="<?php echo theme_url();?>js/moment.min.js"></script>
<script  src="<?php echo theme_url();?>js/daterangepicker.min.js"></script>
<script  src="<?php echo theme_url();?>js/dropzone.js"></script>
<script  src="<?php echo theme_url();?>js/slick.min.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.filterizr.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.magnific-popup.min.js"></script>
<script  src="<?php echo theme_url();?>js/jquery.countdown.js"></script>
<script  src="<?php echo theme_url();?>js/maps.js"></script>
<script  src="<?php echo theme_url();?>js/app.js"></script>

<script src="<?php echo theme_url("js/notify.min.js");?>"></script> 
<script>
    $(document).ready(function() {
        <?php if($this->session->flashdata('message')) { ?>
        $.notify('<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('message')));?>','success');
        <?php } ?>
        <?php if($this->session->flashdata('error')) { ?>
        $.notify('<?php echo trim(preg_replace('/\r|\n/', ' ', $this->session->flashdata('error'))); ?>','error');
        <?php } ?>
        <?php if(isset($errors)) {
        foreach($errors as $error) { ?>
        $.notify('<?php echo trim(preg_replace('/\r|\n/', ' ',$error)); ?>','error');
        <?php } } ?>
    });
</script>

<script>
    var app = angular.module('myApp', []);
    app.filter('customSplitString', function() {
        return function(input) {
            if(input === undefined){
                return false;
            }
            var arr = input.split(',');
            return arr;
        };
    });
    /*app.directive("limitTo", [function() {
        return {
            restrict: "A",
            link: function(scope, elem, attrs) {
                var limit = parseInt(attrs.limitTo);
                angular.element(elem).on("keypress", function(e) {
                    if (this.value.length == limit) e.preventDefault();
                });
            }
        }
    }]);*/
<?php if(isset($cresume)) { ?>
 app.controller('ResCtrl',function($scope){
    $scope.name= '<?php echo set_value('name',$resume['name']); ?>';
     $scope.email= '<?php echo set_value('email',$resume['email']); ?>';
     $scope.phone= '<?php echo set_value('phone',$resume['phone']); ?>';
     $scope.mobile= '<?php echo set_value('mobile',$resume['mobile']); ?>';
     $scope.objectives= '<?php echo set_value('objectives',$resume['objectives']); ?>';
     $scope.languages= '<?php echo set_value('languages',$resume['languages']); ?>';
     $scope.address= '<?php echo set_value('address',$resume['address']); ?>';
     $scope.city= '<?php echo set_value('city',$resume['city']); ?>';
     $scope.state= '<?php echo set_value('state',$resume['state']); ?>';
     $scope.pincode= '<?php echo set_value('pincode',$resume['pincode']); ?>';
     $scope.company_exp= '<?php echo set_value('company_exp',$resume['company_exp']); ?>';
     $scope.skills= '<?php echo set_value('skills',$resume['skills']); ?>';     
     $scope.expertise= "<?php echo set_value('expertise',trim(preg_replace('/\r|\n/', ' ', $resume['expertise']))); ?>";     
     <?php if($resume['work_exp']>0){ foreach($resume['work_exp'] as $key=>$wexp){ ?>
        $scope.jt_<?php echo $key; ?>= '<?php echo set_value('work_exp['.$key.'][job_title]',$wexp['job_title']); ?>';
        $scope.cmp_<?php echo $key; ?>= '<?php echo set_value('work_exp['.$key.'][company]',$wexp['company']); ?>';
        $scope.exp_f_date_<?php echo $key; ?>= '<?php echo set_value('work_exp['.$key.'][exp_f_date]',date('Y-m',strtotime($wexp['exp_f_date']))); ?>';
        $scope.exp_t_date_<?php echo $key; ?>= '<?php echo set_value('work_exp['.$key.'][exp_t_date]',date('Y-m',strtotime($wexp['exp_t_date']))); ?>';
        $scope.w_description_<?php echo $key; ?>= '<?php echo set_value('work_exp['.$key.'][w_description]',$wexp['w_description']); ?>';
 <?php } } ?>
 <?php if(!empty($resume['education'])){ foreach($resume['education'] as $key=>$educ){ ?>
        $scope.inst_<?php echo $key; ?>= '<?php echo set_value('education['.$key.'][institute]',$educ['institute']); ?>';
        $scope.degree_<?php echo $key; ?>= '<?php echo set_value('education['.$key.'][degree]',$educ['degree']); ?>';
        $scope.branch_<?php echo $key; ?>= '<?php echo set_value('education['.$key.'][branch]',$educ['branch']); ?>';
        $scope.edu_f_date_<?php echo $key; ?>= '<?php echo set_value('education['.$key.'][edu_f_date]',$educ['edu_f_date']); ?>';
        $scope.edu_t_date_<?php echo $key; ?>= '<?php echo set_value('education['.$key.'][edu_t_date]',$educ['edu_t_date']); ?>';
 <?php } } ?>
 <?php if(!empty($resume['awards'])){ $i=1; foreach($resume['awards'] as $awr){ ?>
        $scope.awar<?php echo $i; ?>= '<?php echo set_value('awards[]',$awr); ?>';
         <?php $i++; } } ?>
         <?php if(!empty($resume['achievements'])){ $i=1; foreach($resume['achievements'] as $ach){ ?>
        $scope.ach<?php echo $i; ?>= '<?php echo set_value('achievements[]',$ach); ?>';
         <?php $i++; } } ?>
      });
    <?php } ?>
      function form_submit(form) {
        $('form#' + form + ' .text-danger').text('');
        $('form#' + form + ' button[type="submit"]').prop('disabled', true);
        $('form#' + form + ' input[type="submit"]').prop('disabled', true);
        var data = new FormData($('#' + form)[0]);
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
                                $.notify(formErrors[key],'success');
                                $('#' + form)[0].reset();
                            }
                            else {
                                $.notify(formErrors[key],'error');
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
</body>
</html>