<?php /* Smarty version 2.6.20, created on 2010-06-23 22:25:18
         compiled from layout.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('block', 'block', 'layout.tpl', 6, false),)), $this); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<base href="<?php echo $this->_tpl_vars['app_root']; ?>
">
		<meta charset=utf-8 />
		<?php $this->_tag_stack[] = array('block', array('name' => "head-meta")); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		<title><?php $this->_tag_stack[] = array('block', array('name' => 'title')); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>CouchDB<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?></title>
		<style type="text/css">
			<?php $this->_tag_stack[] = array('block', array('name' => 'style')); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
		</style>

		<link rel="stylesheet" type="text/css" href="www/css/style.css">
		<?php $this->_tag_stack[] = array('block', array('name' => "head-links")); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

		<script type="text/javascript" src="www/js/jquery.js"></script>
		<script type="text/javascript" src="www/js/jquery/ui/jquery-ui.js"></script>
		<script type="text/javascript" src="www/js/app.js"></script>
		<?php $this->_tag_stack[] = array('block', array('name' => 'head')); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?><?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>

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
				<?php if ($this->_tpl_vars['msg']): ?><h3 class="msg"><?php echo $this->_tpl_vars['msg']; ?>
</h3><?php endif; ?>
				<?php $this->_tag_stack[] = array('block', array('name' => 'content')); $_block_repeat=true;_smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], null, $this, $_block_repeat);while ($_block_repeat) { ob_start(); ?>default content<?php $_block_content = ob_get_contents(); ob_end_clean(); $_block_repeat=false;echo _smarty_swisdk_process_block($this->_tag_stack[count($this->_tag_stack)-1][1], $_block_content, $this, $_block_repeat); }  array_pop($this->_tag_stack); ?>
			</div>

			<div class="spacer"></div>
			<div id="footer">
			</div>
		</div>
	</body>
</html>