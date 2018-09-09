<div class="assessments index">
	<div class="itens">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Itens {:start}-{:end} de {:count}')
	));
	?>	</div>
	
	<div class="titulo">Listagem de <?php echo __('Avaliações');?></div>
    <br />
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('id');?></th>
		<th><?php echo $this->Paginator->sort('period');?></th>
		<th><?php echo $this->Paginator->sort('student_id');?></th>
		<th><?php echo $this->Paginator->sort('note');?></th>
		<th class="actions center"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($assessments as $assessment): ?>
	<tr>
		<td><?php echo h($assessment['Assessment']['id']); ?>&nbsp;</td>
		<td><?php echo h($assessment['Assessment']['period']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($assessment['Student']['name'], array('controller' => 'students', 'action' => 'view', $assessment['Student']['id'])); ?>
		</td>
		<td><?php echo h($assessment['Assessment']['note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $assessment['Assessment']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $assessment['Assessment']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $assessment['Assessment']['id']), null, __('Tem certeza de que deseja excluir # %s?', $assessment['Assessment']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Adicionar Avaliação'), array('action' => 'add')); ?></li>
	</ul>
</div>
