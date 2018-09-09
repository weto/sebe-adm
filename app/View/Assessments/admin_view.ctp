
<div class="assessments view">
	<div class="titulo">Listagem de <?php echo __('Avaliação');?></div>
    <br />
	<br />
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Note'); ?></dt>
		<dd>
			<?php echo h($assessment['Assessment']['note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Student'); ?></dt>
		<dd>
			<?php echo $this->Html->link($assessment['Student']['name'], array('controller' => 'students', 'action' => 'view', $assessment['Student']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>
		<li><?php echo $this->Html->link(__('Editar Avaliação'), array('action' => 'edit', $assessment['Assessment']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Avaliação'), array('action' => 'delete', $assessment['Assessment']['id']), null, __('Tem certeza de que deseja excluir # %s?', $assessment['Assessment']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listagem Avaliações'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Adicionar Avaliação'), array('action' => 'add')); ?> </li>
	</ul>
</div>
