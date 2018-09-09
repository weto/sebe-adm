<?php
/**
 * Criasol - Desenvolvimento web
 * Copyright 2010,	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 *
 * 
 * @copyright	Copyright 2010,	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 * @link		http://www.criasol.com.br/
 * @filepath	C:\wamp\www\cake1_3\app\vendors\shells\templates\default\views\view.ctp
 * @name		view.ctp
 * @created		Wed Jul 14 11:13:10 BRT 2010
 * @author		Criasol
 */
 
?>

  <div class="content_pad">      <div class="breadcrumb">
      <?php echo "\t\t<?php								
                        \$this->Html->addCrumb(ucfirst(\$this->params['controller']), array('controller'=>\$this->params['controller'],'action'=>'index'));\n
                        \$this->Html->addCrumb(__(ucfirst(str_replace('admin_','' ,\$this->params['action'])),true), '#');\n
                        echo \$this->Html->getCrumbs(' > ','Home');\n
		"; ?>
	<?php echo "\t\t?>"; ?>
    </div>
          
    <div id="busca" class="pull-right">
      <form method="post" action="<?php echo "\<?php echo \$this->Html->url(array('controller' => '". $pluralVar."','action' => 'index'));?>"; ?>">
        <input type="text" title="Buscar" id="buscar_input" name="search" placeholder="Buscar" value="" />
        
      </form>
    </div>
  	<div class="page-header"><h1><?php printf("<?php __('%s'); ?>", $singularHumanName); ?></h1></div>



    <!-- #search --> 
    
    </div>

<div id="content" class="xgrid <?php echo $pluralVar;?> view">
<div class="x9 portlet tabela">
<table cellpadding="0" cellspacing="0" width="100%" class="zebra-striped">
<?php
$x = 0;
foreach ($fields as $field) {
	$class = ($x%2==0) ? 'linhap' : 'linhai';
	$isKey = false;
	if (!empty($associations['belongsTo'])) {
		foreach ($associations['belongsTo'] as $alias => $details) {
			if ($field === $details['foreignKey']) {
				$isKey = true;
				echo "\t<tr class=\"{$class}\">\n";
				echo "\t\t<td class=\"key\"><?php __('".Inflector::humanize(Inflector::underscore($alias))."'); ?></td>\n";
				echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller'=> '{$details['controller']}', 'action'=>'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
				echo "\t</tr>\n";
				break;
			}
		}
	}
	if ($isKey !== true) {
		echo "\t<tr class=\"{$class}\">\n";
		echo "\t\t<td class=\"key\"><?php __('".Inflector::humanize($field)."'); ?></td>\n";
		if(in_array($field, array('created', 'updated', 'modified','data','data_inicio','data_fim','data_inicial','data_final','data_aniversario'))){
			echo "\t\t<td>\n\t\t\t<?php echo date('d/m/Y H:i:s', strtotime(\${$singularVar}['{$modelClass}']['{$field}'])); ?>\n\t\t</td>\n";
		} else {
			echo "\t\t<td>\n\t\t\t<?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>\n\t\t</td>\n";
		}
		echo "\t</tr>\n";
	}
	
	$x++;
}
?>
</table>
    
    <div class="actions">
          
         <button type="button" class="btn" onclick="javascript:history.back();">Voltar</button>
        </div>
</div>

<?php
if (!empty($associations['hasOne'])) :
	foreach ($associations['hasOne'] as $alias => $details): ?>
	<div class="related">
		<h3><?php echo "<?php  __('".Inflector::humanize($details['controller'])." Relacionados');?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
		<table cellpadding="0" cellspacing="0" width="100%">
	<?php
			foreach ($details['fields'] as $field) {
				echo "\t<tr class=\"{$class}\">\n";
				echo "\t\t<td class=\"key\"><?php __('".Inflector::humanize($field)."');?></td>\n";
				echo "\t\t<td>\n\t<?php echo \${$singularVar}['{$alias}']['{$field}'];?>\n&nbsp;</td>\n";
			}
	?>
		</dl>
	<?php echo "<?php endif; ?>\n"; ?>
		<div class="actions">
			<ul>
				<li><?php echo "<?php echo \$html->link(__('Editar ".Inflector::humanize(Inflector::underscore($alias))."', true), array('controller'=> '{$details['controller']}', 'action'=>'edit', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?></li>\n";?>
			</ul>
		</div>
	</div>
	<?php
	endforeach;
endif;
if (empty($associations['hasMany'])) {
	$associations['hasMany'] = array();
}
if (empty($associations['hasAndBelongsToMany'])) {
	$associations['hasAndBelongsToMany'] = array();
}
$relations = array_merge($associations['hasMany'], $associations['hasAndBelongsToMany']);

/**
 *  NAO MOSTRAR RELACIONAMENTOS EM CASCATA
 */
$relations = array();

$i = 0;
foreach ($relations as $alias => $details):
	$otherSingularVar = Inflector::variable($alias);
	$otherPluralHumanName = Inflector::humanize($details['controller']);
	?>
<div class="related">
	<h3><?php echo "<?php __('{$otherPluralHumanName} Relacionados');?>";?></h3>
	<?php echo "<?php if (!empty(\${$singularVar}['{$alias}'])):?>\n";?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
<?php
			foreach ($details['fields'] as $field) {
				echo "\t\t<th><?php __('".Inflector::humanize($field)."'); ?></th>\n";
			}
?>
		<th class="actions"><?php echo "<?php __('Ações');?>";?></th>
	</tr>
<?php
echo "\t<?php
		\$i = 0;
		foreach (\${$singularVar}['{$alias}'] as \${$otherSingularVar}):
			\$class = null;
			if (\$i++ % 2 == 0) {
				\$class = 'class=\"altrow\"';
			}
		?>\n";
		echo "\t\t<tr <?php echo \$class;?>>\n";

				foreach ($details['fields'] as $field) {
					echo "\t\t\t<td><?php echo \${$otherSingularVar}['{$field}'];?></td>\n";
				}

				echo "\t\t\t<td class=\"actions\">\n";
				echo "\t\t\t\t<?php echo \$this->Html->link(__('Visualizar', true), array('controller'=> '{$details['controller']}', 'action'=>'view', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
				echo "\t\t\t\t<?php echo \$this->Html->link(__('Editar', true), array('controller'=> '{$details['controller']}', 'action'=>'edit', \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
				echo "\t\t\t\t<?php echo \$this->Html->link(__('Excluir', true), array('controller'=> '{$details['controller']}', 'action'=>'delete', \${$otherSingularVar}['{$details['primaryKey']}']), null, sprintf(__('Deseja excluir o registro # %s?', true), \${$otherSingularVar}['{$details['primaryKey']}'])); ?>\n";
				echo "\t\t\t</td>\n";
			echo "\t\t</tr>\n";

echo "\t<?php endforeach; ?>\n";
?>
	</table>
<?php echo "<?php endif; ?>\n\n";?>
	<div class="actions">
		<ul>
			<li><?php echo "<?php echo \$this->Html->link(__('Adicionar ".Inflector::humanize(Inflector::underscore($alias))."', true), array('controller'=> '{$details['controller']}', 'action'=>'add'));?>";?> </li>
		</ul>
	</div>
</div>
<?php endforeach;?>
</div>