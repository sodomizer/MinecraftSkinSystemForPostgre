<?php
define('INCLUDE_CHECK',true);
include ("connect.php");

$sessionid = pg_escape_string($link, $_GET['sessionId']);
$user = pg_escape_string($link, $_GET['user']);
$serverid = pg_escape_string($link, $_GET['serverId']);

$query = "Select \"$db_columnUser\" From \"$db_table\" Where \"$db_columnSesId\"='$sessionid' And \"$db_columnUser\"='$user' And \"$db_columnServer\"='$serverid'".($hash_enable_timeout ? " and \"md5time\"::timestamp >= (now()-interval '$hash_timeout seconds')" : "");
//echo $query;
$result = pg_query($link, $query)
            or die ("Database error.");

if(pg_num_rows($result) == 1){
    echo "OK";
} else {

$query = "Update \"$db_table\" SET \"$db_columnServer\"='$serverid' Where \"$db_columnSesId\"='$sessionid' And \"$db_columnUser\"='$user'".($hash_enable_timeout ? " and \"md5time\"::timestamp >= (now()-interval '$hash_timeout seconds')" : "");
$result = pg_query($link, $query)
            or die ("Database error.");

    if(pg_affected_rows($result) == 1){
        echo "OK";
    } else {
        echo "Bad login".($hash_enable_timeout ? " or check timeout exceeded" : "");
    }
}
?>