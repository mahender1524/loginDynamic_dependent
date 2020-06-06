<?php $this->load->view('public/header');?>
<?php $this->load->view('public/sidebar');?> 
<?php $this->load->view('public/breadcrumb');?> 




<!-- For Delete Modal !-->
<div class="modal fade" id="myModaldelete" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="border:0">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body">
                    <p class="text-center" id="err_msg" style="color: #521B1B;font-size: 17px;">Are you sure to delete the Vendor?</p>
                </div>
                <div class="modal-footer" style="text-align: center;">
                    <button type="button" onclick="deleteVendor()" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                </div>
            </div>
        </div>
    </div>
    
<a href="<?=base_url('user')?>">Add User</a>
    <section class="content">
        <div class="row">
        <div class="col-12">
        <div class="card">
        <div class="card-header">
        </div>
        <!-- /.card-header -->
        <div class="card-body">
        <table id="example2" class="table table-bordered table-hover">
            <?php $this->load->view('public/flashdata-message');?> 
        <thead>
        <tr>
        <th>S. No. </th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Created Date</th>
        <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if(isset($group)) { $i=1;  
        foreach($group as $value) { ?> 
        <tr>
        <td><?=$i?></td>
        <td><?=$value->name?></td>
        <td><?=$value->email?></td>
        <td><?=($value->is_active =='1')? '<span class="badge badge-success">Active</span>':'<span class="badge badge-danger">Inactive</span>'?></td>
        <td><?=date('d-m-Y',strtotime($value->created_at))?></td>
        <td>
            <a href="<?=base_url('user/edit/'.$value->id);?>">
                <i class="ace-icon fa fa-edit bigger-130"></i></a>
            <a  id = "" onclick="deleteRecords(<?php echo $value->id; ?>)">
                <i class="ace-icon fa fa-trash bigger-130 btn-dlete"></i></a>
        </td>

        </tr> <?php $i++; } } else {  ?>
        <tr>
        <td colspan="5">No Data Available</td>
        </tr>
        <?php } ?>
        </tbody>
        </table>

        </div>
        <p><?=$links; ?></p>
        <!-- /.card-body -->
        </div>
        <!-- /.card -->

        </div>
        <!-- /.col -->
        </div>
        <!-- /.row -->
        <input type="hidden" id="deletefor" value=""/>
    </section>
<?php $this->load->view('public/footer');?>

<script type="text/javascript">
    function deleteRecords(id)
    {
        
        $('#deletefor').val('');
        $('#deletefor').val(id);
        $('#myModaldelete').modal('show');
        
    }
</script>
