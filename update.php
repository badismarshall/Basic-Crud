<?php
include "cr.php";
$stmt = $connect->prepare('SELECT * FROM products where IdProduct = :id');
$stmt->bindValue('id',$_GET['idproduct']);
$stmt->execute();
$product = $stmt->fetch(PDO::FETCH_OBJ);

if(isset($_POST['create'])){

    $stmt = $connect->prepare('UPDATE products SET  
    Model = :model, Price = :price, Taxes = :taxes, Ads = :ads, Discount = :discount, Totle = :totle, Category = :category WHERE IdProduct = :id');
    $stmt->bindValue('id',$_POST['id']);
    $stmt->bindValue('model',$_POST['Title']);
    $stmt->bindValue('price',$_POST['Price']);
    $stmt->bindValue('taxes',$_POST['Taxes']);
    $stmt->bindValue('ads',$_POST['Ads']);
    $stmt->bindValue('discount',$_POST['Discount']);
    $stmt->bindValue('category',$_POST['Category']);


    $Price = $_POST['Price'];
    $Taxes = $_POST['Taxes'];
    $Ads = $_POST['Ads'];
    $Discount = $_POST["Discount"];

    $Total = $Price + $Taxes + $Ads - $Discount;

    $stmt->bindValue('totle',$Total);

    $stmt -> execute();
    header("location:crud.php");

}

?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CRUD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style2.css">
    </head>
    <body>
        <div class="crud">
            <div class="head">
                <h2>crud</h2>
                <p>Product Management System</p>
            </div>
            <div class="inputs">
                <form autocomplete="off" method="post" id="idSearch">   
                    <input placeholder="Model"  type="text" name="Title" id="title" value="<?php echo $product->Model; ?>">
                    <div class="price">
                        <input onkeyup="getTotle()" type="number" id="price" name="Price" placeholder="Price" value="<?php echo $product->Price; ?>">
                        <input onkeyup="getTotle()" type="number" id="texes" name="Taxes" placeholder="texes" value="<?php echo $product->Taxes; ?>">
                        <input onkeyup="getTotle()" type="number" id="ads" name="Ads" placeholder="ads" value="<?php echo $product->Ads; ?>">
                        <input onkeyup="getTotle()" type="number" id="discount" name="Discount" placeholder="discount" value="<?php echo $product->Discount; ?>">
                        <small id="total"><?php echo $product->Totle; ?></small>
                    </div>
                    <input type="text" id="category" name="Category" placeholder="category" value="<?php echo $product->Category; ?>">
                    <input type="hidden" name="id" value="<?php echo $product->IdProduct ?>">
                    <button type="submit" id="submit" name="create" value="create">Update</button>
                </form>
            </div>
        </div>
    </body>
    <script src="main.js"></script>
</html>


