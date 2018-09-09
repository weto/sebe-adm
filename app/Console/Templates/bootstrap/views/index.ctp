<?php
$data = date('Y');
$date = date('l jS \of F Y h:i:s A');
echo "<?php \n 
/**
 * Criasol - Desenvolvimento web
 * Copyright {$data},	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 *
 * 
 * @copyright	Copyright {$data},	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 * @link		http://www.criasol.com.br/
 * @name		{$action}.ctp
 * @since		{$date}
 * @author		Francis Rebouças - francisreboucas@criasol.com.br
 */
 
?>\n\n";
?>

<div class="<?php echo $pluralVar; ?> clearfix">
    <div class="breadcrumb">
        <?php echo "\t\t<?php          	
                    \$this->Html->addCrumb(ucfirst(\$this->params['controller']), array('controller'=>\$this->params['controller'],'action'=>'index'));\n
                   
                    echo \$this->Html->getCrumbs(' > ','Home');\n
		"; ?>
        <?php echo "\t\t?>"; ?>
    </div>
    <div class="page-header">
        <h2> <?php printf("<?php __('%s'); ?>", $pluralHumanName); ?></h2>	
    </div>
    <div id="operacoes">
    <div id="busca" class="pull-right">
      <form method="post" action="<?php echo "\<?php echo \$this->Html->url(array('controller' => '". $pluralVar."','action' => 'index'));?>"; ?>">
        <input type="text" title="Buscar" id="buscar_input" name="search" placeholder="Buscar" value="" />
        
      </form>
    </div>
    </div>	
    
    <table cellpadding="0" cellspacing="0" class="zebra-striped">
        <tr>
            <?php
            $i = 0;
            foreach ($fields as $field):if ($i > 3)
                    break;
                ?>
                <?php if ($field == 'id')
                    continue; ?>
                <th><?php echo "<?php echo \$this->Paginator->sort('{$field}');?>"; ?></th>
                <?php $i++;
            endforeach; ?>
            <th class=""><?php echo "<?php __('Ações');?>"; ?></th>
        </tr>
        <?php
        $arrDatas = array('created', 'updated', 'modified', 'data', 'data_aniversario', 'data_nascimento');

        echo "<?php
	\$i = 0;
	foreach (\${$pluralVar} as \${$singularVar}):
		\$class = null;
		if (\$i++ % 2 == 0) {
			\$class = ' class=\"over_azul\"';
		}
	?>\n";
        echo "\t<tr<?php echo \$class;?>>\n";
        $i = 0;
        foreach ($fields as $field) {

            if ($i > 3)
                break;

            if ($field == 'id')
                continue;

            $isKey = false;
            if (!empty($associations['belongsTo'])) {
                foreach ($associations['belongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                        $isKey = true;
                        echo "\t\t<td>\n\t\t\t<?php echo \$this->Html->link(\${$singularVar}['{$alias}']['{$details['displayField']}'], array('controller' => '{$details['controller']}', 'action' => 'view', \${$singularVar}['{$alias}']['{$details['primaryKey']}'])); ?>\n\t\t</td>\n";
                        break;
                    }
                }
            }
            if ($isKey !== true) {
                echo "\t\t<td><?php echo \${$singularVar}['{$modelClass}']['{$field}']; ?>&nbsp;</td>\n";
            }
            $i++;
        }

        echo "\t\t<td class=''>\n";
        echo "\t\t\t<?php echo \$this->Html->link( \$this->Html->image('admin/view_ico.png',array('alt'=>'Ver','title'=>'Ver')), array('action' => 'view', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false)); ?>\n";
        echo "\t\t\t<?php echo \$this->Html->link( \$this->Html->image('admin/edit_ico.png',array('alt'=>'Editar','title'=>'Editar')), array('action' => 'edit', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false)); ?>\n";
        echo "\t\t\t<?php echo \$this->Html->link( \$this->Html->image('admin/delete_ico.png',array('alt'=>'Deletar','title'=>'Deletar')), array('action' => 'delete', \${$singularVar}['{$modelClass}']['{$primaryKey}']),array('escape'=>false), sprintf(__('Tem certeza que deseja excluir este registro # %s?', true), \${$singularVar}['{$modelClass}']['{$primaryKey}'])); ?>\n";
        echo "\t\t</td>\n";
        echo "\t</tr>\n";
        echo "<?php endforeach; ?>\n";
        ?>
    </table>


    <div class="clearfix">

        <div class="paging-footer-info">
            <?php echo "<?php echo \$this->Paginator->counter(array('format' => __('Página %page% de %pages%, exibindo %current% registros no total de %count%', true))); ?>"; ?>
        </div>

        <div class="pagination" >
            <ul>
                <?php echo "<?php echo \$this->Paginator->prev('<< '.__('Anterior', true), array('tag' => 'li', 'class'=>'prev'), null, array('class'=>'disabled prev', 'tag' => 'li' , 'escape' => false));?>\n"; ?>
                <?php echo "<?php echo \$this->Paginator->numbers(array('separator'=>'', 'tag' => 'li'));?>\n"; ?>
                <?php echo "<?php echo \$this->Paginator->next(__('Próxima', true).' >>', array('tag' => 'li', 'class'=>'next'), null, array('class'=>'disabled next','tag' => 'li', 'escape' => false));?>\n"; ?>
            </ul>
        </div>

    </div>
    <div class="actions" style="padding: 20px;">
        <?php echo "<?php echo \$this->Html->link('Novo', array('action'=> 'add'), array('class'=> 'btn large success' )) ;?>\n" ?></div>
</div>