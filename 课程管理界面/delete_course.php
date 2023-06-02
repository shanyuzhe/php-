<?php
include 'config.php';

if (!empty($_POST['delete_course_id']))
 {
    $delete_course_id = $_POST['delete_course_id'];
    
    echo 'delete_course_id: ' . $delete_course_id . '<br>';
    
    $sql = "UPDATE courses SET st = 0 WHERE course_id = '$delete_course_id'";

    if ($conn->query($sql) === TRUE) 
    {
        echo "课程删除成功";
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
