<style>
    <?php require_once('bootstrap.css'); ?>
    .pees {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;

    }

    .hd {
        color: white;
    }

    .grey-bg {
        background-color: <?php echo $resume->res_color; ?>;
    }

    .name-resume {
        font-size: 50px
    }

    .res-title {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 4em;
    }

    .res-desp {
        color: #ffffff;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 2em;
    }

    .heads {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 2em;
        background-color: <?php echo $resume->res_color; ?>;
        width: 100%;
    }

    .desp {
        color: black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;

    }

    .desp-large {
        font-size: 2em;
    }

    .desp-small {
        font-size: 1em;
    }

    .desp-mid {
        font-size: 1.5em;
    }
</style>
<div>
    <div class="grey-bg py-5">
        <div class="res-title">
            <i class="text-center ">
                <p class="name-resume hd"><?php echo $resume->name; ?></p>
            </i>
        </div>
        <!-- <div class="res-desp">
            <p class="text-center pees hd">Job title</p>
        </div> -->
    </div>
    <div class="container py-2">
        <div class="row">
            <div class="col-4">
                <div class="heads">
                    <p class="text-center pees hd">Contact</p>
                </div>
                <div class="desp text-center px-2">
                    <p class="desp-large pees"><i class="fa fa-map-marker" aria-hidden="true"></i><?php echo $resume->address; ?>,<?php echo $resume->city; ?>.</p>
                    <!-- <p class="desp-small pees"></p> -->
                    <p class="desp-large pees"><i class="fa fa-phone" aria-hidden="true"></i><?php echo $resume->phone; ?></p>
                    <!-- <p class="desp-small pees"></p> -->
                    <p class="desp-large pees"><i class="fa fa-envelope" aria-hidden="true"></i><?php echo $resume->email; ?></p>
                    <!-- <p class="desp-small pees"></p> -->
                </div>
                <div class="heads my-0">
                    <p class="text-center pees hd">Education</p>
                </div>
                <div class="desp text-center px-2">
                    <?php foreach ($education as $edu) {
                        if ($edu['institute'] != '') { ?>
                            <p class="desp-mid pees"><?php echo $edu['institute']; ?><br /><?php echo $edu['degree']; ?>|<?php echo $edu['branch']; ?><br /><?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?></p>
                            <p class="desp-small pees"></p>
                    <?php }
                    } ?>
                </div>
                <!-- <div class="desp text-center px-2 pees">
                <p class="desp-mid pees">University of another something <br/>Something else/April 2010- April 2014</p>
                <p class="desp-small pees"></p>
            </div> -->
                <!-- <div class="heads my-0">
                    <p class="text-center pees hd">Area of Expertise</p>
                </div>
                <div class="desp text-center px-2">
                    <p class="desp-mid pees"><?php echo $resume->expertise; ?></p>
                </div> -->

                <?php $skills =  explode(',', $resume->skills);

                if (!empty($skills)) { ?>
                    <div class="heads my-0">
                        <p class="text-center pees hd">Skills</p>
                    </div>
                    <div class="desp text-center px-2">
                        <?php foreach ($skills as $ski) {
                            if ($ski != '') { ?>
                                <p class="desp-mid pees"><?php echo $ski; ?></p>
                                <!-- <p class="desp-mid pees"></p>
            <p class="desp-mid pees"></p> -->
                        <?php }
                        } ?>
                    </div>
                <?php } ?>
                <div class="heads my-0">
                    <p class="text-center pees hd">Languages</p>
                </div>
                <div class="desp text-center px-2">

                    <p class="desp-mid pees"><?php echo $resume->languages; ?></p>

                </div>


                <?php if (!empty($awards) && !empty($awards[0])) { ?>
                    <div class="heads my-1">
                        <i class="text-center ">
                            <p class=" pees hd">Certificates and Awards</p>
                        </i>
                    </div>
                    <div class="desp">
                        <?php foreach ($awards as $awr) { ?>
                            <ul>
                                <li class="pees"><?php echo $awr ?></li>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>


            </div>
            <div class="col-8">
                <div class="heads">
                    <i class="text-center">
                        <p class=" pees hd">Objective</p>
                    </i>
                </div>
                <div class="desp">
                    <p class="desp-small pees"><?php echo $resume->objectives; ?></p>

                </div>
                <?php if ($resume->company_exp > 0) {  ?>
                    <div class="heads my-1">
                        <i class="text-center ">
                            <p class=" pees hd">Work Experience</p>
                        </i>
                    </div>
                    <?php foreach ($work_exp as $w_exp) {
                        if ($w_exp['company'] != '') { ?>

                            <div class="desp pb-4">
                                <div class="row">
                                    <div class="col-4">
                                        <p class="desp-mid pees"> <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?> - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?></p>
                                        <!-- <p class="desp-low pees">Address</p> -->
                                    </div>
                                    <div class="col-8">
                                        <p class="desp-mid pees"><?php echo $w_exp['job_title']; ?>/<strong><?php echo $w_exp['company']; ?></strong></p>
                                        <p class="desp-low pees">Roles and Responsibilities</p>
                                        <p class="desp-low pees"><?php echo $w_exp['w_description']; ?></p>
                                    </div>

                                </div>
                            </div>
                    <?php }
                    }
                } else { ?>
                    <div class="heads my-1">
                        <i class="text-center ">
                            <p class=" pees hd">College Project</p>
                        </i>
                    </div>
                    <div class="desp">
                        <div class="row">
                            <div class="col-4">
                                <p class="desp-mid pees"></p>
                            </div>
                            <div class="col-8">
                                <p class="desp-mid pees"><strong><?php echo $resume->cp_title; ?></strong></p>
                                <p class="desp-low pees"><strong>Project Details</strong></p>
                                <p class="desp-low pees"><?php echo  $resume->cp_description; ?></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>




                <?php if (!empty($achievements) && !empty($achievements[0]) &&  $resume->company_exp <= 3) { ?>
                    <div class="heads my-1">
                        <i class="text-center ">
                            <p class=" pees hd">Key Achievements</p>
                        </i>
                    </div>
                    <div class="desp">
                        <?php foreach ($achievements as $achi) { ?>
                            <ul>
                                <li class="pees"><?php echo $achi ?></li>
                            </ul>
                        <?php } ?>
                    </div>
                <?php } ?>




            </div>
        </div>
    </div>
</div>