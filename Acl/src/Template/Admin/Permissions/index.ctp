<?php

$this->extend('Croogo/Croogo./Common/admin_index');
$this->name = 'acl_permissions';
$this->Html->script('Croogo/Acl.acl_permissions', ['block' => true]);

$this->CroogoHtml
	->addCrumb('', '/admin', array('icon' => 'home'))
	->addCrumb(__d('croogo', 'Users'), array('plugin' => 'Croogo/Users', 'controller' => 'Users', 'action' => 'index'))
	->addCrumb(__d('croogo', 'Permissions'), array(
		'plugin' => 'Croogo/Acl', 'controller' => 'Permissions',
	));

?>
<?php $this->start('actions'); ?>
<li class="btn-group">
<?php
	echo $this->Html->link(
		__d('croogo', 'Tools') . ' ' . '<span class="caret"></span>',
		'#',
		array(
			'class' => 'btn dropdown-toggle',
			'data-toggle' => 'dropdown',
			'escape' => false
		)
	);

	$generateUrl = array(
		'plugin' => 'Croogo/Acl',
		'controller' => 'Actions',
		'action' => 'generate',
		'permissions' => 1
	);
	$out = $this->Croogo->adminAction(__d('croogo', 'Generate'),
		$generateUrl,
		array(
			'button' => false,
			'method' => 'post',
			'tooltip' => array(
				'data-title' => __d('croogo', 'Create new actions (no removal)'),
				'data-placement' => 'right',
			),
		)
	);
	$out .= $this->Croogo->adminAction(__d('croogo', 'Synchronize'),
		$generateUrl + array('sync' => 1),
		array(
			'button' => false,
			'method' => 'post',
			'tooltip' => array(
				'data-title' => __d('croogo', 'Create new & remove orphaned actions'),
				'data-placement' => 'right',
			),
		)
	);
	echo $this->Html->tag('ul', $out, array('class' => 'dropdown-menu'));
?>
</li>
<?php
	echo $this->Croogo->adminAction(__d('croogo', 'Edit Actions'),
		array('controller' => 'Actions', 'action' => 'index', 'permissions' => 1)
	);
?>
<?php $this->end(); ?>

<div class="row-fluid">
	<div class="span-16">

		<ul id="permissions-tab" class="nav nav-tabs">
		<?php
			echo $this->Croogo->adminTabs();
		?>
		</ul>

		<div class="tab-content">
			<?php echo $this->Croogo->adminTabs(); ?>
		</div>

	</div>
</div>

<script>
AclPermissions.tabSwitcher();
</script>
