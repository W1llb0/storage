<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');
$search = $_GET['search'];
// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}


$query = "SELECT * FROM customers
WHERE customers.CustomerName LIKE '%$search%'
OR customers.SpeakTo LIKE '%$search%'
OR customers.Post LIKE '%$search%'
OR customers.Address LIKE '%$search%'
OR customers.Phone LIKE '%$search%'";


$result = mysqli_query($conn, $query);


echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['CustomerName'] == $search ||
    $row['SpeakTo'] == $search ||
    $row['Post'] == $search ||
    $row['Address'] == $search ||
    $row['Phone'] == $search
    ){
        echo "<tr>";
        echo "<td>" . $row['CustomerName'] . "</td>";
        echo "<td>" . $row['SpeakTo'] . "</td>";
        echo "<td>" . $row['Post'] . "</td>";
        echo "<td>" . $row['Address'] . "</td>";
        echo "<td>" . $row['Phone'] . "</td>";
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