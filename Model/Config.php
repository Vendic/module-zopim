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
        return boolval(
            $this->scopeConfig->getValue(
                'vendic_zopim/cookie/enable',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            )
        );
    }

    public function getCookieName()
    {
        return $this->scopeConfig->getValue(
            'vendic_zopim/cookie/name',
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}