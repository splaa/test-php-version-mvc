<main class="container">
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
            <?php $territory = $user->getTerritory(); ?>
            <tr>
                <th scope="row"><?php echo $user->id ?></th>
                <td>
                    <a href="/user/?id=<?php echo $user->id ?>/">
                        <?php echo $user->name ?>
                    </a>
                </td>
                <td><?php echo $user->email ?></td>
                <td><?php echo $territory['region'] . ',' . $territory['city'] . ',' . $territory['area'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</main>
