<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <!-- login -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="divider text-start">
              <div class="divider-text">
                <h3>Event Berlangsung</h3>
              </div>
            </div>
          </div>
          <div class="row">
            <?php foreach($data as $row): ?>
              <div class="col-md-6 col-lg-3 mb-3">
                <div class="card h-100">
                  <img class="card-img-top" src="<?=base_url('assets/')?>ill/building.svg" alt="Card image cap" style="width:100%;background-color:#fff;padding:10px;">
                  <div class="card-body">
                    <?php if($row->Tanggal == date('Y-m-d')): ?>
                      <span class="badge bg-danger mb-2">Hari ini</span>
                    <?php endif; ?>
                    <h5 class="card-title">
                      <?= $row->Event ?>
                    </h5>
                    <p class="card-text">
                      <i class="bx bx-map"></i> <?= $row->Venue ?><br>
                      <i class='bx bx-calendar'></i> <?= renderTanggal($row->Tanggal) ?><br>
                      <i class='bx bx-time'></i> <?= renderWaktu($row->WaktuPresensi) ?>
                    </p>
                    <a href="<?= base_url('index.php/presensi/scan/').$row->EventID ?>" class="btn btn-outline-primary">
                      <i class="bx bx-qr"></i> Presensi
                    </a>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->