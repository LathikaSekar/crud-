<?php
  include "connection.php";
  $id="";
  $student_name="";
  $class="";
  $section="";
  $department="";
  $college="";
  $email="";
  $mobile_no="";

  $error="";
  $success="";

  if($_SERVER["REQUEST_METHOD"]=='GET'){
    if(!isset($_GET['id'])){
      header("location:crud/index.php");
      exit;
    }
    $id = $_GET['id'];
    $sql = "select * from student_table where id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    while(!$row){
      header("location: crud100/index.php");
      exit;
    }
    $student_name=$row["student_name"];
    $class=$row["class"];
    $section=$row["section"];
    $department=$row["department"];
    $college=$row["college"];
    $email=$row["email"];
    $mobile_no=$row["mobile_no"];

  }
  else{
    $id = $_POST["id"];
    $student_name=$_POST["student_name"];
    $class=$_POST["class"];
    $section=$_POST["section"];
    $department=$_POST["department"];
    $college=$_POST["college"];
    $email=$_POST["email"];
    $mobile_no=$_POST["mobile_no"];

    $sql = "update student_table set student_name='$student_name', class='$class', section='$section', department='$department', college='$college', email='$email', mobile_no='$mobile_no' where id='$id'";
    $result = $conn->query($sql);
    
  }
  
?>
<!DOCTYPE html>
<html>
<head>
 <title>CRUD</title>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark" class="fw-bold">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">PHP CRUD OPERATION</a>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="create.php">Add New</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
 <div class="col-lg-6 m-auto">
 
 <form method="post">
 
 <br><br><div class="card">
 
 <div class="card-header bg-warning">
 <h1 class="text-white text-center">  Update Member </h1>
 </div><br>

 <input type="hidden" name="id" value="<?php echo $id; ?>" class="form-control"> <br>

 <label>STUDENT_ NAME: </label>
 <input type="text" name="student_name" value="<?php echo $student_name; ?>" class="form-control"> <br>

 <label> CLASS: </label>
 <input type="text" name="class" value="<?php echo $class; ?>" class="form-control"> <br>

 <label> SECTION: </label>
 <input type="text" name="section" value="<?php echo $section; ?>" class="form-control"> <br>

 <label> DEPARTMENT: </label>
 <input type="text" name="department" value="<?php echo $department; ?>" class="form-control"> <br>

 <label> EMAIL: </label>
 <input type="text" name="email" value="<?php echo $email; ?>" class="form-control"> <br>

 <label> MOBILE_NO: </label>
 <input type="text" name="mobile_no" value="<?php echo $mobile_no; ?>" class="form-control"> <br>

 <button class="btn btn-success" type="submit" name="submit"> Submit </button><br>
 <a class="btn btn-info" type="submit" name="cancel" href="index.php"> Cancel </a><br>

 </div>
 </form>
 </div>
</body>
</html>