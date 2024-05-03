Getting started with FlightStatsBundle
=======================================


## Installation

  * [Installation procedure](installation.md)


## Usage

Scheduled Flight(s) by carrier and flight number, arriving on the given date.  

``` php
// src/Acme/DemoBundle/Controller/DemoController.php
$flightStats = $this->container->get('spiicy_flightstats');
$schedule = $flightStats->getSchedules()->scheduleByFlightNumber('AC', '1857', new \DateTime('2015-06-01'));
```

or use [Symfony's Autowiring feature](https://symfony.com/doc/current/service_container/autowiring.html)

```php
// ...
use Spiicy\Bundle\FlightStatsBundle\FlightStats\FlightStats;
// ...

class MyOwnServiceOrController
{
  public function __construct(private readonly FlightStats $flightStats) {
  }

  public function test(): void {
    $schedule = $this->flightStats->getSchedules()->scheduleByFlightNumber('AC', '1857', new \DateTime('2015-06-01'));
    $airlines = $this->flightStats->getAirlines()->getActiveAirlines();
  }
}
```
