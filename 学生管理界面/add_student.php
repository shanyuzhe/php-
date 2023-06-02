<?php
include 'config.php';

//检查是否接收到了学生信息

if (isset($_POST['id'])) 
{
    //把所有的post请求的数据都存到变量里
    $id = $_POST['id'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $id_card = $_POST['id_card'];
    $major_id = $_POST['major_id'];
    $class_id = $_POST['class_id'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];
    $remarks = $_POST['remarks'];

    //插入的sql语句
    $sql = "INSERT INTO students 
        (id, name, gender, age, id_card, major_id, class_id, contact, address, remarks,st) 
        VALUES 
        ('$id', '$name', '$gender', '$age', '$id_card', '$major_id', '$class_id', '$contact', '$address', '$remarks', '1')";

    //query函数执行sql语句 判断是否成功
    if ($conn->query($sql) === TRUE) 
    {
        echo "学生添加成功";
    }
    else 
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} 

else
{
    echo "未提供学生id，无法添加学生！";
}



//别忘了关闭链接
$conn->close();
?>
