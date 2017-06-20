    <!-- DATA TABLES -->
    <link href="<?php echo base_url();?>media/css/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
					  <a href="<?= site_url();?>transaksiK/tambah" class="btn btn-primary">Tambah</a>
              <a href="<?= site_url();?>transaksiK/riwayat" class="btn btn-primary">Riwayat</a>
              <a href="<?= site_url();?>transaksiK/stok" class="btn btn-primary">Kartu Stok</a>
              <a href="<?= site_url();?>transaksiK/status" class="btn btn-primary">Data Kecelakaan</a>
					      <?=$this->session->flashdata('pesan')?>
				  </p>
      <?php
      echo form_open('transaksiK/status');
      ?>
      <table class="table table-bordered">
          <tr><td>
          <div class="col-sm-2"">
                      <h5>Lihat Laporan Status </h5>
                  </div>
                  <div class="col-md-2"">
                        <select  name="status" id="role">
                 <option value="0">Kecelakaan </option>
                <option value="1">Non Kecelakaan</option>
                      </select>
                  </div>
                  <div class="col-sm-2"">
                      <input type="text" name="tanggal1" class="form-control" id="tanggal" placeholder="Dari Tanggal">
                  </div>
                  <div class="col-sm-2"">
                      <input type="text" name="tanggal2" class="form-control" id="tanggal2" placeholder="Sampai Tanggal">
                  </div>
                  <button class="btn btn-danger btn-dangar" type="submit" name="submit">Search</button> 
                 
              </td>
              </tr>
          
      </table>
      </form>
                  <table id="example" class="table table-bordered table-hover datares display">
                    <thead>
                      <tr>
                        <th>Nomot TRX</th>
                        <th>Tanggal</th>
                         <th>Karyawan</th>
                        <th>Amnanesa</th>
                        <th>Diagnosa</th>
                        <th>Status</th>                  
                      
                      </tr>
                    </thead>
                    <tbody>
                    <!-- Main content   <td><?php echo $r->operator; ?></td>-->
 <?php

foreach($sql->result() as $r){ ?>
  <td><?php echo $r->nomor_transaksi; ?></td>
  <td><?php echo $r->tanggl_transaksi; ?></td>
  <td><?php echo $r->nama_karyawan; ?></td>
  <td><?php echo $r->amnanesa; ?></td>
  <td><?php echo $r->diagnosa; ?></td>
   <td><?php echo $r->status == 0 ? 'Kecelakaan' : 'Non Kecelakaan' ?></td>
  
       
    </tr>
    
    <?php
}
?>            
                    </tbody>
              
                  </table>
                  <button id="GetPageSizeBtn" >Get Page Size</button>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
	  <?php
      echo form_open('transaksiK/rekapKec');
      ?>
      <table class="table table-bordered">
          <tr><td>
          <div class="col-sm-2"">
                      <h5>Lihat Laporan Kecelakaan / Non Kecelakaaan</h5>
                  </div>
                  <div class="col-md-2"">
                        <select  name="rekapKec" id="role">
                 <option value="0">Kecelakaan </option>
                <option value="1">Non Kecelakaan</option>
                      </select>
                  </div>
                  <div class="col-sm-2"">
                      <input type="text" name="tanggal5" class="form-control" id="tgl5" placeholder="Dari Tanggal">
                  </div>
                  <div class="col-sm-2"">
                      <input type="text" name="tanggal6" class="form-control" id="tgl6" placeholder="Sampai Tanggal">
                  </div>
                  <button class="btn btn-danger btn-dangar" type="submit" name="submit">Cetak</button> 
                 
              </td>
              </tr>
      </table>
           </div><!-- /.col -->
             </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
     

<!-- DATA TABES SCRIPT -->
<?php $this->load->view('layout/jscript');?>
    
    <script src="<?php echo base_url();?>media/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/jQuery/sweetalert.min.js"></script>
<script src="<?php echo base_url();?>media/js/plugins/form/jquery.validate.js" type="text/javascript"></script>
<script src="<?php echo base_url();?>media/js/plugins/chosen.jquery.min.js" type="text/javascript"></script>
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
  $('#tgl5,#tgl6').datepicker({
    format: "yyyy-mm-dd",
    language: 'id',
    });
  });
  
  $.fn.datepicker.dates['id']={days:["Minggu","Senin","Selasa","Rabu","Kamis","Jumat","Sabtu"],daysShort:["Ming","Sen","Sel","Rab","Kam","Jum","Sab"],daysMin:["Mi","Sen","Sel","Ra","Ka","Ju","Sa"],months:["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"],monthsShort:["Jan","Feb","Mar","Apr","Mei","Jun","Jul","Agu","Sep","Okt","Nov","Des"],today:"Hari ini",clear:"Clear"};
</script>
    <!-- page script -->
    <script type="text/javascript">
    $(document).ready(function(){
  $('.confirm_delete').on('click', function(){
    
    var delete_url = $(this).attr('data-url');

    swal({
      title: "Hapus Data Transaksi ?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Hapus !",
      cancelButtonText: "Batalkan",
      closeOnConfirm: false     
    }, function(){
      window.location.href = delete_url;
    });

    return false;
  });
});

</script>

    <script type="text/javascript">
    $(document).ready(function () {
   $('#example').dataTable( {
    "oLanguage": {
      "sZeroRecords": "No records to display",
       "sLengthMenu": "Display _MENU_ records",
        "sInfo": "Jumlah Data _TOTAL_ yang disimpan dari (_START_ to _END_)"
    }
//  } );
  });
    
   

    $('#GetPageSizeBtn').click(function() {
        var tbl = $('#example').DataTable();
        var elements = $('#example tbody tr').size();  
      alert(" Table halaman pertama  terdapat " + elements + " data ");
    });    


});
    </script>

  </body>
</html>
