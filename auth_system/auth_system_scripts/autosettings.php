<?php
  define('INCLUDE_CHECK',true);
  include ("connect.php");
?>
Auth=http://example.com/auth.php
Download=http://example.com/Download/
NewsType=Native
News=http://example.com/news.php
ZipType=Res
SavesFolder=%APPDATA%\.examplecraft\
Password=true
CheckType=<?php
  if(!$hash_enable)
    echo "None";
  else
    if($hash_at_login)
	  echo "MD5L";
	else
	  echo strtoupper($hashtype);
?>

Check=http://example.com/checkclient.php?<?php echo strtolower($hashtype);?>=
Logo=http://example.com/logo.png
Image=http://example.com/randomimage.php
Site=http://example.com
Version=1250
Servers=Test Server@example.com,Test Server 2@example.com:25566
AddFiles=http://example.com/Download/bar.jar$~mods/bar.jar;http://example.com/Download/worldedit.jar$bin/worldedit.jar