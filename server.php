<?php
if (isset($_FILES['photo'])) {
    $target_dir = 'img\\';
    $target_file = $target_dir . $_FILES['photo']['name'];
    move_uploaded_file($_FILES['photo']['tmp_name'], $target_file);
}
$name = $_POST['name'];
$surname = $_POST['surname'];
$lastname = $_POST['lastname'];
$password = $_POST['password'];
$age = $_POST['age'];
$birthday = $_POST['birthday'];
$genre = $_POST['genre'];
$description = $_POST['description'];
$role = $_POST['role'];
$email = $_POST['email'];

$myfile = fopen("user.txt", "w") or die("Невозможно открыть файл!");
fwrite($myfile, "name: " . $name);
fwrite($myfile, "\n");
fwrite($myfile, "surname: " . $surname);
fwrite($myfile, "\n");
fwrite($myfile, "lastname: " . $lastname);
fwrite($myfile, "\n");
fwrite($myfile, "password: " . $password);
fwrite($myfile, "\n");
fwrite($myfile, "age: " . $age);
fwrite($myfile, "\n");
fwrite($myfile, "birthday: " . $birthday);
fwrite($myfile, "\n");
fwrite($myfile, "genre: " . $genre);
fwrite($myfile, "\n");
fwrite($myfile, "description: " . $description);
fwrite($myfile, "\n");
fwrite($myfile, "role: " . $role);
fwrite($myfile, "\n");
fwrite($myfile, "email: " . $email);
fwrite($myfile, "\n");
fclose($myfile);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Статистика</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.1/chart.min.js" integrity="sha512-QSkVNOCYLtj73J4hbmVoOV6KVZuMluZlioC+trLpewV8qMjsWqlIQvkn1KGX2StWvPMdWGBqim1xlC8krl1EKQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>

    <div class="wrapper">
        <header class="header">
            <div class="container">
                <?php require('include/nav.php'); ?>
            </div>
        </header>
        <main class="main">
            <div class="container">
                <a href="user.txt">Посмотреть созданный файл</a>
                <img src="<?php echo "img/" . $_FILES['photo']['name'] ?>" alt="" width="100%">
            </div>
        </main>

    </div>

</body>

</html>