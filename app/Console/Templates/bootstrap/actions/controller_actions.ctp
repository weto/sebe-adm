<?php
/**
 * Bake Template for Controller action generation.
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
 * @subpackage    cake.console.libs.template.objects
 * @since         CakePHP(tm) v 1.3
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>

	/**
	 * Função de listagem de <?php echo $currentModelName  ."\n" ?>
	 * @prefix <?php echo $admin ?>	 
	 * @param none
	 * @return array()
	 */
	public function <?php echo $admin ?>index() {
		$this-><?php echo $currentModelName ?>->recursive = 0;
 		/**
		 * Script de busca
		 */
		if( isset($this->params['named']['busca']) ) {
			$schema = $this-><?php echo $currentModelName ?>->schema();
			$indices = array_keys($schema);
			foreach( $indices as &$indice ){
				$indice = "<?php echo $currentModelName ?>.{$indice} LIKE '%{$this->params['named']['busca']}%'";
			}
			$this->paginate['conditions'] = array('OR' => $indices);
		}		
		$this->set('<?php echo $pluralName ?>', $this->paginate());
	}

	/**
	 * Função de Visualização de <?php echo $currentModelName  ."\n"?>
	 * @prefix <?php echo $admin ?>	 
	 * @param id
	 * @return array()
	 */
	public function <?php echo $admin ?>view($id = null) {
		if (!$id) {
<?php if ($wannaUseSession): ?>
			$this->Session->setFlash(sprintf(__('%s inválido.', true), $this->display) , 'default' ,array( 'class' => 'alert-message fade in error' ) );
			$this->redirect(array('action' => 'index'));
<?php else: ?>
			$this->flash( sprintf( __('%s inválido.', true), $this->display) , 'default' , array('action' => 'index' , 'class' => 'alert-message fade in warning' ));
<?php endif; ?>
		}
		$this->set('<?php echo $singularName; ?>', $this-><?php echo $currentModelName; ?>->read(null, $id));
	}
<?php
$compact = array(); ?>
	/**
	 * Função para Adicionar <?php echo $currentModelName  ."\n"?>
	 * @prefix <?php echo $admin ?>	 
	 * @param none
	 * @return true / false
	 */
	public function <?php echo $admin ?>add() {
		if (!empty($this->data)) {
			$this-><?php echo $currentModelName; ?>->create();
			if ($this-><?php echo $currentModelName; ?>->save($this->data)) {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(sprintf(__('%s cadastrado(a) com sucesso.', true), $this->display) , 'default' ,array( 'class' => 'alert-message fade in success'  ));
				$this->redirect(array('action' => 'index'));
<?php else: ?>
				$this->flash(sprintf(__('%s cadastrado(a) com sucesso.', true), $this->display), 'default', array('action' => 'index','class' => 'alert-message fade in success' ));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(sprintf(__('O(a) %s não pode ser cadastrado(a). Por favor, tente novamente.', true), $this->display) , 'default' ,array( 'class' => 'alert-message fade in error'  ));
<?php endif; ?>
			}
		}
<?php
	foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
		foreach ($modelObj->{$assoc} as $associationName => $relation):
			if (!empty($associationName)):
				$otherModelName = $this->_modelName($associationName);
				$otherPluralName = $this->_pluralName($associationName);
				echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
				$compact[] = "'{$otherPluralName}'";
			endif;
		endforeach;
	endforeach;
	if (!empty($compact)):
		echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
	endif;
?>
	}

<?php $compact = array(); ?>
	/**
	 * Função para Editar <?php echo $currentModelName  ."\n" ?>
	 * @prefix <?php echo $admin ?>	 
	 * @param id
	 * @return array()
	 */
	public function <?php echo $admin; ?>edit($id = null) {
		if (!$id && empty($this->data)) {
<?php if ($wannaUseSession): ?>
			$this->Session->setFlash(sprintf(__('%s inválido.', true), $this->display) , 'default' ,array( 'class' => 'alert-message fade in error'  ));
			$this->redirect(array('action' => 'index'));
<?php else: ?>
			$this->flash(sprintf(__('%s inválido.', true), $this->display), 'default' , array('action' => 'index','class' => 'alert-message fade in warning' ));
<?php endif; ?>
		}
		if (!empty($this->data)) {
			if ($this-><?php echo $currentModelName; ?>->save($this->data)) {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(sprintf(__('%s alterado(a) com sucesso.', true), $this->display) , 'default' ,array( 'class' => 'alert-message fade in success'  ));
				$this->redirect(array('action' => 'index'));
<?php else: ?>
				$this->flash(sprintf(__('%s alterado(a) com sucesso.', true), $this->display), 'default' , array('action' => 'index', 'class' => 'alert-message fade in success'  ));
<?php endif; ?>
			} else {
<?php if ($wannaUseSession): ?>
				$this->Session->setFlash(sprintf(__('O(a) %s não pode ser alterado(a). Por favor, tente novamente.', true), $this->display), 'default' , array('class' => 'alert-message fade in error' ));
<?php endif; ?>
			}
		}
		if (empty($this->data)) {
			$this->data = $this-><?php echo $currentModelName; ?>->read(null, $id);
		}
<?php
		foreach (array('belongsTo', 'hasAndBelongsToMany') as $assoc):
			foreach ($modelObj->{$assoc} as $associationName => $relation):
				if (!empty($associationName)):
					$otherModelName = $this->_modelName($associationName);
					$otherPluralName = $this->_pluralName($associationName);
					echo "\t\t\${$otherPluralName} = \$this->{$currentModelName}->{$otherModelName}->find('list');\n";
					$compact[] = "'{$otherPluralName}'";
				endif;
			endforeach;
		endforeach;
		if (!empty($compact)):
			echo "\t\t\$this->set(compact(".join(', ', $compact)."));\n";
		endif;
	?>
	}
	/**
	 * Função para Deletar <?php echo $currentModelName ."\n" ?>
	 * @prefix <?php echo $admin ?>	 
	 * @param id
	 * @return true / false
	 */
	public function <?php echo $admin; ?>delete($id = null) {
		if (!$id) {
<?php if ($wannaUseSession): ?>
			$this->Session->setFlash(sprintf(__('%s inválido.', true), $this->display), 'default' , array('class' => 'alert-message fade in error' ));
			$this->redirect(array('action'=>'index'));
<?php else: ?>
			$this->flash(sprintf(__('%s inválido.', true), $this->display), 'default' , array('class' => 'msg-error', 'action' => 'index' ));
<?php endif; ?>
		}
		if ($this-><?php echo $currentModelName; ?>->delete($id)) {
<?php if ($wannaUseSession): ?>
			$this->Session->setFlash(sprintf(__('%s removido(a) com sucesso.', true), $this->display), 'default' , array('class' => 'alert-message fade in success' ));
			$this->redirect(array('action'=>'index'));
<?php else: ?>
			$this->flash(sprintf(__('%s removido(a) com sucesso.', true), $this->display), 'default' , array('action' => 'index','class' => 'alert-message fade in success' ));
<?php endif; ?>
		}
<?php if ($wannaUseSession): ?>
		$this->Session->setFlash(sprintf(__('%s não pode ser removido(a). Tente novamente.', true), $this->display), 'default' , array('class' => 'alert-message fade in error' ));
<?php else: ?>
		$this->flash(sprintf(__('%s não pode ser removido(a). Tente novamente.', true), $this->display), 'default' , array('class' => 'alert-message fade in error' ));
<?php endif; ?>
		$this->redirect(array('action' => 'index'));
	}