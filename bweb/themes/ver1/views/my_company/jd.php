OBJECTIVE <?php echo $resume->objectives; ?>



PERSONAL INFORMATION
<?php echo $resume->name; ?>

Phone: <?php echo $resume->phone; ?><br />
Email: <?php echo $resume->email; ?><br />
Address : <?php echo $resume->address; ?>,<br><?php echo $resume->city; ?>.
Languages : <?php echo $resume->languages; ?><br />
Gender: <?php echo $resume->gender == 1 ? 'Male' : 'Female'; ?>





SKILLS
<?php $skills =  explode(',', $resume->skills);
if (!empty($skills)) { ?>
    SKILLS
    <?php foreach ($skills as $ski) {
        if ($ski != '') { ?>
            <?php echo $ski; ?>
<?php }
    }
} ?>






Experience


<?php if ($resume->company_exp > 0) {  ?>
    Experience

    <?php foreach ($work_exp as $w_exp) {
        if ($w_exp['company'] != '') { ?>


            <?php echo $w_exp['company']; ?>
            <?php echo date('M Y', strtotime($w_exp['exp_f_date'])); ?>
            - <?php echo (isset($w_exp['exp_t_date']) && $w_exp['exp_t_date'] != "") ? date('M Y', strtotime($w_exp['exp_t_date'])) : 'Present'; ?>
            <?php echo $w_exp['job_title']; ?>
            Roles and Responsibilities
            <?php echo $w_exp['w_description']; ?>
    <?php }
    }
} else { ?>
    College Project
    <?php echo $resume->cp_title; ?>
    Project Details
    <?php echo  $resume->cp_description; ?>
<?php } ?>




EDUCATION
<?php foreach ($education as $edu) {
    if ($edu['institute'] != '') { ?>

        <?php echo $edu['degree']; ?>


        <?php echo $edu['branch']; ?><br>

        <?php echo $edu['institute']; ?> ( <?php echo $edu['edu_f_date'] . ' - ' . $edu['edu_t_date']; ?> )</p>


<?php }
} ?>






<?php if (!empty($achievements) &&  !empty($achievements[0]) && $resume->company_exp >= 3) { ?>
    KEY ACHIEVEMENTS
    <ul>
        <?php foreach ($achievements as $achi) { ?>
            <li><?php echo $achi; ?></li>
        <?php } ?>
    </ul>

<?php } ?>



EXPERTISE <?php echo $resume->expertise; ?>





<?php if (!empty($awards) && !empty($awards[0])) { ?>
    CERTIFICATIONS / AWARDS

    <ul>
        <?php foreach ($awards as $awr) { ?>

            <li class="pe hh4"><?php echo $awr ?></li>

        <?php } ?>

    </ul>

<?php } ?>