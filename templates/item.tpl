{extends file="layout.tpl"}

{block name="content"}
<div id="itemContent">
    <h2>{$item->title} ({$item->type})</h2>
    <p>{$item->description|markdown}</p>
    {if $item->_attachments}
    <h4>attachments</h4>
    <ul>
        {foreach item=data key=filename from=$item->_attachments} 
        <li>{$filename}</li>
        {/foreach}
    </ul>
    {/if}
    <a href="item/{$item->_id}/attach" class="attach">[attach]</a>
    <a href="item/{$item->_id}/edit" class="modify">[edit]</a>
    <a href="item/{$item->_id}" class="delete">[delete]</a>
</div>
{/block}
