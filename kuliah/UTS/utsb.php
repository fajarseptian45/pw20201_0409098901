<!DOCTYPE html>
<html>

<head>
  <title></title>
</head>

<body>
  <h4 align="center"> NUSANTARA COMPUTER CENTER </h4><br>
  <form method="POST" action="">
    <table border="0" align="center">
      <tr>
        <td><label>Nama </label></td>
        <td><label> : </label></td>
        <td><input type="text" name="nama" id="nama"></td>

        <td><label>Kode Pendaftaran</label></td>
        <td><label> : </label></td>
        <td><select name="kddaftar">
            <option value="">Kode Pendaftaran</option>
            <option value="VBSK00108">VBSK00108</option>
            <option value="DPSJ00210">DPSJ00210</option>
            <option value="LXSM10105">LXSM10105</option>

          </select>
        </td>
      </tr>
      <tr>
        <td><label>Kelas</label></td>
        <td><label> : </label></td>
        <td><select name="kelas">
            <option value="">Kelas</option>
            <option value="reguler">Reguler</option>
            <option value="private">Private</option>

          </select></td>
        <td><label>Jumlah Pertemuan </label></td>
        <td><label> : </label></td>
        <td><input type="text" name="jmlpert" id="jmlpert"> kali</td>
      </tr>
      <tr>
        <td><label>Jumlah Peserta</label></td>
        <td><label> : </label></td>
        <td><input type="text" name="jmlpes" id="jmlpes"> orang</td>
      </tr>
      <tr>
        <td><label>Hasil Tes Awal</label></td>
        <td><label> : </label></td>
        <td><select name="hasil">
            <option value="">Hasil Tes</option>
            <option value="gradea">GRADE A</option>
            <option value="gradeb">GRADE B</option>
            <option value="gradec">GRADE C</option>

          </select>
        </td>
      </tr>
      <tr>
        <td><input type="submit" name="proses" value="Proses"></td>
        <td></td>
        <td><input type="submit" name="ulang" value="Ulang"></td>
      </tr>

    </table>
  </form>
</body>

</html>

<?php
if (isset($_POST['proses'])) {
  $nama = $_POST["nama"];
  $kd_daftar = $_POST["kddaftar"];
  $kelas = $_POST["kelas"];
  $hasil_tes = $_POST["hasil"];
  $jml_pst = $_POST["jmlpes"];

  $jml_prt = $_POST["jmlpert"];
  $bisub = 0;


  $daftar = substr($kd_daftar, 0, -7);

  if ($daftar == 'VB') {
    $df = 'Visual Basic';
    $bk = '750000';
    $jk = 'Pemrograman';
  } elseif ($daftar == 'DP') {
    $df = 'Delphi';
    $bk = '650000';
    $jk = 'Pemrograman';
  } elseif ($daftar == 'LX') {
    $df = 'Linux';
    $bk = '800000';
    $jk = 'Sistem Operasi';
  }

  if ($hasil_tes = 'gradea') {
    $bisub = ($bk * 5) / 100;
  } elseif ($hasil_tes = 'gradeb') {
    $bisub = ($bk * 2) / 100;
  } elseif ($hasil_tes = 'gradec') {
    $bisub = 0;
  }

  $hari = substr($kd_daftar, 3, -5);
  if ($hari == 'K') {
    $pr = 'Kamis';
  } elseif ($hari == 'J') {
    $pr = 'Jumat';
  } elseif ($hari == 'M') {
    $pr = 'Minggu';
  }

  $nour = substr($kd_daftar, 4, -2);
  $jmlpert = substr($kd_daftar, 7);


  $tahun = substr($kode_jurusan, 2, -3);
  $nomorUrut = substr($kode_jurusan, 6);

  $bitam = 0;

  if ($kelas = 'private' && $jml_pst > 5) {
    $bt = $jml_pst * 75000;
  } elseif ($kelas = 'private' && $jml_pst < 5) {
    $bt = $jml_pst * 200000;
  } elseif ($kelas = 'reguler' && $jml_pst < 10) {
    $bt = $jml_pst * 50000;
  } elseif ($kelas = 'reguler' && $jml_pst > 10) {
    $bt = 0;
  }


  echo "    
        <table>
            <tr>
                <h1><b>---------------------------------------------</b></h1>
            </tr>
            <tr>
                <td>Nama  </td><td>:</td><td> " . strtoupper($nama) . " <td>
                <td>Jenis Kursus </td><td>:</td><td> " . $jk . "</td>
            </tr>
            <tr>
                <td>Kelas  </td><td>:</td> <td>" . $df . " </td>
                <td >No Urut</td> <td>:</td><td> " . $nour . "</td>
            </tr>
                <td>Hasil Tes Awal </td><td>:</td><td> " . $hasil_tes . "</td>
                <td>Hari </td> <td>:</td><td> " . $pr . "</td>
            <tr>
                <td>Jumlah Peserta  </td><td>:</td><td> " . strtoupper($nama) . "</td>
                <td>Jumlah Pertemuan</td><td>:</td><td> " . $jmlpert . "</td>
            </tr>
                <td>Biaya Kursus </td><td>:</td> <td> " . $bk . "</td>
                <td>Biaya Tambahan</td><td>:</td> <td> " . $bt . "</td>
            <tr>
                <td>Biaya Subsidi  </td><td>:</td><td> " . $bisub . "</td>
                <td>Biaya Yang Dibayar</td><td>:</td><td> " . strtoupper($nama) . "</td>
                        
        </table>";
}
