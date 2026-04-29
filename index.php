<?php

// Атрибут (додаткове завдання)
#[Attribute]
class TraceableSearch {}

// Callback для логування
function logNode($node) {
    echo "Перевіряємо: " . $node['name'] . "<br>";
}

// Рекурсивна функція
#[TraceableSearch]
function findCategory($tree, $name, $callback) {
    foreach ($tree as $node) {
        $callback($node);

        if ($node['name'] === $name) {
            return $node;
        }

        if (isset($node['children'])) {
            $result = findCategory($node['children'], $name, $callback);
            if ($result !== null) {
                return $result;
            }
        }
    }

    return null;
}

// Дерево категорій
$categories = [
    [
        "name" => "Техніка",
        "children" => [
            [
                "name" => "Комп’ютери",
                "children" => [
                    ["name" => "Ноутбуки"],
                    ["name" => "ПК"]
                ]
            ],
            ["name" => "Телефони"]
        ]
    ],
    ["name" => "Одяг"]
];

$result = null;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $search = $_POST["category"];
    $result = findCategory($categories, $search, "logNode");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Пошук категорії</title>
</head>
<body>

<h2>Пошук категорії</h2>

<form method="post">
    <input type="text" name="category" placeholder="Введіть категорію">
    <button type="submit">Шукати</button>
</form>

<hr>

<?php
if ($result) {
    echo "<b>Знайдено:</b> " . $result['name'];
} elseif ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Категорію не знайдено";
}
?>

</body>
</html>