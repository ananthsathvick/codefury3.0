<?php if($status=='credit'){?>
    <div class="dashboard content-area-5">
    <div class="container">
        <div class="row">
			<div class="col-md-6 offset-md-3 col-lg-8 offset-lg-2 text-center payment-sec">
				<img src="<?php echo theme_url('img/new-images/thmbsup.png')?>" alt="Successful" class="mb-30">
				<h5>Your Payment has been credited. A confirmation mail has been sent to you.</h5>
			</div>
		</div>
    </div>
</div>
<?php }else{?>
    <div class="dashboard content-area-5">
        <div class="container">
            <div class="row">
                <div class="col-md-6 offset-md-3 col-lg-8 offset-lg-2 text-center payment-sec">
                    <img src="<?php echo theme_url('img/new-images/thbmbsdown.png')?>" alt="Successful" class="mb-30">
                    <h5>Sorry ,your transaction gets failed.Please try again.</h5>
                </div>
            </div>
        </div>
    </div>
<?php }?>

<script>
    $(document).ready(function(){
        window.setTimeout(function() {
            window.location.href = '<?php echo site_url('secure/resume_preview')?>';
        }, 5000);
    });
</script>
