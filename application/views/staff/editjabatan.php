<!-- Content Header (Page header) -->
<div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark font-weight-bold">Ubah Jabatan Staff Laboratorium</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Laboratorium</a></li>
              <li class="breadcrumb-item active">Ubah Jabatan Staff</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container">
        <!-- /.row -->
        <div class="card">
            <div class="card-header bg-primary">
                <h5 class="font-weight-bold">Ubah Jabatan Staff</h5>
            </div>
            <div class="card-body">
                <p class="text-danger">* Wajib diisi</p>
                <form action="" method="POST"  autocomplete="off">
                    <div class="form-group">
                        <p class="h5"><?= $staff->nip." - ".$staff->nama ?></p>
                        <input type="hidden" name="staff_nip" id="staff_nip" value="<?= $staff->nip ?>" class="form-control" >
                        <input type="hidden" name="id_jablab" value="<?= $jabatanlab->id_jablab ?>">                                                
                    </div>                    
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Waktu Mulai Jabatan</label>
                            <div class="input-group date" id="tgl_mulai" data-target-input="nearest">                                                                
                                <input type="text" class="form-control datetimepicker-input" name="tgl_mulai" data-target="#tgl_mulai" data-toggle="datetimepicker" value="<?= $jabatanlab->tgl_mulai ?>"/>
                                <small class="<?= form_error('tgl_mulai') ? "form-text text-danger" : ''?>"><?= form_error('tgl_mulai')?></small>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div> 
                    <div class="bootstrap-timepicker">
                        <div class="form-group">
                            <label>Waktu Selesai Jabatan</label>
                            <div class="input-group date" id="tgl_selesai" data-target-input="nearest">                                                                
                                <input type="text" class="form-control datetimepicker-input" name="tgl_selesai" value="<?= $jabatanlab->tgl_selesai ?>"data-target="#tgl_selesai" data-toggle="datetimepicker"/>
                                <small class="<?= form_error('tgl_selesai') ? "form-text text-danger" : ''?>"><?= form_error('tgl_selesai')?></small>
                            </div>
                            <!-- /.input group -->
                        </div>
                        <!-- /.form group -->
                    </div> 
                    <div class="form-group">
                        <label for="jablab_struk_id">Jabatan </label>
                        <select name="jablab_struk_id" id="jablab_struk_id" class="custom-select">
                            <option value="" selected>Pilih Jabatan Staff</option>
                            <?php foreach($struktural as $strk): ?>
                                <option value="<?= $strk->id_jablab_struk ?>" <?= ($strk->id_jablab_struk == $staff->jablab_struk_id) ? "selected"  : "" ?>><?= $strk->nama_jab ?></option>
                            <?php endforeach;?>
                        </select>
                        <small class="<?= form_error('jablab_struk_id') ? "form-text text-danger" : ''?>"><?= form_error('jablab_struk_id')?></small>                        
                    </div>

                    <div class="form-group mt-2">
                        <button type="submit" class="btn btn-primary btn-lg">Simpan</button>
                        <a href="<?= site_url('staff') ?>" class="btn btn-danger btn-lg">Batal</a>
                    </div>
                </form>
            </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <script>
        $(function () {
            $('#tgl_mulai').datetimepicker({
                icons: {
                    time: "fas fa-clock",
                    date: "fas fa-calendar",
                    up: "fas fa-arrow-up",
                    down: "fas fa-arrow-down"
                }
            }),
            $('#tgl_selesai').datetimepicker({
                icons: {
                    time: "fas fa-clock",
                    date: "fas fa-calendar",
                    up: "fas fa-arrow-up",
                    down: "fas fa-arrow-down"
                }
            }),
        })
    </script>