<?php
$A = 123; // variable global
function Test()
{
  global $A; // variable local
  echo "Nilai A dalam fungsi = $A \n";
  echo '<br>';
}
Test();
echo "Nilai A luar fungsi = $A \n";
