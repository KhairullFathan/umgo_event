<?php 
  $status = [
    'Dosen',
    'Tenaga Kependidikan',
    'Mahasiswa',
    'Tamu/Undangan',
  ];
?>
<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <form method="POST" action="" enctype="multipart/form-data">
    <input type="hidden" name="EventID" value="<?=$data->EventID?>">
    <input type="hidden" name="Waktu" value="<?=$this->session->userdata('waktu')?>">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">Form Presensi</h5>
          <div class="card-body">
            <div class="form-group my-2">
              <label for="Event">Nama Event</label>
              <input type="text" class="form-control" id="Event" name="Event" value="<?= $data->Event ?>" disabled>
              <?= form_error('Event','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Venue">Nama Venue</label>
              <input type="text" class="form-control" id="Venue" name="Venue" value="<?= $data->Venue ?>" disabled>
              <?= form_error('Venue','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Nama">Nama </label>
              <input type="text" class="form-control" id="Nama" name="Nama" value="" required>
              <?= form_error('Nama','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Asal">Asal </label>
              <input type="text" class="form-control" id="Asal" name="Asal" value="" required>
              <?= form_error('Asal','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Status">Status </label>
              <select name="Status" id="Status" class="form-control" required>
                <option value="">Pilih Status</option>
                <?php foreach($status as $row): ?>
                  <option value="<?=$row?>"><?=$row?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('Status','<small class="text-danger">','</small>') ?>
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
