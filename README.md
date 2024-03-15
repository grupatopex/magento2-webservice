# Gtx_Webservice

Sample Magento2 plugin for GTX webservice authorization.

## Configuration

For NTLM authentication setup go to Stores -> Configuration -> Topex -> Webservice

## Usage

```php
<?php

use Gtx\Webservice\Model\File as WebserviceFile;

class MediaGalleryProcessorPlugin
{

    /**
     * @var WebserviceFile
     */
    private WebserviceFile $webserviceFile;

    /**
     * @param WebserviceFile $webserviceFile
     */
    public function __construct(
        WebserviceFile $webserviceFile
    ) {
        $this->webserviceFile = $webserviceFile;
    }

    /**
     * @param string $url
     * @return string
     */
    public function getImageContent(string $url): string
    {
        return $this->webserviceFile->fetch($url);
    }

}
```
