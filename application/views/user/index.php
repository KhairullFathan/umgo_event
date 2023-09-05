<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row d-flex justify-content-between align-items-center py-3 mb-4">
    <div class="col">
      <h4 class="fw-bold m-0">
        <?= $judul ?>
      </h4>
    </div>
    <div class="col text-end">
    </div>
  </div>

  <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="RoleID" value="<?= $user->RoleID ?>">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">Form User</h5>
          <div class="card-body">
            <div class="form-group my-2">
              <label for="Nama">Nama Lengkap</label>
              <input type="text" class="form-control" id="Nama" name="Nama" value="<?= $user->Nama ?>">
              <?= form_error('Nama','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Alamat">Alamat</label>
              <textarea class="form-control" name="Alamat" id="Alamat" placeholder="Jl. Limboto Raya, Kel. , Kec. Kab."><?= $user->Alamat ?></textarea>
              <?= form_error('Alamat','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="NoTelp">No Telp</label>
              <input type="text" class="form-control" id="NoTelp" name="NoTelp" value="<?= $user->NoTelp ?>">
              <?= form_error('NoTelp','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Username">Username</label>
              <input type="text" class="form-control" id="Username" name="Username" value="<?= $user->Username ?>">
              <?= form_error('Username','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="NewPassword">Password Baru <sup>Lewati jika tidak ingin merubah</sup> </label>
              <input type="password" class="form-control" id="NewPassword" name="NewPassword" value="<?= set_value('NewPassword') ?>">
              <?= form_error('NewPassword','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="OldPassword">Password Lama</label>
              <input type="password" class="form-control" id="OldPassword" name="OldPassword" value="">
              <?= form_error('OldPassword','<small class="text-danger">','</small>') ?>
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