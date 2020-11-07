<style>
    <?php require_once('bootstrap.css'); ?>
    .naam > p {
        margin: 0 !important;
    }
    hr{
        margin-top: 0 !important;
    }
    .pees {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;

    }

    .hd {
        color: white;
    }

    .bg-hd {
        background-color: <?php echo $resume->res_color; ?>;
    }

    .name-resume {
        font-size: 50px
    }

    .fn-col {
        color: <?php echo $resume->res_color; ?>;
    }

    .res-name {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 2.5em;
    }

    .res-desp {
        color: white;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.2em;
    }

    .desp {
        color: black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.2em;
    }

    .naam {

        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.6em;
        margin: 0 !important;
        padding: 0 !important;

    }

    .bg-gr {
        background-color: rgb(199, 199, 199);
        height:91%;
    }
</style>
<div>
    <div class="res-head bg-hd py-3">
        <div class="container">

            <div class="res-name">
                <p class="name-resume hd"><?php echo $resume->name; ?></p>
            </div>
            <div class="res-desp">
                <p class="pees hd"></p>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="desp pt-2">
                    <p class="pees "><?php echo $resume->objectives; ?></p>
                </div>



                <?php if ($resume->company_exp > 0) {  ?>
                    <div class="naam fn-col">
                        <p class="">Experience</p>
                    </div>
                    <hr class="h bg-hd px-3 ">
                    <?php foreach ($work_exp as $w_exp) {
                        if ($w_exp['company'] != '') { ?>


                            <div class="row desp">
                                <div class="col-4">
                                    <p class="pees "><?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
                                        - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?></p>
                                </div>
                                <div class="col-8">
                                    <p class="pees "><strong><?php echo $w_exp['company']; ?></strong><br /><?php echo $w_exp['job_title']; ?><br />
                                        <strong>Roles and responsibilities</strong><br /><?php echo $w_exp['w_description']; ?></p>
                                    <p class="pees "></p>
                                    <p class="pees "></p>
                                    <p class="pees"></p>
                                </div>
                            </div>

                    <?php }
                    }
                } else { ?>

                    <div class="naam fn-col">
                        <p class="pees ">College Project</p>
                    </div>


                    <div class="row desp">
                        <div class="col-4">
                            <p class="pees "></p>
                        </div>
                        <div class="col-8">
                            <p class="pees "><strong><?php echo $resume->cp_title; ?></strong><br />
                                <strong>Project Details</strong><br /><?php echo  $resume->cp_description; ?></p>
                            <p class="pees "></p>
                            <p class="pees "></p>
                            <p class="pees"></p>
                        </div>
                    </div>




                <?php } ?>

                <div class="naam fn-col">
                    <p class=" ">Education</p>
                </div>
                <hr class="h bg-hd px-3">


                <?php foreach ($education as $edu) {
                    if ($edu['institute'] != '') { ?>
                        <div class="row desp">
                            <div class="col-4">
                                <p class="pees "><?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?></p>
                            </div>
                            <div class="col-8">
                                <p class="pees "><strong><?php echo $edu['institute']; ?></strong><br /><?php echo $edu['branch']; ?><br /><?php echo $edu['degree']; ?></p>
                                <p class="pees "></p>
                                <p class="pees "></p>
                            </div>
                        </div>
                <?php }
                } ?>



                <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp <= 3) { ?>
                    <div class="naam fn-col">
                        <p class=" ">Key Achievements</p>
                    </div>
                    <hr class="h bg-hd px-3">


                    <div class="row desp">
                        <div class="col">
                            <ul>
                                <?php foreach ($achievements as $achi) { ?>
                                    <li class="pees"><?php echo $achi; ?></li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                <?php } ?>








            </div>
            <div class="col-4 bg-gr px-3">
                <div class="naam fn-col pt-3">
                    <p class=" ">Personal Info</p>
                </div>
                <hr class="h bg-hd px-3">
                <div class="desp">
                    <p class="pees "><strong>Address</strong><br /><?php echo $resume->address; ?>,<?php echo $resume->city; ?></p>
                    <p class="pees "></p>
                    <p class="pees "><strong>Phone</strong><br /><?php echo $resume->phone; ?></p>
                    <p class="pees"></p>
                    <p class="pees "><strong>E-mail</strong><br /><?php echo $resume->email; ?></p>
                    <p class="pees "></p>
                    <p class="pees "><strong>Gender</strong><br /><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></p>
                    <p class="pees "></p>
                    <p class="pees "><strong>Langauges</strong><br /><?php echo $resume->languages; ?></p>
                    <p class="pees "></p>
                </div>

                <?php $skills =  explode(',', $resume->skills);
                if (!empty($skills)) { ?>
                    <div class="naam fn-col pt-1">
                        <p class=" ">Skills</p>
                    </div>
                    <hr class="h bg-hd px-3">
                    <div class="desp">
                        <ul>

                            <?php foreach ($skills as $ski) {
                                if ($ski != '') { ?>
                                    <li class="pees "><?php echo $ski; ?></li>

                            <?php }
                            } ?>
                        </ul>
                    </div>

                <?php } ?>

                <!-- <div class="naam fn-col pt-3">
                    <p class=" ">Area of Expertise</p>
                </div>
                <hr class="h bg-hd px-3">
                <div class="desp">
                    <p class="pees "><?php echo $resume->expertise; ?></p>
                    <p class="pees "></p>
                </div> -->

                <?php if (!empty($awards) && !empty($awards[0])) { ?>

                    <div class="naam fn-col pt-3">
                        <p class=" ">Certifications / Awards</p>
                    </div>
                    <hr class="h bg-hd px-3">
                    <div class="desp">
                        <ul>

                            <?php foreach ($awards as $awr) {
                            ?>
                                <li class="pees "><?php echo $awr; ?></li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                <?php } ?>



            </div>
        </div>
    </div>
</div>