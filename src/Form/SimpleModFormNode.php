<?php


namespace Drupal\simple_mod_node\Form;

use Drupal;
use Drupal\Core\Form\ConfigFormBase;

class SimpleModFormNode extends ConfigFormBase
{

	/**
	 * Gets the configuration names that will be editable.
	 *
	 * @return array
	 *   An array of configuration object names that are editable if called in
	 *   conjunction with the trait's config() method.
	 */
	protected function getEditableConfigNames()
	{
		// TODO: Implement getEditableConfigNames() method.
	}

	/**
	 * Returns a unique string identifying the form.
	 *
	 * The returned ID should be a unique string that can be a valid PHP function
	 * name, since it's used in hook implementation names such as
	 * hook_form_FORM_ID_alter().
	 *
	 * @return string
	 *   The unique string identifying the form.
	 */
	public function getFormId()
	{
		// TODO: Implement getFormId() method.
	}
}