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
                            <?php echo form_open_multipart(current_url().url_attr_get()); ?>
                            <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Title</label>
                                <?php
                                $data = array('name' => 'title', 'value' => set_value('title', $title), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>
                                <div class="col-md-12 form-group sec sec4about_us ">
                                    <label class="control-label mb-10 text-left">Sub Title</label>
                                    <?php
                                    $data = array('name' => 'contents[st]', 'value' => set_value('contents[st]',isset($contents->st) ? $contents->st:''), 'class' => 'form-control');
                                    echo form_input($data);
                                    ?>
                                </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Sequence</label>
                                <?php
                                $data = array('name' => 'sequence', 'value' => set_value('sequence', $sequence), 'class' => 'form-control');
                                echo form_input($data);
                                ?>
                            </div>                            
                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Status</label>
                                <?php $opts = array('1'=>'Enabled','0'=>'Disabled');
                                echo form_dropdown('status', $opts, $status, 'class="form-control"');
                                ?>
                            </div>
                            <div class="col-xs-6 form-group">
                                    <label class="control-label mb-10 text-left">Templates </label>
                                    <?php
                                    echo form_dropdown('templates[]',config_item('page_template'),set_value('templates',$templates),'class="select2 select2-multiple" multiple="multiple" data-placeholder="Choose"');
                                    ?>
                                </div>
                                <div class="col-xs-6 form-group">
                                    <label class="control-label mb-10 text-left">Section </label>
                                    <?php
                                    echo form_dropdown('section',array('1'=>'Section 1'),set_value('section',$section),'class="form-control" data-placeholder="Choose"');
                                    ?>
                                </div>
                            <div class="">
                            <div class="col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Description Type</label>
                                <div class="checkbox checkbox-success">
                                    <input type="checkbox" value="1" id="show_txtarea" name="content_type" <?php echo set_checkbox('content_type',1,$content_type==1); ?>>
                                    <label for="show_txtarea">
                                        Plain Text
                                    </label>
                                </div>
                            </div>
                            <div class="col-xs-12 form-group" id="ta_div">
                                <label class="control-label mb-10 text-left">Description</label>
                                <div id="teditor_div"><textarea name="description" id="teditor" class="mymce"><?php echo set_value('description', $description); ?></textarea></div>
                                <div id="tarea_div"><textarea name="description" id="tarea" class="form-control"><?php echo set_value('description', $description); ?></textarea></div>
                            </div>
                            </div>
                            
                            
                                <div class="col-md-12 form-group sec sec1home sec3home sec401home sec5home sec2projects sec4projects_sub1">
                                    <label class="control-label mb-10 text-left">URL</label>
                                    <?php
                                    $data = array('name' => 'contents[url]', 'value' => set_value('contents[url]',isset($contents->url) ? $contents->url:''), 'class' => 'form-control');
                                    echo form_input($data);
                                    ?>
                                </div>
                           

                            <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                                <label class="control-label mb-10 text-left">Image</label>
                                <?php
                                echo form_upload('image');
                                ?>
                                <?php if($id && $image!=''){ ?>
                                    <img src="<?php echo upload_url($image,'page_contents/'); ?>" class="img-responsive mt-10">
                                <?php } ?>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12 form-group mb-0 text-right">
                                <a href="<?php echo site_url(config_item('admin_folder').'/pages/common_pc'); ?>" class="btn btn-default btn-anim"><i class="fa fa-arrow-left"></i><span class="btn-text">Cancel</span></a>
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

<script>
    $(document).ready(function() {
        show_ta();
        $('#show_txtarea').click(function(){
            show_ta();
        });
        
    });    
    function show_ta() {
        if($('#show_txtarea').prop("checked") == true){
            $("#tarea").attr("name", "description");
            $("#tarea_div").show();
            $("#teditor").removeAttr("name");
            $("#teditor_div").hide();
        }
        else if($('#show_txtarea').prop("checked") == false){
            $("#teditor").attr("name", "description");
            $("#teditor_div").show();
            $("#tarea").removeAttr("name");
            $("#tarea_div").hide();
        }
    }
</script>