<div class="instituitions index">
	<div class="itens">
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Itens {:start}-{:end} de {:count}')
	));
	?>	</div>
	
	<div class="titulo">Listagem de <?php echo __('Instituições');?></div>
    <br />
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('fantasyname');?></th>
			<th><?php echo $this->Paginator->sort('note');?></th>
			<th class="actions center"><?php echo __('Actions');?></th>
	</tr>
	<?php
	foreach ($instituitions as $instituitiom): ?>
	<tr>
		<td><?php echo h($instituitiom['Instituitiom']['id']); ?>&nbsp;</td>
		<td><?php echo h($instituitiom['Instituitiom']['fantasyname']); ?>&nbsp;</td>
		<td><?php echo h($instituitiom['Instituitiom']['note']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Visualizar'), array('action' => 'view', $instituitiom['Instituitiom']['id'])); ?>
			<?php echo $this->Html->link(__('Editar'), array('action' => 'edit', $instituitiom['Instituitiom']['id'])); ?>
			<?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $instituitiom['Instituitiom']['id']), null, __('Tem certeza de que deseja excluir # %s?', $instituitiom['Instituitiom']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Adicionar Instituição'), array('action' => 'add')); ?></li>
	</ul>
</div>
