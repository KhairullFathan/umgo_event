<?php $logo = base_url("assets/logouniv.png"); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= $judul ?> | UMGO EVENT</title>
  <link rel="shortcut icon" href="<?= base_url('assets/logouniv.png') ?>" />
  <link rel="stylesheet" href="<?= base_url('assets/kop-surat.css') ?>">
  <!--  -->
  <style type="text/css">
    /* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
      width: 100%;
      height: 100%;
      margin: 0;
      padding: 0;
      background-color: #FAFAFA;
      font: 12pt "Timies New Roman";
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
    <!-- kop surat -->
    <div id="kop">
      <table>
        <tr>
          <td class="logo">
            <img src="<?= $logo ?>" alt="logo">
          </td>
          <td class="header" nowrap>
            <div class="header-content">
              <h1>UNIVERSITAS MUHAMMADIYAH GORONTALO</h1>
            </div>
            <div class="header-lokasi">
              Jl. Prof. Dr. H. Mansoer Pateda, Pentadio Timur, Kab. Gorontalo<br>
              Website: <a href="https://umgo.ac.id" target="_blank">https://umgo.ac.id</a>
              Email: <a href="mailto:info@umgo.ac.id" target="_blank">info@umgo.ac.id</a>
            </div>
          </td>
        </tr>
        <tr>
          <td colspan="2" nowrap>
            <hr class="hr1">
            <hr class="hr2">
          </td>
        </tr>
      </table>
    </div>
    <!-- akhir kop surat -->
    <h2 style="text-align: center;">Daftar Hadir</h2>
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
      <table id="laporan" width="100%">
        <thead>
          <tr>
            <th>No</th>
            <th width="30%">Nama</th>
            <th width="20%">Asal</th>
            <th width="25%">Status</th>
            <th width="25%">Waktu</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($data as $row): ?>
            <tr>
              <th><?= ++$start ?></th>
              <td><?= $row->Nama ?></td>
              <td><?= $row->Asal ?></td>
              <td><?= $row->Status ?></td>
              <td><?= renderWaktu(date('Y-m-d H:i',$row->Waktu)) ?></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

  </div>







  <!-- end -->
  <script>
    window.print();
  </script>
</body>

</html>