
$("#searchForm").submit(function (e) {
    e.preventDefault();
    

    let dataForm = new FormData(this);

    $.ajax({
        url: "backend/search.php",
        type: "POST",
        data: dataForm,
        success: function (data){
        showStudents(data);
          $.ajax({
            url: "components/pagination.php",
            type: "post",
            data: dataForm,
          success: function (data) {
    $(".pagination").html("");

        $(".pagination").html(data);

},
error: function () {
    console.log("failed pagination");
}
          
          })

        },
        error: function (error){
           
            
            Swal.fire({
  icon: "error",
  title: "Oops...",
  text: error['responseJSON']['message'],

});
        },
    })
})













function showStudents(students){
  console.log(students.length)
    $("tbody").html("");
    let tbodyContent = "";
    
if(students.length <= 0){
tbodyContent = `<tr>
        <td colspan="8" style="text-align: center;">
            No data found
        </td>
    </tr>`
}else{
  
    for (i=0;i<students.length;i++){

      let  shortpass = students[i]['password'].slice(0,15);
        tbodyContent += `
        <tr data-student-id = '${students[i]['id']}'>
      <th>${students[i]['id']}</th>
      <td>${students[i]['first_name']}</td>
      <td>${students[i]['last_name']}</td>
      <td>${students[i]['email']}</td>
      <td>${shortpass}</td>
      <td>${students[i]['age']}</td>
      <td>${students[i]['phone']}</td>

        <td>
        <div class='buttons'>
        <a href='editStudent.php?student_id=${students[i]['id']}' class='btn btn-info text-light'>Edit</a>
        <button class='btn btn-danger' onclick='deleteStudent(${students[i]['id']})'>Delete</button>

        </div>
        </td>
      </tr>
        `;
    }
}


    
    $("tbody").html(tbodyContent);
}


function deleteStudent(student_id){
Swal.fire({
  title: "Are you sure?",
  text: "You won't be able to revert this!",
  icon: "warning",
  showCancelButton: true,
  confirmButtonColor: "#3085d6",
  cancelButtonColor: "#d33",
  confirmButtonText: "Yes, delete it!"
}).then((result) => {
  if (result.isConfirmed) {

let dataform = {
    "student_id" : student_id
}

$.ajax({
    url: "backend/deleteStudent.php",
    type: "POST",
    data : dataform,
     success: function (data){
        $(`tr[data-student-id="${student_id}"]`).remove();
         Swal.fire({
    title: "Deleted!",
    text: "Student has been deleted.",
    icon: "success"
  });

        },
        error: function (error){
             Swal.fire({
  icon: "error",
  title: "Oops...",
  text: error['responseJSON']['message'],

});
        }

});





   
  }
});
}