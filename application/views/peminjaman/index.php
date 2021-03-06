<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Daftar Peminjaman Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Data Peminjaman</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
       
        <?php if ($this->session->flashdata('success')) : ?>
            <div class="row mt-3">
                <div class="col-md-6">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong><?= $this->session->flashdata('success')?></strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
      <div class="container-fluid">
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive">
                  <table class="table text-nowrap datatable">
                      <thead>
                          <tr>
                              <th>#</th>
                              <th>Tanggal Peminjaman</th>
                              <th>Tanggal Kembali</th>
                              <th>Tanggal Pengembalian </th>
                              <th>Status </th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($peminjaman as $pinjambrg):?>
                          <tr>                              
                              <td><?= $pinjambrg->kd_pjm ?></td>                              
                              <td><?= ($pinjambrg->tgl_pjm == null) ? "Tanggal Belum diatur" : $pinjambrg->tgl_pjm ?></td>
                              <td><?= ($pinjambrg->tgl_blk == null) ? "Tanggal Belum diatur" : $pinjambrg->tgl_blk?></td>
                              <td><?= ($pinjambrg->tgl_blk_real == null) ? "Barang belum dikembalikan" : $pinjambrg->tgl_pjm ?></td>
                              <td>
                                <span class="badge <?= ($pinjambrg->status == "PENDING") ? "badge-warning" : (($pinjambrg->status == "SUCCESS" || $pinjambrg->status == "APPROVE" ) ? "badge-success" : (($pinjambrg->status == "NEED APPROVAL")? "badge-secondary" :"badge-danger")) ?>"><?= $pinjambrg->status ?></span>
                              </td>                                                                       
                              <td>
                                <?php if($pinjambrg->status == "NEED APPROVAL" && $this->session->userdata('admin_logged')->jabatan == "PLP"): ?>
                                    <a href="<?= site_url('peminjaman/approval/'.$pinjambrg->kd_pjm) ?>" class="btn btn-success" data-toggle="tooltip" data-placement="top" title="Setujui peminjaman" onclick="return confirm('Apakah anda yakin setuju atas peminjaman ini?')">
                                      <i class="fas fa-check"></i>                                  
                                    </a>
                                <?php endif;?> 
                                <a href="#mymodal" 
                                  class="btn btn-info" 
                                  data-toggle="modal" 
                                  data-remote="<?= site_url('peminjaman/detailBarang/'.$pinjambrg->kd_pjm)?>"
                                  data-target="#mymodal"
                                  data-title="Detail Peminjaman <?= $pinjambrg->kd_pjm?>"
                                  data-toggle="tooltip" data-placement="top" title="Detail Barang Dipinjam">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#mymodal" class="btn btn-primary"
                                  data-toggle="modal"
                                  data-remote="<?= site_url('peminjaman/detailPeminjam/'.$pinjambrg->kd_pjm) ?>"
                                  data-target="#mymodal"
                                  data-title="Detail Peminjam"
                                  data-toggle="tooltip" data-placement="top" title="Detail Peminjam"
                                >
                                  <i class="fas fa-user"></i>
                                </a>
                                <?php if(($this->session->userdata('admin_logged')->jabatan == "PLP")): ?> 
                                <a href="<?= site_url('peminjaman/delete/'.$pinjambrg->kd_pjm)?>" onclick="return confirm('Apakah anda ingin menghapus data ini ?')"  class="btn btn-danger">
                                  <i class="fas fa-trash"></i>
                                </a>
                                <?php endif; ?>
                   </td>
                    </tr>                    
                  <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

