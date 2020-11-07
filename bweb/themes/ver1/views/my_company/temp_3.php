<style>
    <?php require_once('bootstrap.css'); ?>.pees {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;

    }

    .hd {
        color: white;
    }

    .name-resume {
        font-size: 12px
    }

    .res-head {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: white;
        font-size: 3em;
    }

    .res-desp {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: white;
        font-size: 1.7em;
    }

    .begin-bg {
        background-color: <?php echo $resume->res_color; ?>;
        height: auto;
    }

    .hor-line {

        background-color: white;
        height: 2px;
    }

    .hor1-line {

        background-color: black;
        height: 2px;
    }

    .res-title {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: black;
        font-size: 1.7em;
    }

    .desp {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: black;
        font-size: 1.0em;
    }

    .vl {
        border-left: 2px solid black;
        margin-top: 0;
        margin-bottom: 0;
    }

    .edu-head {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: black;
        font-size: 1.5em;
    }

    .skl-pt {
        font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        color: black;
        font-size: 1.2em;
    }

    .trail-ver {
        border-left: black 3px solid;
        padding-left: 10%;
        margin-left: 5%;
    }
</style>

<div>
    <div class="begin-bg py-3">
        <div class="container">
            <div class="res-head">
                <p class="name-resume hd"></p>
            </div>
            <div class="res-desp">
                <h1 class=" hd"><?php echo $resume->name; ?></h1>
            </div>
            <hr class="hor-line" />
        </div>

    </div>
    <div class="container pt-3">
        <div class="row">
            <div class="col-4">
                <div class="res-title">
                    <p class="pees">Contact info</p>
                </div>
                <div class="desp px-3">
                    <div class="row">
                        <div class="col-1">
                            <p class="pees"><i class="fa fa-map-marker d-inline" aria-hidden="true"></i> </p>
                        </div>
                        <div class="col-11">
                            <p class="pees"><?php echo $resume->email; ?></p>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-1">
                            <p class="pees"><i class="fa fa-phone" aria-hidden="true"></i></p>
                        </div>
                        <div class="col-11">
                            <p class="pees"><?php echo $resume->phone; ?></p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <p class="pees"><i class="fa fa-envelope" aria-hidden="true"></i></p>
                        </div>
                        <div class="col-11">
                            <p class="pees"><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-1">
                            <p class="pees"><i class="fa fa-envelope" aria-hidden="true"></i></p>
                        </div>
                        <div class="col-11">
                            <p class="pees"><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?>.</p>
                        </div>
                    </div>
                </div>




                <hr class="hor1-line" />
                <div class="res-title ">
                    <p class="pees">Education</p>
                </div>

                <div class="skl-pt">
                    <div class="pees">
                        <?php foreach ($education as $edu) {
                            if ($edu['institute'] != '') { ?>

                                <p style="margin:0px 0px 10px; font-size:<?php echo $font_size; ?>; line-height: <?php echo $line_height; ?>;">

                                    <strong><?php echo $edu['degree']; ?> | </strong>

                                    <strong><?php echo $edu['branch']; ?> </strong> <br>

                                    <strong><?php echo $edu['institute']; ?></strong>
                                    <span> (<?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?>)</span>


                                </p>

                        <?php }
                        } ?>
                    </div>
                </div>






                <?php $skills =  explode(',', $resume->skills);

                if (!empty($skills)) { ?>
                    <hr class="hor1-line" />
                    <div class="res-title ">
                        <p class="pees">Skills</p>
                    </div>

                    <div class="skl-pt">
                        <?php foreach ($skills as $ski) {
                            if ($ski != '') { ?>
                                <div class="pees"><?php echo $ski; ?></div>
                        <?php }
                        } ?>
                    </div>
                <?php } ?>
                <hr class="hor1-line" />
                <div class="res-title ">
                    <p class="pees">Languages</p>
                </div>
                <div class="skl-pt">
                    <div class="pees"><?php echo $resume->languages; ?>.</div>
                </div>

                <!-- <hr class="hor1-line" />
                <div class="res-title ">
                    <p class="pees">Area of Expertise</p>
                </div>
                <div class="skl-pt">
                    <div class="pees"><?php echo $resume->expertise; ?></div>
                </div> -->


                <?php if (!empty($awards) && !empty($awards[0] && $resume->company_exp >= 2)) { ?>
                    <hr class="hor1-line" />
                    <div class="res-title ">
                        <p class="pees">Certification / Awards</p>
                    </div>
                    <ul>
                        <div class="skl-pt">
                            <?php foreach ($awards as $awr) { ?>
                                <li class="pees"><?php echo $awr ?></li>
                            <?php } ?>
                        </div>
                    </ul>
                <?php } ?>


                <ul>







            </div>
            <div class="col-8">
                <div class="res-title">
                    <p class="pees">Objective</p>
                </div>
                <div class="desp px-3">
                    <div class="row">
                        <!-- <div class="col-2">
                            <div class="vl"></div>
                        </div> -->
                        <div class="col-12 trail-ver">
                            <p class="pees"><?php echo $resume->objectives; ?></p>
                        </div>
                    </div>
                </div>





                <?php if ($resume->company_exp > 0) {  ?>

                    <div class="res-title">
                        <h3 class="pees">Experience</h3>
                    </div>

                    <?php foreach ($work_exp as $w_exp) {
                        if ($w_exp['company'] != '') { ?>


                            <div class="desp px-3">
                                <div class="row">
                                    <div class="col-12 trail-ver">
                                        <h4 class="pees" class="edu-head"><strong><?php echo $w_exp['company']; ?></strong> | <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?> - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?></h4>
                                        <div class="pees"><strong><?php echo $w_exp['job_title']; ?></strong></div>
                                        <div class="pees"><strong>Roles and Responsibilities</strong><br></div>
                                        <div class="pees"><?php echo $w_exp['w_description']; ?><br><br></div>
                                    </div>
                                </div>
                            </div>


                    <?php }
                    }
                } else { ?>

                    <div class="res-title">
                        <h3 class="pees">College Project</h3>
                    </div>

                    <div class="desp px-3">
                        <div class="row">
                            <div class="col-12 trail-ver">
                                <h4 class="pees" class="edu-head"><strong><?php echo $resume->cp_title; ?></strong></h4>
                                <div class="pees"><strong>Project Details</strong><br><?php echo  $resume->cp_description; ?></div>
                            </div>
                        </div>
                    </div>

                <?php } ?>

                <?php if (!empty($awards) && !empty($awards[0] && $resume->company_exp < 2)) { ?>
                    <div class="res-title ">
                        <p class="pees">Certification / Awards</p>
                    </div>
                    <div class="desp px-3">
                        <div class="row">
                            <div class="col-12 trail-ver">
                                <ul>
                                    <div class="skl-pt">
                                        <?php foreach ($awards as $awr) { ?>
                                            <li class="pees"><?php echo $awr ?></li>
                                        <?php } ?>
                                    </div>
                                </ul>
                            </div>
                        </div>
                    </div>


                <?php } ?>



            </div>
        </div>
    </div>
</div>