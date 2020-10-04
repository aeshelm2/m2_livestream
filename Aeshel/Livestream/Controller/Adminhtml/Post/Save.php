<?php
namespace Aeshel\Livestream\Controller\Adminhtml\Post;

class Save extends \Magento\Backend\App\Action
{
    protected $streamPost;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Aeshel\Livestream\Model\Post $streamPost
    )
    {
        parent::__construct($context);
        $this->streamPost = $streamPost;
    }

    public function execute(){
        $data = $this->getRequest()->getPost();

        var_dump($data);
        die();
    }
}