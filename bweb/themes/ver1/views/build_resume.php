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



<!-- About us start -->
<div class="about-us  content-area-5 bg-grea">
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-12">
                <div class="row">
                <div class="col-2 text-center">
                <i class="fa fa-line-chart tx-icn" aria-hidden="true"></i>
                </div>
                <div class="col-10">
                <div class="text-hd">
                    <p><strong>10 Best Resume Tempelates</strong></p>
                </div>
                <div class="text-tx">
                    <p>Create a modern and professional resume</p>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-2 text-center"><i class="fa fa-clock-o tx-icn" aria-hidden="true"></i></div>
                    <div class="col-10">
            <div class="text-hd">
                    <p><strong>Resume Check</strong></p>
                </div>
                <div class="text-tx">
                    <p>Our builder will give you suggestions on how to improve</p>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="row">
                    <div class="col-2 text-center"><i class="fa fa-lightbulb-o tx-icn" aria-hidden="true"></i></div>
                    <div class="col-10">
            <div class="text-hd">
                    <p><strong>Its Fast and Easy to use</strong></p>
                </div>
                <div class="text-tx">
                    <p>It will help you write a perfect resume in minutes</p>
                </div>
                </div>
                </div>
            </div>
            <div class="col-sm-6 col-12">
                <div class="row">
                <div class="col-2 text-center"><i class="fa fa-sticky-note tx-icn" aria-hidden="true"></i></div>
                <div class="col-10">
            <div class="text-hd">
                    <p><strong>Flexible Text Editor</strong></p>
                </div>
                <div class="text-tx">
                    <p>Acess to the best text editor available</p>
                </div>
                </div>
            </div>
            </div>
        </div>
        <div class="row my-5">
           <div class="head-tx">
               <p class="head-tx"><strong>Wisdom from the Recruiters</strong></p>
           </div>
           <div class="text">
               <p class="text">You no longer have to worry about how to make a resume.Our resume generator will guide you through the process of writing each section, step-by-step. </p>
           </div>
        </div>
        <div class="row my-5">
           <div class="head-tx">
               <p class="head-tx"><strong>Customize Your Resume</strong></p>
           </div>
           <div class="text">
               <p class="text">Choose font types , sizes, and spacing. You can bold, italicize, and underline your test. You dont need to use MS Word resume tempelates: we take care of formatting, and giving you the access to best resume designs you will ever need </p>
           </div>
        </div>
        <div class="row my-5 bg-grey">
           <div class="head-tx">
               <p class="head-tx"><strong>Customize Your Professional resumes online</strong></p>
           </div>
           <div class="text">
               <p class="text">Making a resume is the first step of any job search. Not sure how to make a resume? Our online resume builder gives you free resume templates to follow.</p>
           </div>
        </div>
        <div class="row my-5 ">
            <div class="col-3 bg-ball text-icn text-center">
                <p class="text-icn">Multiple Resume Templates</p>
            </div>
            <div class="col-1"></div>
            <div class="col-3 bg-ball text-icn text-center"><p class="text-icn"></i>Multiple Features</p></div>
            <div class="col-1"></div>
            <div class="col-3 bg-ball text-icn text-center"><p class="text-icn">Multiple Color Options</p></div>
            <div class="col-1"></div>
            <div class="col-3  text-tick text-center">
                <p class="text-tick"><i class="fa fa-check" aria-hidden="true"></i></p>
            </div>
            <div class="col-1"></div>
            <div class="col-3 l text-tick text-center"><p class="text-tick"><i class="fa fa-check" aria-hidden="true"></i></p></div>
            <div class="col-1"></div>
            <div class="col-3  text-tick text-center"><p class="text-tick"><i class="fa fa-check" aria-hidden="true"></i></p></div>
            <div class="col-1"></div>
            
        </div>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators" style="color: black;">
    <li data-target="#carouselExampleIndicators" style="color: black;" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" style="color: black;" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" style="color: black;" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active text-center">
      <img class="d-block w-man " src="/uploads/page_contents/screen1.png" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-man text-center" src="/uploads/page_contents/screen2.png" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-man text-center" src="/uploads/page_contents/screen3.png" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
    </div>
</div>
<!-- About us end -->

<style>
    .carousel-indicators li {
    display: inline-block;
    width: 12px;
    height: 12px;
    margin: 10px;
    text-indent: 0;
    cursor: pointer;
    border: none;
    border-radius: 50%;
    background-color: #686868;
    box-shadow: inset 1px 1px 1px 1px rgba(0,0,0,0.5);    
}
.carousel-indicators .active {
    width: 13px;
    height: 13px;
    margin: 10px;
    background-color: #000000;
}
    .w-man{
        width: 50%;
        margin-top: auto;
        margin-bottom: auto;
        margin-left: auto;
        margin-right: auto;
        display: block;
    }
    .head-tx{
        font-family: sans-serif;
        font-size: 1.5em;
        padding: 0% 4%;
        

    }
    .tx-icn{
        color: blue;
        font-size: 2em;
        text-align: center;
    }
    .text-hd{
        font-family: sans-serif;
        font-size: 1.0em;

    }
    .text-tx{
        font-family: sans-serif;
        font-size: 1.0em;

    }
   
    .text-tick{
        font-family: sans-serif;
        font-size: 1.2em;
    }
    .bg-grey{
        background-color: rgba(232, 232, 232, 1);
        padding: 5%;
    }
    .text{
        font-family: sans-serif;
        font-size: 1.0em;
        padding: 0% 4%;
    }
    .text-icn{
        font-family: sans-serif;
        font-size: 0.9em;
    }
    .bg-ball{
        background-color: rgba(232, 232, 232, 1);
        padding: 5% 5%;
        border-radius: 25%;
        width: 100%;
        height: auto;
    }
    @media(min-width:576px){
    .text{
        font-family: sans-serif;
        font-size: 1.0em;
        padding: 0% 0%;
    }
    .head-tx{
        font-family: sans-serif;
        font-size: 1.5em;
        padding: 0% 0%;
        

    }
    .text-icn{
        font-family: sans-serif;
        font-size: 0.9em;
    }
    .bg-ball{
        background-color: rgba(232, 232, 232, 1);
        padding: 5% 5%;
        border-radius: 50%;
        width: 100%;
        height: 130px;
    }
    .text-tick{
        font-family: sans-serif;
        font-size: 1.5em;
    }
}
    @media(min-width:768px){
    .text{
        font-family: sans-serif;
        font-size: 1.0em;
        padding: 0% 0%;
    }
    .bg-ball{
        background-color: rgba(232, 232, 232, 1);
        padding: 8% 5%;
        border-radius: 50%;
        width: 100%;
        height: 170px;
    }
    .text-icn{
        font-family: sans-serif;
        font-size: 1.0em;
    }
    .text-tick{
        font-family: sans-serif;
        font-size: 2em;
    }
}
    
    @media(min-width:992px){
        .bg-ball{
        background-color: rgba(232, 232, 232, 1);
        padding: 8% 5%;
        border-radius: 50%;
        width: 100%;
        height: 289px;
        
    }
    .text{
        font-family: sans-serif;
        font-size: 1.2em;
        padding: 0% 0%;
    }
    .text-icn{
        font-family: sans-serif;
        font-size: 1.2em;
    }
    .text-tick{
        font-family: sans-serif;
        font-size: 2em;
    }
    }
    
</style>

