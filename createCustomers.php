<?php 
include ('koneksi.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customerNumber = $_POST['customerNumber'];
    $customerName = $_POST['customerName'];
    $contactLastName = $_POST['contactLastName'];
    $contactFirstName = $_POST['contactFirstName'];
    $phone = $_POST['phone'];
    $addressLine1 = $_POST['addressLine1'];
    $addressLine2 = $_POST['addressLine2'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $postalCode = $_POST['postalCode'];
    $country = $_POST['country'];
    $salesRepEmployeeNumber = $_POST['salesRepEmployeeNumber'];
    $creditLimit = $_POST['creditLimit'];

    //query untuk menambah data
    $query = $koneksi->prepare ("INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, salesRepEmployeeNumber, creditLimit) 
        VALUES ('$customerNumber', '$customerName', '$contactLastName', '$contactFirstName', '$phone', '$addressLine1', '$addressLine2', '$city', '$state', '$postalCode', '$country', '$salesRepEmployeeNumber', '$creditLimit')");

    //binding data
    $query->bindParam(':customerNumber',$customerNumber);
    $query->bindParam(':customerName',$customerName);
    $query->bindParam(':contactLastName',$contactLastName);
    $query->bindParam(':contactFirstName',$contactFirstName);
    $query->bindParam(':phone',$phone);
    $query->bindParam(':addressLine1',$addressLine1);
    $query->bindParam(':addressLine2',$addressLine2);
    $query->bindParam(':city',$city);
    $query->bindParam(':state',$state);
    $query->bindParam(':postalCode',$postalCode);
    $query->bindParam(':country',$country);
    $query->bindParam(':salesRepEmployeeNumber',$salesRepEmployeeNumber);
    $query->bindParam(':creditLimit',$creditLimit);

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
    <title>CREATE CUSTOMERS</title>
</head>
<body>
    <ul>
        <li>
            <a href="<?php echo "tabelCustomers.php"; ?>">TABEL CUSTOMERS</a>
        </li>        
    </ul>

    <main role="main">
    <?php 
        if ($status=='ok') {
            echo '<br><div>Data customers berhasil disimpan </div>';
        } elseif ($status=='err') {
            echo '<br><div>Data customers gagal disimpan</div>';
        }
    ?>

    <h2>CREATE CUSTOMERS</h2>
    <form action="createCustomers.php" method = "POST">
    <div class="form-group">
        <label>Customer Number</label>
        <input type="text" class="form-control" placeholder="Customer Number" name="customerNumber" required="required">        
    </div>
    
    <div class="form-group">
        <label>Customer Name</label>
        <input type="text" class="form-control" placeholder="Customer Name" name="customerName" required="required">
    </div>

    <div class="form-group">
        <label>Contact Last Name</label>
        <input type="text" class="form-control" placeholder="Contact Last Name" name="contactLastName" required="required">
    </div>

    <div class="form-group">
        <label>Contact First Name</label>
        <input type="text" class="form-control" placeholder="Contact First Name" name="contactFirstName" required="required">
    </div>

    <div class="form-group">
        <label>Phone</label>
        <input type="text" class="form-control" placeholder="Phone Number" name="phone" required="required">
    </div>

    <div class="form-group">
        <label>Address Line 1</label>
        <input type="text" class="form-control" placeholder="Addres Line 1" name="addressLine1" required="required">
    </div>

    <div class="form-group">
        <label>Address Line 2</label>
        <input type="text" class="form-control" placeholder="Addres Line 2" name="addressLine2" required="required">
    </div>

    <div class="form-group">
        <label>City</label>
        <input type="text" class="form-control" placeholder="City" name="city" required="required">
    </div>

    <div class="form-group">
        <label>State</label>
        <input type="text" class="form-control" placeholder="state" name="state" required="required">        
    </div>

    <div class="form-group">
        <label>Postal Code</label>
        <input type="text" class="form-control" placeholder="Postal Code" name="postalCode" required="required">        
    </div>

    <div class="form-group">
        <label>Country</label>
        <input type="text" class="form-control" placeholder="Country" name="country" required="required">
    </div>

    <div class="form-group">
        <label>Sales Rep Employee Number</label>
        <input type="text" class="form-control" placeholder="Sales Rep Employee Number" name="salesRepEmployeeNumber" required="required">        
    </div>

    <div class="form-group">
        <label>Credit Limit</label>
        <input type="text" class="form-control" placeholder="Credit Limit" name="creditLimit" required="required">        
    </div>

    <button type="submit" class="btn btn-primary">Create</button>
    </form>        
    </main>

</body>
</html>