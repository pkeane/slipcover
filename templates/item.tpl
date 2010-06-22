{extends file="layout.tpl"}

{block name="content"}
<div id="itemContent">
	<h2>{$item->title} ({$item->type})</h2>
	<p>{$item->description|markdown}</p>
	<a href="item/{$item->_id}/edit" class="modify">[edit]</a>
	<a href="item/{$item->_id}" class="delete">[delete]</a>
</div>
{/block}
