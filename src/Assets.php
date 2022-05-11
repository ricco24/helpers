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
     * @param bool $prepend    If prepend is set add version to path, otherwise append version as v=? to query parameters
     * @return string
     */
    public function generateVersionPath(string $path, bool $prepend = true): string
    {
        if (!$this->version) {
            return $path;
        }

        $url = new Url($path);
        $prepend
            ? $url->setPath('/' . $this->version . $url->getPath())
            : $url->setQueryParameter('v', $this->version);
        $result = (string) $url;

        if ($url->getHost()) {
            return $result;
        }

        // Nette/Http v2.4.0 and older return url prefixed with "//" if no host given
        return substr($result, 0, 2) === '//' ? substr($result, 2) : $result;
    }
}
