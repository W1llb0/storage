<?php
// Подключиться к базе данных
$conn = mysqli_connect('localhost', 'root', '', 'storage');
$search = $_GET['search'];
// Проверить подключение к базе данных
if (!$conn) {
    die('Ошибка подключения: ' . mysqli_connect_error());
}


$query = "SELECT * FROM employees
WHERE employees.name LIKE '%$search%'
OR employees.pasport LIKE '%$search%'
OR employees.phone LIKE '%$search%'
OR employees.post LIKE '%$search%'";


$result = mysqli_query($conn, $query);


echo "<table>";
while ($row = mysqli_fetch_assoc($result)) {
    if ($row['name'] == $search ||
    $row['pasport'] == $search ||
    $row['phone'] == $search ||
    $row['post'] == $search
    ){
        echo "<tr>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['pasport'] . "</td>";
        echo "<td>" . $row['phone'] . "</td>";
        echo "<td>" . $row['post'] . "</td>";
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