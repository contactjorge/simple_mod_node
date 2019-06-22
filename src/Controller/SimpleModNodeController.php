<?php

namespace Drupal\simple_mod_node\Controller;

use Drupal;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\node\Entity\Node;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 *
 * Class SimpleModNodeController
 * @package Drupal\simple_mod_node\Controller\ModifyNodeController
 * This is mostly to display output and test node queries and reading data from the Entity and FieldStorage interface.
 * This controller may be ignored but also examined for style and suggestions.
 * It will become a reporting tool in the future.
 *
 */
class SimpleModNodeController extends ControllerBase
{

	/**
	 * @return array|int
	 * @throws InvalidPluginDefinitionException
	 * @throws PluginNotFoundException
	 */
	public function getSubscriptions()
	{
		$query = Drupal::entityTypeManager()->getStorage('node')->getQuery();
		$query
			->condition('type', 'simplenews_newsletter')
			->condition('status', TRUE);
		$sids = $query->execute();
		$subscriptions = Drupal::entityTypeManager()->getStorage('simplenews_newsletter')->loadMultiple($sids);

		return $subscriptions;
	}

	/**
	 * Modify Node
	 *
	 * @param $type
	 * @return string
	 * @throws InvalidPluginDefinitionException
	 * @throws PluginNotFoundException
	 */
	public function getSubscriptionInfo($node_type)
	{
		$content = '';
		$content .= '<ul>';

		$content .= '</ul>';

		$query = Drupal::entityTypeManager()->getStorage('node')->getQuery();
		$query
			->condition('type', 'simplenews_newsletter')
			->condition('status', TRUE);
		$sids = $query->execute();
		$subscriptions = Drupal::entityTypeManager()->getStorage('simplenews_newsletter')->loadMultiple($sids);

		return $content;
	}

	public function getMultilingualDigest(){
		$content = '';
		$query = Drupal::entityTypeManager()->getStorage('node')->getQuery();
		$query
			->condition('type', 'daily_digest_multilingual')
			->condition('status', 0);
		$ids = $query->execute();
		$digests = Drupal::entityTypeManager()->getStorage('node')->loadMultiple($ids);

		foreach ($digests as $d) {
			$content .= '<ul>';
			$content .= '<li>' . 'Digest ID: ' . $d->getEntityTypeId() . '</li>';
			$content .= '<li>' . 'Digest Title: ' . $d->getTitle() . '</li>';
			$content .= '<li>' . 'Digest Config Key: ' . $d->getConfigDependencyKey() . '</li>';
			$content .= '<li>' . 'Digest Config Name: ' . $d->getConfigDependencyName() . '</li>';
			//$content .= '<li>' . 'Digest Typed Data: ' . t($d->getTypedData()). '</li>'; // Figure ot later
			$content .= '</ul>';
		}

		return $content;

	}

	public function getComments(){
		$content = '';
		$nowTime = time();
		$yesterday = $nowTime - (10 * (60 * 1000));

		$query = Drupal::entityTypeManager()->getStorage('node')->getQuery();
		$query
			->condition('type', 'comment')
			->condition('status', TRUE);
		$ids = $query->execute();
		$comments = Drupal::entityTypeManager()->getStorage('node')->loadMultiple($ids);

		// Load comment information from the database and update the entity's
		// comment statistics properties, which are defined on each CommentItem field.
		$entity_query = Drupal::entityQuery('comment');
		$entity_query
			->condition('status', TRUE);
		$cids = $entity_query->execute();
		$count = 0;

		foreach ($cids as $cid) {
			$comments .= '<p>';
			$comments .= $count;
			$comments .= '</p>';
			$count++;
		}

		return $count;

	}


	/**
	 * @return array
	 * @throws InvalidPluginDefinitionException
	 * @throws PluginNotFoundException
	 */
	public function simpleModNode() {
		$content = '';
		$nowTime = time();
		$dayBefore = $nowTime - (2 * 60 * 1000);

		$content .= '<p>';
		$content .= 'Current Timestamp: ' . $nowTime;
		$content .= '</p>';

		$content .= '<p>';
		$content .= '10 Days Before hours: ' . $dayBefore;
		$content .= '</p>';

		$content .= '<p>';
		$content .= 'That Date is: ' . date('M d, Y H:i', $dayBefore);
		$content .= '</p>';

		$digests = $this->getMultilingualDigest();
		$content .= '<h2>';
		$content .= $digests;
		$content .= '</h2>';

		$comments = $this->getComments();
		$content .= '<p>';
		$content .= 'There are ' . $comments . ' forum post comments.';
		$content .= '</p>';


		return [
			'#markup' => $content
		];
	}
}
