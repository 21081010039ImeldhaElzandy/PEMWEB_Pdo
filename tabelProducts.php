<?php 
    include ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>PRODUCTS</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "createProducts.php"; ?>">CREATE PRODUCTS</a>
        </li>   
    </ul>

    <h2>TABLE PRODUCTS</h2>
    <main>
        <div>
            <table border=1px>
                <thead bgcolor=silver>
                    <tr>
                        <th> <p> productCode</th>
                        <th>productName</th>
                        <th>productLine</th>
                        <th>productScale</th>
                        <th>productVendor</th>
                        <th>productDescription</th>
                        <th>quantityInStock</th>
                        <th>buyPrice</th>
                        <th>MSRP</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM products";
                        $result = $koneksi->query($query);
                    ?>
                            
                    <?php while($data = $result->fetch(PDO::FETCH_ASSOC)) : ?>
                        <tr>
                            <td> <?php echo $data['productCode']; ?> </td>
                            <td> <?php echo $data['productName']; ?> </td>
                            <td> <?php echo $data['productLine']; ?> </td>
                            <td> <?php echo $data['productScale']; ?> </td>
                            <td> <?php echo $data['productVendor']; ?> </td>
                            <td> <?php echo $data['productDescription']; ?> </td>
                            <td> <?php echo $data['quantityInStock']; ?> </td>
                            <td> <?php echo $data['buyPrice']; ?> </td>
                            <td> <?php echo $data['MSRP']; ?> </td>
                            <td>
                                <a href="<?php echo "createProducts.php?productCode=".$data['productCode'] ?>"> Create</a> &nbsp;&nbsp;
                                <a href="<?php echo "updateProducts.php?productCode=".$data['productCode'] ?>"> Update</a> &nbsp;&nbsp;
                                <a href="<?php echo "deleteProducts.php?productCode=".$data['productCode'] ?>"> Delete</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>