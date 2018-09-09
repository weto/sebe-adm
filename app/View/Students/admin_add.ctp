<div class="students form">
<?php echo $this->Form->create('Student');?>
	<fieldset>
		<legend><?php echo __('Cadastro de Student'); ?></legend>
		<?php
			echo $this->Form->input('name',array('class'=>'font'));
			echo $this->Form->input('course_id',array('class'=>'font'));
			echo $this->Form->input('average',array('type'=>'hidden'));
		?>
	</fieldset>
<?php echo $this->Form->end(__('Submit'));?>
</div>
<div class="actions">
	<div class="titulo"><?php echo __('Actions'); ?></div>
    <br />
	<br />
	
	<ul>

		<li><?php echo $this->Html->link(__('Listagem de Estudates'), array('action' => 'index'));?></li>
	</ul>
</div>
