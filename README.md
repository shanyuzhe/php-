# php- 使用说明

本说明书旨在介绍软件（程序）的使用方法和功能模块结构。请按照以下步骤操作以正确使用该软件（程序）。

## 1. 数据库准备

请按照以下步骤准备数据库：

1. 打开压缩包中的 "mysql" 文件夹。
2. 将该文件夹替换本机的 "C:\xampp\mysql" 文件夹。
3. 替换完成后，您可以查看测试用数据库。

注意事项：

- 数据库中的每条数据都具备 'st' 字段表示此数据的当前状态（'1' 可用，'0' 不可用）。
- 本项目中的所有删除操作均采用逻辑删除，以便后续维护。

### coures表

以下是 coures 表的结构和示例数据：

| course_id | course_name      | editor | publisher          | credits | st   |
| --------- | ---------------- | ------ | ------------------ | ------- | ---- |
| 1         | php program      | wz     | JIANGSU Uniyersity | 4       | 1    |
| 2         | c++ program      | lz     | LianYunGang        | 3       | 1    |
| 3         | Python program   | wp     | LianYunGang        | 2       | 1    |
| 4         | Java program     | yz     | JIANGSU University | 3       | 1    |
| 5         | HTML programming | lz     | LianYunGang        | 2       | 1    |
| 6         | Data Structures  | wp     | LianYunGang        | 3       | 1    |

### students表

以下是 students 表的结构和示例数据：

| id   | name         | gender | age  | id_card            | major_id | class_id | contact     | address      | remarks                | st   |
| ---- | ------------ | ------ | ---- | ------------------ | -------- | -------- | ----------- | ------------ | ---------------------- | ---- |
| 1    | shanyuzhe    | m      | 21   | 231085266657894522 | 23       | 213      | 18045358333 | Heilongjiang | this is a test data    | 1    |
| 2    | Mr.wz        | m      | 42   | 231085266657894526 | 23       | 0        | unknown     | unknown      | he is my teacher wz    | 1    |
| 3    | XiaoMing     | w      | 18   | 231082966657894526 | 23       | 214      | unknown     | unknown      | this data is deleted   | 0    |
| 4    | John Doe     | m      | 25   | 231085266657894523 | 24       | 215      | 1234567890  | New York     | This is a test student | 1    |
| 5    | Jane Smith   | w      | 20   | 231085266657894527 | 24       | 216      | 9876543210  | California   | Test data for Jane     | 1    |
| 6    | Alex Johnson |        |      |                    |          |          |             |              |                        |      |

 m      | 22  | 231082966657894527 | 25       | 217      | 555-123-4567 | Texas        | Test data for Alex    | 1    |
| 7  | Amy Johnson   | w      | 21  | 231082966657894528 | 23       | 213      | 555-987-6543 | California   | Test data for Amy     | 1    |
| 8  | Michael Smith | m      | 20  | 231082966657894529 | 23       | 213      | 999-888-7777 | New York     | Test data for Michael | 1    |
| 9  | Emily Davis   | w      | 22  | 231082966657894530 | 23       | 213      | 123-456-7890 | Texas        | Test data for Emily   | 1    |

### course_selection表

以下是 course_selection 表的结构和示例数据：

| student_id | course_id | score |
| ---------- | --------- | ----- |
| 1          | 1         | NULL  |
| 3          | 1         | NULL  |
| 1          | 1         | NULL  |
| 1          | 1         | NULL  |
| 2          | 1         | NULL  |
| 1          | 2         | 80    |
| 2          | 1         | 7     |
| 3          | 3         | 95    |
| 4          | 1         | 51    |
| 5          | 2         | 72    |
| 6          | 3         | 8     |
| 1          | 3         | 25    |
| 2          | 2         | 98    |
| 3          | 1         | 14    |
| 7          | 1         | 79    |
| 7          | 2         | 52    |
| 8          | 2         | 24    |
| 8          | 3         | 64    |
| 9          | 1         | 48    |
| 9          | 3         | 46    |

## 2. 学生管理界面

### 文件夹: "学生管理界面"

该文件夹包含了所有实现学生管理系统（增加、删除、修改）的 HTML 代码和 PHP 代码。请按照以下步骤操作以正确运行该界面：

1. 将该文件夹中的所有文件复制到 "C:\xampp\htdocs" 目录下。
2. 在 XAMPP 环境下运行 "manage_student.html"。

功能说明：

- "增加"操作：id 是必填项，如果表单中没有输入 id，则插入失败，提示 "未提供学生 id，无法添加学生！"。
- "删除"操作：只需要填入学号即可删除该学生，(注意这是逻辑删除，可以后续恢复)。
- "修改"操作：id 是必填项，如果表单中有未填项，则该列保持不变。

注意事项：

- 如果表单中没有输入 id，则提示 "未提供学号，无法修改学生信息！"

## 3. 课程管理界面

### 文件夹: "课程管理界面"

该文件夹包含了所有实现课程管理系统（增加、删除、修改）的 HTML 代码和 PHP 代码。请按照以下步骤操作以正确运行该界面：

1. 将该文件夹中的所有文件复制到 "C:\xampp\htdocs" 目录下。
2. 在 XAMPP 环境下运行 "manage_course.html"。

功能说明：

- "增加"操作：id 是必填项，如果表单中没有输入 id，则插入失败，提示 "未输入课程 id，插入失败"。
- "删除"操作：只需要填入课程编号即可删除该课程，注意这是逻辑删除，可以后续恢复。
- "修改"操作：id 是必填项，如果表单中有未填项，则该列保持不变。

注意事项：

- 如果表单中没有输入 id，则提示 "未输入课程 id，更新失败"。
- 如果表单中没有输入 id，则提示 "未输入课程 id，删除失败"。

## 4. 学生选课界面

### 文件夹: "学生选课界面"

该文件夹包含了实现学生选课系统的 HTML 代码和 PHP 代码。请按照以下步骤操作以正确运行该界面：

1. 将该文件夹中的所有文件复制到 "C:\xampp\htdocs" 目录下。
2. 在 XAMPP 环境下运行 "select_course.html"。

功能说明：

- 用户需要输入学生 id 和课程 id 进行选课操作。
- 通过 SQL 语句和 mysql_query() 函数判断学生 id 和课程 id 是否正确，如果任意一个 id 不正确，则插入失败。
- 通过 SQL 语句和 mysql_query() 函数判断学生 id 和课程 id 是否为不可用状态（st = 0），如果任意一个 id 不可用，则插入失败。
- 该逻辑保证了用户选课的合法性。
- 如果用户输入信息不全，则提示 "请输入完整信息"。
- 如果用户输入的信息不存在，则提示 "请输入正确的学号和课程号！"

## 5. 成绩查询界面

### 文件夹: "成绩查询界面"



- ## 5. "成绩查询界面"文件夹

  ### 5.0 函数

  ```php
  // 查询指定班级、指定课程的成绩信息
  function getClassCourseGrades($class_id, $course_id)
  // 查询指定学生所有课程的成绩信息
  function getAllCoursesGrades($student_id)
  ```

  ### 5.1 "成绩查询"子文件夹

  - "成绩查询"子文件夹中实现了通过网页查询指定班级某一课程中所有同学的成绩、指定学生所有课程的成绩和指定学生单门课程的成绩的功能，并确保信息完整。
  - "view_grades.php" 文件中包含了查询指定班级某一课程中所有同学的成绩和查询指定学生所有课程的成绩的逻辑。
  - "grade_query.php" 文件中包含了查询指定学生单门课程成绩的逻辑。

  ### 5.2 "补考查询"子文件夹

  - "补考查询"子文件夹中实现了通过网页查询指定班级、指定课程、指定班级和课程以及全部学生的补考名单的功能，以及查询指定学生全部补考科目的功能。
  - "make_up_exam.php" 文件中包含了实现查询指定班级、指定课程、指定班级和课程以及全部学生的补考名单的全部逻辑。其中，使用了四个逻辑分支语句和四个 SQL 语句来实现这四种逻辑。
  - 如果用户只输入了班级 ID，则提供查询指定班级的补考名单。
  - 如果用户只输入了课程 ID，则提供查询指定课程的补考名单。
  - 如果用户同时输入了班级 ID 和课程 ID，则提供查询指定班级和课程的补考名单。
  - 如果用户既未输入班级 ID，也未输入课程 ID，则提供查询全部学生的补考名单。
  - "student_makeup_exam.php" 文件中包含了实现查询指定学生全部补考科目的逻辑。用户需要输入学生 ID，然后可以查询该学生的所有补考科目。

  

  以上是对该软件的使用说明。如果有任何问题或疑问，请随时向我们咨询。

  

  ----------------------------------------------------------------------------------------

  (老师喜欢的话记得给高分喔(●'◡'●))
  姓名:单玉喆
  学号:210507345
  邮箱:syz277527@icloud.com
  电话:18045358333
