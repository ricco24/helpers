Helpers
============

Some useful helpers

## Filter loader

Register in neon file

```neon
services:
    filterLoader:
        factory: Kelemen\Helper\Nette\FilterLoader
        setup:
            - register('helper', 'callback')
            - register('helper2', ['Class', 'method'])
    
    nette.latteFactory:
        setup:
            - addFilterLoader([@filterLoader, 'load'])
```
