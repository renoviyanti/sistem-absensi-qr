
<style media="screen">
  table,th,tr,td{
    text-align: center;
  }
</style>
   <section class='content'>
      <div class='row'>
         <div class='col-xs-12'>
            <div class='box'>
               <div class='box-header'>
                  <h3 class='box-title'><?php echo anchor('komunitas/create/','Tambah Data Komunitas',array('class'=>'btn btn-unique btn-lg '));?>
              </div><!-- /.box-header -->
                <div class='box-body'>
                   <table class="table table-bordered table-striped" id="mytable">
                      <thead>
                         <tr>
                            <th width="20px">No</th>
                            <th>Nomer Komunitas</th>
                            <th>Nama Komunitas</th>
                            <th>Email Komunitas</th>
                            <th width="30%">Action</th>
                        </tr>
                     </thead> 
                     <tbody>
                      <?php
                      $start = 0;
                      foreach ($komunitas_data as $komunitas)  { ?>
                         <tr>
                    		     <td><?php echo ++$start ?></td>
                             <td><?php echo $komunitas->id_komunitas ?></td>
                    		     <td><?php echo $komunitas->nama_komunitas ?></td>
                             <td><?php echo $komunitas->email_komunitas ?></td>
                    		     <td style="text-align:center" width="140px">
  	                  <?php
                      			echo anchor(site_url('komunitas/update/'.$komunitas->id),'<i class="fa fa-pencil-square-o fa-lg"></i>&nbsp;&nbsp;Edit',array('title'=>'edit','class'=>'btn btn-warning'));
                      			echo '  ';
                      			echo anchor(site_url('komunitas/delete/'.$komunitas->id),'<i class="fa fa-trash-o fa-lg"></i>&nbsp;&nbsp;Hapus','title="delete" class="btn btn-danger" onclick="javasciprt: return confirm(\'Are You Sure ?\')"');
                    	 ?>
                      		   </td>
                      	</tr>
                    <?php }   ?>
                   </tbody>
               </table>
              </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div><!-- /.col -->
    </div><!-- /.row -->
</section><!-- /.content -->
    <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
    <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#mytable").dataTable();
        });
    </script>
