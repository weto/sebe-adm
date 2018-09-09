<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2012, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       Cake.Console.Templates.default.views
 * @since         CakePHP(tm) v 1.2.0.5234
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<div class="breadcrumb">
	<?php echo "\t\t<?php          	
				\$this->Html->addCrumb(ucfirst(\$this->params['controller']), array('controller'=>\$this->params['controller'],'action'=>'index'));\n
			   
				echo \$this->Html->getCrumbs(' > ','Home');\n
	"; ?>
	<?php echo "\t\t?>"; ?>
</div>
<br />

<div class="<?php echo $pluralVar;?> form">
<?php echo "<?php echo \$this->Form->create('{$modelClass}');?>\n";?>
	<fieldset>
		<legend></legend>
		<div class="titulo"><?php printf("<?php echo __('Cadastro de %s'); ?>", $singularHumanName); ?></div>
		<br />
		<br />
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				if($field == 'dataEvento'){
					echo "\t\techo \$this->Form->input('{$field}',array('class'=>'data_evento font','id'=>'datepicker'));\n";
				}else{
						if($field == 'category_id'){
							echo "\t\techo \$this->Form->input('{$field}',array('class'=>'select font'));\n";
						}else{
							echo "\t\techo \$this->Form->input('{$field}',array('class'=>'font'));\n";
						}
					}
			}
		}
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}',array('class'=>'font'));\n";
			}
		}
		echo "\t?>\n";
?>
	</fieldset>
<?php
	echo "<?php echo \$this->Form->end(__('Submit'));?>\n";
?>
</div>
<div class="actions">
	<div class="titulo"><?php echo "<?php echo __('Actions'); ?>";?></div>
    <br />
	<br />
	
	<ul>

<?php if (strpos($action, 'add') === false): ?>
		<li><?php echo "<?php echo \$this->Form->postLink(__('Excluir'), array('action' => 'delete', \$this->Form->value('{$modelClass}.{$primaryKey}')), null, __('Tem certeza de que deseja excluir # %s?', \$this->Form->value('{$modelClass}.{$primaryKey}'))); ?>";?></li>
<?php endif;?>
		<li><?php echo "<?php echo \$this->Html->link(__('Listagem de " . $pluralHumanName . "'), array('action' => 'index'));?>";?></li>
	</ul>
</div>
