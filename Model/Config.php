<?php

namespace Vendic\Zopim\Model;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Config
{
    /**
     * @var ScopeConfigInterface
     */
    private $scopeConfig;

    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    public function getCookiesEnabled()
    {
        return boolval($this->getConfig('vendic_zopim/cookie/enable'));
    }

    public function getExpectedCookieName()
    {
        return $this->getConfig('vendic_zopim/cookie/name');
    }


    public function getExpectedCookieValue()
    {
        return $this->getConfig('vendic_zopim/cookie/value');
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
        if (!empty($this->getConfig('vendic_zopim/general/delay'))) {
            $delay = $this->getConfig('vendic_zopim/general/delay');
        }

        return intval($delay);
    }

    protected function getConfig($path)
    {
        return $this->scopeConfig->getValue(
            $path,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}