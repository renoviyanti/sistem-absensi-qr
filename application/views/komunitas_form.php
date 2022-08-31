        <section class='content'>
           <div class='row'>
              <div class='col-xs-12'>
                 <div class='box'>
                    <div class='box-header'>
                       <h3 class='box-title'>KOMUNITAS</h3>
                          <div class='box box-primary'>
                              <form action="<?php echo $action; ?>" method="post">
                                  <table class='table table-bordered'>
                                      <tr>
                                          <td>Nomer Komunitas <?php echo form_error('id_komunitas') ?></td>
                                          <td><input type="text" class="form-control" name="id_komunitas" id="id_komunitas" placeholder="Nomer Komunitas" value="<?php echo $id_komunitas; ?>" /></td>
                                      </tr>
                                      <tr>
                                          <td>Nama Komunitas <?php echo form_error('nama_komunitas') ?></td>
                                          <td><input type="text" class="form-control" name="nama_komunitas" id="nama_komunitas" placeholder="Nama Komunitas" value="<?php echo $nama_komunitas; ?>" /></td>
                                      </tr>
                                      <tr>
                                          <td>Email Komunitas <?php echo form_error('email') ?></td>
                                          <td><input type="text" class="form-control" name="email_komunitas" id="email_komunitas" placeholder="Email Komunitas" value="<?php echo $email_komunitas; ?>" /></td>
                                      </tr>
                                      <input type="hidden" name="id" value="<?php echo $id; ?>" />
                                      <tr>
                                          <td colspan='2'><button type="submit" class="btn btn-primary btn-lg"><?php echo $button ?></button>
                                              <a href="<?php echo site_url('komunitas') ?>" class="btn btn-default btn-lg">Cancel</a></td></tr>
                                  </table>
                              </form>
                          </div><!-- /.box-body -->
                      </div><!-- /.box -->
                  </div><!-- /.col -->
             </div><!-- /.row -->
      </section><!-- /.content -->
      <script src="<?php echo base_url() ?>template/plugins/sweetalert/sweetalert.min.js"></script>
      <script>
      <?= $this->session->flashdata('messageAlert'); ?>
      </script>
