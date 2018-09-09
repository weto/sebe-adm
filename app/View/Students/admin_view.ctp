<div class="students view">
	<fieldset>
		<legend>Listagem de <?php echo __('Estudante');?></legend>
		<dl>
			<dt><?php echo __('Id'); ?></dt>
			<dd>
				<?php echo h($student['Student']['id']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Name'); ?></dt>
			<dd>
				<?php echo h($student['Student']['name']); ?>
				&nbsp;
			</dd>
			<dt><?php echo __('Course'); ?></dt>
			<dd>
				<?php echo $this->Html->link($student['Course']['name'], array('controller' => 'courses', 'action' => 'view', $student['Course']['id'])); ?>
				&nbsp;
			</dd>
		</dl>
	</fieldset>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>
		<li><?php echo $this->Html->link(__('Editar Estudante'), array('action' => 'edit', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Estudante'), array('action' => 'delete', $student['Student']['id']), null, __('Tem certeza de que deseja excluir # %s?', $student['Student']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listagem Estudantes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Adicionar Estudante'), array('action' => 'add')); ?> </li>
	</ul>
</div>
