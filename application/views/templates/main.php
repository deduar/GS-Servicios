<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>{blog_title}</title>
</head>
<body>
	<div class="container">
	<h3>{blog_heading}</h3>

	{blog_entries}
            <h5>{title}</h5>
            <p>{body}</p>
    {/blog_entries}
	</div>
</body>
</html>