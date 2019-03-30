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
        <?php foreach($data as $task): ?>
            <li> 
                <?php if ($task->completed): ?> 
                     <strike> <?= $task->description; ?> </strike> &emsp;
                <?php else : ?>
                    <?= $task->description; ?> &emsp;
                    <form action="<?= URLROOT; ?>/test/<?= $task->id; ?>/mark-done" method="post">
                        <input type="submit" value="Mark as done">
                    </form>
                <?php endif; ?>
                
                <form action="<?= URLROOT; ?>/test/<?= $task->id; ?>/delete" method="post">
                    <input type="submit" value="Delete">
                </form>                
            </li>
        <?php endforeach; ?>
    </ul>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>