<?php /* Smarty version 2.6.20, created on 2010-06-20 23:27:37
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
	<a href="item/<?php echo $this->_tpl_vars['item']->_id; ?>
" class="delete">[delete]</a>
</div>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>