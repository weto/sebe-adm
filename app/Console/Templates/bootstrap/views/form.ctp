<?php
/**
 * Criasol - Desenvolvimento web
 * Copyright 2010,	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 *
 * 
 * @copyright	Copyright 2010,	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 * @link		http://www.criasol.com.br/
 * @filepath	C:\wamp\www\cake1_3\app\vendors\shells\templates\default\views\form.ctp
 * @name		form.ctp
 * @created		Tue Jul 13 17:17:35 BRT 2010
 * @author		Criasol
 */
 
if(strstr($action, 'add'))
	$acao = 'Cadastrar';
elseif(strstr($action, 'edit'))
	$acao = 'Editar';
	
$formCreate = "<?php echo \$this->Form->create('{$modelClass}',array('class'=>'form-stacked'));?>\n";
$uploadKey = null;
if(isset($actsAs)) {
	if(is_array($actsAs) && isset($actsAs['MeioUpload'])) {
		reset($actsAs['MeioUpload']);
		$uploadKey = key($actsAs['MeioUpload']);
		$formCreate = "<?php echo \$this->Form->create('{$modelClass}', array('type' => 'file','class'=>'form'));?>\n";
	}
}
if (!empty($associations['hasMany'])) {
	foreach ($associations['hasMany'] as $assocName => $assocData) {
		if(isset($assocData['actsAs']) && is_array($assocData['actsAs']) && isset($assocData['actsAs']['MeioUpload'])) {
			$formCreate = "<?php echo \$this->Form->create('{$modelClass}', array('type' => 'file','class'=>'form'));?>\n";
		}
	}
}
?>
<div  class="<?php echo $pluralVar;?>">
  <div class="content_pad">
      
  	
      <div class="breadcrumb">
      <?php echo "\t\t<?php
                        
                        \$this->Html->addCrumb(ucfirst(\$this->params['controller']), array('controller'=>\$this->params['controller'],'action'=>'index'));\n
                        \$this->Html->addCrumb(__('".$acao."',true), '#');\n
                        echo \$this->Html->getCrumbs(' > ','Home');\n
		"; ?>
	<?php echo "\t\t?>"; ?>
    </div>
      <div id="busca" class="pull-right">
      <form method="post" action="<?php echo "\<?php echo \$this->Html->url(array('controller' => '". $pluralVar."','action' => 'index'));?>"; ?>">
        <input type="text" title="Buscar" id="buscar_input" name="search" placeholder="Buscar" value="" />
        
      </form>
    </div>
    <!-- #search --> 
    <div class="page-header"> <h1><?php printf("<?php __('%s'); ?>", $acao); ?> <?php printf("<?php __('%s'); ?>", $singularHumanName); ?></h1> </div>

    </div>

<?php echo $formCreate;?>
<?php
		echo "\t<?php\n";
		foreach ($fields as $field) {
			$rule = array();
			if (strpos($action, 'add') !== false && $field == $primaryKey) {
				continue;
			} elseif (!in_array($field, array('created', 'modified', 'updated'))) {
				if($field == $uploadKey){
                                    echo "\t\techo \"<div class='clearfix'>\";\n";
					echo "\t\techo \$this->Form->input('{$field}', array('type' => 'file'));\n";
                                    echo "\t\techo \"</div>\";\n";    
				}else{
					if( isset(  $validate[$field] ) ){
						foreach ( $validate[$field] as $key => $validacao ) {
							if( is_array( $validacao ) ){
								$ruleType = null;
								foreach ( $validacao as $key_x => $rules ) {
									if( $key_x == 'rule' ){
										$rule[] = $rules[0];
										if( $rules[0] == 'date' || $rules[0] == 'data' ){
											$ruleType = ", 'type' => 'text' ";
										}
									}
								}
							}
						}
						$rule = implode( ' ', $rule );
                                                echo "\t\techo \"<div class='clearfix'>\";\n";
						echo "\t\techo \$this->Form->input('{$field}', array( 'class' => 'xlarge  {$rule}' {$ruleType}) );\n";
                                                echo "\t\techo \"</div>\";\n";
					}else{
                                                echo "\t\techo \"<div class='clearfix'>\";\n";
						echo "\t\techo \$this->Form->input('{$field}', array('class' => 'xlarge '));\n";
                                                echo "\t\techo \"</div>\";\n";
					}
				}
			}
		}
		/*if (!empty($associations['hasMany'])) {
			foreach ($associations['hasMany'] as $assocName => $assocData) {
				if(isset($assocData['actsAs']) && is_array($assocData['actsAs']) && isset($assocData['actsAs']['MeioUpload'])) {
					echo "\t\techo \$this->Add->model('{$assocName}', '{$assocData['displayField']}', array('options' => array('type' => 'file')));\n";
				} else {
					echo "\t\techo \$this->Add->model('{$assocName}', '{$assocData['displayField']}');\n";
				}
			}
		}*/
		if (!empty($associations['hasAndBelongsToMany'])) {
			foreach ($associations['hasAndBelongsToMany'] as $assocName => $assocData) {
				echo "\t\techo \$this->Form->input('{$assocName}');\n";
			}
		}
		echo "\t?>\n";
?>
	
        <div class="actions">
          
          <?php echo "<?php echo \$this->Form->submit(__('Salvar', true), array('div' => false,'class' => 'btn success')); ?>"?>&nbsp;<button type="button" class="btn" onclick="javascript:history.back();">Cancelar</button>
        </div>
	<?php echo "<?php echo \$this->Form->end(); ?>"?>
</div>
