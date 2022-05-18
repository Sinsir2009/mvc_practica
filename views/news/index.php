<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>
<body>
<div style="border: solid 1px;">
	<?php foreach ($newsList as $newsItem): ?>
	<div>
		<h2><?php echo $newsItem['title']; ?>*</h2>
		<p><?php echo $newsItem['short_content']; ?></p>
		<p><?php echo $newsItem['date']; ?></p>
		<p><a href="<?php echo $newsItem['id']; ?>">Read more</a></p>
	</div>
	<?php endforeach; ?>
</div>
</body>
</html>
