<?php

echo "logging you out lease wait";
session_start();
echo "Logging you out. Please wait...";

session_destroy();
header("Location: /forum/index.php")
?>