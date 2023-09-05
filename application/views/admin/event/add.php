<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row d-flex justify-content-between align-items-center py-3 mb-4">
    <div class="col">
      <h4 class="fw-bold m-0">
        <?= $judul ?>
      </h4>
    </div>
    <div class="col text-end">
      <a href="<?= base_url('index.php/admin/event') ?>" class="btn btn-sm btn-danger">
        <i class='bx bx-arrow-back'></i>
        <span>Daftar Event</span>
      </a>
    </div>
  </div>

  <form method="POST" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <h5 class="card-header">Form Event</h5>
          <div class="card-body">
            <div class="form-group my-2">
              <label for="VenueID">Venue Event</label>
              <select name="VenueID" id="VenueID" class="form-control">
                <option value="">Pilih Venue</option>
                <?php foreach($venue as $row): ?>
                  <option value="<?= $row->VenueID ?>" <?= ($row->VenueID==set_value('VenueID')) ?'selected':'' ?>><?= $row->Venue ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('VenueID','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Event">Nama Event</label>
              <input type="text" class="form-control" id="Event" name="Event" value="<?= set_value('Event') ?>">
              <?= form_error('Event','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Tanggal">Tanggal Event</label>
              <input type="date" class="form-control" id="Tanggal" name="Tanggal" value="<?= set_value('Tanggal') ?>">
              <?= form_error('Tanggal','<small class="text-danger">','</small>') ?>
            </div>
            <div class="form-group my-2">
              <label for="Presensi">Aktifkan Presensi?</label>
              <div class="form-check mb-2">
                <input name="Presensi" class="form-check-input" type="radio" value="1" id="Aktif" <?= (set_value('Presensi')==1)?'checked':'' ?>>
                <label class="form-check-label" for="Aktif">Aktif</label>
              </div>
              <div class="form-check mb-2">
                <input name="Presensi" class="form-check-input" type="radio" value="0" id="TidakAktif" <?= (set_value('Presensi')!=1)?'checked':'' ?>>
                <label class="form-check-label" for="TidakAktif">Tidak Aktif</label>
              </div>
            </div>
            <div class="form-group my-2">
              <label for="WaktuPresensi">Waktu Presensi</label>
              <input type="datetime-local" class="form-control" id="WaktuPresensi" name="WaktuPresensi" value="<?= set_value('WaktuPresensi') ?>">
              <?= form_error('WaktuPresensi','<small class="text-danger">','</small>') ?>
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