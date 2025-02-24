<?php
$username  = "lsf2025"; // Ganti dengan username yang diinginkan
$password = "lsf2025"; // Ganti dengan password yang diinginkan
$hashedPassword = password_hash($password, PASSWORD_BCRYPT);
echo $hashedPassword;
