<?php
define('INCLUDE_CHECK',true);
include ("connect.php");

$user = pg_escape_string($_GET['user']);
$serverid = pg_escape_string($_GET['serverId']);

$result = pg_query("Select \"$db_columnUser\" From \"$db_table\" Where \"$db_columnUser\"='$user' And \"$db_columnServer\"='$serverid'")
            or die ("Запрос к базе завершился ошибкой.");

if(pg_num_rows($result) == 1){
    echo "YES";
} else{
    echo "NO";
}

?>