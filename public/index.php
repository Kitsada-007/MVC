<?php 
    declare(strict_types = 1);
    
    
    const INCLUDES_DIR = __DIR__.'/../includes';
    const ROUTE_DIR = __DIR__ . '/../routes';
    const TEMPLATES_DIR = __DIR__ . '/../template';
    const DATABASE_DIR = __DIR__ . '/../databases';

    session_start();
    
    // Include router to index.php 
    require_once INCLUDES_DIR . '/router.php';
    require_once INCLUDES_DIR . '/view.php';
    require_once INCLUDES_DIR . '/db.php';
    // Call dispatch to handle requests

    //echo '$_SERVER["REQUEST_URI"]='.$_SERVER['REQUEST_URI'];
    // dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    // Call dispatch to handle requests
    // echo '$_SERVER["REQUEST_URI"]='.$_SERVER['REQUEST_URI'];


// การ เช็ก login การทำเงื่อนไข
const PUBLIC_ROUTES = ['/', '/login'];

if (in_array(strtolower($_SERVER['REQUEST_URI']), PUBLIC_ROUTES)) {
    dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
    exit;
} elseif (isset($_SESSION['timestamp']) && time() - $_SESSION['timestamp'] < 10) {
    // การ เช้กในการอยู่ในระบบ โดยการใช้เวลา 
    // 10 Sec.
    $unix_timestamp = time();
    $_SESSION['timestamp'] = $unix_timestamp;
    dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);
} else {
    unset($_SESSION['timestamp']);
    header('Location: /');
    exit;
}

// dispatch($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);