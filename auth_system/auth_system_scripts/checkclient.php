<?php
  //Path to minecraft.jar (relative to this file)
  $minecraft = '../mcdl/minecraft.jar';
  //Hash algorithm ('md5', 'sha1', 'sha512')
  $hashtype = 'sha512';
  
  if (strtolower($_GET[$hashtype])==strtolower(hash_file($hashtype, $minecraft)))
    echo 'YES';
  else
    echo 'Corrupted client!';
?>