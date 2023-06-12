<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');
$search = $_GET['search'];
// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}


$query = "SELECT * FROM suppliers
WHERE suppliers.SupplierName LIKE '%$search%'
OR suppliers.Phone LIKE '%$search%'
OR suppliers.Adress LIKE '%$search%'";


$result = mysqli_query($conn, $query);


echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['SupplierName'] == $search ||
    $row['Phone'] == $search ||
    $row['Adress'] == $search
    ){
        echo "<tr>";
        echo "<td>" . $row['SupplierName'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
        echo "<td>" . $row['Adress'] . "</td>";
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