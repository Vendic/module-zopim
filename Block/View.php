<?php

namespace Vendic\Zopim\Block;

use Magento\Framework\View\Element\Template;
use Vendic\Zopim\Model\Config;

class View extends \Magento\Framework\View\Element\Template
{
    public $config;

    public function __construct(
        Config $config,
        Template\Context $context, array $data = [])
    {
        $this->config = $config;
        parent::__construct($context, $data);
    }

}