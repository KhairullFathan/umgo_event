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
  <div class="row d-flex justify-content-between align-items-center mb-3">
    <div class="col">
      <h4 class="fw-bold py-0 my-0"><?= $judul ?></h4>
    </div>
    <div class="col text-end">
      <a href="<?=base_url('index.php/admin/cetakPresensi/'.$event->EventID).'?'.$qs?>" class="btn btn-sm btn-primary" target="_blank">
        <i class="bx bx-printer"></i>
        <span>Cetak Presensi</span>
      </a>
    </div>
  </div>

  <!-- form pencarian -->
  <form method="get" action="">
    <div class="row">
      <div class="col-12">
        <div class="accordion my-3" id="accordionFilter">
          <div class="card accordion-item">
            <h2 class="accordion-header" id="headingAccordion">
              <button type="button" class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#accordion-filter" aria-expanded="false" aria-controls="accordion-filter">Filter</button>
            </h2>
            <div id="accordion-filter" class="accordion-collapse collapse" aria-labelledby="headingAccordion" data-bs-parent="#accordionFilter">
              <div class="accordion-body ">
                <div class="input-group my-2">
                  <input type="text" class="form-control form-control-sm" name="q" placeholder="Nama/Tanggal Event" value="<?= @$this->input->get('q') ?>"/>
                </div>
                <div class="input-group my-2">
                  <select name="Status" id="Status" class="form-control form-control-sm" required>
                    <option value="">Pilih Status</option>
                    <?php foreach($status as $row): ?>
                      <option value="<?=$row?>" <?php if(@$row==@$this->input->get('Status'))echo 'selected' ?>><?=$row?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="input-group my-2">
                  <button type="submit" class="btn btn-sm btn-primary">
                    <i class="fas fa-search"></i>
                    Filter
                  </button>
                  <a href="<?= current_url() ?>" class="btn btn-sm btn-danger">
                    <i class="fas fa-times"></i>
                    Reset
                  </a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <!-- akhir form pencarian -->
  <!-- table -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="table-responsive text-nowrap">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal</th>
                <th>Status</th>
                <th>Waktu Presensi</th>
              </tr>
            </thead>
            <tbody class="table-border-bottom-0">
              <?php if(!$data): ?>
                <tr>
                  <td colspan="100"><i>Belum ada data.</i></td>
                </tr>
              <?php else: ?>
                <?php foreach($data as $row): ?>
                  <tr>
                    <td><strong><?= ++$start ?></strong></td>
                    <td><?= $row->Nama ?></td>
                    <td><?= $row->Asal ?></td>
                    <td><?= $row->Status ?></td>
                    <td><?= renderTanggalWaktu(date('Y-m-d H:i:s',$row->Waktu)) ?></td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>
        <div class="card-footer d-flex justify-content-end pb-0">
          <?= $this->pagination->create_links() ?>
        </div>
      </div>
    </div>
  </div>
  <!-- table -->
  
</div>
<!-- / Content -->