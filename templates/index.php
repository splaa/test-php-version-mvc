<?php

/** @var View $this */

use App\View;

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/chosen.min.css"/>
    <!-- Custom style -->
    <link rel="stylesheet" href="css/style.css"/>
    <title>Test PHP</title>
</head>
<body>
<header>
<?php echo $this->header?>
</header>

<div class="container">
    <h2>База зарегистрированных людей</h2>
    <table class="table table-striped">
        <thead class="table-primary">
        <tr>
            <th scope="col">#id</th>
            <th scope="col">ФИО</th>
            <th scope="col">E-mail</th>
            <th scope="col">Територия</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($this->users as $user): ?>
            <tr>
                <th scope="row"><?php echo $user->id ?></th>
                <td>
                    <a href="?ctrl=User&id=<?php echo $user->id  ?>">
                        <?php echo $user->name ?>
                    </a>
                </td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $user->territory_json ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<footer>
    <?php echo $this->footer?>
</footer>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>
</html>
