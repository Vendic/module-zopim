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

    protected function getConfig($path)
    {
        return $this->_scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }

    public function getIsEnabled()
    {
        return boolval($this->getConfig('vendic_zopim/general/enable'));
    }

    public function getZopimId()
    {
        return $this->getConfig('vendic_zopim/general/zopim_id');
    }

    public function getDelay()
    {
        $delay = 0;
        if(!empty($this->getConfig('vendic_zopim/general/delay'))) {
            $delay = $this->getConfig('vendic_zopim/general/delay');
        }

        return intval($delay);
    }

}