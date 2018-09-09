<div class="courses view">
	<div class="titulo">Listagem de <?php echo __('Curso');?></div>
    <br />
	<br />
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($cours['Cours']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Name'); ?></dt>
		<dd>
			<?php echo h($cours['Cours']['name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Instituition'); ?></dt>
		<dd>
			<?php echo $this->Html->link($cours['Instituition']['name'], array('controller' => 'instituitions', 'action' => 'view', $cours['Instituition']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('note'); ?></dt>
		<dd>
			<?php echo h($cours['Cours']['note']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>
		<li><?php echo $this->Html->link(__('Editar Curso'), array('action' => 'edit', $cours['Cours']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Excluir Curso'), array('action' => 'delete', $cours['Cours']['id']), null, __('Tem certeza de que deseja excluir # %s?', $cours['Cours']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('Listagem Cursos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Adicionar Curso'), array('action' => 'add')); ?> </li>
	</ul>
</div>
