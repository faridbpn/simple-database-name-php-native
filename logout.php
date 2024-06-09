<?php
// konek ke session\
session_start();
$_SESSION = [];
// hancurkan session nya
session_unset();
session_destroy();

// kita akan menghapus cookie
setcookie('id', '', time() - 3600 );
setcookie('key', '', time() - 3600 );

header("location: login.php");
exit;
?>