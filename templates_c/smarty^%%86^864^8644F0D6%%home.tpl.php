<?php /* Smarty version 2.6.20, created on 2010-06-22 11:14:06
         compiled from home.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'extends', 'home.tpl', 1, false),array('block', 'block', 'home.tpl', 3, false),)), $this); ?>
<?php echo _smarty_swisdk_extends(array('file' => "layout.tpl"), $this);?>


<?php $this->_tag_stack[] = array('block', array('name' => 'content')); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>
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
	<?php $_from = $this->_tpl_vars['docs']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['type'] => $this->_tpl_vars['set']):
?>
	<dt><?php echo $this->_tpl_vars['type']; ?>
</dt>
	<dd>
	<ul>
	<?php $_from = $this->_tpl_vars['set']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['title']):
?>
	<li>
	<a href="item/<?php echo $this->_tpl_vars['key']; ?>
"><?php echo $this->_tpl_vars['title']; ?>
</a>
	</li>
	<?php endforeach; endif; unset($_from); ?>
	</ul
	</dd>
	<?php endforeach; endif; unset($_from); ?>
</dl>
<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>