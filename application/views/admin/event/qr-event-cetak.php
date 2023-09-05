<?php 
  $qr = $this->db->get_where('qr',['qr.EventID'=>$event->EventID])->row();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $judul ?> | UMGO EVENT</title>
  <link rel="shortcut icon" href="<?= base_url('assets/logouniv.png') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/kop-surat.css') ?>">
  <script src="<?=base_url('assets/')?>vendor/libs/jquery/jquery.js"></script>
  <!--  -->
  <style type="text/css">
    /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
      font: 12pt "Arial";
    }

    * {
      box-sizing: border-box;
      -moz-box-sizing: border-box;
    }

    .page {
      width: 210mm;
      min-height: 297mm;
      /* padding: 20mm; */
      padding-top: 1cm;
      padding-right: 1.79cm;
      padding-bottom: 1cm;
      padding-left: 2.1cm;
      margin: 10mm auto;
      border: 1px #D3D3D3 solid;
      border-radius: 5px;
      background: white;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    .subpage {
      padding: 1cm;
      border: 5px red solid;
      height: 257mm;
      outline: 2cm #FFEAEA solid;
    }
    table#laporan {
      border-collapse: collapse;
    }
    table#laporan, #laporan th, #laporan td {
      border: 2px solid #111;
      color: #111;
    }
    th#laporan, #laporan th, #laporan td {
      padding: 10px;
    }
    ol.langkah2 li{
      margin: 10px 0px;
      font-size: 1.4rem;
    }

    @page {
      size: A4;
      margin: 0;
    }

    @media print {

      html,
      body {
        width: 210mm;
        height: 297mm;
      }

      .page {
        margin: 0;
        border: initial;
        border-radius: initial;
        width: initial;
        min-height: initial;
        box-shadow: initial;
        background: initial;
        page-break-after: always;
      }
    }
  </style>
</head>

<body>
  <div class="page">
    <!-- akhir kop surat -->
    <h1 style="text-align: center;">Silahkan Scan!</h1>
    <table>
      <tr>
        <td>Nama Event</td>
        <td>:</td>
        <td><?= $event->Event ?></td>
      </tr>
      <tr>
        <td>Tanggal Event</td>
        <td>:</td>
        <td><?= renderTanggal($event->Tanggal) ?></td>
      </tr>
      <tr>
        <td>Lokasi Event</td>
        <td>:</td>
        <td><?= $event->Venue ?></td>
      </tr>
    </table>
    <!--  -->
    <div style="margin-top:20px">
      <h3 style="text-align: center;">Langkah Langkah Presensi</h3>
      <ol class="langkah2">
        <li>Masuk Pada Website <i><span style="color:#00F;border-bottom:1px solid #00F;">event.umgo.ac.id</span></i></li>
        <li>Pilih Event <b><?= $event->Event ?></b></li>
        <li>Aktifkan Kamera Dengan Memilih Kamera Belakang.</li>
        <li>
          Scan QR-Code di Bawah Ini:
          <br>
          <div style="display:block;text-align:center;" id="qr-container" data-token="<?=$qr->Code?>"></div>
        </li>
        <li>Mengisi form yang sesuai dengan data diri anda. <b>UNTUK ASAL DIISI DENGAN NAMA UNIT KERJA</b> atau <b>NAMA PROGRAM STUDI</b>, atau <b>NAMA INSTANSI LAIN JIKA ANDA MEMILIH STATUS TAMU/UNDANGAN</b></li>
        <li>Setelah itu kirim data dengan menekan tombol simpan, apabila presensi berhasil maka akan menampilkan alert “Presensi berhasil direkam”.</li>
      </ol>
    </div>

  </div>







  <!-- end -->
  <script>
    const qrContainer = $('#qr-container');
    if(qrContainer.length > 0){
      const token = qrContainer.attr('data-token');
      let img = `<img src="https://chart.googleapis.com/chart?cht=qr&chld=H|1&chs=200x200&chl=${token}" alt="qrcode-preview" width="300" class="img-fluid"/>`;
      qrContainer.append(img);
    }
    window.print();
  </script>
</body>

</html>