<!-- Content -->
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row d-flex justify-content-between align-items-center mb-3">
    <div class="col">
      <h4 class="fw-bold py-0 my-0"><?= $judul ?></h4>
    </div>
    <div class="col text-end">
      <a href="<?=base_url('index.php/admin/userAdd')?>" class="btn btn-sm btn-primary">
        <i class="bx bx-plus"></i>
        <span>Tambah Pengguna</span>
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
                  <input type="text" class="form-control form-control-sm" name="q" placeholder="Nama/Username" value="<?= @$this->input->get('q') ?>"/>
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
                <th>Nama Lengkap</th>
                <th>Username</th>
                <th>Role</th>
                <th>No Telp</th>
                <th>Actions</th>
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
                    <td><?= $row->Role ?></td>
                    <td><?= $row->Username ?></td>
                    <td><?= $row->NoTelp ?></td>
                    <td>
                      <a href="<?=base_url('admin/userDetail/').$row->UserID ?>" class="btn btn-sm btn-info">
                        <i class='bx bxs-bullseye'></i>
                        Detail
                      </a>
                      <a href="<?=base_url('admin/userEdit/').$row->UserID ?>" class="btn btn-sm btn-success">
                        <i class='bx bx-edit'></i>
                        Edit
                      </a>
                      <a href="<?=base_url('admin/userDelete/').$row->UserID ?>" class="btn btn-sm btn-danger btn-hapus">
                        <i class='bx bx-trash'></i>
                        Hapus
                      </a>
                    </td>
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