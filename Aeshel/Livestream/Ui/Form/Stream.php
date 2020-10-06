<?php
namespace Aeshel\Livestream\Ui\Form;

use Magento\Framework\App\ObjectManager;

class Stream extends \Magento\Ui\Component\Form\Field
{
    public function prepare(){
        $encryptor = ObjectManager::getInstance()->get('Magento\Framework\Encryption\EncryptorInterface');
        $toHash = 'aeshel_stream_'.strtotime("now");
        $streamKey = $encryptor->hash($toHash);
        
        if($this->getName() == 'stream_key'){
            $newArr = $this->getData('config');
            $newArr['default'] = $streamKey;
            $this->setData('config',$newArr);
        }

        
        parent::prepare();
    }
}