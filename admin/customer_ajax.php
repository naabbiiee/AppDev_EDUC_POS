<?php
include('config/pdoconfig.php');

if (!empty($_POST["custName"])) {
    $id = $_POST['custName'];
    $stmt = $DB_con->prepare("SELECT * FROM  pos_customers WHERE customer_name = :id");
    $stmt->execute(array(':id' => $id));
?>

<?php
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
?>
<?php echo htmlentities($row['customer_id']); ?>
<?php
    }
}
