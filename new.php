<?php 
$host="localhost";
$user="root";
$password='';
$dbname="shop";
$conn= mysqli_connect($host,$user,$password,$dbname);
// $insert= "INSERT INTO `products` values(1,'ali',136546853,1221)";
// $i= mysqli_query($conn , $insert);
// $update= "UPDATE `products` SET `name` = new where `id` = ";
// $u= mysqli_query($conn , $update);
$delete= "DELETE from `products` where `id` = 1";
$d= mysqli_query($conn , $delete);
$select= "SELECT * from `products`";
$s= mysqli_query($conn , $select);

if($d){
    echo "True conn";
}else{
    echo "False conn";
};

?>