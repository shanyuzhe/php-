<?php
include 'config.php';
//id是否为空

//这段代码我在第一次写的时候 用了isset来判断
//但是后来发现如果时空字符串 isset会返回true 
//这意味着 你只要不输入id 就会把所有的信息都修改成空

//我发现了这个问题，所以改成了!empty
//empty会把null和空字符串当成空

if(!empty($_POST['id'])) 
{
    $id = $_POST['id'];
    
    // 构建修改操作的SQL语句
    $sql = "UPDATE students SET";

    // 检查其他字段的值是否存在并构建相应的更新语句
    //这里我采用了最基础的拼接字符串的方法

    //还可以采用"Prepared Statements"的方法来防止sql注入
    //*存疑一下 等考完算法和四级回来看一下
    if(!empty($_POST['name'])) 
    {
        $name = $_POST['name'];
        $sql .= " name = '$name',";
    }

    if(!empty($_POST['gender'])) 
    {
        $gender = $_POST['gender'];
        $sql .= " gender = '$gender',";
    }

    if(!empty($_POST['age']))
    {
        $age = $_POST['age'];
        $sql .= " age = '$age',";
    }

    if(!empty($_POST['id_card'])) 
    {
        $id_card = $_POST['id_card'];
        $sql .= " id_card = '$id_card',";
    }
    
    if(!empty($_POST['major_id'])) 
    {
        $major_id = $_POST['major_id'];
        $sql .= " major_id = '$major_id',";
    }

    if(!empty($_POST['class_id'])) 
    {
        $class_id = $_POST['class_id'];
        $sql .= " class_id = '$class_id',";
    }

    if(!empty($_POST['contact'])) 
    {
        $contact = $_POST['contact'];
        $sql .= " contact = '$contact',";
    }
    if(!empty($_POST['address'])) 
    {
        $address = $_POST['address'];
        $sql .= " address = '$address',";
    }


    if(!empty($_POST['remarks'])) 
    {
        $remarks = $_POST['remarks'];
        $sql .= " remarks = '$remarks',";
    }
    // 去除最后一个逗号
    // rtrim函数可以删除字符串末端的空白字符和其他字符
    //(突然发现了写工程的乐趣，仅次于写算法题 hhh)
    $sql = rtrim($sql, ',');

    // 添加 WHERE 子句以指定条件
    $sql .= " WHERE id = '$id'";

    // 执行SQL语句
    if ($conn->query($sql) === TRUE) 
    {
        echo "学生信息修改成功！";
    }
     else 
    {
        echo "学生信息修改失败：" . $conn->error;
    }
} 
else 
{
    echo "未提供学号，无法修改学生信息！";
}
// 关闭数据库连接
$conn->close();

?>
