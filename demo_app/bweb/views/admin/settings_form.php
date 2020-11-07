<script type="application/javascript">
    $(document).ready(function () {
        create_sortable();
    });
    var fixHelper = function (e, ui) {
        ui.children().each(function () {
            $(this).width($(this).width());
        });
        return ui;
    };
    function create_sortable() {
        $('#menu_sortable').sortable({
            scroll: true,
            helper: fixHelper,
            axis: 'y',
            handle: '.handle',
            update: function () {
                save_sortable();
            }
        });
        $('#menu_sortable').sortable('enable');
    }
    function save_sortable() {
        serial = $('#menu_sortable').sortable('serialize');

        $.ajax({
            url: '<?php echo site_url($this->config->item('admin_folder') . '/dashboard/organize/settings');?>',
            type: 'POST',
            data: serial
        });
    }
</script>
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
                            <?php echo form_open($this->config->item('admin_folder') . '/settings/form/' . $id); ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Name</label>
                                <?php
                                $data	= array('name'=>'name', 'value'=>set_value('name', $name), 'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Code</label>
                                <?php
                                $options1	= array('website'=>'Website','email'=>'Email','sms'=>'SMS','payment'=>'Payment');
                                echo form_dropdown('code', $options1,  set_value('code', $code),'class="form-control"');
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Type</label>
                                <?php
                                $options1	= array('text'=>'Input Box','textarea'=>'Textarea','file'=>'File Upload','select'=>'Select Box','checkbox'=>'Checkbox','text_editor'=>'Editor');
                                echo form_dropdown('type', $options1,  set_value('type', $type),'class="form-control select2" id="type"');
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Status</label>
                                <?php
                                $options1	= array('1'=>'Enable','0'=>'Disable');
                                echo form_dropdown('status', $options1,  set_value('status', $status),'class="form-control"');
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Sequence </label>
                                <?php
                                $data	= array('name'=>'sequence', 'value'=>set_value('sequence', $sequence),'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Options</label>
                                <?php
                                $data	= array('rows'=>3, 'name'=>'options', 'value'=>set_value('options', html_entity_decode($options)), 'class'=>'form-control', 'id'=>'opt_val');
                                echo form_textarea($data);
                                ?>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                                <a href="<?php echo site_url(config_item('admin_folder').'/settings'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
                                <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                            </div>
                            </form>
                        </div>
                    </div>

                    <div class="panel-body">
                        <div class="table-wrap">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="menu_sortable">
                                    <?php echo (count($w_config) < 1)?'<tr><td style="text-align:center;" colspan="5">'.lang('no_records').'</td></tr>':''?>
                                    <?php foreach($w_config as $res) { ?>
                                            <tr id="menus-<?php echo $res->id;?>">
                                                <td class="handle"><a style="cursor:move"><span class="fa fa-bars"></span></a></td>
                                                <td><?php echo $res->name.' ('.$res->setting_key.')'; ?></td>
                                                <td><?php echo $res->type; ?></td>
                                                <td><?php echo $res->status; ?></td>
                                                <td class="text-nowrap">
                                                    <a href="<?php echo admin_url('settings/form/').$res->id ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo admin_url('settings/delete/'.$res->id); ?>" onclick="return areyousure();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
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
    </div>
    <!-- /Row -->
</div>