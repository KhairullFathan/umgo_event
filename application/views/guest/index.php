<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-lg-6 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/')?>img/icons/unicons/chart-success.png" alt="chart success" class="rounded" />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Jumlah Venue</span>
          <h3 class="card-title mb-2"><?= count($venue) ?> Venue Event</h3>
        </div>
      </div>
    </div>
    <div class="col-lg-6 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/')?>img/icons/unicons/chart.png" alt="chart success" class="rounded" />
            </div>
          </div>
          <span class="fw-semibold d-block mb-1">Jumlah Event</span>
          <h3 class="card-title mb-2"><?= count($event) ?> Event</h3>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->