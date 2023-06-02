<?php
    include 'config.php';

// 处理学生选课操作
if (!empty($_POST['student_id']) && !empty($_POST['course_id']))
{
    $student_id = $_POST['student_id'];
    $course_id = $_POST['course_id'];

    //我想看一下corse_id在courses.id中有没有
    //student_id在students.id中有没有
    //如果有的话，就可以插入到course_selection表中了
    
    //课程表的id是courses_id
    //学生表的id是id

    //接收sql语句的返回值用什么函数
    //mysqli_query() 函数执行某个针对数据库的查询
    //函数里写sql语句

    //mysqli_query() 中的两个参数是什么
    //第一个参数是数据库连接 第二个参数是sql语句
    
    $result_c = mysqli_query($conn,"SELECT course_id FROM courses WHERE course_id = '$course_id'");
    $result_s = mysqli_query($conn,"SELECT id FROM students WHERE id = '$student_id'");


    //因为$result_c是一个对象，不能直接输出
    //要用mysqli_fetch_array() 函数从结果集中取得一行作为关联数组。
    //mysqli_fetch_array() 函数从结果集中取得一行作为关联数组。
   
    //不仅要知道学号和课程号是否存在
    //还要确认他们当前的状态是什么
    $student_st = mysqli_query($conn,"SELECT st FROM students WHERE id = '$student_id'");
    $course_st = mysqli_query($conn,"SELECT st FROM courses WHERE course_id = '$course_id'");
    $student_st = mysqli_fetch_array($student_st)['st'];
    $course_st = mysqli_fetch_array($course_st)['st'];

    //如果学生的状态是0的话，就不能选课
    //如果课程的状态是0的话，就不能选课
    $flag = $student_st && $course_st;


    $result_c = mysqli_fetch_array($result_c)['course_id'];
    $result_s = mysqli_fetch_array($result_s)['id'];

    //我想看一下corse_id在courses.id中有没有

    if($course_id == $result_c && $student_id == $result_s && $flag)
    {
    // 在course_selection表中插入选课信息
        $sql = "INSERT INTO course_selection (student_id, course_id) VALUES ('$student_id', '$course_id')";

        //因为student_id和course_id是主键，主键不能重复
        //所以要用INSERT IGNORE INTO
        //INSERT IGNORE INTO 语句插入一条新记录，如果主键列中出现重复值，则会发生错误，但是影响的行数为 0 而不是 1。

        if ($conn->query($sql) === TRUE) 
        {
            echo "选课成功";
        } 
        else
        {
            echo "选课失败: " . $conn->error;
        }

    }

    else//如果学号或者课程号在其他两个数据库中不存在的话
    {
        echo "请输入正确的学号和课程号！";
    }
}
else
{
    echo "请输入完整信息！";
}
$conn->close();
?>
