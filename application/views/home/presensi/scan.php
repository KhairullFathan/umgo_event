<?php if(!($data->Tanggal >= date('Y-m-d'))): ?>
<div class="container-xxl flex-grow-1 container-p-y">
  <div class="row">
    <!-- login -->
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="divider text-start">
              <div class="divider-text">
                <h3>Scan QR-Code</h3>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6">
              <h4 class="text-center text-danger">Event telah selesai.</h4>
              <p class="mb-4 mx-2 text-center">
                <i class='bx bx-calendar-event' ></i> <?= $data->Event ?><br>
                <i class="bx bx-map"></i> <?= $data->Venue ?><br>
                <i class='bx bx-calendar'></i> <?= renderTanggal($data->Tanggal) ?><br>
                <i class='bx bx-time'></i> <?= renderWaktu($data->WaktuPresensi) ?>
              </p>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<?php else:?>
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
                <h3>Scan QR-Code</h3>
              </div>
            </div>
          </div>
          <div class="row d-flex justify-content-center">
            <div class="col-12 col-lg-6">
              <p class="mb-4 mx-2 text-center">
                <i class='bx bx-calendar-event' ></i> <?= $data->Event ?><br>
                <i class="bx bx-map"></i> <?= $data->Venue ?><br>
                <i class='bx bx-calendar'></i> <?= renderTanggal($data->Tanggal) ?><br>
                <i class='bx bx-time'></i> <?= renderWaktu($data->WaktuPresensi) ?>
              </p>
              <a href="#" class="btn btn-danger mb-2 d-grid btn-stop">Stop</a>
              <select name="ScannerKamera" id="ScannerKamera" class="form-control mb-2">
                <option value="">Pilih Kamera</option>
              </select>
              <div id="scanner"></div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
</div>
<!-- / Content -->
<script>
  const html5QrCode = new Html5Qrcode("scanner");
  Html5Qrcode.getCameras().then(devices => {
  if (devices && devices.length) {
    devices.map((i,e)=>{
      $('#ScannerKamera').append(`<option value="${i.id}">${i.label}</option>`);
    })
  }
  }).catch(err => {
    Swal.fire({
      type: 'error',
      title: 'Gagal memuat kamera',
      text: 'Terjadi kesalahan saat menyalakan kamera',
    });
  });
  //
  $('#ScannerKamera').on('change',function(){
    const id = $(this).val();
    startScanner(id);
  })
  
  
  // stop
  if($('.btn-stop')){
    $('.btn-stop').on('click',(e)=>{
      e.preventDefault();
      html5QrCode.stop().then(ignore => {
        Swal.fire({
          type: 'success',
          title: 'Berhasil mematikan kamera',
          text: 'Kamera berhasil dimatikan',
        });
      }).catch(err => {
        Swal.fire({
          type: 'error',
          title: 'Gagal mematikan kamera',
          text: 'Terjadi kesalahan saat mematikan kamera',
        });
      });
    })
  }
  function startScanner(id){
    html5QrCode.start(id,{fps: 10,qrbox: 250},
      qrCodeMessage => {
        $.ajax({
          method:'post',
          url: "<?=base_url('index.php/presensi/setSession')?>",
          data: {
            token: qrCodeMessage
          },
          success: function(data){
            document.location.href="<?=base_url('index.php/presensi/presensi/').$data->EventID?>";
          },
          error: function(){
            Swal.fire({
              type: 'error',
              title: 'Invalid Token',
              text: 'Terjadi kesalahan',
            });
          }
        });
      })
    .catch(err => {
      Swal.fire({
        type: 'error',
        title: 'Gagal memuat kamera',
        text: 'Terjadi kesalahan saat menyalakan kamera',
      });
    });
  }
</script>
<?php endif; ?>