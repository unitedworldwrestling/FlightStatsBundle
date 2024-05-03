<?php

namespace Spiicy\Bundle\FlightStatsBundle\FlightStats;

class FlightStatsAPIException extends \Exception
{
    public function __construct($data)
    {
        parent::__construct(sprintf('FlightStats API error : [ %s ] %s, code = %s', $data['error']['httpStatusCode'], $data['error']['errorMessage'], $data['error']['errorId']), $data['error']['httpStatusCode']);
    }
}
