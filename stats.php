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
                <div class="chart__content">
                    <div class='chart'>
                        <canvas id="myChart"></canvas>
                    </div>
                    <div class="chart_data">
                        <form action="##!" id='form'>
                            <p class="chart_data__text">Наименование компании</p>
                            <select name="" id="_name">
                            </select>
                            <p class="chart_data__text">Интервал графика</p>
                            <select name="" id="_interval">
                            </select>
                            <p class="chart_data__text">Количество записей в ответе</p>
                            <input type="number" name="" id="_count" value="300" min="1" max="1700" step="1">
                            <p class="chart_data__text">Начиная с даты</p>
                            <input type="date" name="" id="_date" max="<?php echo date('Y-m-d'); ?>">
                            <select name="" id="_color">
                                <option value="red">red</option>
                                <option value="blue">blue</option>
                                <option value="brown">brown</option>
                                <option value="purple">purple</option>
                                <option value="yellow">yellow</option>
                                <option value="green">green</option>
                                <option value="orange">orange</option>
                                <option value="black">black</option>
                                <option value="pink">pink</option>

                            </select>
                            <button class="btn" type="submit">Получить данные</button>
                        </form>
                    </div>
                </div>
                <table id="_table" class='table'>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody id="_tbody">

                    </tbody>
                </table>
            </div>
        </main>
    </div>
    <script>
        let myChart = null;
        document.querySelector(".btn").onclick = function(event) {
            get_data();
        }
        document.querySelector('#form').onsubmit = function(event) {
            event.preventDefault();
        }

        function write_table_content(data) {
            let table = document.querySelector("#_tbody");
            table.innerHTML = ""
            let it = 1;
            data.forEach(el => {
                let tr = document.createElement("tr");
                let tdNum = document.createElement("td")
                let tdDate = document.createElement("td")
                let tdValue = document.createElement("td")
                tr.appendChild(tdNum)
                tr.appendChild(tdDate)
                tr.appendChild(tdValue)
                table.appendChild(tr);
                tdNum.textContent = it++;
                tdDate.textContent = el.datetime
                tdValue.textContent = el.close
            })

        }

        function get_data() {

            let name = document.querySelector("#_name");
            let interval = document.querySelector('#_interval')
            let limits = document.querySelector('#_count')
            let date = document.querySelector("#_date")
            let color = document.querySelector('#_color')
            let requestData = {
                "app_key": " lpDRhW4f%5Bj|i8mB~BjlCD#Ve6wAi",
                "secid": name.value,
                "interval": interval.value,
                "limits": limits.value,
                "start": date.value
            }
            let fetchData = {
                method: 'POST',
                body: JSON.stringify(requestData),
                headers: new Headers({
                    'Content-Type': 'application/json; charset=UTF-8'
                })
            }
            fetch('https://sedelkin.ru/api/history/get_data', fetchData).then(Response => {
                return Response.json();
            }).then(data => {
                console.log(data);
                let labels = [];
                let outputDate = [];

                data.data.forEach(el => {
                    labels.push(el.datetime);
                    outputDate.push(el.close)
                })
                write_table_content(data.data);


                let tdata = {
                    labels: labels,
                    datasets: [{
                        label: data.secid,
                        // backgroundColor: '#34c',
                        // borderColor: '#34',

                        backgroundColor: color.value,
                        borderColor: color.value,
                        data: outputDate,
                    }]
                };
                let config = {
                    type: 'line',
                    data: tdata,
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                };

                if (myChart) {
                    console.log(myChart.data.datasets[0])
                    myChart.data.datasets[0].data = outputDate;
                    myChart.data.labels = labels
                    myChart.data.datasets[0].label = data.secid
                    myChart.data.datasets[0].backgroundColor = color.value;
                    myChart.data.datasets[0].borderColor = color.value;
                    myChart.update();
                } else {
                    myChart = new Chart(
                        document.getElementById('myChart'),
                        config
                    );
                }
            })
        }

        function write_interval() {
            let select = document.querySelector('#_interval');
            fetch('https://sedelkin.ru/api/interval').then(Response => {
                return Response.json();
            }).then(data => {
                data.data.forEach(element => {
                    let option = document.createElement("option");
                    option.setAttribute("value", element.value);
                    option.textContent = element.title
                    select.appendChild(option)
                });
            })
            get_data();
        }

        function write_name(data) {
            let select = document.querySelector('#_name');
            data.forEach(element => {
                let option = document.createElement("option");
                option.setAttribute("value", element.secid);
                option.textContent = element.title
                select.appendChild(option)
            });
            write_interval();

        }

        function run() {
            fetch('https://sedelkin.ru/api/security_list').then(Response => {
                return Response.json();
            }).then(data => {
                write_name(data.data);
            })
        }
        run();
    </script>

    <script>

    </script>
</body>

</html>