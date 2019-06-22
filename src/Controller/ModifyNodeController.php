<?php


namespace Drupal\simple_mod_node\Controller\ModifyNodeController;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class ModifyNodeController
 * @package Drupal\simple_mod_node\Controller\ModifyNodeController
 */
class ModifyNodeController extends ControllerBase
{
	/**
	 * Modify Node
	 *
	 * @return array
	 *
	 */

	public function modNode()
	{
		return [
			'#markup' => $this->t('Modify Node')
		];
	}
}
