<?php
namespace Aeshel\Livestream\Block\Live;


class Stream extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context,$data);
    }

    public function _prepareLayout(){
        // $this->getLayout()->addJs('');
    }

}