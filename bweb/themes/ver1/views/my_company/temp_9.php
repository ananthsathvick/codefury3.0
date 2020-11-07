<style>
    <?php require_once('bootstrap.css'); ?>
    .pees {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;

    }

    .hd {
        color: white;
    }

    .res-name {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 2.5em;
        color: white;
    }


    .bg-col {
        background-color: <?php echo $resume->res_color; ?>;
    }

    .res-l {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.5em;
    }

    .res-r {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.5em;
        color: white;
    }

    .fc-col {
        color: <?php echo $resume->res_color; ?>;
    }

    .desp {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.0em;
        color: black;
    }

    .bg-white {
        background-color: white;
    }

    .res-set {
        padding: 0%;
    }

    .g {
        opacity: 0.7;
    }

    .desp-l {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.0em;
        color: white;
    }

    /* .line{
    border-right: 2px solid white;
    height: 100%;
} */
    .l-line {
        border-left: 3px solid white;
        margin-left: 8%;
        padding-left: 10%;
    }
</style>
<div>
    <div class="container">
        <div class="row">
            <div class="col-4  res-set">
                <div class="res-name py-4  w-100 bg-col g">
                    <h2 class="px-4 name-resume hd"><?php echo $resume->name; ?></h2>
                </div>
                <div class="res-l fc-col px-4 py-1">
                    <p class=""><strong>Career objective</strong></p>
                </div>
                <div class="desp px-3">
                    <p class="pees"><?php echo $resume->objectives; ?></p>
                </div>
                <div class="res-l fc-col px-4 py-1">
                    <p class=""><strong>Contact</strong></p>
                </div>
                <div class="desp px-3">
                    <p class="pees"><?php echo $resume->phone; ?></p>
                    <p class="pees"><?php echo $resume->email; ?></p>
                    <p class="pees"><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.</p>
                    <p class="pees"><?php echo $resume->languages; ?></p>
                    <p class="pees"><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></p>
                </div>


                <?php $skills =  explode(',', $resume->skills);
                if (!empty($skills)) { ?>
                    <div class="res-l fc-col px-4 py-1">
                        <p class=""><strong>Skills</strong></p>
                    </div>
                    <div class="desp px-3">
                        <ul>
                            <?php foreach ($skills as $ski) {
                                if ($ski != '') { ?>
                                    <li class="pees"><?php echo $ski; ?></li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                <?php } ?>

                <!-- <div class="res-l fc-col px-4 py-1">
                    <p class=""><strong>Area of Expertise</strong></p>
                </div>
                <div class="desp px-3">
                    <p class="pees"> <?php echo $resume->expertise; ?></p>
                </div> -->


                <?php if (!empty($awards) && !empty($awards[0])) { ?>
                    <div class="res-l fc-col px-4 py-1">
                        <p class=""><strong>Certifications / Awards</strong></p>
                    </div>
                    <div class="desp px-3">
                        <ul>
                            <?php foreach ($awards as $awr) { ?>

                                <li class="pees"><?php echo $awr ?></li>

                            <?php } ?>

                        </ul>
                    </div>

                <?php } ?>





            </div>
            <div class="col-8 bg-col h-100">




                <?php if ($resume->company_exp > 0) {  ?>
                    <div class="res-r px-2 pt-4">
                        <p class=" hd"><strong class="hd">Professional experience</strong></p>
                    </div>
                    <div class="desp-l">
                        <div class="row">
                            <div class="col-0 ">
                                <div class="line"> </div>
                            </div>
                            <div class="col l-line">

                                <?php foreach ($work_exp as $w_exp) {
                                    if ($w_exp['company'] != '') { ?>




                                        <p class="pees hd"><strong class="hd"><?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
                                                - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?></strong>
                                            <br /><?php echo $w_exp['company']; ?>
                                            <br /><?php echo $w_exp['job_title']; ?><br />Roles and Responsibilities:<br />
                                            <?php echo $w_exp['w_description']; ?></p>
                                        <!-- <p class="pees hd"></p>
                            <p class="pees hd"></p>
                            <p class="pees hd"></p> -->
                                <?php }
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="res-r px-2 pt-4">
                        <p class=" hd"><strong class="hd">Projects</strong></p>
                    </div>
                    <div class="desp-l">
                        <div class="row">
                            <div class="col-0 ">
                                <div class="line"> </div>
                            </div>
                            <div class="col-12 l-line">
                                <p class="pees hd">
                                    <br /><?php echo $resume->cp_title; ?>
                                    <br />Project Details<br />
                                    <?php echo  $resume->cp_description; ?></p>
                                <p class="pees hd"></p>
                                <p class="pees hd"></p>
                                <p class="pees hd"></p>



                            </div>
                        </div>
                    </div>
                <?php } ?>




                <div class="res-r px-2 pt-1">
                    <p class=" hd"><strong class="hd">Education</strong></p>

                </div>






                <div class="desp-l pb-2">
                    <div class="row">
                        <div class="col-0 ">
                            <div class="line"> </div>
                        </div>
                        <div class="col-12 l-line">
                            <?php foreach ($education as $edu) {
                                if ($edu['institute'] != '') { ?>
                                    <p class="pees hd"><strong class="hd"><?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?></strong><br /><?php echo $edu['institute']; ?><br /><?php echo $edu['branch']; ?><br /><?php echo $edu['degree']; ?></p>

                            <?php }
                            } ?>

                        </div>
                    </div>
                </div>






                <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp >= 3) { ?>
                    <div class="res-r px-2 pt-1">
                        <p class=" hd"><strong class="hd">Key Achievements</strong></p>

                    </div>


                    <div class="desp-l pb-2">
                        <div class="row">
                            <div class="col-0 ">
                                <div class="line"> </div>
                            </div>
                            <div class="col l-line">
                                <ul>
                                    <?php foreach ($achievements as $achi) { ?>
                                        <li class="pees"><?php echo $achi; ?></li>
                                    <?php
                                    } ?>
                                </ul>
                            </div>
                        </div>
                    </div>




                <?php } ?>



            </div>
        </div>
    </div>
</div>