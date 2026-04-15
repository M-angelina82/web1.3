<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Практична робота PHP</title>

    <style>
        body { font-family: Arial; margin: 20px; }
        table { border-collapse: collapse; width: 60%; margin-bottom: 40px; }
        th, td { border: 1px solid black; padding: 8px; }
        th { background: #f2f2f2; }
        .block { margin-bottom: 50px; }
    </style>
</head>

<body>

<?php

$users = [
    ["name" => "Andrii", "age" => 19, "email" => "andrii@gmail.com"],
    ["name" => "Olena", "age" => 17, "email" => "olena@gmail.com"],
    ["name" => "Ivan", "age" => 22, "email" => "ivan@gmail.com"],
    ["name" => "Sofia", "age" => 18, "email" => "sofia@gmail.com"],
    ["name" => "Dmytro", "age" => 16, "email" => "dmytro@gmail.com"],
    ["name" => "Kateryna", "age" => 25, "email" => "katya@gmail.com"],
    ["name" => "Pavlo", "age" => 20, "email" => "pavlo@gmail.com"],
    ["name" => "Maksym", "age" => 21, "email" => "maksym@gmail.com"],
    ["name" => "Nazar", "age" => 15, "email" => "nazar@gmail.com"],
    ["name" => "Yulia", "age" => 23, "email" => "yulia@gmail.com"],
];

function filterAdults($users) {
    return array_filter($users, fn($u) => $u["age"] >= 18);
}

function compareByNameLength($a, $b) {
    return strlen($a["name"]) <=> strlen($b["name"]);
}

$adults = filterAdults($users);
usort($adults, "compareByNameLength");


function generatePassword($length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $pass = "";

    for ($i = 0; $i < $length; $i++) {
        $pass .= $chars[random_int(0, strlen($chars) - 1)];
    }

    return $pass;
}

function isStrongPassword($password) {
    return preg_match('/[A-Z]/', $password) &&
           preg_match('/[0-9]/', $password) &&
           strlen($password) >= 8;
}

function generateStrongPasswords($count, $length) {
    $result = [];

    while (count($result) < $count) {
        $p = generatePassword($length);
        if (isStrongPassword($p)) {
            $result[] = $p;
        }
    }

    return $result;
}

$passwords = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $count = (int)$_POST["count"];
    $length = (int)$_POST["length"];

    $passwords = generateStrongPasswords($count, $length);
}
?>

<div class="block">
    <h2>Користувачі 18+</h2>

    <table>
        <tr>
            <th>Ім'я</th>
            <th>Вік</th>
            <th>Email</th>
        </tr>

        <?php foreach ($adults as $u): ?>
        <tr>
            <td><?= htmlspecialchars($u["name"]) ?></td>
            <td><?= $u["age"] ?></td>
            <td><?= htmlspecialchars($u["email"]) ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>

<div class="block">
    <h2>Генерація паролів</h2>

    <form method="POST">
        <label>Кількість:</label><br>
        <input type="number" name="count" required><br><br>

        <label>Довжина:</label><br>
        <input type="number" name="length" required><br><br>

        <button type="submit">Згенерувати</button>
    </form>
    <?php if (!empty($passwords)): ?>
        <h3>Результат:</h3>
        <ul>
            <?php foreach ($passwords as $p): ?>
                <li><?= htmlspecialchars($p) ?></li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</div>

</body>
</html>