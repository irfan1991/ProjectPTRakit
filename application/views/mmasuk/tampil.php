   
   <!-- DATA TABLES -->
    <link href="<?php echo base_url();?>media/css/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Bootstrap Dialog -->
      <link href="<?php echo base_url();?>media/css/plugins/chosen/chosen.bootstrap.min.css" rel="stylesheet" type="text/css" />

 <link href="<?php echo base_url();?>media/css/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />

      <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            <?= $judul;?>
            <small>advanced tables</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Tables</a></li>
            <li class="active"><?= $judul;?></li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">

          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-body">
				  <p>
					  <a href="<?= site_url();?>transaksiM/tambah" class="btn btn-primary">Tambah</a>
					             <?=$this->session->flashdata('pesan')?>
				  </p>
                  <table id="example1" class="table table-bordered table-hover datares">
                    <thead>
                      <tr>
                        <th>Nomot TRX</th>
                        <th>Tanggal</th>
                      
                         <th>Nama Obat</th>
                        <th>Jumlah</th>
                        <th>Operator</th>
                       <!-- Main content<th>Aksi</th> -->  
                      </tr>
                    </thead>
                    <tbody>


<?php
if($detail)
foreach($detail as $r) :

?>
<td><?php echo $r->nomor_transaksi; ?></td>
<td><?php echo $r->tanggl_transaksi; ?></td>

 <td><?php echo $r->nama_obat; ?></td>
 <td><?php echo $r->stok; ?></td>
 <td><?php echo $r->operator; ?></td>
 
   
 

    </tr>
          
 
 <?php endforeach; ?>    
   
  </tbody>
                    </table>
                </div>
              </div><!-- /.box -->

            </div><!-- /.col -->


             <?php
      echo form_open('transaksiM/pdf');
      ?>
      <table class="table table-bordered">
          <tr><td>
          <div class="col-sm-2"">
                      <h5>Cetak Laporan Obat Masuk Periode </h5>
                  </div>
                  <div class="col-sm-2"">
                      <input type="text" name="tanggal1" class="form-control" id="tanggal" placeholder="Dari Tanggal">
                  </div>
                  <div class="col-sm-2"">
                      <input type="text" name="tanggal2" class="form-control" id="tanggal2" placeholder="Sampai Tanggal">
                  </div>
                  <button class="btn btn-danger btn-dangar" type="submit" name="submit">Cetak</button> 
                 
              </td>
              </tr>
          
      </table>
      </form>

          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<!-- DATA TABES SCRIPT -->
<?php $this->load->view('layout/jscript');?>
        <script src="<?php echo base_url();?>media/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    
      <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>media/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/jQuery/sweetalert.min.js"></script>
    <script src="<?php echo base_url();?>media/js/plugins/chosen.jquery.min.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/plugins/form/jquery.validate.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/bootstrap-datepicker.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(document).ready(function() {
  $('.chosen').chosen();
  $('#validate').validate({
        errorClass: 'help-block col-xs-12',
    errorElement: 'span',
    highlight: function(element, errorClass, validClass) {
      $(element).parents('.form-group').removeClass('has-success').addClass('has-error');
    },
    unhighlight: function(element, errorClass, validClass) {
      $(element).parents('.form-group').removeClass('has-error').addClass('has-success');
    }
  });
 
  $('#tanggal,#tanggal2').datepicker({
    format: "yyyy-mm-dd",
    language: 'id',
    });
  });
  
  $.fn.datepicker.dates['id']={days:["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],daysShort:["Ming","Sen","Sel","Rab","Kam","Jum","Sab"],daysMin:["Mi","Sen","Sel","Ra","Ka","Ju","Sa"],months:["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],monthsShort:["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],today:"Hari ini",clear:"Clear"};
</script>
  
<!-- page script -->
<script type="text/javascript">
  $(function () {
	$("#example1").dataTable();
  });
  function printAction(x)
  {
	  window.open("<?= site_url();?>/transaksiM/preview/"+x, "_blank", "scrollbars=yes, resizable=yes, top=75, left=250, width=900, height=600");
  }

  function editAction(x)
  {
	  window.location.href = "<?= site_url();?>/transaksiK/ubah/"+x;
  }

  function deleteAction(x)
  {
	BootstrapDialog.confirm('<center><h4>Yakin ingin hapus data ini ?</h4></center>', function(result){
		if(result) {
			$.post('<?= site_url();?>/transaksiM/hapus',{id : x} ,
				function(e)
				{
					var r = e.split('#');
					if(r[0] == 'S')
					{
						window.location.reload();
					}
					else
					{
						BootstrapDialog.alert('<center><h4>Maaf, tidak bisa dihapus</h4></center>');
					}
				}
			);
		}
	});
  }
</script>

  </body>
</html>
