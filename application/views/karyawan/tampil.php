    <!-- DATA TABLES -->
    <link href="<?php echo base_url();?>media/css/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
	 <!--<link href="<?php echo base_url();?>media/css/bootstrap-dialog.min.css" rel="stylesheet" type="text/css" /> -->
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
					  <a href="<?= site_url();?>karyawan/tambah" class="btn btn-primary">Tambah</a>
                <?=$this->session->flashdata('pesan')?>
				  </p>

                  <table id="example1" class="table table-bordered table-hover datares">
                    <thead>
                      <tr>
                        <th>Nik</th>
                         <th>No MR</th>
                        <th>Nama karyawan</th>
                        <th>Tgl lahir</th>
                        <th>Umur</th>
                        <th>Departemen</th>
                        <th>Status</th>
						<th>Jk</th>
                        <th>Tanggal input</th>
                        <th>Tanggal update</th>
                        <th>User input</th>
                        <th>User Update</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>

<?php
if($sql)
foreach($sql as $r) : ?>
<td><?php echo $r->nik; ?></td>
<td><?php echo $r->no_mr; ?></td>
<td><?php echo $r->namakar; ?></td>
<td><?php echo $r->tgllahir; ?></td>

<td><?php echo $this->umur->cekUmur($r->tgllahir); ?></td>
<td><?php echo $r->nama; ?></td>
<td><?php echo $r->status == 0 ? 'Aktif' : 'Non Aktif' ?></td>
<td><?php echo $r->jk == 0 ? 'L' : 'P' ?></td>
<td><?php echo $r->date_c; ?></td>
<td><?php echo $r->date_u; ?></td>
<td><?php echo $r->user_c; ?></td>
<td><?php echo $r->user_u; ?></td>

       <td>
     <a href="<?php echo site_url('karyawan/ubah/'.$r->id_kary); ?>" class="tip btn btn-sm btn-default"  title="Edit" ><i class="glyphicon glyphicon-edit" ></i></a> 
      
    &nbsp | &nbsp 
   <a href="#" data-url="<?php echo site_url('karyawan/hapus/'.$r->id_kary); ?>" class="tip btn btn-sm btn-default confirm_delete"  title="Hapus" ><i class="glyphicon glyphicon-trash" ></i></a> 
      </td>
 
    </tr>
<?php endforeach; ?>    

          </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      
<?php $this->load->view('layout/jscript');?>




    <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>media/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/jQuery/sweetalert.min.js"></script>

    <!-- page script -->
    <script type="text/javascript">
   <!-- DATA TABES SCRIPT -->
    <script src="<?php echo base_url();?>media/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
    <script src="<?php echo base_url();?>media/js/plugins/jQuery/sweetalert.min.js"></script>

    <!-- page script -->
    <script type="text/javascript">
    $(document).ready(function(){
  $('.confirm_delete').on('click', function(){
    
    var delete_url = $(this).attr('data-url');

    swal({
      title: "Hapus Data Karyawan ?",
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
      $(function () {
        $("#example1").dataTable();
      });

      function editAction(x)
      {
		  window.location.href = "<?= site_url();?>/karyawan/ubah/"+x;
	  }

      function deleteAction(x)
      {
		BootstrapDialog.confirm('<center><h4>Yakin ingin hapus data ini ?</h4></center>', function(result){
            if(result) {
				$.post('<?= site_url();?>/karyawan/hapus',{id : x} ,
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
