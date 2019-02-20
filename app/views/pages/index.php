<?php require APPROOT . '/views/inc/header.php'; ?>

<h1> <?= $data['title']; ?> </h1>
<ul>
	<?php foreach($data['posts'] as $post) : ?>
		<li><?= $post->title; ?></li>
	<?php endforeach; ?>
</ul>

<?php require APPROOT . '/views/inc/footer.php'; ?>