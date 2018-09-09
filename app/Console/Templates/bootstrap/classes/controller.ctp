<?php
/**
 * Controller bake template file
 *
 * Allows templating of Controllers generated from bake.
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
 * @subpackage    cake.
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
 * @name		Controller - {$controllerName}
 * @author		Francis Rebouças - francisreboucas@criasol.com.br
 * 
 */
 
";

?>
class <?php echo $controllerName; ?>Controller extends <?php echo $plugin; ?>AppController {

	public $name = '<?php echo $controllerName; ?>';
	
	public $display = '<?php echo $controllerName; ?>';
	
<?php if ($isScaffold): ?>
	public $scaffold;
<?php else: ?>
<?php
if (count($helpers)):
	echo "\tpublic \$helpers = array(";
	for ($i = 0, $len = count($helpers); $i < $len; $i++):
		if ($i != $len - 1):
			echo "'" . Inflector::camelize($helpers[$i]) . "', ";
		else:
			echo "'" . Inflector::camelize($helpers[$i]) . "'";
		endif;
	endfor;
	echo ");\n";
endif;

if (count($components)):
	echo "\tpublic \$components = array(";
	for ($i = 0, $len = count($components); $i < $len; $i++):
		if ($i != $len - 1):
			echo "'" . Inflector::camelize($components[$i]) . "', ";
		else:
			echo "'" . Inflector::camelize($components[$i]) . "'";
		endif;
	endfor;
	echo ");\n";
endif;


echo "\n\tpublic function beforeFilter(){
		parent::beforeFilter();
		
	}\n";


echo $actions;

endif; ?>

}
