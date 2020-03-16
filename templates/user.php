
<div class="container">
    <h2><a href="user.php?id=<?php echo $this->user->id  ?>">
            <?php echo $this->user->name ?>
        </a></h2>
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

        <tr>
            <th scope="row"><?php echo $this->user->id ?></th>
            <td>
                <a href="/user/?id=<?php echo $this->user->id ?>">
                    <?php echo $this->user->name ?>
                </a>
            </td>
            <td><?php echo $this->user->email ?></td>
            <td><?php echo $this->user->territory_json ?></td>
        </tr>
        </tbody>
    </table>
</div>
