{extends file="layout.tpl"}

{block name="content"}
<div id="homeContent">
	<h2>{$item->title} ({$item->type})</h2>
	<form method="post">
		<label>description</label>
		<textarea name="description">{$item->description}</textarea>
		<p>
		<input type="submit" value="update">
		</p>
	</form>
</div>
{/block}
