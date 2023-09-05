<div class="container-xxl container-p-y">
  <div class="misc-wrapper text-center">
    <h2 class="mb-2 mx-2">Silahkan scan!</h2>
    <p class="mb-4 mx-2">Scan qr-code dibawah ini untuk dapat mengisi daftar hadir pada event.</p>
    <p class="mb-4 mx-2">
      <i class='bx bx-calendar-event' ></i> <?= $data->Event ?><br>
      <i class="bx bx-map"></i> <?= $data->Venue ?><br>
      <i class='bx bx-calendar'></i> <?= renderTanggal($data->Tanggal) ?><br>
      <i class='bx bx-time'></i> <?= renderWaktu($data->WaktuPresensi) ?>
    </p>
    <div class="mt-4">
      <div id="qr-container" data-token="<?=$qr->Code?>"></div>
      <!-- <img src="<?=base_url('assets/')?>ill/time.svg" alt="girl-doing-yoga-light" width="300" class="img-fluid"/> -->
    </div>
  </div>
</div>



<script>
  const qrContainer = $('#qr-container');
  if(qrContainer.length > 0){
    const token = qrContainer.attr('data-token');
    let img = `<img src="https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=200x200&chl=${token}" alt="qrcode-preview" width="300" class="img-fluid"/>`;
    qrContainer.append(img);
  }
</script>