<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
<?php $uri_seg = $this->uri->segment(2); ?>
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <h4>Main</h4>
                        <ul>
                            <li <?php echo $uri_seg=='my_account' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/my_account'); ?>"><i class="flaticon-dashboard"></i>Dashboard</a></li>
                            <?php  $user_header =  $this->session->userdata('user'); $check_res = $this->db->where('user_id',$user_header['id'])->get('resume')->row(); ?>
                            <li <?php echo $uri_seg=='resume_format' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/create_resume?clr=1&tmp=1'); ?>"><i class="flaticon-portfolio"></i><?php echo ($check_res)?'Edit Resume':'Add Resume';?></a></li>
                            <?php if($check_res){?>
                            <?php $user = $this->db->where('id', $this->user['id'])->get('users')->row();
                                    if (config_item('enable_payment')) {
                                        if ($user->payment_status == 1 && (date('Y-m-d', strtotime($user->expiry_date)) > date('Y-m-d'))) {
                                            ?>
                            <li <?php echo $uri_seg=='resume_template' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/resume_template'); ?>"><i class="flaticon-notepad"></i>Resume Template</a></li>
                                        <?php } else { ?>

                            <li <?php echo $uri_seg=='resume_template' ? 'class="active"':''; ?>><a href="<?php echo site_url('/secure/payment'); ?>"><i class="flaticon-lock"></i>Resume Template</a></li>
                                        <?php }
                                    } else {
                                        ?>
                            <li <?php echo $uri_seg=='resume_template' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/resume_template'); ?>"><i class="flaticon-notepad"></i>Resume Template</a></li>
                                    <?php }}
                                else
                                {?>
                                     <li <?php echo $uri_seg=='resume_template' ? 'class="active"':''; ?>><a href="" class="text-muted"><i class="flaticon-notepad"></i>Add Resume Before Choosing Template</a></li>
                                <?php } ?>

                                <?php if(!empty($resume)){ ?>
                                    <li><a href="<?php echo !empty($resume->user_id) ? site_url('download-resume?K=' . base64_encode($resume->id)) : '#'; ?>"><i class="flaticon-document"></i>Download Resume</a></li>
                                    <li><a target="_blank" href="<?php echo !empty($resume->user_id) ? site_url('canditate-details?K=' . base64_encode($resume->id)) : '#'; ?>"><i class="flaticon-document"></i>Preview Resume</a></li>
                                <?php }?>

                            <li <?php echo $uri_seg=='my_companies' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/my_companies'); ?>"><i class="flaticon-heart"></i>Companies viewed</a></li>
                        </ul>

                        <h4>Account</h4>
                        <ul>
                            <li <?php echo $uri_seg=='my_profile' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/my_profile'); ?>"><i class="flaticon-user"></i>Edit Profile</a></li>
                            <li><a href="<?php echo site_url('secure/logout'); ?>"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>