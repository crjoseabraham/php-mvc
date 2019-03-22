<?php require_once APPROOT . '/src/views/include/header.php'; ?>
    <h1>Tasks loaded from database:</h1>
    <ul>
        <? foreach ($data as $task) : ?>
            <li> 
                <?= $task->completed ? "<strike> $task->description </strike>" : $task->description; ?> 
            </li>
        <? endforeach; ?>
    </ul>
<?php require_once APPROOT . '/src/views/include/footer.php'; ?>