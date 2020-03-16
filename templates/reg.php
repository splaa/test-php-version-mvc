<?php

$regions = new \App\Models\Region();

?>
<main class="flex-shrink-0">
    <div class="container">
        <h1>Регистрация пользователя.</h1>
        <form id="form" action="index.php" method="post" autocomplete="off">
            <div class="row">
                <div class="col">
                    <input name="fio" id="name" type="text" class="form-control" placeholder="ФИО" autocomplete="off">
                </div>
                <div class="col">
                    <input name="email" id="email" type="email" class="form-control" placeholder="EMAIL"
                           autocomplete="off">
                </div>
            </div>
            <h2>Список областей</h2>
            <div class="side-by-side clearfix">
                <div>
                    <em>Список областей:</em>
                    <select name="region_id" autocomplete="off" data-placeholder="Выберите область..."
                            class="chosen-select" tabindex="1">
                        <option value=""></option>
                        <?php foreach ($regions->getRegion() as $region): ?>
                            <option value="<?php echo $region['ter_pid'] ?>"
                                    autocomplete="off"><?php echo $region['ter_name'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <br>
                    <em>Выберите город или район:</em>
                    <select name="city" autocomplete="off"
                            style="min-width: 200px"
                            data-placeholder="Выберите город..."
                            class="chosen-select" tabindex="1">
                        <option value="" autocomplete="off"></option>
                    </select>
                    <br>
                    <em>Список населённых пунктов:</em>
                    <select name="area" autocomplete="off"
                            data-placeholder="Выберите район..."
                            class="chosen-select" tabindex="1"
                            style="min-width: 200px">
                        <option value="" autocomplete="off"></option>
                    </select>

                </div>
                <button name="submit" type="submit" class="btn btn-success">Submit</button>

        </form>
    </div>
</main>
