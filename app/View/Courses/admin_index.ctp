<div class="courses index">
	<div class="itens">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Itens {:start}-{:end} de {:count}')
	));
	?>	</div>
	
	<div class="titulo">Listagem de <?php echo __('Cursos');?></div>
    <br />
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('name');?></th>
			<th><?php echo $this->Paginator->sort('instituition_id');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th class="actions center"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($courses as $cours): ?>
	<tr>
		<td><?php echo h($cours['Cours']['id']); ?>&nbsp;</td>
		<td><?php echo h($cours['Cours']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($cours['Instituition']['name'], array('controller' => 'instituitions', 'action' => 'view', $cours['Instituition']['id'])); ?>
		</td>
		<td><?php echo h($cours['Cours']['note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $cours['Cours']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $cours['Cours']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $cours['Cours']['id']), null, __('Tem certeza de que deseja excluir # %s?', $cours['Cours']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Adicionar Curso'), array('action' => 'add')); ?></li>
	</ul>
</div>
