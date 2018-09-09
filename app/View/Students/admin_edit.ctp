<div class="students form">
<?php echo $this->Form->create('Student');?>
	<fieldset>
		<legend><?php echo __('Cadastro de Estudante'); ?></legend>
		<?php
			echo $this->Form->input('id',array('class'=>'font'));
			echo $this->Form->input('name',array('class'=>'font'));
			echo $this->Form->input('average',array('type'=>'hidden'));
			echo $this->Form->input('course_id',array('class'=>'font'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>

		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Student.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Student.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listagem de Estudates'), array('action' => 'index'));?></li>
	</ul>
</div>
