<!DOCTYPE html>
<html lang="en">

<head>
  <title>UTS YUSUF RAHMAT</title>
</head>

<body>

  <body>
    <table border="0">
      <form action="" method="POST">
        <tr>
          <td>Nama</td>
          <td>:</td>
          <td><input type="text" name="nama"></td>
          <td>Lama</td>
          <td>:</td>
          <td><input type="number" name="lama_hari" min="1" max="30">&nbsp;Hari</td>
        </tr>
        <tr>
          <td>Kode Booking</td>
          <td>:</td>
          <td>
            <select name="kode_booking">
              <option value="">--Pilih Kode Booking--</option>
              <option value="AL02102">AL02102</option>
              <option value="BG03025">BG03025</option>
              <option value="CR02111">CR02111</option>
              <option value="KM03075">KM03075</option>
            </select>
          </td>
        </tr>
        <tr>
          <td>Jumlah</td>
          <td>:</td>
          <td><input type="number" name="jumlah_orang" min="1" max="10">&nbsp;Orang</td>
          <td>Jenis Pembayaran</td>
          <td>:</td>
          <td>
            <select name="jenis_bayar">
              <option value="">--Pilih Jenis Pembayaran--</option>
              <option value="kredit">Kartu Kredit</option>
              <option value="debit">Debit</option>
              <option value="cash">Cash</option>
            </select>
          </td>
        </tr>
        <tr>
          <td> </td>
          <td> </td>
          <td>
            <button type="submit" name="submit">Proses</button>
            <button type="reset">Hapus</button>
          </td>
        </tr>
      </form>
    </table>
  </body>

</html>
</body>

</html>

<?php
if (isset($_POST['submit'])) {

  $nama = $_POST['nama'];
  $lamaHari = $_POST['lama_hari'];
  $kodeBooking = $_POST['kode_booking'];
  $jumlahOrang = $_POST['jumlah_orang'];
  $jenisBayar = $_POST['jenis_bayar'];
  $tambahSpringbad = 0;
  $tambahBiaya = 0;
  $total = 0;

  // $kodeBooking = substr($kodeBooking, 0, 2);
  $booking = substr($kodeBooking, 0, 2);


  if ($booking == 'AL') {
    $namaKode = 'AL02102';
    $namaKamar = 'Alamanda';
    $hargaMalam = 450000;
  } elseif ($booking == 'BG') {
    $namaKode = 'BG03025';
    $namaKamar = 'Bougenvile';
    $hargaMalam = 350000;
  } elseif ($booking == 'CR') {
    $namaKode = 'CR02111';
    $namaKamar = 'Crysan';
    $hargaMalam = 375000;
  } elseif ($booking == 'KM') {
    $namaKode = 'KM03075';
    $namaKamar = 'Kemuning';
    $hargaMalam = 425000;
  }

  $lantai = substr($kodeBooking, 2, 2);
  $noKamar = substr($kodeBooking, 4, 4);

  if ($jumlahOrang > 2) {
    $tambahSpringbad = (($jumlahOrang - 2) * 75000) * $lamaHari;
  } elseif ($jumlahOrang < 2) {
    $tambahSpringbad = 0;
  }

  $total = (($hargaMalam * $lamaHari) + $tambahSpringbad);

  if ($jenisBayar == 'kredit') {
    $tambahBiaya = (+ ($total * 2) / 100);
  } elseif ($jenisBayar == 'debit') {
    $tambahBiaya = (- ($total * 1.5) / 100);
  } elseif ($jenisBayar == 'cash') {
    $tambahBiaya = 0;
  }






  echo "    
        <table>
            <tr>
                <h4>FLORENSIA HOTEL</h4>
            </tr>
            <tr>
                <td>Nama<td>
                <td>:</td>
                <td>" . strtoupper($nama) . "</td>
                <td><td>
                <td>Kode Booking<td>
                <td>:</td>
                <td>" . strtoupper($namaKode) . "</td>
            </tr>
            <tr>
                <td>Nama Kamar<td>
                <td>:</td>
                <td>" . strtoupper($namaKamar) . "</td>
                <td><td>
                <td>Lantai<td>
                <td>:</td>
                <td>" . strtoupper($lantai) . "</td>
            </tr>
            <tr>
                <td>Nomor<td>
                <td>:</td>
                <td>" . strtoupper($noKamar) . "</td>
                <td><td>
                <td>Jumlah<td>
                <td>:</td>
                <td>" . strtoupper($jumlahOrang) . "&nbsp;Orang</td>
            </tr>
            <tr>
                <td>Lama<td>
                <td>:</td>
                <td>" . strtoupper($lamaHari) . "&nbsp;Hari</td>
                <td><td>
                <td>Jenis Pembayaran<td>
                <td>:</td>
                <td>" . strtoupper($jenisBayar) . "</td>
            <tr>
                <td>Potongan/Tambahan<td>
                <td>:</td>
                <td>" . strtoupper($tambahBiaya) . "</td>
                <td><td>
                <td>Biaya Spring Bad Tambahan<td>
                <td>:</td>
                <td>" . ($tambahSpringbad) . "</td>
                </tr>
            <tr>
                <td>Total Biaya Seluruhnya<td>
                <td>:</td>
                <td>" . ($total) . "</td>
            </tr>
            ";
}
