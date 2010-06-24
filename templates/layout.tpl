<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="{$app_root}">
		<meta charset=utf-8 />
		{block name="head-meta"}{/block}
		<title>{block name="title"}CouchDB{/block}</title>
		<style type="text/css">
			{block name="style"}{/block}
		</style>

		<link rel="stylesheet" type="text/css" href="www/css/style.css">
		{block name="head-links"}{/block}

		<script type="text/javascript" src="www/js/jquery.js"></script>
		<script type="text/javascript" src="www/js/jquery/ui/jquery-ui.js"></script>
		<script type="text/javascript" src="www/js/app.js"></script>
		{block name="head"}{/block}

	</head>
	<body>
		<div id="container">
			<div id="topper">
				<h1><a href="home">CouchDase</a></h1>
				<h3 id="topMenu">
					<a href="home">Home</a> |
					<a href="design">New Design Doc</a> 
				</h3>

				<div class="spacer"></div>
			</div>
			<div id="content">
				{if $msg}<h3 class="msg">{$msg}</h3>{/if}
				{block name="content"}default content{/block}
			</div>

			<div class="spacer"></div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>
