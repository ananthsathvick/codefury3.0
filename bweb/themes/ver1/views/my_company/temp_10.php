<style>
    <?php require_once('bootstrap.css'); ?>.pees {
        font-size: <?php echo $font_size; ?> !important;
        line-height: <?php echo $line_height; ?> !important;

    }

    .name-resume {
        /* font-size: <?php echo $font_size; ?> !important; */
        line-height: <?php echo $line_height; ?> !important;
    }

    .hd {
        color: white;
    }

    .res-name {
        color: black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 3em;
    }

    .res-head-special {
        color: black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 5em;
        border: 3px solid black;
        text-align: center;
        vertical-align: middle;
        /* width: 100%;
    height: 50%; */

    }

    .desp {
        color: black;
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
        font-size: 1.2em;
    }

    .vertical {
        border-left: 2px solid black;
        /* height: 100%;  */


    }
</style>
<div>
    <div class="container" style="border:solid 4px black">
        <div class="row">
            <div class="col-5">
                <div class="res-name py-5 text-center">
                    <h1 class="name-resume"><i><?php echo $resume->name; ?></i></h1>
                </div>
                <div class="text-center">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="res-head-special">
                                <p class="pees">Obejctive</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                </div>
                <div class="desp py-4">
                    <p class="pees"><?php echo $resume->objectives; ?> </p>
                </div>
                <div class="row">
                    <div class="col-2"></div>
                    <div class="col-8">
                        <div class="res-head-special">
                            <p class="pees">Education</p>
                        </div>
                    </div>
                    <div class="col-2"></div>
                </div>

                <div class="desp py-4 pl-4 vertical">
                    <?php foreach ($education as $edu) {
                        if ($edu['institute'] != '') { ?>
                            <p class="pees"><strong><?php echo $edu['institute']; ?> | ( <?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?> )</strong><br /><?php echo $edu['degree']; ?> , <?php echo $edu['branch']; ?><br></p>
                            <p class="pees"></p>
                    <?php }
                    } ?>

                </div>



                <?php if (!empty($awards) && !empty($awards[0])) { ?>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="res-head-special">
                                <p class="pees">Certifications / Awards</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="desp py-4">
                        <ul>


                            <?php foreach ($awards as $awr) { ?>


                                <li class="pees"><?php echo $awr ?></li>

                            <?php } ?>
                        </ul>
                    </div>


                <?php } ?>

                <div class="row">
                    <div class="col-2"></div>
                    <?php $skills =  explode(',', $resume->skills);
                    if (!empty($skills)) { ?>
                        <div class="col-8">
                            <div class="res-head-special">
                                <p class="pees">Skills</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                </div>
                <div class="desp  pt-4">
                    <ul>
                        <?php foreach ($skills as $ski) {
                            if ($ski != '') { ?>

                                <li class="pees"><?php echo $ski; ?></li>
                        <?php }
                        } ?>
                    </ul>
                </div>
            <?php
                    } ?>
                    



                <?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp >= 3) { ?>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="res-head-special">
                                <p class="pees">Key Achievements</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="desp py-4">
                        <ul>
                            <?php foreach ($achievements as $achi) { ?>
                                <li class="pees"><?php echo $achi; ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } ?>








            </div>
            <div class="col-7">
                <div class="desp pt-4 py-2">
                    <div class="row">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-phone" aria-hidden="true"></i>Phone</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->phone; ?></p>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-envelope" aria-hidden="true"></i>Email</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->email; ?></p>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-map-marker" aria-hidden="true"></i>Address</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.</p>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-map-marker" aria-hidden="true"></i>Langauges</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->languages; ?></p>
                        </div>
                    </div>
                    <div class="row pt-1">
                        <div class="col-4">
                            <p class="pees"><i class="fa fa-map-marker" aria-hidden="true"></i>Gender</p>
                        </div>
                        <div class="col-8">
                            <p class="pees"><?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?></p>
                        </div>
                    </div>
                </div>




                <?php if ($resume->company_exp > 0) {  ?>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="res-head-special">
                                <p class="pees">Experience</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>
                    <div class="vertical py-4">
                        <?php foreach ($work_exp as $w_exp) {
                            if ($w_exp['company'] != '') { ?>

                                <div class="desp ml-3">
                                    <div class="row">
                                        <div class="col-0">
                                        </div>
                                        <div class="col-4">
                                            <p class="pees"><?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?> - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?></p>
                                        </div>
                                        <div class="col-8">
                                            <p class="pees"><strong><?php echo $w_exp['company']; ?></strong><br /><?php echo $w_exp['job_title']; ?><br />Roles & responsibilities:<br />
                                                <?php echo $w_exp['w_description']; ?></p>
                                            <p class="pees"></p>
                                        </div>
                                    </div>
                                </div>
                        <?php }
                        } ?>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-8">
                            <div class="res-head-special">
                                <p class="pees">Projects</p>
                            </div>
                        </div>
                        <div class="col-2"></div>
                    </div>

                    <div class="desp  py-4">
                        <div class="row vertical">
                            <div class="col-0">
                            </div>
                            
                            <div class="col-8">
                                <p class="pees"><strong><?php echo $resume->cp_title; ?></strong><br />
                                    Project Details<br />
                                    <?php echo  $resume->cp_description; ?></p>
                                <p class="pees"></p>
                            </div>
                        </div>
                    </div>
                <?php } ?>




                



            <!-- <div class="row">
                <div class="col-2"></div>
                <div class="col-8">
                    <div class="res-head-special">
                        <p class="pees">Area of Expertise</p>
                    </div>
                </div>
                <div class="col-2"></div>
            </div>
            <div class="desp  py-3 ml-4">
                <?php echo $resume->expertise; ?>
            </div> -->
            </div>
        </div>
    </div>
</div>