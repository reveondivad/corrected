<?php
include(""config.php"");
require_once(""kontrol.php"");

$opt = htmlspecialchars($_POST['opt']);
$lsid = htmlspecialchars($_POST['lsid']);
$sharetype = htmlspecialchars($_POST['sharetype']);
$remoteaddress = htmlspecialchars($_POST['lsremoteaddress']);
$sharefolder = htmlspecialchars($_POST['lssharefolder']);
$user = htmlspecialchars($_POST['lsuser']);
$pass = htmlspecialchars($_POST['lspass']);
$domain = htmlspecialchars($_POST['lsdomain']);

$dbConn = mysqli_connect(DB_HOST, DB_USER, DB_PASS);
if (!$dbConn) die (""Out of service"");
mysqli_select_db($dbConn, DB_DATABASE) or die (""Out of service"");

include(""classes/logshares_class.php"");

if($opt=='del')
{
  cLogshares::fDeleteFileshareDB($dbConn,$lsid);
}
else if($opt=='add')
{
  cLogshares::fAddFileshareDB($dbConn,$sharetype,$remoteaddress,$sharefolder,$user,$pass,$domain);
}
else if($opt=='check')
{
  echo cLogshares::fTestFileshare(""/mnt/logsource_"".$lsid.""_"".$sharetype);
}
else if($opt=='mount')
{
  cLogshares::fMountFileshareOnly($dbConn,$lsid,$sharetype);
  echo cLogshares::fTestFileshare(""/mnt/logsource_"".$lsid.""_"".$sharetype);
}

function fTestFileshare($sharefolder)
{
  $sharefolder = escapeshellarg($sharefolder);
  $output = shell_exec('sudo /opt/cryptolog/scripts/testmountpoint.sh '.$sharefolder);
  return trim($output);
}
?>