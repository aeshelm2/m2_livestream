<?php
namespace Aeshel\Livestream\Ui\Form;

class Options implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [['value' => 1, 'label' => __('Enable')], ['value' => 0, 'label' => __('Disable')]];
    }

    public function toArray()
    {
        return [0 => __('Disable'), 1 => __('Enable')];
    }
}
