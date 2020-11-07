<div class="col-lg-3 col-md-12 col-sm-12 col-pad">
<?php $uri_seg = $this->uri->segment(2); ?>
                <div class="dashboard-nav d-none d-xl-block d-lg-block">
                    <div class="dashboard-inner">
                        <h4>Main</h4>
                        <ul>
                            <li <?php echo $uri_seg=='my_account' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/my_account'); ?>"><i class="flaticon-dashboard"></i>Dashboard</a></li>
                            <?php $check_res = $this->db->where('user_id',$user_header['id'])->get('resume')->row(); ?>
                            <li <?php echo $uri_seg=='resume_format' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/resume_format'); ?>"><i class="flaticon-portfolio"></i><?php echo ($check_res)?'Edit Resume':'Add Resume';?></a></li>
                            <li <?php echo $uri_seg=='my_companies' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/my_companies'); ?>"><i class="flaticon-heart"></i>Companines viewed</a></li>                            
                        </ul>

                        <h4>Account</h4>
                        <ul>
                            <li <?php echo $uri_seg=='my_profile' ? 'class="active"':''; ?>><a href="<?php echo site_url('secure/my_profile'); ?>"><i class="flaticon-user"></i>Edit Profile</a></li>
                            <li><a href="<?php echo site_url('secure/logout'); ?>"><i class="flaticon-logout"></i>Logout</a></li>
                        </ul>
                    </div>
                </div>
            </div>