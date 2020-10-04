<?php
namespace Aeshel\Livestream\Controller\Adminhtml\Post;

class Stream extends \Magento\Backend\App\Action
{
    protected $pageFactory;

    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $pageFactory
    )
    {
        parent::__construct($context);
        $this->pageFactory = $pageFactory;
    }

    public function execute(){
        $pageFactory = $this->pageFactory->create();
        $pageFactory->getConfig()->getTitle()->set(__('Live Stream / New'));

        return $pageFactory;
    }
}