<?php
include 'config.php';

if(!empty($_POST['update_course_id']))
{
    $update_course_id = $_POST['update_course_id'];
    $update_course_name = $_POST['update_course_name'];
    $update_editor = $_POST['update_editor'];
    $update_publisher = $_POST['update_publisher'];
    $update_credits = $_POST['update_credits'];

    $sql = "UPDATE courses SET course_name = '$update_course_name', editor = '$update_editor', publisher = '$update_publisher', credits = '$update_credits' WHERE course_id = '$update_course_id'";

    if ($conn->query($sql) === TRUE) 
    {
        echo "课程更新成功";
    } 
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}

else
{
    echo "未输入课程id，更新失败";
}



?>