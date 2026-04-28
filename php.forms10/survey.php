<?php
$errors = [];
$success = "";

$name = "";
$age = "";
$gender = "";
$hobbies = [];
$description = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $name = htmlspecialchars(trim($_POST["name"]));
    $age = $_POST["age"];
    $gender = $_POST["gender"] ?? "";
    $hobbies = $_POST["hobbies"] ?? [];
    $description = htmlspecialchars(trim($_POST["description"]));

    // перевірка віку (10–100)
    if (!filter_var($age, FILTER_VALIDATE_INT, [
        "options" => ["min_range" => 10, "max_range" => 100]
    ])) {
        $errors[] = "Вік має бути від 10 до 100";
    }

    if (empty($name)) {
        $errors[] = "Введіть ім'я";
    }

    if (empty($gender)) {
        $errors[] = "Оберіть стать";
    }

    if (empty($errors)) {
        $success = "Анкету успішно відправлено!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Анкета</title>
</head>
<body>

<h2>Анкета користувача</h2>

<?php foreach ($errors as $error): ?>
    <p style="color:red;"><?= $error ?></p>
<?php endforeach; ?>

<?php if ($success): ?>
    <p style="color:green;"><?= $success ?></p>
<?php endif; ?>

<form method="POST">

Ім’я: <br>
<input type="text" name="name" value="<?= $name ?>"><br><br>

Вік: <br>
<input type="number" name="age" value="<?= $age ?>"><br><br>

Стать: <br>
<input type="radio" name="gender" value="Чоловік"> Чоловік
<input type="radio" name="gender" value="Жінка"> Жінка<br><br>

Хобі: <br>
<input type="checkbox" name="hobbies[]" value="спорт"> Спорт
<input type="checkbox" name="hobbies[]" value="музика"> Музика
<input type="checkbox" name="hobbies[]" value="ігри"> Ігри<br><br>

Опис: <br>
<textarea name="description"><?= $description ?></textarea><br><br>

<button type="submit">Відправити</button>

</form>

</body>
</html>