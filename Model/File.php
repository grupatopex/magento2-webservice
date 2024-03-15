<?php
/**
 * @author Tomasz Gregorczyk <t.gregorczyk@grupatopex.com>
 */
namespace Gtx\Webservice\Model;

use Gtx\Webservice\Helper\Data as Helper;
use Symfony\Component\HttpClient\CurlHttpClient;

class File
{
    /**
     * @var Helper
     */
    protected $helper;

    /**
     * @var CurlHttpClient
     */
    protected $httpClient;

    /**
     * @param Helper $helper
     * @param CurlHttpClient $httpClient
     */
    public function __construct(
        Helper $helper,
        CurlHttpClient $httpClient
    ) {
        $this->helper = $helper;
        $this->httpClient = $httpClient;
    }

    /**
     * Fetch file content from NTLM-protected URL.
     *
     * @param string $url The URL of the file to fetch.
     * @return string The file content
     */
    public function fetch(string $url)
    {
        $options = [
            'auth_ntlm' => [
                'username' => $this->helper->getUsername(),
                'password' => $this->helper->getPassword(),
            ]
        ];

        try {
            $response = $this->httpClient->request('GET', $url, $options);
            return $response->getContent();
        } catch (\Exception $e) {
            return '';
        }
    }
}
