  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= site_url();?>media/img/logo.jpeg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>Hello, <?php echo $username;  ?></p>
         
        </div>
      </div>
    
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">DASHBOARD KLINIK</li>
        <li class="treeview">
          <a href="#">
             <i class="fa fa-user"></i> <span>Operator</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?= site_url();?>user/password"><i class="fa fa-circle-o"></i> Change password</a></li>
          </ul>
        </li>
        <li class="treeview active">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Master</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
               <li><a href="<?= site_url();?>/karyawan"><i class="fa fa-circle-o"></i> Karyawan</a></li>
                <li><a href="<?= site_url();?>/obat"><i class="fa fa-circle-o"></i> Obat </a></li>
                <?php  if($this->session->userdata('role')==1) echo ' 
                <li><a href='.site_url().'/user></user><i class="fa fa-circle-o"></i> User </a></li>
              '; ?>
                <li><a href="<?= site_url();?>/departement"><i class="fa fa-circle-o"></i> Departemen </a></li>
          </ul>
        </li>
       
        <li class="treeview">
          <a href="#">
            <i class="fa fa-comments"></i> <span>Transaksi</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
           <li><a href="<?= site_url();?>/transaksiK"><i class="fa fa-circle-o"></i> Karyawan</a></li>
            <li><a href="<?= site_url();?>/transaksiM"><i class="fa fa-circle-o"></i> Obat Masuk </a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="<?= site_url();?>login/logout">
          <i class="fa fa-sign-out"></i> 
          <span>Logout</span> 
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
         
        </li>
        

      
    </section>
    <!-- /.sidebar -->
  </aside>