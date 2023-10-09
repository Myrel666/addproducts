<?php 

include 'connection.php';

$productname = $_POST['product_name'];

// Buat kueri SQL untuk mengambil atribut 'name' dari tabel 'items'
$sql = "SELECT name FROM items";
$stmt = $conn->query($sql);

// Mengambil hasil kueri dalam bentuk array
$items = $stmt->fetchAll(PDO::FETCH_COLUMN);

foreach ($productname as $key => $value) {
    $sql = "INSERT INTO items(name, price, quantity) VALUES (:name, :price, :qty)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        'name'  =>$value,
        'price' =>$_POST['product_price'][$key],
        'qty'=>$_POST['product_qty'][$key]
    ]);
}

echo 'Items Inserted Successfully!'

?>