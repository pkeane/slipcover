{extends file="layout.tpl"}

{block name="content"}
<div id="homeContent">
	<form method="post">
		<label>title</label>
		<input type="text" name="title">
		<label>type</label>
		<select name="type">
			<option>item</option>
			<option>collection</option>
			<option>attribute</option>
			<option>value</option>
			<option>media_file</option>
		</select>
		<label>description</label>
		<textarea name="description"></textarea>
		<p>
		<input type="submit" value="post">
		</p>
	</form>
</div>
<dl class="docs">
	{foreach item=set key=type from=$docs}
	<dt>{$type}</dt>
	<dd>
	<ul>
	{foreach item=title key=key from=$set}
	<li>
	<a href="item/{$key}">{$title}</a>
	</li>
	{/foreach}
	</ul
	</dd>
	{/foreach}
</dl>
{/block}
