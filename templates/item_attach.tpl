{extends file="layout.tpl"}

{block name="content"}
<div id="homeContent">
    <h2>{$item->title} ({$item->type})</h2>
    <form enctype="multipart/form-data" method="post">
        <p>
        <input type="file" name="upload">
        </p>
        <p>
        <input type="submit" value="upload">
        </p>
    </form>
</div>
{/block}
