</div>
        </div>
    </div>
</div>
<!-- Contact section end -->

<!-- Full Page Search -->
<div id="full-page-search">
    <button type="button" class="close">×</button>
    <form action="https://storage.googleapis.com/themevessel-items/jobb/index.html#">
        <input type="search" value="" placeholder="type keyword(s) here" />
        <button type="submit" class="btn btn-sm button-theme">Search</button>
    </form>
</div>

<script src="<?php echo theme_url();?>js/jquery-2.2.0.min.js"></script>
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
		// $.notify('cdddsfdsfsdfsdfsdsdfsfsfdssdfsdsfd','error');
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
</body>
</html>