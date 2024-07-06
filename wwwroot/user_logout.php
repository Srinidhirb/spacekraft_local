<?php
include 'connect.php';
echo '<script>document.cookie = "user_id=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";</script>';
echo '<script>window.location.href = "index.php";</script>';
exit();
?>
