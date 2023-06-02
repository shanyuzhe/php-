<?php
include 'config.php';

// 获取表单数据
$student_id = $_POST['student_id'];
$course_id = $_POST['course_id'];

// 检查连接是否成功
if ($conn->connect_error) 
{
    die("数据库连接失败: " . $conn->connect_error);
}

// 构建查询语句
$sql = "SELECT score FROM course_selection WHERE student_id = $student_id AND course_id = $course_id";

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    $row = $result->fetch_assoc();//关联数组 从结果集中取得一行作为关联数组。
    $score = $row['score'];
    echo "学生ID为 $student_id 的学生在课程ID为 $course_id 的课程的成绩为： $score";
} 

else 
{
    echo "未找到相关记录";
}

// 关闭数据库连接
$conn->close();
?>
