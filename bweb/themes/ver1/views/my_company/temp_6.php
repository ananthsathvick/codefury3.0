<style>
    <?php require_once('bootstrap.css'); ?>
    .pees {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;

    }

    .hd {
        color: white;
    }

    .bg-col {
        background-color: <?php echo $resume->res_color; ?>;
    }

    .name-resume {
        font-size: 50px;
        /* line-height: 100%; */
    }

    .res-head {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 2.3em;
    }

    .res-right {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.5em;
        background-color: rgba(117, 116, 116, 0.541);
        padding: 0 5%;
    }

    .desp-w {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.2em;
    }

    .desp {
        color: black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.2em;
    }

    .fc-col {
        color: <?php echo $resume->res_color; ?>;
        ;

    }

    .res-left {

        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.5em;
    }
</style>
<div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <hr class="bg-col pt-3" />
                <div class="res-left fc-col">
                    <p class=""><strong>Objective</strong></p>
                </div>
                <hr class="bg-col" />
                <div class="desp pt-3">
                    <p class="pees"><?php echo $resume->objectives; ?></p>
                </div>


                <?php if ($resume->company_exp > 0) {  ?>
                    <hr class="bg-col" />
                    <div class="res-left fc-col">
                        <p class=""><strong>Experience</strong></p>
                    </div>
                    <hr class="bg-col" />
                    <div class="desp">

                        <?php foreach ($work_exp as $w_exp) {
                            if ($w_exp['company'] != '') { ?>


                                <div class="row">
                                    <div class="col-4">
                                        <p class="pees"><strong><?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
                                                - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?></strong></p>
                                    </div>
                                    <div class="col-8">
                                        <p class="pees"><strong><?php echo $w_exp['company']; ?></strong><br /><?php echo $w_exp['job_title']; ?><br />
                                            <strong>Roles and Responsibilities</strong>
                                            <br /><?php echo $w_exp['w_description']; ?></p>
                                        <p class="pees"></p>
                                        <p class="pees"></p>
                                        <p class="pees"></p>
                                    </div>
                                </div>

                        <?php }
                        } ?>
                    </div>

                <?php } else { ?>

                    <hr class="bg-col" />
                    <div class="res-left fc-col">
                        <p class=""><strong>College Project</strong></p>
                    </div>
                    <hr class="bg-col" />
                    <div class="desp">

                        <div class="row">
                            <div class="col-4">
                                <p class="pees"><strong></strong></p>
                            </div>
                            <div class="col-8">
                                <p class="pees"><strong><?php echo $resume->cp_title; ?></strong><br />
                                    <strong>Project Details</strong><br />
                                    <?php echo  $resume->cp_description; ?>
                                </p>
                                <p class="pees"></p>
                                <p class="pees"></p>
                                <p class="pees"></p>
                            </div>
                        </div>
                    </div>




                <?php } ?>

                <hr class="bg-col" />
                <div class="res-left fc-col">
                    <p class=""><strong>Education</strong></p>
                </div>
                <hr class="bg-col" />
                <div class="desp">

                    <?php foreach ($education as $edu) {
                        if ($edu['institute'] != '') { ?>
                            <div class="row">
                                <div class="col-4">
                                    <p class="pees"><strong><?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?></strong></p>
                                </div>
                                <div class="col-8">
                                    <p class="pees"><strong><?php echo $edu['institute']; ?></strong><br /><?php echo $edu['branch']; ?><br /><?php echo $edu['degree']; ?></p>
                                    <p class="pees"></p>
                                    <p class="pees"><strong></strong></p>

                                </div>
                            </div>
                    <?php }
                    } ?>
                </div>




                <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp <= 3) { ?>

                    <hr class="bg-col" />
                    <div class="res-left fc-col">
                        <p class=""><strong>Key Achievements</strong></p>
                    </div>
                    <hr class="bg-col" />
                    <div class="desp">
                        <ul>
                            <?php foreach ($achievements as $achi) { ?>
                                <li><?php echo $achi; ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } ?>
                <!-- </div> -->
            </div>
            <div class="col-4 bg-col h-100">
                <div class="res-head pt-2">
                    <p class="name-resume hd"><?php echo $resume->name; ?></p>
                </div>
                <div class="res-right">
                    <p class=" hd">Personal Details</p>
                </div>
                <div class="desp-w">
                    <p class="pees hd"><strong class="hd">Email</strong><br /><?php echo $resume->email; ?></p>
                    <p class="pees hd"></p>
                    <p class="pees hd"><strong class="hd">Phone number</strong><br /><?php echo $resume->phone; ?></p>
                    <p class="pees hd"></p>
                    <p class="pees hd"><strong class="hd">Address</strong><br /><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.</p>
                    <p class="pees hd"></p>
                    <p class="pees hd"><strong class="hd">Langauge</strong><br /><?php echo $resume->languages; ?></p>
                    <p class="pees hd"></p>
                    <p class="pees hd"><strong class="hd">Gender</strong><br /><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></p>
                    <p class="pees hd"></p>


                </div>


                <?php $skills =  explode(',', $resume->skills);
                if (!empty($skills)) { ?>
                    <div class="res-right mt-2">
                        <p class=" hd">Skills</p>
                    </div>
                    <div class="desp-w">
                        <ul>
                            <?php foreach ($skills as $ski) {
                                if ($ski != '') { ?>
                                    <li class="pees hd"><?php echo $ski; ?></li>

                            <?php }
                            } ?>
                        </ul>
                    </div>

                <?php } ?>

                <!-- <div class="res-right mt-2">
                    <p class=" hd">Expertise</p>
                </div>
                <div class="desp-w">
                    <p class="pees hd"><?php echo $resume->expertise; ?></p>
                </div> -->


                <?php if (!empty($awards) && !empty($awards[0])) { ?>
                    <div class="res-right mt-2">
                        <p class=" hd">Certifications / Award</p>
                    </div>
                    <div class="desp-w">


                        <ul>
                            <?php foreach ($awards as $awr) { ?>

                                <li class="pe hh4"><?php echo $awr ?></li>

                            <?php } ?>

                        </ul>
                    </div>

                <?php } ?>

            </div>
        </div>
    </div>
</div>