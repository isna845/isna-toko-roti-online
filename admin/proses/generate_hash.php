<?php
$password = 'password_baru'; // Ganti dengan password yang ingin di-hash
$hashed_pass = password_hash($password, PASSWORD_DEFAULT);

echo "Hashed Password: " . $hashed_pass;
