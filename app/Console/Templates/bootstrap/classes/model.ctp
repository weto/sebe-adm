<?php
/**
 * Model template file.
 *
 * Used by bake to create new Model files.
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2010, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.console.libs.templates.objects
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

echo "<?php\n"; 

$data = date('Y');

echo "
/**
 * Criasol - Desenvolvimento web
 * Copyright {$data},	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 *
 * 
 * @copyright	Copyright {$data},	Criasol Soluções Criativas em Tecnologia da Informação. (http://www.criasol.com.br)
 * @link		http://www.criasol.com.br/
 * @name		Model - {$name}
 * @author		Francis Rebouças - francisreboucas@criasol.com.br
 * 
 */
 
";

?>
class <?php echo $name ?> extends <?php echo $plugin; ?>AppModel {
	public $name = '<?php echo $name; ?>';
<?php if ($useDbConfig != 'default'): ?>
	public $useDbConfig = '<?php echo $useDbConfig; ?>';
<?php endif;?>
<?php if ($useTable && $useTable !== Inflector::tableize($name)):
	$table = "'$useTable'";
	echo "\tpublic \$useTable = $table;\n";
endif;
if ($primaryKey !== 'id'): ?>
	public $primaryKey = '<?php echo $primaryKey; ?>';
<?php endif;
if ($displayField): ?>
	public $displayField = '<?php echo $displayField; ?>';
<?php endif;

if (!empty($validate)):
	echo "\tpublic \$validate = array(\n";
	foreach ($validate as $field => $validations):
		echo "\t\t'$field' => array(\n";
		foreach ($validations as $key => $validator):
			echo "\t\t\t'$key' => array(\n";
			echo "\t\t\t\t'rule' => array('$validator'),\n";
			switch ($validator) {
				case 'email':
				   echo "\t\t\t\t'message' => 'Preenchimento de email incorreto',\n";
				break;
				case 'cpf':
				case 'cnpj':
				   echo "\t\t\t\t'message' => 'Preenchimento de documento incorreto',\n";
				break;
				case 'data':
				case 'date':
				   echo "\t\t\t\t'message' => 'Preenchimento da data incorreto',\n";
				break;
				case 'time':
				   echo "\t\t\t\t'message' => 'Preenchimento de hora incorreto',\n";
				break;
				default:
					echo "\t\t\t\t'message' => 'Campo de preenchimento obrigatório',\n";
				break;
			}
			echo "\t\t\t\t//'allowEmpty' => false,\n";
			echo "\t\t\t\t//'required' => false,\n";
			echo "\t\t\t\t//'last' => false, // Stop validation after this rule\n";
			echo "\t\t\t\t//'on' => 'create', // Limit validation to 'create' or 'update' operations\n";
			echo "\t\t\t),\n";
		endforeach;
		echo "\t\t),\n";
	endforeach;
	echo "\t);\n";
endif;

if (!empty($behavior)):
	echo "\n";
	echo "\tpublic \$actsAs = array(\n";
	echo "\t\t'MeioUpload' => array(\n";
	echo "\t\t\t'$behavior' => array(\n";
	echo "\t\t\t\t'thumbsizes' => array(\n";
	echo "\t\t\t\t\t'mini' => array('width'=>50, 'height'=>50),\n";
	echo "\t\t\t\t\t'thumb' => array('width'=>120, 'height'=>120),\n";
	echo "\t\t\t\t\t'normal' => array('width'=>650, 'height'=>450)\n";
	echo "\t\t\t\t)\n";
	echo "\t\t\t)\n";
	echo "\t\t)\n";
	echo "\t);\n\n";
endif;

foreach ($associations as $assoc):
	if (!empty($assoc)):
?>
	//The Associations below have been created with all possible keys, those that are not needed can be removed
<?php
		break;
	endif;
endforeach;

foreach (array('hasOne', 'belongsTo') as $assocType):
	if (!empty($associations[$assocType])):
		$typeCount = count($associations[$assocType]);
		echo "\n\tpublic \$$assocType = array(";
		foreach ($associations[$assocType] as $i => $relation):
			$out = "\n\t\t'{$relation['alias']}' => array(\n";
			$out .= "\t\t\t'className' => '{$relation['className']}',\n";
			$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
			$out .= "\t\t\t'conditions' => '',\n";
			$out .= "\t\t\t'fields' => '',\n";
			$out .= "\t\t\t'order' => ''\n";
			$out .= "\t\t)";
			if ($i + 1 < $typeCount) {
				$out .= ",";
			}
			echo $out;
		endforeach;
		echo "\n\t);\n";
	endif;
endforeach;

if (!empty($associations['hasMany'])):
	$belongsToCount = count($associations['hasMany']);
	echo "\n\tpublic \$hasMany = array(";
	foreach ($associations['hasMany'] as $i => $relation):
		$out = "\n\t\t'{$relation['alias']}' => array(\n";
		$out .= "\t\t\t'className' => '{$relation['className']}',\n";
		$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
		$out .= "\t\t\t'dependent' => true,\n";
		$out .= "\t\t\t'conditions' => '',\n";
		$out .= "\t\t\t'fields' => '',\n";
		$out .= "\t\t\t'order' => '',\n";
		$out .= "\t\t\t'limit' => '',\n";
		$out .= "\t\t\t'offset' => '',\n";
		$out .= "\t\t\t'exclusive' => '',\n";
		$out .= "\t\t\t'finderQuery' => '',\n";
		$out .= "\t\t\t'counterQuery' => ''\n";
		$out .= "\t\t)";
		if ($i + 1 < $belongsToCount) {
			$out .= ",";
		}
		echo $out;
	endforeach;
	echo "\n\t);\n\n";
endif;

if (!empty($associations['hasAndBelongsToMany'])):
	$habtmCount = count($associations['hasAndBelongsToMany']);
	echo "\n\tpublic \$hasAndBelongsToMany = array(";
	foreach ($associations['hasAndBelongsToMany'] as $i => $relation):
		$out = "\n\t\t'{$relation['alias']}' => array(\n";
		$out .= "\t\t\t'className' => '{$relation['className']}',\n";
		$out .= "\t\t\t'joinTable' => '{$relation['joinTable']}',\n";
		$out .= "\t\t\t'foreignKey' => '{$relation['foreignKey']}',\n";
		$out .= "\t\t\t'associationForeignKey' => '{$relation['associationForeignKey']}',\n";
		$out .= "\t\t\t'unique' => true,\n";
		$out .= "\t\t\t'conditions' => '',\n";
		$out .= "\t\t\t'fields' => '',\n";
		$out .= "\t\t\t'order' => '',\n";
		$out .= "\t\t\t'limit' => '',\n";
		$out .= "\t\t\t'offset' => '',\n";
		$out .= "\t\t\t'finderQuery' => '',\n";
		$out .= "\t\t\t'deleteQuery' => '',\n";
		$out .= "\t\t\t'insertQuery' => ''\n";
		$out .= "\t\t)";
		if ($i + 1 < $habtmCount) {
			$out .= ",";
		}
		echo $out;
	endforeach;
	echo "\n\t);\n\n";
endif;
?>
}
