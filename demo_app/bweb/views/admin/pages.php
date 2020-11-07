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
            url:'<?php echo site_url(config_item('admin_folder').'/dashboard/organize/pages');?>',
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
                    <a href="<?php echo site_url($this->config->item('admin_folder') . '/pages/form'); ?>" class="btn btn-orange btn-anim"><i class="icon-plus"></i><span class="btn-text">Add New</span></a>
                    <a href="<?php echo site_url($this->config->item('admin_folder') . '/pages/common_pc'); ?>" class="btn btn-success btn-anim"><i class="icon-plus"></i><span class="btn-text">Add Common Contents</span></a>
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
                                        <th>Template</th>
                                        <th>Status</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="menu_sortable">
                                    <?php echo (count($pages) < 1)?'<tr><td style="text-align:center;" colspan="5">'.lang('no_records').'</td></tr>':''?>
                                    <?php
                                    $GLOBALS['admin_folder'] = $this->config->item('admin_folder');
                                    function list_pages($parent_id, $pages, $sub='')
                                    {
                                        foreach($pages[$parent_id] as $page)
                                        { ?>
                                            <tr id="menus-<?php echo $page->id;?>">
                                                <td class="handle"><a style="cursor:move"><span class="fa fa-bars"></span></a></td>
                                               <td><?php echo $sub.$page->title; ?></td>
                                               <td><?php $tmpl = config_item('page_template'); echo isset($tmpl[$page->template]) ? $tmpl[$page->template]:''; ?></td>
                                                <td><?php echo $page->status == 1?lang('enabled'):lang('disabled'); ?></td>
                                                <td class="text-nowrap">
                                                    <?php if($page->template=='projects_sub1' || $page->template=='courses'){ ?>
                                                        <a href="<?php echo site_url(config_item('admin_folder').'/pages/related_pages/'.$page->id); ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Related Pages"> <i class="fa fa-file-image-o text-success m-r-10"></i> </a>
                                                    <?php } if(!empty(config_item($page->template.'_sec'))){ ?>
                                                        <a href="<?php echo site_url(config_item('admin_folder').'/pages/page_contents/'.$page->id.'?t=pages'); ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Page Content"> <i class="fa fa-file text-primary m-r-10"></i> </a>
                                                    <?php }  ?>
                                                    <a href="<?php echo site_url(config_item('admin_folder').'/pages/form/'.$page->id); ?>" class="mr-25" data-toggle="tooltip"  data-original-title="Edit"> <i class="fa fa-pencil text-inverse m-r-10"></i> </a>
                                                    <a href="<?php echo site_url(config_item('admin_folder').'/pages/delete/'.$page->id); ?>" onclick="return areyousure();" data-toggle="tooltip" data-original-title="Delete"> <i class="fa fa-close text-danger"></i> </a>
                                                </td>
                                            </tr>
                                            <?php
                                            if (isset($pages[$page->id]) && sizeof($pages[$page->id]) > 0)
                                            {
                                                $sub2 = str_replace('&rarr;&nbsp;', '&nbsp;', $sub);
                                                $sub2 .=  '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;';
                                                list_pages($page->id, $pages, $sub2);
                                            }
                                        }
                                    }
                                    if(isset($pages[0]))
                                    {
                                        list_pages(0, $pages);
                                    }
                                    ?>
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
