<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Заметки</title>
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.0/jquery-ui.min.js"></script>

</head>

<body>

    <div class="wrapper">
        <header class="header">
            <div class="container">
                <?php require('include/nav.php'); ?>
            </div>
        </header>
        <main class="main">
            <div class="container note__container">
                <div id="item1" class="item active__item">
                    <p class="item__title">content1</p>
                    <p class="item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, quos natus. Minus, soluta! Porro facere voluptatibus, laudantium quia deserunt facilis!soluta! Porro facere voluptatibus, laudantium quia deserunt facilis!</p>
                </div>
                <div id="item2" class="item ">
                    <p class="item__title">content2</p>
                    <p class="item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, quos natus. Minus, </p>
                </div>
                <div id="item3" class="item ">
                    <p class="item__title">content3</p>
                    <p class="item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, quos natus. Minus, soluta! Porro facere voluptatibus, laudantium quia des!</p>
                </div>
                <div id="item4" class="item ">
                    <p class="item__title">content4</p>
                    <p class="item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, quos natus. Minus, sserunt faciliuia deserunt facilis!</p>
                </div>
                <div id="item5" class="item ">
                    <p class="item__title">content5</p>
                    <p class="item__text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est, quos natus.serunt facilis Minus, soluta! Porro facere voluptatibus, laudantium quia deserunt facilis!</p>
                </div>
            </div>
        </main>
    </div>
    <script>
        $(function() {

            $(".item").draggable({
                start: function(event, ui) {
                    var target = document.getElementById(this.id);
                    target.style.zIndex = 100;
                },

                stop: function(event, ui) {
                    var nowPosition = new Object();
                    var newPosition = new Array();
                    for (var i = 1; i < 6; i++) {
                        var positionData = getPosition(i);
                        nowPosition = {
                            'name': 'item' + i,
                            'position': positionData
                        };

                        newPosition.push(nowPosition);
                    }

                    newPosition.sort(function(a, b) {
                        if (a['position'] > b['position']) return -1;
                        if (a['position'] < b['position']) return 1;
                        return 0;
                    });

                    for (let i = 0; i < newPosition.length; i++) {
                        document.querySelector('#' + newPosition[i].name).classList.remove('active__item')
                    }
                    document.querySelector('#' + newPosition[newPosition.length - 1].name).classList.add('active__item')
                    console.log(newPosition[newPosition.length - 1].name)
                    var number = 0;
                    for (var i = newPosition.length; i--;) {

                        var tmpItem = document.getElementById(newPosition[i].name);
                        tmpItem.style.order = number;
                        tmpItem.style.left = 0;
                        tmpItem.style.top = 0;

                        number++;
                    }

                    var target = document.getElementById(this.id);
                    target.style.zIndex = 0;
                }

            });

            function getPosition(item) {
                var tmpItem = document.getElementById('item' + item);
                return tmpItem.offsetLeft;
            }
        });
    </script>
</body>

</html>