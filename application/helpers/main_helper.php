<?php
function getBulan($m){
  $arrBulan = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
  return $arrBulan[($m-1)];
}
function getBulanRomawi($m){
  $arrBulan = ["I","II","III","IV","V","VI","VII","VIII","IX","X","XI","XII"];
  return $arrBulan[($m-1)];
}
function getHari($h){
  $arrHari = ["Ahad","Senin","Selasa","Rabu","Kamis","Jum'at","Sabtu"];
  $arrDay = ["Sun","Mon","Tue","Wed","Thu","Fri","Sat"];
  $index = array_search($h,$arrDay);
  return $arrHari[$index];
}
function renderTanggal($date){
  if($date){
    if($date != '-'){
      $timestamp = strtotime($date);
      $date = date("d-m-Y",$timestamp);
      $date = explode('-',$date);
      $Tanggal = $date[0];
      $Bulan = getBulan($date[1]);
      $Tahun = $date[2];
      return $Tanggal." ".$Bulan." ".$Tahun;
    }else{
      return '-';
    }
  }else{
    return '-';
  }
}
function renderTanggalBulan($date){
  if($date){
    if($date != '-'){
      $timestamp = strtotime($date);
      $date = date("d-m-Y",$timestamp);
      $date = explode('-',$date);
      $Tanggal = $date[0];
      $Bulan = getBulan($date[1]);
      $Tahun = $date[2];
      return $Tanggal." ".$Bulan;
    }else{
      return '-';
    }
  }else{
    return '-';
  }
}
function renderJam($date){
  if($date != '-'){
    $timestamp = strtotime($date);
    $date = date("H:i",$timestamp);
    return $date;
  }else{
    return '-';
  }
}
function hitungMundur($date){
  $awal = date_create(date('Y-m-d H:i:s',strtotime($date)));
  $akhir = date_create(date('Y-m-d H:i:s',time()));
  $diff = date_diff($awal,$akhir);
  if($diff->y > 0){
    echo $diff->y.' Tahun yang lalu';
  } elseif($diff->m > 0){
    echo $diff->m.' Bulan yang lalu';
  } elseif($diff->d > 0){
    echo $diff->d.' Hari yang lalu';
  } elseif($diff->h > 0){
    echo $diff->h.' Jam yang lalu';
  } elseif($diff->i > 0){
    echo $diff->i.' Menit yang lalu';
  } elseif($diff->s > 0){
    echo $diff->s.' Detik yang lalu';
  } else {
    echo 'Baru saja';
  }
}
function renderTanggalWaktu($date){
  if($date){
    if($date != '-'){
      $timestamp = strtotime($date);
      $date = date("d-m-Y",$timestamp);
      $date = explode('-',$date);
      $Tanggal = $date[0];
      $Bulan = getBulan($date[1]);
      $Tahun = $date[2];
      $Waktu = date("H:i",$timestamp);
      return $Tanggal." ".$Bulan." ".$Tahun." Pukul ".$Waktu." WITA";
    }else{
      return '-';
    }
  }else{
    return '-';
  }
}
function renderWaktu($date){
  if($date){
    if($date != '-'){
      $timestamp = strtotime($date);
      $Waktu = date("H:i",$timestamp);
      return "Pukul ".$Waktu." WITA";
    }else{
      return '-';
    }
  }else{
    return '-';
  }
}
