<div class="assessments form">
<?php echo $this->Form->create('Assessment');?>
	<fieldset>
		<legend><?php echo __('Cadastro de Avaliação'); ?></legend>
		<?php
			echo $this->Form->input('id',array('class'=>'font'));
			echo $this->Form->input('note',array('class'=>'font'));
			echo $this->Form->input('period',array('type'=>'select', 'options'=>array('02/2018'=>'02/2018')));
			echo $this->Form->input('student_id',array('class'=>'font'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>

		<li><?php echo $this->Form->postLink(__('Excluir'), array('action' => 'delete', $this->Form->value('Assessment.id')), null, __('Tem certeza de que deseja excluir # %s?', $this->Form->value('Assessment.id'))); ?></li>
		<li><?php echo $this->Html->link(__('Listagem Avaliações'), array('action' => 'index'));?></li>
	</ul>
</div>
