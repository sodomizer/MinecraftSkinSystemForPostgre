<?php
define('INCLUDE_CHECK',true);
require_once 'functions.php';
include ("connect.php");
$login = pg_escape_string($_POST['user']);
$postPass=pg_escape_string($_POST['password']);
$ver=$_POST['version'];

		if(getGameInfo('launcher') == $ver){

				if ($crypt == 'hash_md5' || $crypt == 'hash_authme' || $crypt == 'hash_xauth' || $crypt == 'hash_cauth' || $crypt == 'hash_joomla' || $crypt == 'hash_wordpress' || $crypt == 'hash_dle' || $crypt == 'hash_drupal')
				{
					$row = pg_fetch_assoc(pg_query($link, "SELECT \"$db_columnUser\",\"$db_columnPass\" FROM \"$db_table\" WHERE \"$db_columnUser\"='".$login."'"));
					$realPass = $row[$db_columnPass];
				}

				if ($crypt == 'hash_ipb' || $crypt == 'hash_vbulletin')
				{
					$row = pg_fetch_assoc(pg_query($link, "SELECT \"$db_columnUser\",\"$db_columnPass\",\"$db_columnSalt\" FROM \"$db_table\" WHERE \"$db_columnUser\"='".$login."'"));
					$realPass = $row[$db_columnPass];
					$salt = $row[$db_columnSalt];
				}
					
				if ($crypt == 'hash_xenforo')
				{
					$row = pg_fetch_assoc(pg_query($link, "SELECT \"$db_table\".\"$db_columnId\",\"$db_table\".\"$db_columnUser\",\"$db_tableOther\".\"$db_columnId\",\"$db_tableOther\".\"$db_columnPass\" FROM \"$db_table\", \"$db_tableOther\" WHERE \"$db_table\".\"$db_columnId\" = \"$db_tableOther\".\"$db_columnId\" AND \"$db_table\".\"$db_columnUser\"='".$login."'"));
					$realPass = substr($row[$db_columnPass],22,64);
					$salt = substr($row[$db_columnPass],105,64);
				}

    				if ($realPass) 
					{
						$checkPass = $crypt();
						
						if(strcmp($realPass,$checkPass) == 0)
						{
							$sessid = generateSessionId();
							$gamebuild=getGameInfo('build');
							pg_query("UPDATE \"$db_table\" SET \"$db_columnSesId\"='$sessid' WHERE \"$db_columnUser\" = '$login'") or die ("Запрос к базе завершился ошибкой.");
							$dlticket = md5($login);
							echo $gamebuild.':'.$dlticket.':'.$login.':'.$sessid.':';
						}
						else
						{
							echo "Bad login";
						}
					}
				else {
					echo "Bad login";
					}
		}
		else{
			echo 'Old version';
			}
?>