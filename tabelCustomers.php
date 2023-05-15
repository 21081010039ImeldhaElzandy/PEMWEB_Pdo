<?php
    include ('koneksi.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>CUSTOMERS</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "createCustomers.php"; ?>">CREATE CUSTOMERS</a>
        </li>   
    </ul>

    <h2>TABLE CUSTOMERS</h2>
    <main>
        <div>
            <table border=1px>
                <thead bgcolor=silver>
                    <tr>
                        <th> <p> customerNumber</th>
                        <th>customerName</th>
                        <th>contactLastName</th>
                        <th>contactFirstName</th>
                        <th>phone</th>
                        <th>addressLine1</th>
                        <th>addressLine2</th>
                        <th>city</th>
                        <th>state</th>
                        <th>postalCode</th>
                        <th>country</th>
                        <th>salesRepEmployeeNumber</th>
                        <th>creditLimit</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        $query = "SELECT * FROM customers";
                        $result = $koneksi->query($query);
                    ?>
                            
                    <?php while($data = $result->fetch(PDO::FETCH_ASSOC) ): ?>
                        <tr>
                            <td> <?php echo $data['customerNumber']; ?> </td>
                            <td> <?php echo $data['customerName']; ?> </td>
                            <td> <?php echo $data['contactLastName']; ?> </td>
                            <td> <?php echo $data['contactFirstName']; ?> </td>
                            <td> <?php echo $data['phone']; ?> </td>
                            <td> <?php echo $data['addressLine1']; ?> </td>
                            <td> <?php echo $data['addressLine2']; ?> </td>
                            <td> <?php echo $data['city']; ?> </td>
                            <td> <?php echo $data['state']; ?> </td>
                            <td> <?php echo $data['postalCode']; ?> </td>
                            <td> <?php echo $data['country']; ?> </td>
                            <td> <?php echo $data['salesRepEmployeeNumber']; ?> </td>
                            <td> <?php echo $data['creditLimit']; ?> </td>
                            <td>
                                <a href="<?php echo "createCustomers.php?customerNumber=".$data['customerNumber'] ?>"> Create</a> &nbsp;&nbsp;
                                <a href="<?php echo "updateCustomers.php?customerNumber=".$data['customerNumber'] ?>"> Update</a> &nbsp;&nbsp;
                                <a href="<?php echo "deleteCustomers.php?customerNumber=".$data['customerNumber'] ?>"> Delete</a>
                            </td>
                        </tr>
                    <?php endwhile ?>
                </tbody>
            </table>
        </div>    
    </main>
</body>
</html>