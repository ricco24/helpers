<?php

namespace Kelemen\Helper\Nette;

class FilterLoader
{
    /**
     * @var array<string, callable> All registered filters
     */
    private $filters = [];

    /**
     * Check if filter is registered and return it
     */
    public function load(string $helper): ?callable
    {
        $helper = strtolower($helper);
        return $this->filters[$helper] ?? null;
    }

    /**
     * Registers new filter
     */
    public function register(string $name, callable $callback)
    {
        $this->filters[strtolower($name)] = $callback;
    }

    /**
     * @return array<string, callable>
     */
    public function getFilters(): array
    {
        return $this->filters;
    }
}
