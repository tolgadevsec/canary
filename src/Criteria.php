<?php

namespace Psecio\Canary;

use \Psecio\Canary\Notify\ErrorLog;
use \Psecio\Canary\Data;

abstract class Criteria implements \JsonSerializable
{
    protected $notify;

    const MATCH_EXACT = 'exact';
    const MATCH_APPROX = 'approx';

    public function __construct(...$params)
    {
        // Set up the default notification
        $this->setNotify(new ErrorLog());
    }

    public function setNotify($notify)
    {
        $this->notify = $notify;
    }

    public function getNotify()
    {
        return $this->notify;
    }

    public abstract function evaluate(Data $input);
    public abstract function jsonSerialize() : array;
    public abstract function toArray() : array;
}
