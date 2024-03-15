<?php
/**
 * @author Tomasz Gregorczyk <t.gregorczyk@grupatopex.com>
 */
namespace Gtx\Webservice\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;

class Data
{
    /**
     * @var string
     */
    public const XPATH_GTX_WEBSERVICE_USERNAME = 'gtx_webservice/general/username';

    /**
     * @var string
     */
    public const XPATH_GTX_WEBSERVICE_PASSWORD = 'gtx_webservice/general/password';

    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;

    /**
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        ScopeConfigInterface $scopeConfig
    ) {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * @return string
     */
    public function getUsername(): string
    {
        return (string) $this->scopeConfig->getValue(self::XPATH_GTX_WEBSERVICE_USERNAME);
    }

    /**
     * @return string
     */
    public function getPassword(): string
    {
        return (string) $this->scopeConfig->getValue(self::XPATH_GTX_WEBSERVICE_PASSWORD);
    }
}
