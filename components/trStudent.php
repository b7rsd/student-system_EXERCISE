<?php

require_once __DIR__ . "/../backend/getStudents.php";


$page = 1;


if(isset($_GET['page']) && $_GET['page'] > 0){
    $page = $_GET['page'];
}

$students = getStudents("",$page);

$bodyHTML = "";
foreach($students as $student){
    $shortpass = substr($student['password'],0,15);
$bodyHTML .= "


 <tr data-student-id = '{$student['id']}' >
      <th>{$student['id']}</th>
      <td>{$student['first_name']}</td>
      <td>{$student['last_name']}</td>
      <td>{$student['email']}</td>
      <td>{$shortpass}</td>
      <td>{$student['age']}</td>
      <td>{$student['phone']}</td>
        <td>
        <div class='buttons'>
        <a href='editStudent.php?student_id={$student['id']}' class='btn btn-info text-light'>Edit</a>
        <button class='btn btn-danger' onclick='deleteStudent({$student['id']})'>Delete</button>

        </div>
        </td>
    </tr>
";


}

echo $bodyHTML;
