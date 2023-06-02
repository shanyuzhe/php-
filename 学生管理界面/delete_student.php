<?php
include 'config.php';
// 检查是否接收到了课程编号
if(isset($_POST['delete_id']))
{
    
    //学生id == 需要删除的id
    $delete_id = $_POST['delete_id'];

    //删除此学生id信息的sql语句
    //每个id都不同 所以判断id就可以删除对应的学生信息
    //$delete_sql = "DELETE FROM students WHERE id = '$student_id'";

    //但是这里 课上的时候讲过 如果随意删除可能会造成数据的不一致
    //所以我们不妨添加一个state字段来表示学生的状态
    //state = 0 表示学生已经被删除
    //"ALTER TABLE students ADD st BOOLEAN";

    $delete_sql = "UPDATE students SET st = 0 WHERE id = '$delete_id'";
    

    //使用query函数执行sql语句 如果返回值为true则删除成功
    if($conn -> query($delete_sql) === TRUE)
    {
        echo "学生删除成功！";
    }

    else
    {
        echo "学生删除失败：" . $conn->error;
        //error是conn的一个属性 返回错误信息
    }

} 
else 
{
    // 如果没有接收到课程编号，则输出错误消息
    echo "未提供课程编号，无法删除课程！";
}

$conn->close();
?>
