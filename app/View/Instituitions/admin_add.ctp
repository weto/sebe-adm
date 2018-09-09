<div class="instituitions form">
<?php echo $this->Form->create('Instituitiom');?>
	<fieldset>
		<legend><?php echo __('Cadastro de Instituição'); ?></legend>
		<?php
			echo $this->Form->input('name',array('class'=>'font'));
			echo $this->Form->input('fantasyname',array('class'=>'font'));
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

		<li><?php echo $this->Html->link(__('Listagem'), array('action' => 'index'));?></li>
	</ul>
</div>
