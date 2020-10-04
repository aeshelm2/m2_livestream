<?php
namespace Aeshel\Livestream\Model\ResourceModel\Post;


class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
	protected $_idFieldName = 'post_id';
	protected $_eventPrefix = 'aeshel_livestream_collection';
	protected $_eventObject = 'post_collection';

	/**
	 * Define resource model
	 *
	 * @return void
	 */
	protected function _construct()
	{
		$this->_init('Aeshel\Livestream\Model\Post', 'Aeshel\Livestream\Model\ResourceModel\Post');
	}
}
