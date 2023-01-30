<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Анкета</title>
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
                <h3 class="register__title">Форма регистрации</h3>
                <form action="server.php" method="post" enctype="multipart/form-data" class="register__form">
                    <div class="register__input">
                        <label for="" class="register__text">Имя</label>
                        <input type="text" name="name" id="" required placeholder="Имя">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Фамилия</label>
                        <input type="text" name="surname" id="" placeholder="Фамилия">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Отчество</label>
                        <input type="text" name="lastname" id="" placeholder="Отчество">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Email</label>
                        <input type="email" name="email" id="" required placeholder="Email">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Пароль</label>
                        <input type="password" name="password" id="password" placeholder="Пароль">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Подтверждение пароля</label>
                        <input type="password" name="confirmpassword" id="confirmpassword" placeholder="Подтверждение пароля">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Роль</label>
                        <select name="role" id="">
                            <option value="guest">Гость</option>
                            <option value="user">Пользователь</option>
                            <option value="admin">Админ</option>
                        </select>
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Дата рождения</label>
                        <input type="date" name="birthday" id="" max="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Возраст</label>
                        <input type="number" name="age" id="" placeholder="Возраст" />
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Пол</label>
                        <div class="genres">
                            <label for="man">Мужчина</label>
                            <label for="woman">Женщина</label>
                            <input type="radio" name="genre" id="man" value="man">
                            <input type="radio" name="genre" id="woman" value="woman">
                        </div>
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Фото</label>
                        <input type="file" name="photo" id="" accept="image/png, image/jpeg">
                    </div>
                    <div class="register__input">
                        <label for="" class="register__text">Описание</label>
                        <textarea name="description" id="" cols="30" rows="10" placeholder="Описание"></textarea>
                    </div>

                    <button class='submit'>Регистрация</button>
                </form>

            </div>
        </main>
        <script>
            let password = document.getElementById("password"),
                confirm_password = document.getElementById("confirmpassword");

            function validatePassword() {
                if (password.value != confirm_password.value) {
                    confirm_password.setCustomValidity("Пароли не совпадают");
                } else {
                    confirm_password.setCustomValidity('');
                }
            }
            password.onchange = validatePassword;
            confirm_password.onkeyup = validatePassword;
        </script>
    </div>

</body>

</html>