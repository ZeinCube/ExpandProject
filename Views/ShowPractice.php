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
                        <td>&nbsp; &nbsp;<a href="?action=viewPractices" class="design">Вакансии на праактику</a></td>
                    </tr>
                    <tr>
                        <td><h5>Студенты:</h5></td>
                    </tr>
                    <tr>
                        <td><button type="button" class="btn btn-link">ШЕН</button></td>
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
                <h2><?=$p->getTitle();?></h2>
                <div class="btn-group btn-group-lg" role="group" aria-label="...">
                    <a type="button" class="btn btn-default" href='?action=viewPractices'><span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span> Назад</a>
                    <a type="button" class="btn btn-success" onclick="alert('Coming soon...')"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span> Подать заявку</a>
                </div>
                <!--<h3><a >Назад</a></h3>-->
                <h3>Описание:</h3>
                <div class="well">
                <h4><?=$p->getContent()?></h4>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>