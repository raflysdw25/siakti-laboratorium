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
              <div class="box-body table-responsive">
                  <table class="table text-nowrap datatable">
                      <thead>
                          <tr>
                              <th>Kode Peminjaman</th>
                              <th>Nama Mahasiswa</th>
                              <th>Tanggal Peminjaman</th>
                              <th>Tanggal Pengembalian </th>
                              <th>Action</th>
                          </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($peminjaman as $pinjambrg):?>
                          <tr>
                                <td><?= $pinjambrg->kd_pjm ?></td>
                                <td><?= $pinjambrg->nama_mahasiswa ?></td>
                                <td><?= $pinjambrg->tgl_pjm ?></td>
                                <td><?= $pinjambrg->tgl_blk ?></td>
                    

                                <!-- <td>AA123</td>
                                <td>Nur Ismi Fahmia</td>
                                <td>13 Mei 2020</td>
                                <td>14 Mei 2020</td> -->
                         
                              <td>
                                <a href="#mymodal" 
                            class="btn btn-info" 
                            data-toggle="modal" 
                            data-remote="<?= site_url('peminjaman/showPeminjaman/'.$pinjambrg->kd_pjm)?>"
                            data-target="#mymodal"
                            data-title="Detail Peminjaman <?= $pinjambrg->kd_pjm?>">
                            <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= site_url('peminjaman/delete/'.$pinjambrg->kd_pjm)?>" onclick="confirm('Apakah anda ingin menghapus data ini ?')" class="btn btn-danger">
                          <i class="fas fa-trash"></i>
                        </a>
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

