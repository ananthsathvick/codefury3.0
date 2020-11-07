<div class="content-area5 dashboard-content">

    <div class="dashboard-header clearfix">
        <div class="row justify-content-md-center">
            <div class="col-7">
                <?php echo $resume; ?>
            </div>
        </div>
        <div class="row">
            <?php if (!isset($adm_login)) { ?>
                <div class="col-lg-8 offset-lg-2 mt-3">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <a href="<?php echo site_url('secure/undo_temp').'?clr=' . $old_clr . '&tmp=' . $old_tmp . '&val=' . urlencode($old_val); ?>" class="btn btn-md button-default">Back</a>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form- text-right">
                                <?php $user = $this->db->where('id', $this->user['id'])->get('users')->row();
                                if (config_item('enable_payment')) {
                                    if ($user->payment_status == 1 && (date('Y-m-d', strtotime($user->expiry_date)) > date('Y-m-d'))) {
                                ?>
                                        <a href="<?php echo site_url('/secure/my_account'); ?>" class="btn btn-md button-theme">Submit</a>
                                    <?php } else { ?>
                                        <a href="<?php echo site_url('/secure/payment'); ?>" class="btn btn-md button-theme">Pay now</a>
                                    <?php }
                                } else {
                                    ?>
                                    <a href="<?php echo site_url('/secure/my_account'); ?>" class="btn btn-md button-theme">Submit</a>
                                <?php } ?>

                            </div>

                        </div>

                    </div>

                </div>

            <?php } ?>

        </div>

    </div>
</div>
</div>