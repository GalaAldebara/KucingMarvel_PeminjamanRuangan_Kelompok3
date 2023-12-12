<?php
include('php/koneksi.php');
var_dump($_POST);
$queryCountRuangAvail = "SELECT COUNT(id_ruang) AS jmlRuangAvail FROM ruang WHERE (lantai=7 OR lantai=8 AND {$_POST['jp']}) AND status='available'";

die();
