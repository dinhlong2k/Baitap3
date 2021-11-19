<?php

$password = 12345;

echo $hashed_password = password_hash($password, PASSWORD_DEFAULT);

if(password_verify($password, $hashed_password)) {
    // If the password inputs matched the hashed password in the database
} 