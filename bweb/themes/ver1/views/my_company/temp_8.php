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
        font-size: 12px
    }

    .fc-col {
        color: <?php echo $resume->res_color; ?>;
    }

    .hor {
        height: 60px;
    }

    .res-head {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.5em;
    }

    .desp {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 1.0em;
        color: black;
    }

    .res-name {
        font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        font-size: 3em;

    }
</style>
<div>
    <hr class="bg-col hor mt-0" />
    <div class="container">
        <div class="row">
            <div class="col-5">
                <div class="res-head py-2 fc-col">
                    <p class="">Contact</p>
                </div>
                <div class="desp mr-5">
                    <div class="row">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-phone" aria-hidden="true"></i>Phone</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->phone; ?></p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-envelope" aria-hidden="true"></i>Email</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->email; ?></p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-map-marker d-inline" aria-hidden="true"></i>Address</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.</p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-envelope" aria-hidden="true"></i>Langauges</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->languages; ?></p>
                        </div>
                    </div>
                    <div class="row pt-2">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-envelope" aria-hidden="true"></i>Gender</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></p>
                        </div>
                    </div>

                </div>
                <div class="res-head py-2 fc-col">
                    <p class="">Education</p>
                </div>
                <div class="desp">
                    <?php foreach ($education as $edu) {
                        if ($edu['institute'] != '') { ?>
                            <p class="pees"><strong><?php echo $edu['institute']; ?>
                                </strong><br /><?php echo $edu['degree']; ?><br /><?php echo $edu['branch']; ?>
                                <br /><?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?></p>
                    <?php }
                    } ?>
                </div>
                <?php $skills =  explode(',', $resume->skills);
                if (!empty($skills)) { ?>
                    <div class="res-head py-2 fc-col">
                        <p>Skills</p>
                    </div>
                    <div class="desp">
                        <ul>
                            <?php foreach ($skills as $ski) {
                                if ($ski != '') { ?>
                                    <li class="pees"><?php echo $ski; ?></li>

                            <?php }
                            } ?>
                        </ul>
                    </div>

                <?php } ?>
                <!-- <div class="res-head py-2 fc-col">
                    <p>Area of Expertise</p>
                </div>
                <div class="desp">
                    <p class="pees">
                        <?php echo $resume->expertise; ?>
                    </p>
                </div> -->
                <?php if (!empty($awards) && !empty($awards[0])) { ?>
                    <div class="res-head py-2 fc-col">
                        <p>Certifications / Award</p>
                    </div>

                    <div class="desp">
                        <ul>
                            <?php foreach ($awards as $awr) { ?>

                                <li class="pees"><?php echo $awr ?></li>

                            <?php } ?>

                        </ul>
                    </div>
                <?php } ?>
            </div>

            <div class="col-7">
                <div class="res-name fc-col pt-1">
                    <h1 class=""><?php echo $resume->name; ?></h1>
                </div>
                <div class="res-head pt-2 fc-col">
                    <p class="">Objective</p>
                </div>
                <div class="desp">
                    <p class="pees"><?php echo $resume->objectives; ?></p>
                </div>
                <?php if ($resume->company_exp > 0) {  ?>
                    <div class="res-head py-2 fc-col">
                        <p class="">Experience</p>
                    </div>
                    <div class="desp">

                        <?php foreach ($work_exp as $w_exp) {
                            if ($w_exp['company'] != '') { ?>


                                <p class="pees"><strong><?php echo $w_exp['company']; ?></strong> ( <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
                                    - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?> ) <br />
                                    <?php echo $w_exp['job_title']; ?><br />Roles and Responsibilities:<br />
                                    <?php echo $w_exp['w_description']; ?></p>
                        <?php }
                        } ?> </div>
                <?php
                } else { ?>
                    <div class="res-head py-2 fc-col">
                        <p class="">College Project</p>
                    </div>
                    <div class="desp">
                        <p class="pees"><strong><?php echo $resume->cp_title; ?></strong>
                            <br />Project Details<br /><?php echo  $resume->cp_description; ?></p>
                    </div>
                <?php } ?>
                <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp >= 3) { ?>
                    <div class="res-head py-2 fc-col">
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