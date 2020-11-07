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
                        <form class="form-inline" method="get" action="<?php echo current_url(); ?>">
                            <div class="form-group mr-15">
                                <input type="text" class="form-control" value="<?php echo $this->input->get('term'); ?>" name="term"/>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-success btn-anim"><i class="icon-magnifier"></i><span class="btn-text"><?php echo lang('search'); ?></span></button>
                            </div>
                        </form>
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
                                        <th>Page</th>
                                        <th>Name</th>
                                        <th>Contact No</th>
                                        <th>Email</th>
                                        <th>Rating</th>
                                        <th>Status</th>
                                        <th>Added Date</th>
                                        <th class="text-nowrap">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php echo (count($reviews) < 1)?'<tr><td style="text-align:center;" colspan="9">'.lang('no_records').'</td></tr>':''?>
                                    <?php $page +=1; foreach ($reviews as $res) {
                                        $page_title = $this->Common_model->get_tbl_row('pages',$res->cat_id,'title'); ?>
                                        <tr>
                                            <td><?php echo $page; ?></td>
                                            <td><?php echo (!empty($page_title)) ? $page_title->title:''; ?></td>
                                            <td><?php echo $res->name; ?></td>
                                            <td><a href="tel:<?php echo $res->phone; ?>"><?php echo $res->phone; ?></a></td>
                                            <td><?php echo mailto($res->email, $res->email); ?></td>
                                            <td><?php echo $res->rating; ?></td>
                                            <?php if($res->status == 1){ ?>
                                                <td>Active</td>
                                            <?php }else{ ?>
                                            <td><?php echo form_dropdown('status',array(0=>'Pending',1=>'Active'),$res->status,'class="form-control" onchange="change_status(this.value,'.$res->id.')"'); ?></td>
                                            <?php } ?>
                                            <td><?php echo format_common_date($res->added_date); ?></td>
                                            <td class="text-nowrap">
                                                <a onclick="$('#opn<?php echo $res->id; ?>').toggle()" data-toggle="tooltip" data-original-title="View"> <i class="fa fa-eye text-success"></i> </a>&nbsp;&nbsp;
                                                <a href="<?php echo site_url(config_item('admin_folder').'/forms/delete/reviews/'.$res->id.'?redirect='.$redirect); ?>" data-toggle="tooltip" data-original-title="Delete" onclick="return areyousure()"> <i class="fa fa-close text-danger"></i> </a>
                                            </td>
                                        </tr>
                                        <tr id="opn<?php echo $res->id; ?>" style="display: none;">
                                            <td colspan="6">
                                                <?php echo ($res->description!='') ? $res->description.'<br>':''; ?>
                                            </td>
                                        </tr>
                                    <?php $page++; } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <?php echo $this->pagination->create_links(); ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Bordered Table -->
    </div>
</div>
<script>
    function change_status(val,id,type)
    {
      $.post('<?php echo site_url(config_item('admin_folder').'/forms/update_reviews')?>',{val:val,id:id},function(data){
          $.toast({
              heading: 'Success',
              text: 'The record updated successfully!',
              position: 'top-right',
              loaderBg: '#ff6849',
              icon: 'success',
              hideAfter: 3500,
              stack: 6
          });
          location.reload();
      });
    }
</script>
