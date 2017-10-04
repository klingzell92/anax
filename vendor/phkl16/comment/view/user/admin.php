<?php

// Create urls for navigation
$edit = $di->get("url")->create("user/update");
$delete = $di->get("url")->create("user/delete");



?><h1>Användare</h1>

<table>
    <tr>
        <th>Användarnamn</th>
        <th>Email</th>
        <th>Redigera</th>
        <th>Ta bort</th>
    </tr>
    <?php foreach ($users as $user) : ?>
    <tr>
        <td><?= $user->acronym ?></td>
        <td><?= $user->email ?></td>
        <td>
            <a href="<?= $edit."/$user->id"; ?>">Redigera</a>
        </td>
        <td>
            <a href="<?= $delete."/$user->id"; ?>">Ta bort</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
