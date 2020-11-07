<style>
<?php require_once('bootstrap.css'); ?>
    .pe {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;
    }

    .hh4 {
        color: black !important;
    }

    .res-name {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 45px;
        color: black;
        text-transform: uppercase;
    }

    .res-contact {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: gray;
    }

    .blue-bg {
        background-color: <?php echo $resume->res_color; ?>;
        height: inherit;
    }

    .res-head {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: darkblue;
    }

    .res-head-bl {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: black;
        font-weight: bolder;
    }

    .experience-title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: black;
    }

    .experience-desp {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: gray;
    }

    .obj-desp {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: white;
    }

    .nat-height {
        height: 100%;
    }

    .edu-title {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: black;
    }

    .edu-desp {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2px;
        color: gray;
    }


</style>
<div class="container-fluid" style="width:100%; padding:0px; margin:0px auto; vertical-align:top; height:auto;">
    <div class="row">
        <div class="col-8">
            <div class="py-3 px-3">
                <div class="res-name">
                    <h5 class=""><?php echo $resume->name; ?></h5>
                </div>
                <div class="res-head">
                    <p class="pe h-color" style="color:<?php echo $resume->res_color; ?>">PERSONAL INFORMATION</p>
                </div>

                <div class="res-contact">
                    <p class="pe">Phone: <?php echo $resume->phone; ?><br />Email: <?php echo $resume->email; ?><br />Address : <?php echo $resume->address; ?>
                        ,<br><?php echo $resume->city; ?>.
                        <br />Languages : <?php echo $resume->languages; ?><br />Gender: <?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></p>

                </div>
            </div>
            <div class="px-3 nat-height">

                <?php if ($resume->company_exp > 0) {  ?>

                    <div class="res-head">
                        <p class="pe h-color" style="color:<?php echo $resume->res_color; ?>">CAREER HIGHLIGHTS</p>
                    </div>
                    <?php foreach ($work_exp as $w_exp) {
                        if ($w_exp['company'] != '') { ?>

                            <div class="experience-title">
                                <p class="pe"><?php echo $w_exp['company']; ?></strong> | <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?> - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?><br>



                                    <?php echo $w_exp['job_title']; ?></p>

                            </div>

                            <div class="experience-desp">
                                <p class="pe"><strong>Roles and Responsibilities</strong><br>
                                    <?php echo $w_exp['w_description']; ?></p>
                            </div>

                    <?php }
                    }
                } else { ?>


                    <div class="res-head">
                        <p class="pe h-color" style="color:<?php echo $resume->res_color; ?>">COLLEGE PROJECT</p>
                    </div>


                    <div class="experience-title">
                        <p class="pe"><?php echo $resume->cp_title; ?></p>
                    </div>

                    <div class="experience-desp">
                        <p class="pe"><strong>Project Details</strong><br>
                            <?php echo  $resume->cp_description; ?></p>
                    </div>
                <?php } ?>

                <div class="res-head">
                    <p class="pe h-color" style="color:<?php echo $resume->res_color; ?>">EDUCATION</p>
                </div>
                <?php foreach ($education as $edu) {
                    if ($edu['institute'] != '') { ?>

                        <div class="edu-title">
                            <div class="pe"><?php echo $edu['degree']; ?></div>
                        </div>
                        <div class="edu-desp">
                            <p class="pe"><?php echo $edu['branch']; ?><br>
                                <!-- </div>
                        <div class="edu-desp"> -->
                                <?php echo $edu['institute']; ?> ( <?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?> )</p>
                        </div>

                <?php }
                } ?>
            </div>
        </div>

        <div class="col-4 blue-bg skill-color">
            <div class="px-3" style="padding-top: 8rem;">
                <div class="res-head-bl">
                    <p class="pe hh4">OBJECTIVES</p>
                </div>

                <div class="obj-desp">
                    <p class="pe hh4"><?php echo $resume->objectives; ?></p>
                </div>
                <?php $skills =  explode(',', $resume->skills);
                if (!empty($skills)) { ?>
                    <div class="res-head-bl">
                        <p class="pe hh4">SKILLS
                    </div>
                    <?php foreach ($skills as $ski) {
                        if ($ski != '') { ?>
                            <div class="obj-desp">
                                <div class="pe hh4"><?php echo $ski; ?></div>
                            </div>
                <?php }
                    }
                } ?>
                </p>

                <!-- <div class="res-head-bl">
                    <p class="pe hh4">EXPERTISE</p>
                </div>

                <div class="obj-desp">
                    <p class="pe hh4"><?php echo $resume->expertise; ?></p>
                </div> -->

                <?php if (!empty($awards) && !empty($awards[0])) { ?>

                    <div class="res-head-bl">
                        <p class="pe hh4">CERTIFICATIONS / AWARDS</p>
                    </div>

                    <div class="obj-desp">
                        <ul>
                            <?php foreach ($awards as $awr) { ?>

                                <li class="pe hh4"><?php echo $awr ?></li>

                            <?php } ?>

                        </ul>

                    <?php } ?>

                    </div>


                    <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp >= 3) { ?>


                        <div class="res-head-bl">
                            <p class="pe hh4">KEY ACHIEVEMENTS</p>
                        </div>
                        <div class="obj-desp">
                            <ul>
                                <?php foreach ($achievements as $achi) { ?>
                                    <li class="pe hh4"><?php echo $achi; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    <?php } ?>
            </div>
        </div>
    </div>
</div>
</div>