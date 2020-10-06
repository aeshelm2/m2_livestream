<?php
namespace Aeshel\Livestream\Block\Live;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Stream extends \Magento\Framework\View\Element\Template
{
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $data = []
    )
    {
        parent::__construct($context,$data);
    }

    public function getStreamKey(){
        return 'test';
    }

    public function getStreamSource(){
        $streamPort = $this->getStreamPort();
        $streamKey = $this->getStreamKey();

        return "http://192.168.0.106:$streamPort/hls/$streamKey.m3u8";
    }

    public function getStreamPort(){
        $port = $this->_scopeConfig->getValue(
            'live/streamconfig/port', 
            ScopeConfigInterface::SCOPE_TYPE_DEFAULT,
            $this->_storeManager->getStore()->getId()
        );

        return '8080';
    }
}