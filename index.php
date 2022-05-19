<?php 
$host="localhost";
$user="root";
$password='';
$dbname="shop";
$conn = mysqli_connect($host,$user,$password,$dbname);
$name = '';
$category = '';
$price = '';
$update = false;
if(isset($_POST['send'])){
  $name = $_POST['Name'];
$category = $_POST['category'];
$price = $_POST['Price'];
$insert = "INSERT INTO `products` VALUES(null,'$name','$category',$price)";
$i = mysqli_query($conn , $insert);
if($i){
    echo "<div class='alert alert-info mx-auto w-50'>
    insert done to database
    </div>";
    
}else {
    echo "<div class='alert alert-danger mx-auto w-50'>
    insert Failed to database
    </div>";   
}
}
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $delete= "DELETE from `products` where `id` = $id";
    $d= mysqli_query($conn , $delete);
if($d){
    echo "<div class='alert alert-info mx-auto w-50'>
    delete done to database
    </div>";
    
}else {
    echo "<div class='alert alert-danger mx-auto w-50'>
    delete Failed to database
    </div>";   
}
}
if (isset($_GET['edit'])) {
    $update = true;
    $id = $_GET['edit'];
    $select = "SELECT * from `products` where id = $id";
    $ss = mysqli_query($conn,$select);
    $data = mysqli_fetch_assoc($ss);
    $name = $data['name'];
    $category = $data['category'];
    $price = $data['price'];
if (isset($_POST['update'])) {
    $name = $_POST['Name'];
    $category = $_POST['category'];
    $price = $_POST['Price'];
    $update= "UPDATE `products` SET `name` = '$name',`category` = '$category', `price` = '$price' where `id` = $id";
    $u= mysqli_query($conn , $update);

}
}
$select= "SELECT * from `products`";
$s= mysqli_query($conn , $select);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="stylesheet" href="./main.css">

    <title>Document</title>
</head>
<body>
            <section class="vh-100 bg-image w-800">
	<div class="mask d-flex align-items-center h-100 gradient-custom-3">
	  <div class="container h-100">
		<div class="row d-flex justify-content-center align-items-center h-100">
		  <div class="col-12 col-md-9 col-lg-7 col-xl-6">
			<div class="card" style="border-radius: 15px;">
			  <div class="card-body p-5">
				<h2 class="text-uppercase text-center mb-5">Create an account</h2>
				  <div class="form-outline mb-4">
            <form method="POST">
					<input type="text" id="form3Example1cg" name="Name"  class="form-control form-control-lg" placeholder="Your Name">
				  <div class="form-outline mb-4">
					<input type="categoryword" id="form3Example4cg" name="category" class="form-control form-control-lg" placeholder="category">
				  </div>
                 <div class="form-outline mb-4">
					<input type="number" id="form3Example3cg" name="Price" class="form-control form-control-lg" placeholder="Your price">
                 </div>
				  <div class="d-flex justify-content-center">
                      <?php if($update):?>
					<button type="submit" name="update" class="btn btn-primary btn-block btn-lg gradient-custom-4 text-body">Update Data</button><br>
					<?php else :?>
                    <button type="submit" name="send" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Send Data</button>
				 <?php endif; ?>
                </div>
				</form>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
  </section>
  <div class="container">
   <div class="card">
     <div class="card-body">
     <table class="table table-dark">
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>category</th>
        <th>Price</th>
        <th columespan="2">action</th>
      </tr>
      <?php foreach($s as $data){?>
      <tr>
        <td> <?php echo $data['id'] ?> </td>
        <td> <?php echo $data['name'] ?> </td>
        <td> <?php echo $data['category'] ?> </td>
        <td> <?php echo $data['price'] ?> </td>
        <td><a onclick="return confirm('Are You Sure ? ')" name="delete" href="index.php?delete=<?php echo $data['id']?>" class="btn btn-danger">Delete</a></td><br>
        <td><a  name="edit" href="index.php?edit=<?php echo $data['id']?>" class="btn btn-info">Edit</a></td>
      </tr>
      <?php };?>
    </table>
     </div>
   </div>
  </div>
</div>      
    </div>
</body>
</html>