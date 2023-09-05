<div class="container-xxl container-p-y">
  <div class="misc-wrapper text-center">
    <h2 class="mb-2 mx-2"><?= $judul ?> :(</h2>
    <p class="mb-4 mx-2"><?= $message ?></p>
    <a href="<?= base_url('guest') ?>" class="btn btn-primary">Back to home</a>
    <div class="mt-3">
      <img src="<?= base_url('assets/ill/'.$errCode.'.png') ?>" alt="page-misc-error-light" width="400" class="img-fluid" data-app-dark-img="illustrations/page-misc-error-dark.png" data-app-light-img="illustrations/page-misc-error-light.png" />
    </div>
  </div>
</div>