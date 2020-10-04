<?php
namespace Aeshel\Livestream\Model;

use Magento\Framework\Model\AbstractModel;

class Post extends AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
	const CACHE_TAG = 'aeshel_livestream';

	protected $_cacheTag = 'aeshel_livestream';

	protected $_eventPrefix = 'aeshel_livestream';

	protected function _construct()
	{
		$this->_init('Aeshel\Livestream\Model\ResourceModel\Post');
	}

	public function getIdentities()
	{
		return [self::CACHE_TAG . '_' . $this->getId()];
	}

	public function getDefaultValues()
	{
		$values = [];

		return $values;
	}

}