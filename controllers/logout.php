<?php
session_start();
session_unset();
session_destroy();
header("Location: ../models/login.php");
exit;
