<?php

/** @var View $this */

use App\View;

$post = isset($_POST['submit']) ? $_POST : null;


if ($post) {
    $user = new \App\Models\User();
    $user1 = $user->insertDbUser($post);
    $user = $user1;

}
?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/chosen.min.css"/>
    <!-- Custom style -->
    <link rel="stylesheet" href="/css/style.css"/>
    <title>Test PHP</title>
</head>
<body class="d-flex flex-column h-100">
<header>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <div class="container">

            <a href="" class="navbar-brand">App</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                    aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a href="/" class="nav-link">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a href="/login/" class="nav-link">Log in</a>
                    </li>
                    <li class="nav-item active">
                        <a href="/registration/" class="nav-link">Registration</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
</header>


<footer class="footer mt-auto py-3">
    <div class="container">
        <span class="text-muted">App</span>
    </div>
</footer>
<script src="/js/jquery-2.1.1.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/chosen.jquery.js" type="text/javascript"></script>
<script src="/js/prism.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/init.js" type="text/javascript" charset="utf-8"></script>
<script src="/js/jquery.validate.js"></script>
<script type="text/javascript">
    $(".chosen-select").chosen();

    $('select[name=\'region_id\']').on('change', function () {
        $.ajax({
            url: '/region/?action=getCity&ter_id=' + this.value,
            dataType: 'json',
            success: function (json) {
                let html = '<option value=""></option>';

                if (json) {
                    for (i = 0; i < json.length; i++) {
                        html += '<option value="' + json[i]['ter_pid'] + '">' + json[i]['ter_name'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">Ничего не найденно</option>';
                }

                $('select[name=\'city\']').html(html);
                $('select[name=\'city\']').trigger('chosen:updated');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });
    $('select[name=\'city\']').on('change', function () {
        console.log(this.value);
        $.ajax({
            url: '/region/?action=getArea&ter_id=' + this.value,
            dataType: 'json',
            success: function (json) {
                let html = '<option value=""></option>';

                if (json) {
                    for (i = 0; i < json.length; i++) {
                        html += '<option value="' + json[i]['ter_pid'] + '">' + json[i]['ter_name'] + '</option>';
                    }
                } else {
                    html += '<option value="0" selected="selected">Ничего не найденно</option>';
                }

                $('select[name=\'area\']').html(html);
                $('select[name=\'area\']').trigger('chosen:updated');
            },
            error: function (xhr, ajaxOptions, thrownError) {
                // alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                console.log(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
            }
        });
    });

    $('select[name=\'region_id\']').trigger('change');

    // валидация полей формы
    $(function () {
        $('#form').validate({
            rules: {
                fio: {
                    required: true,
                    minlength: 3

                },
                email: {
                    required: true

                }


            },
            messages: {
                fio: {
                    required: "Поле 'Имя' обязательно к заполнению",
                    minlength: "Введите не менее 3-х символов в поле 'Имя'"
                },
                email: {
                    required: "Поле 'Email' обязательно к заполнению",
                    email: "Необходим формат адреса email"
                }
            }
        });
    });
</script>
<?php if (!empty($user)): ?>
    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel"
         aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="userModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">ФИО</th>
                            <th scope="col">Email</th>
                            <th scope="col">Область</th>
                            <th scope="col">Город</th>
                            <th scope="col">Район</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <th scope="row"><?php echo $user['id'] ?></th>
                            <td><?php echo $user['name'] ?></td>
                            <td><?php echo $user['email'] ?></td>
                            <td><?php echo $user['region'] ?></td>
                            <td><?php echo $user['city'] ?></td>
                            <td><?php echo $user['area'] ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <!--                <a href="/" id="submit" class="btn btn-success success">OK</a>-->
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            $('#userModal').modal('show');

        });
    </script>
<?php endif; ?>
</body>
</html>

