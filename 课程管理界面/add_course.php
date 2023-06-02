<?php
include 'config.php';

if (!empty($_POST['course_id']))
 {
    $course_id = $_POST['course_id'];
    $course_name = $_POST['course_name'];
    $editor = $_POST['editor'];
    $publisher = $_POST['publisher'];
    $credits = $_POST['credits'];

    $sql = "INSERT INTO courses (course_id, course_name, editor, publisher, credits, st) VALUES ('$course_id', '$course_name', '$editor', '$publisher', '$credits', '1')";

    if ($conn->query($sql) === TRUE) 
    {
        echo "课程添加成功";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

else
{
    echo "未输入课程id，插入失败";
}



?>
