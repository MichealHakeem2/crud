<?php
$host="localhost";
$user="root";
$password='';
$dbname="shop";
$conn = mysqli_connect($host,$user,$password,$dbname);
$error = [];
if ($_SERVER ['REQUEST_METHOD']  == "POST") {
if(isset($_GET['send'])){
  $name = $_GET['Name'];
$category = $_GET['category'];
$price = $_GET['Price'];
    echo $name . $price . $category;
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="container">
    <form>
					<input type="text" name="Name"  class="form-control" placeholder="Your Name">
				  <div class="form-outline mb-4">
					<input type="categoryword" name="category" class="form-control " placeholder="category">
				  </div>
                 <div class="form-outline mb-4">
					<input type="number" id="form3Example3cg" name="Price" class="form-control " placeholder="Your price">
                 </div>
				  <div class="d-flex justify-content-center">
                    <button type="button" name="send" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send Data</button>
                </div>
				</form>
    </div>
    
</body>
</html>