<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');
$search = $_GET['search'];
// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}


$query = "SELECT * FROM products
WHERE products.ProductName LIKE '%$search%'
OR products.Units LIKE '%$search%'
OR products.Quantity LIKE '%$search%'
OR products.Price LIKE '%$search%'
OR products.Provider LIKE '%$search%'
OR products.CustomerName LIKE '%$search%'
OR products.SellDate LIKE '%$search%'
OR products.Note LIKE '%$search%'
OR products.PurchaseDate LIKE '%$search%'";


$result = mysqli_query($conn, $query);


echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['ProductName'] == $search ||
    $row['Units'] == $search ||
    $row['Quantity'] == $search ||
    $row['Price'] == $search ||
    $row['Provider'] == $search ||
    $row['CustomerName'] == $search ||
    $row['SellDate'] == $search ||
    $row['Note'] == $search ||
    $row['PurchaseDate'] == $search
    ){
        echo "<tr>";
        echo "<td>" . $row['ProductName'] . "</td>";
        echo "<td>" . $row['Units'] . "</td>";
        echo "<td>" . $row['Quantity'] . "</td>";
        echo "<td>" . $row['Price'] . "</td>";
        echo "<td>" . $row['Provider'] . "</td>";
        echo "<td>" . $row['CustomerName'] . "</td>";
        echo "<td>" . $row['SellDate'] . "</td>";
        echo "<td>" . $row['Note'] . "</td>";
        echo "<td>" . $row['PurchaseDate'] . "</td>";
        echo "</tr>";
    }
}
echo "</table>";


// Выполнить запрос
if (mysqli_query($conn, $query)) {
    echo "Запись найдена";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрыть соединение с базой данных
mysqli_close($conn);
?>