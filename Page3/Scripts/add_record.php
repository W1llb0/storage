<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');

// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}

// Получить данные из формы
$ProductName = $_POST['ProductName'];
$Units = $_POST['Units'];
$Quantity = $_POST['Quantity'];
$Price = $_POST['Price'];
$Provider = $_POST['Provider'];
$CustomerName = $_POST['CustomerName'];
$SellDate = $_POST['SellDate'];
$Note = $_POST['Note'];
$PurchaseDate = $_POST['PurchaseDate'];

// Создать запрос на добавление записи в базу данных
$sql = "INSERT INTO `products` (`ProductName`, `Units`, `Quantity`, `Price`, `Provider` , `CustomerName`, `SellDate`, `Note`, `PurchaseDate`) VALUES ('$ProductName', '$Units', '$Quantity', '$Price', '$Provider', '$CustomerName', '$SellDate', '$Note', '$PurchaseDate')";

// Выполнить запрос
if (mysqli_query($conn, $sql)) {
    echo "Запись успешно добавлена";
} else {
    echo "Ошибка: " . mysqli_error($conn);
}

// Закрыть соединение с базой данных
mysqli_close($conn);
?>