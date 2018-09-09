<?php
/**
 *
 * PHP 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.View.Layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

$cakeDescription = __d('Administrador Somos Educação','');
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $cakeDescription ?>:
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');
		echo $this->Html->css('admin');
		echo $this->Html->css('bootstrap');
		echo $this->Html->css('bootstrap.min');
		echo $this->Html->css('cake.generic');
		echo $this->Html->css('prioridade');
                
		echo $this->Html->script('jquery-1.7.2');
		echo $this->Html->script('busca');
                
		echo $this->fetch('meta');
		echo $this->fetch('css');
		echo $this->fetch('script');
	?>
</head>

<body>
	<div class="content_central">
        <div class="content_cabecalho">
            <div class="cabecalho">
                <div class="logo"><?php echo $this->Html->image('logo.png');?></div>
            </div>
            <div class="cabecalho_bottom">
                <div id="navigation">
                    <ul>
                        <li><?php echo $this->Html->link('Instituições',array('controller'=>'instituitions','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Cursos',array('controller'=>'courses','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Estudantes',array('controller'=>'students','action'=>'index')); ?></li>
                        <li><?php echo $this->Html->link('Avaliações',array('controller'=>'assessments','action'=>'index')); ?></li>
                    </ul>
                </div>
            </div>
        </div>
            
        <div class="conteudo_lintagem">
            <div class="msg_ajax"></div>
			<?php echo $this->Session->flash(); ?>
			<?php echo $this->fetch('content'); ?>
            <div class="clear"></div>
        </div>
		<div class="footer"><p>© Copyright Somos Educação</p></div>
		<?php echo $this->element('sql_dump'); ?>
	</div>
</body>
</html>