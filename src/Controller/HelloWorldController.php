<?php

namespace Drupal\simple_mod_node\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Controller for the salutation message.
 * I created SimpleModNodeController from memory and it was not working.
 * This controller and route was used as a reference to determine why
 * SimpleModNodeController was not working. It boiled down to inappropriate settings
 * in the *.routing.yml file.
 * I had _access: 'access content' instead of _permission: 'administer site configuration'
 */
class HelloWorldController extends ControllerBase
{
	/**
	 * Hello World.
	 *
	 * @return array
	 */
	public function helloWorld() {
		return [
			'#markup' => $this->t('Hello World')
		];
	}
}

