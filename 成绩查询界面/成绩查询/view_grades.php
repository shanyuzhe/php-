<?php
include 'config.php';

// 查询学生的成绩信息
function getStudentGrades($student_id) 
{
    global $conn;
   
    //从课程表的courses.course_name和course_selection.score中查询学生的成绩信息
   //使用INNER JOIN连接两个表
   //使用WHERE子句限制查询结果
   //因为courses中有课程名称，course_selection中有分数 和 id
   //所以用courses.course_name和course_selection.score WHERE course_selection.student_id = '$student_id'
    //ON的意思是连接两个表的条件是courses.course_id = course_selection.course_id
    //也就是说课程表的课程id和选课表的课程id相同的时候，就可以连接两个表了
    //（链接course_selection表和courses表，条件是course_selection表的course_id和courses表的course_id相同）
    //这样就可以从课程表的courses.course_name和course_selection.score中查询学生的成绩信息

   $sql = "SELECT courses.course_name, course_selection.score
            FROM courses
            INNER JOIN course_selection ON courses.course_id = course_selection.course_id
            WHERE course_selection.student_id = '$student_id'";
   
   $result = $conn->query($sql);

    if ($result->num_rows > 0) //行数大于0的话
    {
        echo "<h2>学生ID: $student_id</h2>";
        echo "<table>";
        echo "<tr><th>课程名称</th><th>成绩</th></tr>";

        //fetch_assoc() 函数从结果集中取得一行作为关联数组。
        //就是遍历表中的每一行，然后把每一行的数据都放到$row中
        while ($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>" . $row['course_name'] . "</td><td>" . $row['score'] . "</td></tr>";
        }
        echo "</table>";
    } 
    
    else 
    {
        echo "未找到学生的成绩信息";
    }
}

// 查询指定班级、指定课程的成绩信息
function getClassCourseGrades($class_id, $course_id) {
    global $conn;
    //我们要做的是什么?
    //查询指定班级、指定课程的成绩信息
    
    //成绩信息包含学生姓名和成绩：
    //SELECT students.name, course_selection.score
    //这是我们要展示的信息
    
    //我们要从哪些表中查询?
    //姓名从哪来?从学生表中查询
    //成绩从哪来?从选课表中查询
    
    //限制条件是什么？
    //指定班级、指定课程
    //WHERE students.class_id = '$class_id' 
    //AND course_selection.course_id = '$course_id'"
    
    //连接条件是什么？
    //学生表的id和选课表的id相同 （学号相同）
    //INNER JOIN course_selection ON students.id = course_selection.student_id

    //SELECT students.name, course_selection.score
    //总结一下就是从学生表和选课表中查询学生姓名和成绩，
    //限制条件是班级和课程，连接条件是学号相同

    $sql = "SELECT students.name, course_selection.score
            FROM students
            INNER JOIN course_selection ON students.id = course_selection.student_id
            WHERE students.class_id = '$class_id' AND course_selection.course_id = '$course_id'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) 
    {
        echo "<h2>班级ID: $class_id，课程ID: $course_id</h2>";
        echo "<table>";
        echo "<tr><th>学生姓名</th><th>成绩</th></tr>";
        
        //fetch_assoc() 函数从结果集中取得一行作为关联数组。
        while ($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>" . $row['name'] . "</td><td>" . $row['score'] . "</td></tr>";
        }
        echo "</table>";
    } 
    else 
    {
        echo "未找到班级和课程的成绩信息";
    }
}

// 查询指定学生所有课程的成绩信息
function getAllCoursesGrades($student_id) 
{
    global $conn;
    
    $sql = "SELECT courses.course_name, course_selection.score
            FROM courses
            INNER JOIN course_selection ON courses.course_id = course_selection.course_id
            WHERE course_selection.student_id = '$student_id'";
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0)
     {
        echo "<h2>学生ID: $student_id</h2>";
        echo "<table>";
        echo "<tr><th>课程名称</th><th>成绩</th></tr>";
        
        while ($row = $result->fetch_assoc()) 
        {
            echo "<tr><td>" . $row['course_name'] . "</td><td>" . $row['score'] . "</td></tr>";
        }

        echo "</table>";
    }
    else 
    {
        echo "未找到学生的成绩信息";
    }
}


if($_POST['student_id'] != null)
{
    $student_id = $_POST['student_id'];
    getAllCoursesGrades($student_id);
}
else if($_POST['class_id'] != null && $_POST['course_id'] != null)
{
    $class_id = $_POST['class_id'];
    $course_id = $_POST['course_id'];
    getClassCourseGrades($class_id, $course_id);
}
else
{
    echo "未提供查询条件，无法查询成绩信息！";
}


$conn->close();
?>
