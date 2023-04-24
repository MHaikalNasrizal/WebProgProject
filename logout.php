<?php
session_start();
session_destroy();
echo "<script>if(confirm('Sucessfully Log Out. GoodBye!')){document.location.href='index.html'};</script>";
?>