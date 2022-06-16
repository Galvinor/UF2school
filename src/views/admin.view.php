<?php
require('partials/header.view.php');
?>

<h2>Administration Panel</h2>
<br><br>
<h2>Users</h2>

<table>
    <tr>
        <th>ID</th><th></th>
        <th>Username</th><th></th>
        <th>Email</th><th></th>
        <th>Role</th><th></th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach($users as $user) { ?>
        <tr>
            <td><?= $user->id; ?></td><td></td>
            <td><?= $user->username; ?></td><td></td>
            <td><?= $user->email; ?></td><td></td>
            <td><?= $user->role; ?></td><td></td>
            <td><form action="/admin/update" method="POST"> <input type="hidden" value="<?= $user->id; ?>"> <button type="submit" id="<?= $user->id; ?>">UPDATE</button></td>
            <td><form action="/admin/delete" method="POST"> <input type="hidden" value="<?= $user->id; ?>"> <button type="submit" id="<?= $user->id; ?>">DELETE</button></td>
        </tr>
    <?php } ?>

</table>
<br>
<h2>Subjects</h2>

<table>
    <tr>
        <th>ID</th><th></th>
        <th>Course</th><th></th>
        <th>Name</th><th></th>
        <th>Update</th>
        <th>Delete</th>
    </tr>
    <?php foreach($subjects as $subject) { ?>
        <tr>
            <td><?= $subject->id; ?></td><td></td>
            <td><?= $subject->course; ?></td><td></td>
            <td><?= $subject->subject; ?></td><td></td>
            <td><a href="" id="<?= $subject->id; ?>">UPDATE</a></td>
            <td><a href="" id="<?= $subject->id; ?>">DELETE</a></td>
        </tr>
    <?php } ?>

</table>