<?php
include "cr.php";

if(isset($_POST['create'])){

    $Model = $_POST['Title'];
    $Price = $_POST['Price'];
    $Taxes = $_POST['Taxes'];
    $Ads = $_POST['Ads'];
    $Discount = $_POST["Discount"];
    $Category = $_POST["Category"];

    if($Model != '' & $Price != '' & $Taxes != '' & $Ads != '' & $Category !=''){
    $Total = $Price + $Taxes + $Ads - $Discount;


    $stmt = $connect -> prepare('INSERT INTO products (Model, Price, Taxes, Ads, Discount, Totle, Category) 
    VALUES (:Model, :Price, :Taxes , :Ads, :Discount, :Totle, :Category)');
    $stmt->bindValue('Model', $Model);
    
    $stmt->bindValue('Price', $Price);
    $stmt->bindValue('Taxes', $Taxes);
    $stmt->bindValue('Ads', $Ads);
    $stmt->bindValue('Discount', $Discount);
    $stmt->bindValue('Totle', $Total);
    $stmt->bindValue('Category', $Category);



    $stmt->execute();
    header('location:crud.php');
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'delete'){
    $stmt = $connect->prepare('DELETE FROM products where IdProduct = :id');
    $stmt->bindValue('id', $_GET['idproduct']);
    $stmt->execute();
}




$stmt = $connect ->prepare('SELECT * FROM products');
$stmt->execute();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>CRUD</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class="crud">
            <div class="head">
                <h2>crud</h2>
                <p>Product Management System</p>
            </div>
            <div class="inputs">
                <form autocomplete="off" method="post" id="idSearch">   
                    <input placeholder="Model"  type="text" name="Title" id="title">
                    <div class="price">
                        <input onkeyup="getTotle()" type="number" id="price" name="Price" placeholder="Price">
                        <input onkeyup="getTotle()" type="number" id="texes" name="Taxes" placeholder="Texes">
                        <input onkeyup="getTotle()" type="number" id="ads" name="Ads" placeholder="Ads">
                        <input onkeyup="getTotle()" type="number" id="discount" name="Discount" placeholder="Discount">
                        <small id="total"></small>
                    </div>
                    <input type="text" id="category" name="Category" placeholder="Category">
                    <input type="hidden" name="Action">
                    <button type="submit" id="submit" name="create" value="create">Create</button>

                </form>
            </div>
            <div class="outputs">
               <!-- <div class="searchBlock">
                    <input type="text" placeholder="Search" id="search">
                    <div class="btnSearch">
                        <button id="searchTitle">Search By Title</button>
                        <button id="searchCategory">Search By Category</button>
                    </div>                 -->
                </div>
                <table>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>price</th>
                        <th>taxes</th>
                        <th>ads</th>
                        <th>discount</th>
                        <th>totle</th>
                        <th>category</th>
                        <th>update</th>
                        <th>delete</th>
                    </tr>
                    <?php 
                    while ($product = $stmt->fetch(PDO::FETCH_OBJ)) {?>
                    <tbody>
                        <tr>
                            <td><?php echo strval($product->IdProduct); ?></td>
                            <td><?php echo strval($product-> Model); ?></td>
                            <td><?php echo strval($product-> Price); ?></td>
                            <td><?php echo strval($product-> Taxes); ?></td>
                            <td><?php echo strval($product-> Ads); ?></td>
                            <td><?php echo strval($product-> Discount); ?></td>
                            <td><?php echo strval($product-> Totle); ?></td>
                            <td><?php echo strval($product-> Category); ?></td>
                            <td>
                                <a href="update.php?idproduct=<?php echo $product->IdProduct;?>"><img src='refresh.png'></a>
                            </td>
                            <td>
                                <a href="crud.php?idproduct=<?php echo $product->IdProduct;?>&action=delete"><img src="x-button.png"></a>
                            </td>
                        </tr>
                        <?php }?>
                    </tbody>
                </table>
             
            </div>

        </div>
    </body>
    <script src="main.js"></script>
</html>