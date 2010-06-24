<?php /* Smarty version 2.6.20, created on 2010-06-23 01:12:08
         compiled from item.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'extends', 'item.tpl', 1, false),array('block', 'block', 'item.tpl', 3, false),array('modifier', 'markdown', 'item.tpl', 6, false),)), $this); ?>
<?php echo _smarty_swisdk_extends(array('file' => "layout.tpl"), $this);?>


<?php $this->_tag_stack[] = array('block', array('name' => 'content')); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
<div id="itemContent">
    <h2><?php echo $this->_tpl_vars['item']->title; ?>
 (<?php echo $this->_tpl_vars['item']->type; ?>
)</h2>
    <p><?php echo ((is_array($_tmp=$this->_tpl_vars['item']->description)) ? $this->_run_mod_handler('markdown', true, $_tmp) : smarty_modifier_markdown($_tmp)); ?>
</p>
    <?php if ($this->_tpl_vars['item']->_attachments): ?>
    <h4>attachments</h4>
    <ul>
        <?php $_from = $this->_tpl_vars['item']->_attachments; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['filename'] => $this->_tpl_vars['data']):
?> 
        <li><?php echo $this->_tpl_vars['filename']; ?>
</li>
        <?php endforeach; endif; unset($_from); ?>
    </ul>
    <?php endif; ?>
    <a href="item/<?php echo $this->_tpl_vars['item']->_id; ?>
/attach" class="attach">[attach]</a>
    <a href="item/<?php echo $this->_tpl_vars['item']->_id; ?>
/edit" class="modify">[edit]</a>
    <a href="item/<?php echo $this->_tpl_vars['item']->_id; ?>
" class="delete">[delete]</a>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>