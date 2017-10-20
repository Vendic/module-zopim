<?php

namespace Vendic\Zopim\Block;

use Magento\Framework\View\Element\Template;

class View extends \Magento\Framework\View\Element\Template
{

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