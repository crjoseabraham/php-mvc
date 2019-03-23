<?php require_once APPROOT . '/src/views/include/header.php'; ?>
    <h1>Test Database</h1>
    <h2>This page tests the connection to a database, using a typical "to-do list app" to perform CRUD operations</h2>
    <hr>
    <h3>[CREATE] Add new task</h3>
    <form action="<?= URLROOT; ?>/test/add-task" method="post">
        <input type="text" name="new_task" placeholder="Description...">
        <input type="submit" value="Add task">
    </form>
    <h3>[READ] Get all tasks:</h3>
    <ul>
        <? foreach ($data as $task) : ?>
            <li> 
                <? if ($task->completed) : ?> 
                     <strike> <?= $task->description; ?> </strike> &emsp;
                <? else : ?>
                    <?= $task->description; ?> &emsp;
                    <a href="<?= URLROOT; ?>/test/<?= $task->id; ?>/mark-read">Mark as done</a> | 
                <? endif; ?>
                
                <a href="<?= URLROOT; ?>/test/<?= $task->id; ?>/delete">Delete</a>
            </li>
        <? endforeach; ?>
    </ul>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>