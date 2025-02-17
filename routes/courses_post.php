<?php

declare(strict_types=1);

$name = $_POST['name'] ?? '';
$code = $_POST['code'] ?? '';
$instructor = $_POST['instructor'] ?? '';
//  &_POST['name'] ?? ''; ถ้าค่าเป็น Null จะไม่เก็บลง ตัวแปร

// ifนี้ เช็กว่า ข้อมูลที่กรอกเข้ามา ต้องเอาข้อมูลมาไห้คบ ทุกตัว
if (empty($name) || empty($code) || empty($instructor)) {

    badRequest("All fields are required");
}

//สร้าง array ที่มีชื่อ  เช่น 'name' => $name ;
$course = array('name' => $name, 'code' => $code, 'instructor' => $instructor);

// ตัวแปรนี้เป็น boolean  $res
$res = insertCourse($course);

if ($res) {
    // ถ้า $res 
    // Add a success message before rendering the view
    $_SESSION['message'] = 'Course added successfully!';
    renderView('courses_new_get');
} else {
    badRequest(message: 'Something went wrong! on insert course');
}