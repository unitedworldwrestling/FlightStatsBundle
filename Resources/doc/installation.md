Installation
============

## Get the bundle using composer

Add FlightStatsBundle by running this command from the terminal at the root of
your Symfony project:

```bash
php composer.phar require spiicy/flightstats-bundle 
```


## Enable the bundle

To start using the bundle, register the bundle in your application's kernel class:

``` php
// app/AppKernel.php
public function registerBundles()
{
    $bundles = array(
        // ...
        new Spiicy\Bundle\FlightStatsBundle\SpiicyFlightStatsBundle(),
        // ...
    );
}
```

alternatively in Symfony 5+, register in config/bundles.php

```php
// ...
    Spiicy\Bundle\FlightStatsBundle\SpiicyFlightStatsBundle::class => ['all' => true],
// ...
```

## Config

Add the following lines:

``` yml
// config/packages/spiicy_flight_stats.yaml
spiicy_flight_stats:
    app_id: <your id>
    app_key: <your key>
```





