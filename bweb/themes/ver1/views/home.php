<?php if(!empty($page_contents[1])) {  ?>
   <!-- Banner start -->
<div class="banner bg-color-full" id="banner">
    <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
        <?php $i=1; foreach ($page_contents[1] as $pg_content1) { 
            $content1 = ($pg_content1->contents!='') ? json_decode($pg_content1->contents):''; ?>
            <div class="carousel-item banner-max-height<?php echo $i==1 ? ' active':''; ?>">
                <img class="d-block w-100 h-100" src="<?php echo upload_url($pg_content1->image,'page_contents/'); ?>" alt="<?php echo $pg_content1->title; ?> ">
                <div class="carousel-caption banner-slider-inner d-flex text-left">
                	<div class="container">
                    	<div class="row">
                        	<div class="col-md-12">
                                <h3><span><?php echo $pg_content1->title; ?> </span></h3>
                            </div>
                    	</div>
                    </div>
                </div>
            </div>   
        <?php $i++; } ?>             
        </div>
    </div>    
</div>
<!-- Banner end -->
<?php } ?>

<?php if(!empty($page_contents[2])){ ?>                        
<!-- Partners strat -->
<div class="partners content-area-15">
    <div class="container">
        <div class="main-title text-center">
            <h1>Top Employers </h1>            
        </div>
        <div class="slick-slider-area">
        	<div class="row">
            	<div class="col-md-12">
                	<div class="app-figure" id="zoom-fig">
                        <div class="MagicScroll" id="scroll-1" data-options="autoplay: 1; speed:3000; mode: carousel; draggable: true;" style="height:150px !important;">
                        <?php foreach ($page_contents[2] as $pg_content2) {  ?>
                        <div class="slick-slide-item"><img src="<?php echo upload_url($pg_content2->image,'page_contents/'); ?>" alt="<?php echo $pg_content2->title; ?>" class="img-fluid"></div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>
</div>
<!-- Partners end -->
<?php } ?>

<?php if(!empty($page_contents[3])){ ?>  
    <?php foreach ($page_contents[3] as $pg_content3) {  ?>
<!-- Job section strat -->
<div class="about-us  content-area-5">
    <div class="container">
        <div class="row">
        	<div class="col-md-12">
        		<h3 class="text-center mb-30"><?php echo $pg_content3->title; ?></h3>
            </div>
            <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
                <img class="d-block w-100" src="<?php echo upload_url($pg_content3->image,'page_contents/'); ?>" alt="<?php echo $pg_content3->title; ?>">
            </div>
            <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
                <div>
                <?php echo $pg_content3->description; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Job section end -->
<?php } } ?>

<?php if(!empty($page_contents[4])){ ?>  
    <?php foreach ($page_contents[4] as $pg_content4) {  
         $content4 = ($pg_content4->contents!='') ? json_decode($pg_content4->contents):''; ?>
<!-- Testimonial start -->
<div class="testimonial  bg-grea">
    <div class="container">
    	<div class="row">
        <div class="col-md-12 main-title">
            <h1 class="mb-30 text-center"><?php echo $pg_content4->title; ?></h1>
        </div>
       
        <div class="col-xl-6 col-lg-5 col-md-12 col-sm-12 col-xs-12">
            <div>
            <?php echo $pg_content4->description; ?>
                <p class="text-right">
                   	<a href="<?php echo (isset($content4->url) && $content4->url!='') ? $content4->url:'javascript:void(0)'; ?>" class="btn button-theme">Read more...</a> 
                </p>                
            </div>
        </div>
         <div class="col-xl-6 col-lg-7 col-md-12 col-sm-12 col-xs-12">
            <img class="d-block w-100" src="<?php echo upload_url($pg_content4->image,'page_contents/'); ?>" alt="<?php echo $pg_content4->title; ?>">
        </div>
        </div>
    </div>
</div>
<!-- Testimonial end -->
    <?php } } ?>
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
                            <p><?php echo $testimonial->description; ?></p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="<?php echo upload_url($testimonial->image,'testimonials/');?>" alt="<?php echo $testimonial->name; ?>" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                <?php echo $testimonial->name; ?>
                                </h5>
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

