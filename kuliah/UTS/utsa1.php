<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>uts ganjil</title>
</head>

<body>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    nama : <input type="text" name="i_nama" />
    <br />
    lama : <input type="number" name="i_durasi" /> hari
    <br />
    kode booking : <select name="i_kd_booking">
      <option value="AL02102">AL02102</option>
      <option value="BG03025">BG03025</option>
      <option value="CR02111">CR02111</option>
      <option value="KM03075">KM03075</option>
    </select>
    <br />
    jumlah : <input type="number" name="i_penyewa" /> orang
    <br />
    jenis pembayaran :<select name="i_mtd_pembayaran">
      <option value="1">Kartu Kredit</option>
      <option value="2">Debit</option>
      <option value="3">Cash</option>
    </select>
    <br />
    <input type="submit" name="submit" value="submit" />

  </form>
</body>

</html>
<?php

// get data from post requests

if (isset($_POST['submit'])) {
  $nama = $_POST['i_nama'];
  $kd_booking = $_POST['i_kd_booking'];
  $penyewa = $_POST['i_penyewa'];
  $metode_pembayaran = $_POST['i_mtd_pembayaran'];
  $durasi = $_POST['i_durasi'];
  proses($nama, $kd_booking, $penyewa, $metode_pembayaran, $durasi);
}

/// funtsi untuk mencari potongan atau tambahan
/// 1: kredit, 2: debit, 3: cash
function potonganOrTambahan($metode_pembayaran, $total_harga)
{
  $pot = 0;
  if ($metode_pembayaran == 1) {
    $pot = $total_harga * (2 / 100);
  } else if ($metode_pembayaran == 2) {
    $pot = $total_harga * (1.5 / 100);
  } else {
    $pot = $total_harga;
  }

  return $pot;
}

//fungsi untuk proses nilai variabel input
function proses($nama, $kd_booking, $penyewa, $metode_pembayaran, $durasi)
{
  //deklarasi variabel
  $nama_kamar = "";
  $harga_kamar = 0;
  $biaya_tambahan = 75000;
  $biaya_springbed = 0;
  $total_harga = 0;
  $jumlah_biaya = 0;
  $jenis_pembayaran = "";

  // kode kamar : AL 02 102
  $kamar_kd = strtoupper(substr($kd_booking, 0, 2));
  $kamar_lantai = substr($kd_booking, 2, 2);
  $kamar_nomor = substr($kd_booking, strlen($kd_booking) - 3, strlen($kd_booking));

  switch ($kamar_kd) {
    case 'AL':
      $nama_kamar = "Alamanda";
      $harga_kamar = 450000;
      break;
    case 'BG':
      $nama_kamar = "Bougenvile";
      $harga_kamar = 350000;
      break;
    case 'CR':
      $nama_kamar = "Crysan";
      $harga_kamar = 375000;
      break;
    case 'KM':
      $nama_kamar = "Kemuning";
      $harga_kamar = 425000;
      break;
  }

  // string jenis pembyaran
  switch ($metode_pembayaran) {
    case 1:
      $jenis_pembayaran = "Kredit";
      break;
    case 2:
      $jenis_pembayaran = "Debit";
      break;
    case 3:
      $jenis_pembayaran = "Cash";
      break;
  }

  // jika penyewa melebih 2 orang, dikenakan biaya tambahan 
  if ($penyewa > 2) {
    $biaya_springbed = ($penyewa - 2) * $biaya_tambahan;
  }

  // jumlahin total harga
  $tarif_kamar = $durasi * $harga_kamar;
  $total_harga = $tarif_kamar + $biaya_springbed;
  $pot = potonganOrTambahan($metode_pembayaran, $total_harga);

  // klasifikasi dikenakan pototangan atau tambahan
  if ($metode_pembayaran == 1) {
    $jumlah_biaya = $total_harga + $pot;
  } else if ($metode_pembayaran == 2) {
    $jumlah_biaya = $total_harga - $pot;
  } else {
    $jumlah_biaya = $pot;
  }

//Cetak Output
  echo "<pre>
Nama : $nama \t\t\t\tKode Booking : $kd_booking
Nama Kamar : $nama_kamar \t\t\tLantai : $kamar_lantai
Nomor : $kamar_nomor \t\t\t\tJumlah : $penyewa Orang
Lama : $durasi hari \t\t\t\tJenis Pembayaran : $jenis_pembayaran
Potongan / Tambahan : $pot \t\tBiaya Spring Bad Tambahan : $biaya_springbed
Total Biaya seluruhnya : Rp $jumlah_biaya
</pre>";
}
