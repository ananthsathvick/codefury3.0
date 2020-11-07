<div class="container">
    <!-- Row -->
    <div class="row">
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-wrapper collapse in">
                    <div class="panel-body">
                        <div class="form-wrap">
                            <?php echo form_open_multipart(current_url()); ?>
                            <div class="form-group">
                                <label for="name"><?php echo lang('label_canned_name');?> </label>
                                <?php
                                $name_array = array('name' =>'name', 'class'=>'form-control', 'value'=>set_value('name', $name));

                                if(!$deletable) {
                                    $name_array['class']	= "form-control disabled";
                                    $name_array['readonly']	= "readonly";
                                }
                                echo form_input($name_array);?>
                            </div>
                            <div class="form-group">
                                <label for="subject"><?php echo lang('label_canned_subject');?> </label>
                                <?php echo form_input(array('name'=>'subject', 'class'=>'form-control', 'value'=>set_value('subject', $subject)));?>
                            </div>
                            <div class="form-group">
                                <label><?php echo lang('description');?> <span class="text-danger">*</span></label>
                                <textarea class="mymce" name="content"><?php echo set_value('content', $content); ?></textarea>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                                <a href="<?php echo site_url(config_item('admin_folder').'/canned_message'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
                                <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /Row -->
</div>

<script type="text/javascript">
	$('form').submit(function() {
		$('.btn').attr('disabled', true).addClass('disabled');
	});
</script>