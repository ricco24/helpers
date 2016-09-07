<?php

namespace Kelemen\Helper;

use Nette\Http\Url;

class Assets
{
    /** @var mixed */
    private $version;

    /**
     * @param null|mixed $version
     */
    public function __construct($version = null)
    {
        $this->version = $version;
    }

    /**
     * @param string $path          Path/url to process
     * @param bool|true $prepend    If prepend is set add version to path, otherwise append version as v=? to query parameters
     * @return string
     */
    public function generateVersionPath($path, $prepend = true)
    {
        if (!$this->version) {
            return $path;
        }

        $url = new Url($path);
        $prepend
            ? $url->setPath('/' . $this->version . $url->getPath())
            : $url->setQueryParameter('v', $this->version);
        $result = (string) $url;

        return $url->getHost() ? $result : substr($result, 2);
    }
}
