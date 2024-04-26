<?php
/**
 * @author Tomasz Gregorczyk <t.gregorczyk@grupatopex.com>
 */
namespace Gtx\Webservice\Helper;

use Magento\Framework\App\Config\ScopeConfigInterface;
use Magento\Framework\Encryption\EncryptorInterface;

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
     * @var string
     */
    public const XPATH_GTX_WEBSERVICE_VERIFY_PEER = 'gtx_webservice/general/verify_peer';

    /**
     * @var EncryptorInterface
     */
    protected EncryptorInterface $encryptor;

    /**
     * @var ScopeConfigInterface
     */
    protected ScopeConfigInterface $scopeConfig;

    /**
     * @param EncryptorInterface $encryptor
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(
        EncryptorInterface $encryptor,
        ScopeConfigInterface $scopeConfig
    ) {
        $this->encryptor = $encryptor;
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
        return $this->encryptor->decrypt($this->scopeConfig->getValue(self::XPATH_GTX_WEBSERVICE_PASSWORD));
    }

    /**
     * @return bool
     */
    public function getVerifyPeer(): bool
    {
        return (bool) $this->scopeConfig->getValue(self::XPATH_GTX_WEBSERVICE_VERIFY_PEER);
    }
}
