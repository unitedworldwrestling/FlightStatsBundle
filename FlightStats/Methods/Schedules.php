<?php

namespace Spiicy\Bundle\FlightStatsBundle\FlightStats\Methods;

use Spiicy\Bundle\FlightStatsBundle\FlightStats\FlightStatsAPIException;
use Spiicy\Bundle\FlightStatsBundle\FlightStats\RestClient;

class Schedules extends RestClient
{
    /**
     * Scheduled Flight(s) by carrier and flight number, arriving on the given date.
     *
     * @link https://developer.flightstats.com/api-docs/flightstatus/v2/flight
     * @param string $carrier
     * @param string $number
     * @param \DateTime $arrival
     * @return JSON
     * @throws \Exception
     * @throws FlightStatsAPIException
     */
    public function scheduleArrivalByFlightNumber($carrier, $flight, $arrival)
    {
        $params = [
            'carrier' => $carrier,
            'flight' => $flight,
            'year' => $arrival->format('Y'),
            'month' => $arrival->format('m'),
            'day' => $arrival->format('d'),
        ];

        $apiCall = sprintf('flight/%s/%s/arriving/%d/%d/%d', $params['carrier'], $params['flight'], $params['year'], $params['month'], $params['day']);

        $res = $this->request($apiCall);

        $code = $res->getStatusCode();
        $json = json_decode($res->getBody()->getContents(), true);
        
        if (isset($json['error'])) {
            throw new FlightStatsAPIException($json);
        } else {
            return isset($json) ? $json : false;
        }
    }

    /**
     * Scheduled Flight(s) by carrier and flight number, departing on the given date.
     *
     * @link https://developer.flightstats.com/api-docs/flightstatus/v2/flight
     * @param string $carrier
     * @param string $number
     * @param \DateTime $departure
     * @return JSON
     * @throws \Exception
     * @throws FlightStatsAPIException
     */
    public function scheduleDepartureByFlightNumber($carrier, $flight, $departure)
    {
        $params = [
            'carrier' => $carrier,
            'flight' => $flight,
            'year' => $departure->format('Y'),
            'month' => $departure->format('m'),
            'day' => $departure->format('d'),
        ];

        $apiCall = sprintf('flight/%s/%s/departing/%d/%d/%d', $params['carrier'], $params['flight'], $params['year'], $params['month'], $params['day']);

        $res = $this->request($apiCall);

        $code = $res->getStatusCode();
        $json = json_decode($res->getBody()->getContents(), true);
        
        if (isset($json['error'])) {
            throw new FlightStatsAPIException($json);
        } else {
            return isset($json) ? $json : false;
        }
    }

    /**
     * Returns the positional tracks of flights, with a given carrier and flight number, arriving or having arrived on the given date
     *
     * @link https://developer.flightstats.com/api-docs/flightstatus/v2/flight
     * @param string $carrier
     * @param string $number
     * @param \DateTime $arrival
     * @return JSON
     * @throws \Exception
     * @throws FlightStatsAPIException
     */
    public function trackByFlightNumber($carrier, $flight, $arrival)
    {
        $params = [
            'carrier' => $carrier,
            'flight' => $flight,
            'year' => $arrival->format('Y'),
            'month' => $arrival->format('m'),
            'day' => $arrival->format('d'),
        ];

        $apiCall = sprintf('flight/tracks/%s/%s/arr/%d/%d/%d', $params['carrier'], $params['flight'], $params['year'], $params['month'], $params['day']);

        $res = $this->request($apiCall);

        $code = $res->getStatusCode();
        $json = json_decode($res->getBody()->getContents(), true);
        
        if (isset($json['error'])) {
            throw new FlightStatsAPIException($json);
        } else {
            return isset($json) ? $json : false;
        }
    }
}
