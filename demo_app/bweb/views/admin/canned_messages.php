<div class="container">
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left mt-15">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="form-wrap text-right">
                            <div class="form-group">
                                <a href="<?php echo site_url(config_item('admin_folder').'/canned_message/form'); ?>" class="btn btn-orange btn-anim"><i class="icon-plus"></i><span class="btn-text"><?php echo lang('add_new'); ?></span></a>
                            </div>

                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th><?php echo lang('message_name');?></th>
                                        <th style="min-width: 90px;"></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($canned_messages as $message) { ?>
                                        <tr>
                                            <td><?php echo $message->name; ?></td>
                                            <td>
                                                <div class="pull-right">
                                                    <a href="<?php echo site_url($this->config->item('admin_folder').'/canned_message/form/'.$message->id);?>" class="mr-25" data-toggle="tooltip" data-original-title="Edit"><i class="fa fa-pencil text-inverse m-r-10"></i></a>
                                                    <?php if($message->deletable == 1) : ?>
                                                        <a href="<?php echo site_url($this->config->item('admin_folder').'/canned_message/delete_message/'.$message->id);?>" onclick="return areyousure();" data-toggle="tooltip" data-original-title="Delete"><i class="fa fa-close text-danger"></i></a>
                                                    <?php endif; ?>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>
</div>

<script type="text/javascript">
function areyousure()
{
    return confirm('<?php echo lang('confirm_are_you_sure');?>');
}
</script>