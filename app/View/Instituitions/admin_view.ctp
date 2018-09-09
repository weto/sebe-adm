<div class="instituitions view">
	<div class="titulo">Listagem de <?php echo __('Instituição');?></div>
    <br />
	<br />
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($instituitiom['Instituitiom']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($instituitiom['Instituitiom']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Fantasyname'); ?></dt>
		<dd>
			<?php echo h($instituitiom['Instituitiom']['fantasyname']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('note'); ?></dt>
		<dd>
			<?php echo h($instituitiom['Instituitiom']['note']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>
		<li><?php echo $this->Html->link(__('Editar Instituição'), array('action' => 'edit', $instituitiom['Instituitiom']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Instituição'), array('action' => 'delete', $instituitiom['Instituitiom']['id']), null, __('Tem certeza de que deseja excluir # %s?', $instituitiom['Instituitiom']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listagem Instituição'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Adicionar Instituição'), array('action' => 'add')); ?> </li>
	</ul>
</div>
