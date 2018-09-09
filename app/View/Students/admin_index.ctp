<div class="students index">
	<div class="itens">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Itens {:start}-{:end} de {:count}')
	));
	?>	</div>
	
	<div class="titulo">Listagem de <?php echo __('Estudantes');?></div>
    <br />
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('average');?></th>
			<th><?php echo $this->Paginator->sort('course_id');?></th>
			<th class="actions center"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($students as $student): ?>
	<tr>
		<td><?php echo h($student['Student']['id']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['name']); ?>&nbsp;</td>
		<td><?php echo h($student['Student']['average']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($student['Course']['name'], array('controller' => 'courses', 'action' => 'view', $student['Course']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $student['Student']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $student['Student']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $student['Student']['id']), null, __('Tem certeza de que deseja excluir # %s?', $student['Student']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('anterior'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('próximo') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<ul>
		<li><?php echo $this->Html->link(__('Adicionar Estudante'), array('action' => 'add')); ?></li>
	</ul>
</div>
