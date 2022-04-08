<?php
//    $action = $_POST["Action"];
//    $title = $_POST["Title"];
//    $number = $_POST["Number"];
//    $taxes = $_POST["Taxes"];
//    $ads = $_POST["Ads"];
//    $discount = $_POST["Discount"];
//    $count = $_POST["Count"];
//    $category = $_POST["Category"];

//    function getDatabaseConnexion() {
//         try {
//             $user = "root";
//             $pass = "";
//             $pdo = new PDO('mysql:host=localhost;dbname=pr_db', $user, $pass);
//             $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//             return $pdo;
            
//         } catch (PDOException $e) {
//             print "Erreur !: " . $e->getMessage() . "<br/>";
//             die();
//         }
//     }
//     function getAllProducts() {
// 		$con = getDatabaseConnexion();
// 		$requete = 'SELECT * from products';
// 		$rows = $con->query($requete);
// 		return $rows;
// 	}

//     function createProduct($Model, $Price, $Taxes, $Ads, $Discount, $Totle, $Category) {
// 		try {
// 			$con = getDatabaseConnexion();
// 			$sql = "INSERT INTO products (Model, Price, Taxes, Ads, Discount, Totle, Category) 
// 					VALUES ('$Model', '$Price', '$Taxes' ,'$Ads', '$Discount', '$Totle', '$Category')";
// 	    	$con->exec($sql);
// 		}
// 	    catch(PDOException $e) {
// 	    	echo $sql . "<br>" . $e->getMessage();
// 	    }
// 	}
//     function readProduct($id) {
// 		$con = getDatabaseConnexion();
// 		$requete = "SELECT * from products where IdProduct = '$id' ";
// 		$stmt = $con->query($requete);
// 		$row = $stmt->fetchAll();
// 		if (!empty($row)) {
// 			return $row[0];
// 		}	
// 	}

   // $connect = new PDO('mysql:host=localhost;dbname=pr_db', 'root', '');

    try {
            $user = "root";
            $pass = "";
            $connect = new PDO('mysql:host=localhost;dbname=pr_db', $user, $pass);
            $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }

?>