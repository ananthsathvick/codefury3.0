<?php $banner=''; if(!empty($page_contents[1])) { foreach ($page_contents[1] as $pg_content1) {
    $content1 = ($pg_content1->contents!='') ? json_decode($pg_content1->contents):'';
    $banner = upload_url($pg_content1->image,'page_contents/'); } } ?>
<!-- Sub banner start -->
<div class="sub-banner inner-page bg-color-full" style="background-image: url(<?php echo $banner; ?>); background-repeat:no-repeat; background-size:cover;">
    <div class="container">
        <div class="breadcrumb-area">
            <h1><span><?php echo $page_title; ?></span></h1>
			<ul class="breadcrumbs">			
            <ul class="breadcrumbs">
			<?php echo breadcrumb($page->id); ?>
            </ul>
        </div>
    </div>
</div>
<!-- Sub banner end -->

<?php if(!empty($page_contents[2])){ ?>
<!-- About us start -->
<div class="about-us  content-area-5">
    <div class="container">
	<?php foreach ($page_contents[2] as $pg_content2) {
            $content2 = ($pg_content2->contents!='') ? json_decode($pg_content2->contents):'';  ?>
        <div class="row">
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <img class="d-block w-100" src="<?php echo upload_url($pg_content2->image,'page_contents/'); ?>" alt="<?php echo $pg_content2->title; ?>">
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                    <h3><?php echo $pg_content2->title; ?></h3>
					<?php echo $pg_content2->description; ?>
                </div>
            </div>
        </div>
	<?php } ?>
    </div>
</div>
<!-- About us end -->
<?php } ?>

<!-- About us start -->
<div class="about-us  content-area-5 bg-grea">
    <div class="container">
        <div class="row text-center">
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                <?php if(!empty($page_contents[4])){ ?>
                <?php foreach ($page_contents[4] as $pg_content4) {  ?>
                    <h3><?php echo $pg_content4->title; ?></h3>
					<?php echo $pg_content4->description; ?>
                <?php } } ?>    
                </div>
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div class="about-text">
                <?php if(!empty($page_contents[5])){ ?>
                <?php foreach ($page_contents[5] as $pg_content5) {  ?>
                    <h3><?php echo $pg_content5->title; ?></h3>
                    <?php echo $pg_content5->description; ?>
                <?php } } ?>                     
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About us end -->


<!-- Services start -->
<div class="services content-area-5">
    <div class="container">
	<?php if(!empty($page_contents[3])){ ?>
		<?php foreach ($page_contents[3] as $pg_content3) {
            $content3 = ($pg_content3->contents!='') ? json_decode($pg_content3->contents):'';  ?>
        <!-- Main title -->
        <div class="main-title text-center">
            <h1><?php echo $pg_content3->title; ?></h1>
            <?php echo $pg_content3->description; ?>
        </div>
	<?php } } ?>
	<?php if(!empty($page_contents[301])){ ?>
        <div class="row">
		<?php foreach ($page_contents[301] as $pg_content301) {
            $content301 = ($pg_content3->contents!='') ? json_decode($pg_content301->contents):'';  ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="service-info">
                    <div class="icon">
                    <?php echo $content301->icon; ?>
                        <!-- <i class="flaticon-work"></i> -->
                    </div>
                    <h5><?php echo $pg_content301->title; ?></h5>
                    <?php echo $pg_content301->description; ?>										<a href="<?php echo site_url('employer/login')?>" class="btn btn-theme btn-md">Signup</a>
                </div>
            </div>
		<?php } ?>         
        </div>
	<?php } ?>
    </div>
</div>
<!-- Services end -->

<!-- Counters strat -->
<!-- <div class="counters bg-color-full-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-user"></i>
                    <h1 class="counter"><?php echo config_item('members'); ?></h1>
                    <p>Members</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-work"></i>
                    <h1 class="counter"><?php echo config_item('jobs'); ?></h1>
                    <p>Jobs</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-document"></i>
                    <h1 class="counter"><?php echo config_item('resumes'); ?></h1>
                    <p>Resumes</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6">
                <div class="counter-box">
                    <i class="flaticon-factory"></i>
                    <h1 class="counter"><?php echo config_item('companies'); ?></h1>
                    <p>Companies</p>
                </div>
            </div>
        </div>
    </div>
</div> -->
<!-- Counters end -->

<?php if(!empty($testimonials)){ ?>
<!-- Testimonial start -->
<div class="testimonial ">
    <div class="container">
        <div class="main-title">
            <h1>What Our Clients Say</h1>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "slidesToScroll": 1, "autoplay": true, "autoplaySpeed": 4000, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
			<?php foreach ($testimonials as $testimonial){ ?>
				<div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
						<?php echo $testimonial->description; ?>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="<?php echo upload_url($testimonial->image,'testimonials/');?>" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5><?php echo $testimonial->name; ?></h5>
                                <h6><?php echo $testimonial->place; ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
			<?php } ?>
            </div>            
        </div>
    </div>
</div>
<!-- Testimonial end -->
<?php } ?>