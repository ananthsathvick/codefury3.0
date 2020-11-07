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
                            <?php echo form_open($this->config->item('admin_folder') . '/pages/link_form/' . $id); ?>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Title</label>
                                <?php
                                $data	= array('name'=>'title', 'value'=>set_value('title', $title), 'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Parent</label>
                                <?php
                                $options = array();
                                $options[0] = 'Top Level';
                                function page_loop($parent_id, $pages, $dash = '', $id = 0)
                                {
                                    $options = array();
                                    foreach ($pages[$parent_id] as $page) {
                                        //this is to stop the whole tree of a particular link from showing up while editing it
                                        if ($id != $page->id) {
                                            $options[$page->id] = $dash . ' ' . $page->title;
                                            if (isset($pages[$page->id]) && sizeof($pages[$page->id]) > 0) {
                                                $dash2 = str_replace('&rarr;&nbsp;', '&nbsp;', $dash);
                                                $dash2 .= '&nbsp;&nbsp;&nbsp;&rarr;&nbsp;';
                                                $options = $options + page_loop($page->id, $pages, $dash2, $id);
                                            }
                                        }
                                    }
                                    return $options;
                                }
                                if (!empty($pages)) {
                                    $options = $options + page_loop(0, $pages, '', $id);
                                }
                                echo form_dropdown('parent_id', $options, set_value('parent_id', $parent_id), 'class="form-control select2"');
                                ?>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">URL</label>
                                <?php
                                $data	= array('name'=>'url', 'value'=>set_value('url', $url), 'class'=>'form-control');
                                echo form_input($data);
                                ?>
                                <span class="help-inline"><?php echo lang('url_example');?></span>
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
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Display In </label>
                                <?php
                                $data	= array('name'=>'display_in', 'value'=>set_value('display_in', $display_in),'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">New Window </label>
                                <?php
                                $options1	= array('0'=>'No','1'=>'Yes');
                                echo form_dropdown('new_window', $options1,  set_value('new_window', $new_window),'class="form-control"');
                                ?>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                                <a href="<?php echo site_url(config_item('admin_folder').'/pages'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
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