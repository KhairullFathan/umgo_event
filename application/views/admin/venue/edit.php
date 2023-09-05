<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row d-flex justify-content-between align-items-center py-3 mb-4">
    <div class="col">
      <h4 class="fw-bold m-0">
        <?= $judul ?>
      </h4>
    </div>
    <div class="col text-end">
      <a href="<?= base_url('index.php/admin/venue') ?>" class="btn btn-sm btn-danger">
        <i class='bx bx-arrow-back'></i>
        <span>Daftar Venue</span>
      </a>
    </div>
  </div>

  <form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">Form Venue</h5>
          <div class="card-body">
            <div class="form-group my-2">
              <label for="Venue">Nama Venue</label>
              <input type="text" class="form-control" id="Venue" name="Venue" value="<?= $data->Venue ?>">
              <?= form_error('Venue','<small class="text-danger">','</small>') ?>
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