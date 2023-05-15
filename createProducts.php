<?php 
include ('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $productCode = $_POST['productCode'];
    $productName = $_POST['productName'];
    $productLine = $_POST['productLine'];
    $productScale = $_POST['productScale'];
    $productVendor = $_POST['productVendor'];
    $productDescription = $_POST['productDescription'];
    $quantityInStock = $_POST['quantityInStock'];
    $buyPrice = $_POST['buyPrice'];
    $MSRP = $_POST['MSRP'];

    //query untuk menambah data
    $query = $koneksi->prepare ("INSERT INTO products (productCode, productName, productLine, productScale, productVendor, productDescription, quantityInStock, buyPrice, MSRP) 
        VALUES ('$productCode', '$productName', '$productLine', '$productScale', '$productVendor', '$productDescription', '$quantityInStock', '$buyPrice', '$MSRP')");

    //binding data
    $query->bindParam(':productCode',$productCode);
    $query->bindParam(':productName',$productName);
    $query->bindParam(':productLine',$productLine);
    $query->bindParam(':productScale',$productScale);
    $query->bindParam(':productVendor',$productVendor);
    $query->bindParam(':productDescription',$productDescription);
    $query->bindParam(':quantityInStock',$quantityInStock);
    $query->bindParam(':buyPrice',$buyPrice);
    $query->bindParam(':MSRP',$MSRP);

    //eksekusi query
    if($query->execute()) {
        $status = 'ok';
    } else {
        $status = 'err';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE PRODUCTS</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelProducts.php"; ?>">TABEL PRODUCTS</a>
        </li>        
    </ul>

    <main role="main">
    <?php 
        if ($status=='ok') {
            echo '<br><div>Data products berhasil disimpan </div>';
        } elseif ($status=='err') {
            echo '<br><div>Data products gagal disimpan</div>';
        }
    ?>

    <h2>CREATE PRODUCTS</h2>
    <form action="createProducts.php" method = "POST">
    <div class="form-group">
        <label>Product Code</label>
        <input type="text" class="form-control" placeholder="Product Code" name="productCode" required="required">        
    </div>
    
    <div class="form-group">
        <label>Product Name</label>
        <input type="text" class="form-control" placeholder="Product Name" name="productName" required="required">
    </div>

    <div class="form-group">
        <label>Product Line</label>
        <input type="text" class="form-control" placeholder="Product Line" name="productLine" required="required">
    </div>

    <div class="form-group">
        <label>Product Scale</label>
        <input type="text" class="form-control" placeholder="Product Scale" name="productScale" required="required">
    </div>

    <div class="form-group">
        <label>Product Vendor</label>
        <input type="text" class="form-control" placeholder="Product Vendor" name="productVendor" required="required">
    </div>

    <div class="form-group">
        <label>Product Description</label>
        <input type="text" class="form-control" placeholder="Product Description" name="productDescription" required="required">
    </div>

    <div class="form-group">
        <label>Quantity In Stock</label>
        <input type="text" class="form-control" placeholder="Quantity In Stock" name="quantityInStock" required="required">
    </div>

    <div class="form-group">
        <label>Buy Price</label>
        <input type="text" class="form-control" placeholder="Buy Price" name="buyPrice" required="required">
    </div>

    <div class="form-group">
        <label>MSRP</label>
        <input type="text" class="form-control" placeholder="MSRP" name="MSRP" required="required">        
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    </form>        
    </main>

</body>
</html>