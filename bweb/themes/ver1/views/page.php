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

<div class="about-us  content-area-5">
    <div class="container">
	<?php foreach ($page_contents[2] as $pg_content2) {
            $content2 = ($pg_content2->contents!='') ? json_decode($pg_content2->contents):'';  ?>
        <div class="row">            
            <div class="col-xl-12">
                <div class="about-text">
                    <!-- <h3><?php //echo $pg_content2->title; ?></h3> -->
					<?php echo $pg_content2->description; ?>
                </div>
            </div>
        </div>
	<?php } ?>		<!--  Only for Campus Selection page -->		<!-- <div class="row">                        <div class="col-xl-9 col-lg-8 col-md-7 mb-4">                <div class="about-text">                    					<?php //echo $pg_content2->description; ?>                </div>            </div>			<div class="col-xl-3 col-lg-4 col-md-5 mb-3">				<h4>Enquiry</h4>				<div class="form-group">					<input type="text" class="form-control" placeholder="Name">				</div>				<div class="form-group">					<input type="text" class="form-control" placeholder="Email id">				</div>				<div class="form-group">					<input type="text" class="form-control" placeholder="Contact Number">				</div>				<div class="form-group">					<textarea class="form-control" placeholder="Remarks"></textarea>				</div>				<div class="form-group text-right">					<button class="btn btn-theme btn-md">Submit</button>				</div>			</div>        </div> -->
    </div>
</div>