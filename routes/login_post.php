<?php

declare(strict_types=1);


// Assume that login success
// เก็บเวลา เมื่อเข้าหน้า login
$unix_timestamp = time();  

$_SESSION['timestamp'] = $unix_timestamp;
// เก็บไวใน$_SESSION ทั้งระบบ  จะมีเวลาเดียวกัน
header('Location: /');

