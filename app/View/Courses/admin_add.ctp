<div class="courses form">
<?php echo $this->Form->create('Cours');?>
	<fieldset>
		<legend><?php echo __('Cadastro de Cours'); ?></legend>
		<?php
			echo $this->Form->input('name',array('class'=>'font'));
			echo $this->Form->input('instituition_id',array('class'=>'font'));
			echo $this->Form->input('note',array('type'=>'hidden'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>

		<li><?php echo $this->Html->link(__('Listagem de Cursos'), array('action' => 'index'));?></li>
	</ul>
</div>
