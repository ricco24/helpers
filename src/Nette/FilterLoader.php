<?php

namespace Kelemen\Helper\Nette;

/**
 * Register in neon file
 *
 * <code>
 * filterLoader:
 *      class: App\Core\Helper\FilterLoader
 *      setup:
 *          - register('helper', 'callback')
 *          - register('helper2', ['Class', 'method'])
 *
 * nette.latteFactory:
 *      setup:
 *          - addFilter(null, [@filterLoader, 'load'])
 * </code>
 */
class FilterLoader
{
    /**
     * @var array All registered filters
     */
    private $filters = array();

    /**
     * Check if filter is registered, call filter if is registered
     *
     * @param string $helper
     * @return mixed
     */
    public function load($helper)
    {
        $helper = strtolower($helper);
        if (isset($this->filters[$helper])) {
            return call_user_func_array($this->filters[$helper], array_slice(func_get_args(), 1));
        }
    }

    /**
     * Registers new filter
     *
     * @param string $name
     * @param callable $callback
     */
    public function register($name, $callback)
    {
        $this->filters[strtolower($name)] = $callback;
    }
}
