<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">
                <p>EXPAND</p>
            </a>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-xs-6 col-md-3">
            <table class="table">
                <thead>
                <tr>
                    <th><h3>Меню:<h3></th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td><a href="?action=viewPractices" class="design">Вакансии на праактику</a></td>
                </tr>
                <tr>
                    <td><h5>Студенты:</h5></td>
                </tr>
                <tr>
                    <td>&nbsp; &nbsp;<button type="button" class="btn btn-link">ШЕН</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-link">ИШ</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-link">ВИШРМИ</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-link">ШЭМ</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-link">ШБМ</button></td>
                </tr>
                <tr>
                    <td><button type="button" class="btn btn-link">ШГН</button></td>
                </tr>
                <tr>
                    <td><a href="?action=viewTasks" class="design">Список задач</a></td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="col-xs-12 col-md-9">
            <h1>&nbsp;Вакансии на практику</h1>
            <table class="table-condensed table-bordered ">
                <thead>
                <tr>
                    <th>Название компании</th>
                    <th>Должность</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($practices as $task) {
                    //$db = getConnectionInstance();
                    //$stmt = $db->prepare("SELECT id,  FROM users");
                    echo "<tr>
                <td>" . $task['company_name'] . "</td>
                <td><a href='?action=viewPractice&id=".$task['id']."'>" . $task['title'] . "</a></td>
            </tr>";
                }?>

                </tbody>
            </table>
        </div>
    </div>
</div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>