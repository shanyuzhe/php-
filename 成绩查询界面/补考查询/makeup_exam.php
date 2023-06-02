<?php
include 'config.php';

// 获取表单数据
$class_id = $_POST['class_id'];
$course_id = $_POST['course_id'];

// 检查连接是否成功
if ($conn->connect_error) 
{
    die("数据库连接失败: " . $conn->connect_error);
}

// 构建查询语句

//students作为主表，course_selection作为从表，通过course_selection中的course_id和student_id来连接两个表
//As s 给students表起一个别名s，As cs 给course_selection表起一个别名cs
//SELECT s.name AS student_name, s.id_card, s.contact 从students表中选择name，id_card，contact三个字段
//s.name as student_name 将s.name字段重命名为student_name


//如果class_id和course_id都不为空，则查询出class_id和course_id都符合的学生
if(!empty( $_POST['class_id']) && !empty($_POST['course_id']))
{
    $sql = "SELECT s.name AS student_name, s.id_card, s.contact
        FROM students AS s
        INNER JOIN course_selection AS cs ON s.id = cs.student_id
        WHERE s.class_id = $class_id AND cs.course_id = $course_id AND cs.score < 60";
}
//如果class_id不为空，course_id为空，则查询出class_id符合的学生
else if(!empty( $_POST['class_id']) && empty($_POST['course_id']))
{
    $sql = "SELECT s.name AS student_name, s.id_card, s.contact
        FROM students AS s
        INNER JOIN course_selection AS cs ON s.id = cs.student_id
        WHERE s.class_id = $class_id AND cs.score < 60";
}
//如果class_id为空，course_id不为空，则查询出course_id符合的学生
else if(empty( $_POST['class_id']) && !empty($_POST['course_id']))
{
    $sql = "SELECT s.name AS student_name, s.id_card, s.contact
        FROM students AS s
        INNER JOIN course_selection AS cs ON s.id = cs.student_id
        WHERE cs.course_id = $course_id AND cs.score < 60";
}
//如果class_id和course_id都为空，则查询出所有不及格的学生
else
{
    $sql = "SELECT s.name AS student_name, s.id_card, s.contact
        FROM students AS s
        INNER JOIN course_selection AS cs ON s.id = cs.student_id
        WHERE cs.score < 60";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
    echo "<h2>补考名单</h2>";
    echo "<table>";
    echo "<tr><th>学生姓名</th><th>身份证号</th><th>联系方式</th></tr>";
    
    while ($row = $result->fetch_assoc()) 
    {
        $student_name = $row['student_name'];
        $id_card = $row['id_card'];
        $contact = $row['contact'];
        
        echo "<tr><td>$student_name</td><td>$id_card</td><td>$contact</td></tr>";
    }
    
    echo "</table>";
} 
else 
{
    echo "未找到相关记录";
}




// 关闭数据库连接
$conn->close();
?>
