<?php
// 导入配置文件
require_once 'config.php';



if(!empty( $_POST['student_id']))
{
    // 执行查询
    $student_id = $_POST['student_id'];
    $sql = "SELECT c.course_name, cs.score
    FROM course_selection AS cs
    INNER JOIN courses AS c ON cs.course_id = c.course_id
    WHERE cs.student_id = $student_id AND cs.score < 60";

    $result = $conn->query($sql);

    
    // 检查查询结果
    if ($result === false)
    {
        die("查询失败: " . $conn->error);
    }

    if ($result->num_rows > 0) 
    {
        echo "<h2>学生补考名单</h2>";
        echo "<table>";
        echo "<tr><th>课程名称</th><th>成绩</th></tr>";
        
        while ($row = $result->fetch_assoc()) 
        {
            $course_name = $row['course_name'];
            $score = $row['score'];
            
            echo "<tr><td>$course_name</td><td>$score</td></tr>";
        }
        
        echo "</table>";
    } 
    else 
    {
        echo "未找到相关记录";
    }
}
else
{
    echo "请先选择学生";
}
// 关闭数据库连接
$conn->close();
?>
