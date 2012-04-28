<?php
define('INCLUDE_CHECK',true);
include ("connect.php");

$sessionid = pg_escape_string($link, $_GET['sessionId']);
$user = pg_escape_string($link, $_GET['user']);
$serverid = pg_escape_string($link, $_GET['serverId']);

$result = pg_query($link, "Select \"$db_columnUser\" From \"$db_table\" Where \"$db_columnSesId\"='$sessionid' And \"$db_columnUser\"='$user' And \"$db_columnServer\"='$serverid'")
            or die ("Запрос к базе завершился ошибкой.");

if(pg_num_rows($result) == 1){
    echo "OK";
} else {

$result = pg_query($link, "Update \"$db_table\" SET \"$db_columnServer\"='$serverid' Where \"$db_columnSesId\"='$sessionid' And \"$db_columnUser\"='$user'")
            or die ("Запрос к базе завершился ошибкой.");

    if(pg_affected_rows() == 1){
        echo "OK";
    } else {
        echo "Bad login";
    }
}
?>