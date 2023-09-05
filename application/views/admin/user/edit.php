<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row d-flex justify-content-between align-items-center py-3 mb-4">
    <div class="col">
      <h4 class="fw-bold m-0">
        <?= $judul ?>
      </h4>
    </div>
    <div class="col text-end">
      <a href="<?= base_url('index.php/admin/user') ?>" class="btn btn-sm btn-danger">
        <i class='bx bx-arrow-back'></i>
        <span>Daftar Pengguna</span>
      </a>
    </div>
  </div>

  <form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">Form Pengguna</h5>
          <div class="card-body">
            <div class="form-group my-2">
              <label for="Nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $data->Nama ?>">
              <?= form_error('Nama','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="RoleID">Role</label>
              <select name="RoleID" id="RoleID" class="form-control">
                <option value="">Pilih Role</option>
                <?php foreach($role as $row): ?>
                  <option value="<?= $row->RoleID ?>" <?= ($data->RoleID==$row->RoleID)?'selected':''?>><?= $row->Role ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('RoleID','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Alamat">Alamat</label>
              <textarea class="form-control" name="Alamat" id="Alamat" placeholder="Jl. Limboto Raya, Kel. , Kec. Kab."><?= $data->Alamat ?></textarea>
              <?= form_error('Alamat','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="NoTelp">No Telp</label>
              <input type="text" class="form-control" id="NoTelp" name="NoTelp" value="<?= $data->NoTelp ?>">
              <?= form_error('NoTelp','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Username">Username</label>
              <input type="text" class="form-control" id="Username" name="Username" value="<?= $data->Username ?>">
              <?= form_error('Username','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Password">Password</label>
              <input type="password" class="form-control" id="Password" name="Password">
              <?= form_error('Password','<small class="text-danger">','</small>') ?>
            </div>



          </div>
          <div class="card-footer d-flex justify-content-end">
            <button type="submit" class="btn btn-primary">
              <i class="bx bxs-save"></i>
              <span>Simpan</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </form>
  
</div>
<!-- / Content -->