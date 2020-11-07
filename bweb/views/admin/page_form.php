<div class="container">
    <!-- Row -->
    <div class="row">
        <?php echo form_open_multipart($this->config->item('admin_folder') . '/pages/form/' . $id); ?>
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
                            <div class="row">
                                <div class="col-xs-6 form-group">
                                <label class="control-label mb-10 text-left">Title</label>
                                <?php
                                $data	= array('name'=>'title', 'value'=>set_value('title', $title), 'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                                <div class="col-xs-6 form-group">
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
                                <div class="col-xs-6 form-group">
                                    <label class="control-label mb-10 text-left">Template</label>
                                    <?php
                                    echo form_dropdown('template', config_item('page_template'),  set_value('template', $template),'class="form-control" id="templ" onchange="show_ff(this.value)"');
                                    ?>
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class="control-label mb-10 text-left">Status</label>
                                    <?php
                                    $options1	= array('1'=>'Enable','0'=>'Disable');
                                    echo form_dropdown('status', $options1,  set_value('status', $status),'class="form-control"');
                                    ?>
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class="control-label mb-10 text-left">Sequence </label>
                                    <?php
                                    $data	= array('name'=>'sequence', 'value'=>set_value('sequence', $sequence),'class'=>'form-control');
                                    echo form_input($data);
                                    ?>
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class="control-label mb-10 text-left">Display In </label>
                                    <?php
                                    echo form_dropdown('display_in[]',config_item('display_in_arr'),set_value('display_in',$display_in),'class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose"');
                                    ?>
                                </div>

                                <div class="col-xs-12 show_ff">
                                    <label class="control-label text-left">Tags</label>
                                </div>
                                <div class="col-xs-12 form-group show_ff">
                                    <?php
                                    $data	= array('name'=>'tags', 'value'=>set_value('tags', $tags),'class'=>'form-control','data-role'=>'tagsinput','placeholder'=>'add tags');
                                    echo form_input($data);
                                    ?>
                                </div>

                                <div class="col-xs-12 form-group show_ff1">
                                    <label class="control-label mb-10 text-left">Image</label>
                                    <?php
                                    echo form_upload('image');
                                    ?>
                                    <?php if($id && $image!=''){ ?>
                                        <img src="<?php echo upload_url($image,'page_contents/'); ?>" class="img-responsive mt-10">
                                        <a href="<?php echo site_url(config_item('admin_folder').'/pages/delete_image/'.$id);?>" onclick="return areyousure();" class="" style="margin-bottom:10px;color:#00a8db;">Remove Image</a>
                                    <?php } ?>
                                </div>
                                

                            </div>
<!--                            <div class="seprator-block"></div>-->
                            <h6 class="txt-dark capitalize-font text-center"><i class="zmdi zmdi-play-circle mr-10"></i>SEO</h6>
                            <hr class="light-grey-hr">
                            <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">SEO Title </label>
                                <?php
                                $data	= array('name'=>'seo_title', 'value'=>set_value('seo_title', $seo_title),'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Slug </label>
                                <?php
                                $data	= array('name'=>'slug', 'value'=>set_value('slug', $slug),'class'=>'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Meta tags </label>
                                <textarea name="meta" cols="40" rows="3" class="form-control" id=""><?php echo set_value('meta', $meta); ?></textarea>
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xs-12">
            <div class="panel panel-default card-view">
                <div class="panel-wrapper collapse in">
                    <div class="panel-body text-center">
                        <a href="<?php echo site_url(config_item('admin_folder').'/pages'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
                        <button type="submit" class="btn btn-orange btn-anim"><i class="icon-rocket"></i><span class="btn-text">submit</span></button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
    <!-- /Row -->
</div>

<script>
    $(document).ready(function(){
        var val = $('#templ').val();
        show_ff(val);
    });

    function show_ff(val) {
        if(val=='gallery'){
            $('.show_ff').show();
        } else{
            $('.show_ff').hide();
        }
    }
    $(document).ready(function() {
        shw_image();
    });
    function shw_image() {
        var sec = $('#product_category').val();
        if(sec == '1')
        {
            $(".product-image").show();
        }
        else
        {
            $(".product-image").hide();
        }
    }

</script>