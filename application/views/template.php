<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Website Inventaris Barang Jurusan TIK</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1"/>
  <link rel="shorcut icon" type="image/png" href="<?= base_url() ?>assets/dist/img/PNJLogo.png">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css"/>
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"/>
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css"/>
  <!-- iCheck -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css"/>
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/jqvmap/jqvmap.min.css"/>
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css"/>
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css"/>
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css"/>
  <!-- summernote -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.css"/>
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css"/>
  <link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css"/>
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user fa-fw"></i> <?= $this->session->userdata('admin_logged')->nama ?>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">
              <i class="fas fa-cogs"></i> Settings
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?= site_url('auth/logout') ?>" onclick="return confirm('Apakah anda ingin keluar ?')">
              <i class="fas fa-sign-out-alt"></i>  Logout
            </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.html" class="brand-link">
      <img src="<?= base_url() ?>assets/dist/img/PNJLogo.png" alt="Politeknik Negeri Jakarta Logo" class="brand-image"/>
      <span class="brand-text font-weight-light">Sistem Informasi TIK</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle mt-2" alt="User Image"/>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->session->userdata('admin_logged')->nama ?></a>
          <p class="text-white" style="font-size:12px"><?= $this->session->userdata('admin_logged')->jabatan ?></p>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <?php if(($this->session->userdata('admin_logged')->jabatan != 'ADMIN')  && $this->session->userdata('admin_logged')->valid):?>
          <li class="nav-item has-treeview menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-laptop"></i>
              <p>
                Laboratorium
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="<?= site_url('reports')?>" class="nav-link <?=($this->uri->segment(1) == 'reports') || ($this->uri->segment(1) == '')   ? ' active' : '' ?>">
                    <i class="fas fa-chart-pie nav-icon"></i>
                    <p>Reports</p>
                  </a>
                </li>              
                <li class="nav-item has-treeview <?=($this->uri->segment(1) == 'barang') || ($this->uri->segment(1) == 'jenisbarang')  ? ' menu-open active' : '' ?>">
                  <a href="#" class="nav-link <?=($this->uri->segment(1) == 'barang') || ($this->uri->segment(1) == 'jenisbarang')  ? 'active' : '' ?>">
                    <i class="nav-icon fas fa-boxes"></i>
                    <p>
                      Barang
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?= site_url('barang')?>" class="nav-link <?=($this->uri->segment(1) == 'barang')  ? ' active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Data Barang</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="<?= site_url('jenisbarang')?>" class="nav-link <?=($this->uri->segment(1) == 'jenisbarang') ? ' active' : '' ?>">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Jenis Barang</p>
                      </a>
                    </li>                  
                  </ul>
                </li>              
                <li class="nav-item">
                  <a href="<?= site_url('peminjaman')?>" class="nav-link <?=($this->uri->segment(1) == 'peminjaman')  ? ' active' : '' ?>">
                    <i class="fas fa-shopping-basket nav-icon"></i>
                    <p>Peminjaman Barang</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="<?= site_url('supplier')?>" class="nav-link <?=($this->uri->segment(1) == 'supplier')  ? ' active' : '' ?>">
                    <i class="fas fa-truck nav-icon"></i>
                    <p>Supplier Barang</p>
                  </a>
                </li>
            <?php endif; ?>             
            <?php if(($this->session->userdata('admin_logged')->jabatan == "PLP" || $this->session->userdata('admin_logged')->jabatan == "ADMIN") && $this->session->userdata('admin_logged')->valid ): ?> 
                <li class="nav-item">
                  <a href="<?= site_url('staff')?>" class="nav-link <?=($this->uri->segment(1) == 'staff')  ? ' active' : '' ?>">
                    <i class="fas fa-user nav-icon"></i>
                    <p>Staff Laboratorium</p>
                  </a>
                </li>                          
            <?php endif; ?>              
              </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <?= $contents ?>
    
  </div>
  <!-- /.content-wrapper -->
  
  <footer class="main-footer">
    <strong>Copyright &copy; 2020 Laboratorium Jurusan TIK.</strong>
    All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?= base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="<?= base_url() ?>assets/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<!-- <script src="<?= base_url() ?>assets/plugins/jqvmap/jquery.vmap.min.js"></script> -->
<!-- <script src="<?= base_url() ?>assets/plugins/jqvmap/maps/jquery.vmap.usa.js"></script> -->
<!-- jQuery Knob Chart -->
<script src="<?= base_url() ?>assets/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="<?= base_url() ?>assets/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="<?= base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="<?= base_url() ?>assets/dist/js/pages/dashboard.js"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url() ?>assets/dist/js/demo.js"></script>

<!-- DataTables -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/17.0.0/classic/ckeditor.js"></script>

<script>
  $(function () {
    $('.datatable').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

</script>
<script>
  // Untuk modal dengan bootstrap
  jQuery(document).ready(function($){
        $('#mymodal').on('show.bs.modal', function(e){
            var button = $(e.relatedTarget);
            var modal = $(this);

            // Untuk menampilkan modal sesuai desain yang sudah dibaut di show.blade.php
            modal.find('.modal-body').load(button.data('remote'));
            // Untuk menampilkan title di modal
            modal.find('.modal-title').html(button.data('title'));
        });
  });
</script>

<!-- Modal Script -->
<div class="modal fade" id="mymodal">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title font-weight-bold"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>          
      </div>
    </div>      
</div>
</body>
</html>
