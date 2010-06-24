{extends file="layout.tpl"}

{block name="content"}
<div id="homeContent">
	<form method="post">
		<label>Title</label>
        <input type="text" name="title" value="{$ddoc.title}">
        <input type="hidden" name="rev" value="{$ddoc.rev}">
		<label>Views</label>
        <textarea name="views">{if $ddoc.views}{$ddoc.views}{else}{literal}
"views" : {
  "foo" : {
    "map" : "function(doc){ emit(doc._id, doc._rev)}"
  }
}
{/literal}
{/if}
</textarea>
		<p>
        {if $ddoc}
		<input type="submit" value="update">
        {else}
		<input type="submit" value="post">
        {/if}
		</p>
	</form>
</div>
<h3>design docs</h3>
<ul>
    {foreach item=ddoc from=$design_docs}
    <li><a href="design/{$ddoc->id|replace:'_design/':''}">{$ddoc->id|replace:'_design/':''}</a>
    {/foreach}
</ul>
{/block}
