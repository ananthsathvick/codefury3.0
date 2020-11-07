<?php $banner=''; if(!empty($page_contents[1])) { foreach ($page_contents[1] as $pg_content1) {
    $content1 = ($pg_content1->contents!='') ? json_decode($pg_content1->contents):'';
    $banner = upload_url($pg_content1->image,'page_contents/'); } } ?>
<!-- Sub banner start -->
<div class="sub-banner inner-page" style="background-image: url(<?php echo $banner; ?>); background-repeat:no-repeat; background-size:cover;">
    <div class="container">
        <div class="breadcrumb-area">
		<h1><span><?php echo $page_title; ?></span></h1>					
            <ul class="breadcrumbs">
			<?php echo breadcrumb($page->id); ?>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<!-- Contact 2 start -->
<div class="contact-2 content-area-5">
    <div class="container">        
        <!-- Contact info -->
        <div class="contact-info">
            <div class="row">
                <div class="col-md-12 col-sm-12 mrg-btn-50">
                    <i class="flaticon-pin"></i>
                    <p>Office Address</p>
                    <?php echo config_item('address'); ?>
                </div>
                <!-- <div class="col-md-4 col-sm-6 mrg-btn-50">
                    <i class="flaticon-phone"></i>
                    <p>Phone Number</p>
                    <strong><?php //echo config_item('phone_number'); ?></strong>
                </div> -->
                <!-- <div class="col-md-4 col-sm-6 mrg-btn-50">
                    <i class="flaticon-mail"></i>
                    <p>Email Address</p>
                    <strong><?php //echo config_item('email'); ?></strong>
                </div>                 -->
            </div>
        </div>
        <form action="<?php echo site_url('pages/quick_enquiry'); ?>" method="post" id="ContactForm" onsubmit="return form_submit('ContactForm')">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="name" class="form-control" placeholder="Name">
								<span class="text-danger name"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="Email">
								<span class="text-danger email"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control" placeholder="Subject">
								<span class="text-danger subject"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Number">
								<span class="text-danger phone"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <textarea class="form-control" name="description" placeholder="Write message"></textarea>
								<span class="text-danger description"></span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="send-btn text-center">
							<input type="hidden" name="url" value="<?php echo current_url(); ?>">
                            <input type="hidden" name="type" value="2">
                            <input type="hidden" name="pid" value="<?php echo $page->id; ?>">
                                <button type="submit" class="btn btn-md button-theme">Send Message</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-4">
                    <div class="opening-hours bg-light">
                        <h3>Opening Hours</h3>
                        <?php echo config_item('opening_hours'); ?>
                    </div>
                </div> -->
            </div>
        </form>
    </div>
</div>
<!-- Contact 2 end -->
