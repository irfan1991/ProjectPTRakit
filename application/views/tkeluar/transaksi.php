    <!-- DATA TABLES -->
    <!-- Bootstrap Dialog -->
    <link href="<?php echo base_url();?>media/css/plugins/chosen/chosen.bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url();?>media/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $judul;?>
            <small>Form</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Form</a></li>
            <li class="active"><?= $judul;?></li>
          </ol>
        </section>

        <section class="content">
  
        <?=$this->session->flashdata('pesan')?>
  <form method="post" action="<?php echo base_url()."transaksiK/rubahtransaksi" ?>">
<?php foreach($sqlD as $isi): ?>
    <!-- begin form -->
      <div class="row"> <!-- begin row -->
      <div class="col-md-4">  <!-- begin col -->

      <input type="hidden" id="hidden" name="did" value="<?php echo $isi->id_trx_dtl; ?>">
               <input type="hidden" id="hidden" name="do" value="<?php echo $isi->id_trx_hdr; ?>">
                <div class="form-group">
                <label>Nama Obat</label>
                <?= form_error('nama_obat');?>
                <input class="form-control" type="text" name="nama_obat" readonly="true" data-rule-required="true" value="<?php echo $isi->nama_obat;?>">
                </div>

                  <div class="form-group">
                <label>Jumlah</label>
                <?= form_error('qty');?>
                <input class="form-control" type="number" name="qty" placeholder="Masukkan Jumlah" data-rule-required="true" value="<?php echo $isi->qty;?>">
                </div>

                  <div class="form-group">
                <label>Satuan</label>
                <?= form_error('satuan');?>
                <input class="form-control" type="text" name="satuan" readonly="true"  data-rule-required="true" value="<?php echo $isi->satuan;?>">
                </div>
                                
              </div>
            </div>
              
      <br><br>
        <div class="es">
          <button class="btn btn-primary" type="submit">Submit</button>
        </div></br>
        <?php endforeach; ?>
      </div>  <!-- begin col -->
      </div>  <!-- end row -->
      </form> <!-- end form -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
  </div><!-- ./wrapper -->
      
      <?php $this->load->view('layout/jscript');?>
<script src="<?php echo base_url();?>media/js/plugins/form/jquery.validate.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
  $('#validate').validate({
    rules: 
      {
        username: "required ",
        <?php if($act=='add') echo 'password: "required",'; ?>
        cpassword: {
          equalTo: "#password"
        }
      },
        errorClass: 'help-block col-xs-12',
    errorElement: 'span',
    highlight: function(element, errorClass, validClass) {
      $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
    }
  });
  });
</script>
      
 </body>
</html>

