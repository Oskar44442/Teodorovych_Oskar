<?php

// Атрибут
#[Attribute]
class LogTransactionType {
    public $type;

    public function __construct($type) {
        $this->type = $type;
    }
}

// Callback-фільтр
function isOutgoing($transaction) {
    return $transaction['type'] === 'out';
}

// Основна функція
#[LogTransactionType(type: "out")]
function calculateTotal($transactions, $filter) {
    $filtered = array_filter($transactions, $filter);

    $total = 0;
    foreach ($filtered as $t) {
        $total += $t['amount'];
    }

    return $total;
}

// Масив транзакцій
$transactions = [
    ["amount" => 100, "type" => "in", "date" => "2025-04-01"],
    ["amount" => 50, "type" => "out", "date" => "2025-04-02"],
    ["amount" => 200, "type" => "out", "date" => "2025-04-03"],
    ["amount" => 70, "type" => "in", "date" => "2025-04-04"]
];

$total = calculateTotal($transactions, "isOutgoing");

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Транзакції</title>
</head>
<body>

<h2>Витрати</h2>

<table border="1" cellpadding="5">
    <tr>
        <th>Сума</th>
        <th>Тип</th>
        <th>Дата</th>
    </tr>

    <?php foreach ($transactions as $t): ?>
        <?php if ($t['type'] === 'out'): ?>
            <tr>
                <td><?= $t['amount'] ?></td>
                <td><?= $t['type'] ?></td>
                <td><?= $t['date'] ?></td>
            </tr>
        <?php endif; ?>
    <?php endforeach; ?>

</table>

<h3>Загальна сума витрат: <?= $total ?></h3>

</body>
</html>