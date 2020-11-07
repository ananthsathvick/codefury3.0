<script type="text/javascript">
    $(document).ready(function(){
        create_sortable();
    });
    // Return a helper with preserved width of cells
    var fixHelper = function(e, ui) {
        ui.children().each(function() {
            $(this).width($(this).width());
        });
        return ui;
    };
    function create_sortable()
    {
        $('#menu_sortable').sortable({
            scroll: true,
            helper: fixHelper,
            axis: 'y',
            handle:'.handle',
            update: function(){
                save_sortable();
            }
        });
        $('#menu_sortable').sortable('enable');
    }

    function save_sortable()
    {
        serial=$('#menu_sortable').sortable('serialize');
        $.ajax({
            url:'<?php echo site_url(config_item('admin_folder').'/dashboard/organize/common_pc');?>',
            type:'POST',
            data:serial,
        });
    }
</script>
<div class="container">
    <div class="row">
        <!-- Bordered Table -->
        <div class="col-sm-12">
            <div class="panel panel-default border-panel card-view">
                <div class="panel-heading">
                    <div class="pull-left mt-10">
                        <h6 class="panel-title txt-dark"><?php echo $page_title; ?></h6>
                    </div>
                    <div class="pull-right">
                        <a href="<?php echo url_attr_get($this->config->item('admin_folder') . '/pages'); ?>" class="btn btn-default btn-anim"><i class="icon-arrow-left-circle"></i><span class="btn-text">Back</span></a>
                    <a href="<?php echo url_attr_get($this->config->item('admin_folder') . '/pages/common_pc_form/'); ?>" class="btn btn-success btn-anim"><i class="icon-plus"></i><span class="btn-text">Add New</span></a>
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
                                        <th>#</th>
                                        <th>Title</th>
                                        <th>Templates</th>
                                        <!-- <th>Section</th> -->
                                        <th>Image</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="menu_sortable">
                                    <?php echo (count($page_contents) < 1)?'<tr><td style="text-align:center;" colspan="6">'.lang('no_records').'</td></tr>':''?>
                                    <?php foreach($page_contents as $res) { ?>
                                            <tr id="menus-<?php echo $res->id;?>">
                                                <td class="handle"><a style="cursor:move"><span class="fa fa-bars"></span></a></td>
                                                <td><?php echo $res->title; ?></td>
                                                <td><?php echo $res->title; ?></td>
                                                <!-- <td><?php //echo isset(config_item($tbl_content->template.'_sec')[$res->section]) ? ucfirst(config_item($tbl_content->template.'_sec')[$res->section]):''; ?></td> -->
                                                <td>
                                                    <?php if($res->image!=''){  ?>
                                                    <img src="<?php echo upload_url($res->image,'page_contents/'); ?>" class="img-responsive" width="50">
                                                    <?php } ?>
                                                </td>
                                                <td class="text-nowrap">
                                                    <a onclick="$('#opn<?php echo $res->id; ?>').toggle()" class="mr-25" data-toggle="tooltip"  data-original-title="View"> <i class="fa fa-arrow-circle-down text-success m-r-10"></i> </a>
                                                    <a href="<?php echo site_url(config_item('admin_folder').'/pages/common_pc_form/'.$res->id); ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo site_url(config_item('admin_folder').'/pages/common_pc_delete/'.$res->id); ?>" onclick="return areyousure();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <tr id="opn<?php echo $res->id; ?>" style="display: none;">
                                                <th><strong>Description</strong></th>
                                                <td colspan="5"><?php echo $res->description; ?></td>
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