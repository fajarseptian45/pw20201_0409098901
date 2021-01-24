<html>

<head>
  <title>contoh Penggunaan IF</title>
</head>

<body>
  <form method="POST" action="<?php ($_SERVER["PHP_SELF"]); ?>">
    Besar Pembelian :
    <input type=text name=total_beli><br><br>
    <input type=submit name=submit value="Tentukan Diskon">
  </form>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total_beli = $_POST["total_beli"];
    $diskon = 0;
    if ($total_beli >= 200000) {
      $diskon = 0.1;
    } else if ($total_beli >= 100000) {
      $diskon = 0.05;
    } else {
      $diskon = 0.01;
    }

    $diskon = $diskon * intval($total_beli);
    printf("Diskon = %s <br>\n", $diskon);
    printf("Pembayaran = %s <br>\n", $total_beli - $diskon);
  }
  ?>
</body>

</html>