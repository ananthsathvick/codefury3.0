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
        font-size: 2.0em;
    }
    .fc-col {
        color: <?php echo $resume->res_color; ?>;
    }

    .bg-col {
        background-color: <?php echo $resume->res_color; ?>;
    }

    .desp {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.0em;
        color: black;
    }

    .res-pi {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.2em;
    }

    .h {
        height: 1px;
    }
</style>
<div>
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="res-name fc-col pt-1">
                    <h1 class="name-resume"><?php echo $resume->name; ?></h1>
                </div>
                <hr class="bg-col h" />
                <div class="res-name fc-col ">
                    <p class="">Career Objective</p>
                </div>
                <div class="desp">
                    <p class="pees"><?php echo $resume->objectives; ?></p>
                </div>

                <hr class="bg-col h" />
                <div class="res-name fc-col">
                    <p class="">Education</p>
                </div>


                <?php foreach ($education as $edu) {
                    if ($edu['institute'] != '') { ?>

                        <div class="disp">
                            <p class="pees"><strong><?php echo $edu['institute']; ?></strong>
                                <span class="fc-col">(<?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?> )</span>
                                <br /> <?php echo $edu['branch']; ?><br /><?php echo $edu['degree']; ?></p>


                        </div>

                <?php }
                } ?>

                <hr class="bg-col h" />

                <?php $skills =  explode(',', $resume->skills);
                if (!empty($skills)) { ?>
                    <div class="res-name fc-col ">
                        <p class="">Skills</p>
                    </div>
                    <div class="desp">
                        <ul>
                            <?php foreach ($skills as $ski) {
                                if ($ski != '') { ?>
                                    <li class="pees"><?php echo $ski; ?></li>
                            <?php }
                            }
                            ?>
                        </ul>
                    </div>
                <?php } ?>

                <!-- <hr class="bg-col h" />


                <div class="res-name fc-col ">
                    <p class="">Area of Expertise</p>
                </div>
                <div class="desp">


                    <p class="pees"><?php echo $resume->expertise; ?></p>


                </div> -->



                <hr class="bg-col h" />

                <?php if (!empty($awards) && !empty($awards[0])) { ?>
                    <div class="res-name fc-col ">
                        <p class="">Certifications / Awards</p>
                    </div>
                    <div class="desp">

                        <ul>
                            <?php foreach ($awards as $awr) { ?>
                                <li class="pees"><?php echo $awr; ?></li>

                            <?php } ?>

                        </ul>
                    </div>

                <?php } ?>











            </div>
            
            <div class="col-7">
            <div class="res-name fc-col pt-1">
                    <p class="">Contact</p>
            </div>
                <div class="res-pi fc-col">
                    <p class="pees">Phone<br /><strong><?php echo $resume->phone; ?></strong></p>
                </div>
                <div class="desp">
                    <p class="pees"></p>
                </div>
                <div class="res-pi fc-col">
                    <p class="pees">Email<br /><strong><?php echo $resume->email; ?></strong></p>
                </div>
                <div class="desp">
                    <p class="pees"></p>
                </div>
                <div class="res-pi  fc-col">
                    <p class="pees">Address<br /><strong><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.</strong></p>
                </div>
                <div class="desp">
                    <p class="pees"></p>
                </div>
                <div class="res-pi  fc-col">
                    <p class="pees">Langauges<br /><strong><?php echo $resume->languages; ?></strong></p>
                </div>
                <div class="desp">
                    <p class="pees"></p>
                </div>
                <div class="res-pi  fc-col">
                    <p class="pees">Gender<br /><strong><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></strong></p>
                </div>
                <div class="desp">
                    <p class="pees"></p>
                </div>



                <hr class="bg-col h" />



                <?php if ($resume->company_exp > 0) {  ?>
                    <div class="res-name fc-col ">
                        <p class="">Experience</p>
                    </div>
                    <div class="disp">

                        <?php foreach ($work_exp as $w_exp) {
                            if ($w_exp['company'] != '') { ?>

                                <p class="pees"><strong><?php echo $w_exp['company']; ?></strong>
                                    <span class="fc-col">(<?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
                                        - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?>)</span><br />
                                    <?php echo $w_exp['job_title']; ?><br />
                                    Roles and responsibilities:<br />
                                    <?php echo $w_exp['w_description']; ?></p>
                                <p class="pees"></p>
                                <p class="pees"></p>
                                <p class="pees"> </p>

                        <?php }
                        } ?>
                    </div>
                <?php
                } else { ?>

                    <div class="res-name fc-col ">
                        <p class="pees">Project</p>
                    </div>
                    <div class="disp">
                        <p class="pees"><strong><?php echo $resume->cp_title; ?></strong>
                            Project Details<br />
                            <?php echo  $resume->cp_description; ?></p>
                        <p class="pees"></p>
                        <p class="pees"></p>
                        <p class="pees"> </p>

                    </div>
                <?php } ?>

                <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp < 3) { ?>
                    <hr class="bg-col h" />
                    <div class="res-name fc-col ">
                        <p class="">Key Achievements</p>
                    </div>
                    <div class="desp">
                        <ul>
                            <?php foreach ($achievements as $achi) { ?>
                                <li class="pees"><?php echo $achi; ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</div>