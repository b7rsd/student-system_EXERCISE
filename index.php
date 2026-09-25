
<?php
session_start();


require_once __DIR__ . "/backend/helper.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">

<style>
    body{
        background-color: #19283D;
    }
</style>

</head>
<body class="text-light">
    
<div id="register" class="pt-5" >
    <div class="header text-center">
        <img src="assets/logo.png" alt="">
    </div>
    <div class="body">


    <form class="w-50 m-auto" action="./backend/register.php" method="POST">
        <div class="row">
                                    

             <div class="col-lg-6 mb-3">
                <div class="item">
                    <div class="mb-3">
                         <label for="FirstName" class="form-label">First Name</label>
                         <input type="text" class="form-control" id="FirstName" name="firstName" value="<?= old('firstName') ?>">
                         <?= getError("firstName") ?>
                     </div>
                </div>
            </div>
            <div class="col-lg-6 mb-3">
                <div class="item">
                    <div class="mb-3">
                         <label for="LastNLastame" class="form-label">Last Name</label>
                         <input type="text" class="form-control" id="LastName" name="lastName" value="<?= old('lastName') ?>">
                        <?= getError("lastName") ?>
                     </div>
                </div>
            </div>


            <div class="col-lg-6 mb-3">
                <div class="item">
                    <div class="mb-3">
                         <label for="Email" class="form-label">Email</label>
                         <input type="email" class="form-control" id="Email" name="email" value="<?= old('email') ?>">
                         <?= getError("email") ?>
                     </div>
                </div>
            </div>
             <div class="col-lg-6 mb-3">
                <div class="item">
                    <div class="mb-3">
    <label for="Password" name="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="Password" name="password" value="<?= old('password') ?>">
       <?= getError("password") ?>
  </div>
                </div>
            </div>

             <div class="col-lg-6 mb-3">
                <div class="item">
                    <div class="mb-3">
                         <label for="Age" class="form-label">Age</label>
                         <input type="numberPhone" class="form-control" id="Age" name="age" value="<?= old('age') ?>">
                         <?= getError("age") ?>
                     </div>
                </div>
            </div>

             <div class="col-lg-6 mb-3">
                <div class="item">
                    <div class="mb-3">
                         <label for="Phone" class="form-label">Phone</label>
                         <input type="text" class="form-control" id="Phone" name="phone" value="<?= old('phone') ?>">
                         <?= getError("phone") ?>
                     </div>
                </div>
            </div>
            
            
        </div>
  

 
  <button type="submit" class="btn btn-success w-100 mb-3">Add</button>
</form>



    </div>
    
</div>


    <div class="search" class="py-5">
       <form class="w-25 m-auto" id="searchForm">
       <div class="mb-3">
                         <label for="Search" class="form-label">Search</label>
                         <input type="text" class="form-control" id="Search" name="search">
                     </div>

 
  <button type="submit" class="btn btn-success w-100 mb-3">Search</button>
</form>


</div>

<div id="data">
   <div class="table-responsive w-75 m-auto">
     <table class="table table-striped">
  <thead class="table-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Age</th>
      <th scope="col">Phone</th>
      <th scope="col">Options</th>
    </tr>
  </thead>
  <tbody>
    <?php include __DIR__ . "/components/trStudent.php" ?>
  </tbody>
</table>
<nav aria-label="Page navigation example">
  <ul class="pagination">
    <?php include __DIR__ . "/components/paganation.php" ?>
  </ul>
</nav>
   </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
<script   src="https://code.jquery.com/jquery-4.0.0.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="js/index.js"></script>
</body>
</html>