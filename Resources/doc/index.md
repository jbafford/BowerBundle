BaffordBowerBundle
==================

This bundle provides a simple interface to execute bower from the Symfony console or via composer install/update.

## Installation

### Requirements

BowerBundle requires PHP 5.4 (for short array syntax).

There is a composer dependency on Symfony 2.5. It almost certainly works on older versions of Symfony, though it hasn't been tested.

### Get the bundle

Add the following in your ```composer.json```:

``` json
{
    "require": {
        "jbafford/bower-bundle": "dev-master"
    }
}
```

Or,

``` bash
./composer.phar require jbafford/bower-bundle dev-master
```

### Initialize the bundle

To start using the bundle, register the bundle in your application's kernel class:

``` php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Bafford\BowerBundle\BaffordBowerBundle(),
    );
)
```

### Configure Symfony
Add the following configuration to your ```config.yml```:

``` yaml
bafford_bower:
    bower_path: %bower_path%
```

Where %bower_path% is either the path to your bower binary, or a parameter in ```parameters.yml``` (recommended) pointing at bower.


### Configure Composer (optional)

If you want to automatically run ```bower install``` after running a Composer update or install, add the following configuration to your ```composer.json```:

``` json
    "scripts": {
        "post-install-cmd": [
        	...
            "Bafford\\BowerBundle\\Composer\\BowerInstall::postInstall"
        ],
        "post-update-cmd": [
        	...
            "Bafford\\BowerBundle\\Composer\\BowerInstall::postUpdate"
        ]
    },
```

## Usage

BowerBundle provides two commands that can be run from the Symfony console:

``` bash
./app/console bafford:bower:install
./app/console bafford:bower:update
```

```bafford:bower:install``` runs bower install. ```bafford:bower:update``` runs bower update.
