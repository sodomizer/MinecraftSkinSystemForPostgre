<?php
  define('INCLUDE_CHECK',true);
  include ("connect.php");
  
  if (!$hash_enable || strtolower($_GET[$hashtype])==strtolower(hash_file($hashtype, $minecraft))){
    if ($hash_enable && $hash_enable_timeout){
	  $ticket = pg_escape_string($link, $_GET['ticket']);
      $result = pg_query($link, "Update \"$db_table\" SET \"$db_columnHashTimeout\"=now() Where md5(\"$db_columnUser\")='$ticket'")
            or die ("������ � ���� ���������� �������.");
	}
    echo 'YES';
  }
  else
    echo 'Corrupted client!';
?>