<?php

namespace Yeelight;

use Exception;
use Yeelight\Exceptions\LightException\LightException;

class YeelightClient
{
    /**
     * @var mixed|string
     */
    public $ip;

    /**
     * @var int|mixed
     */
    public $port;

    /**
     * @var array
     */
    private array $jobs = [];

    /**
     * @var false|resource
     */
    private $connection;

    public function __construct($ip = '192.168.0.39', $port = 55443)
    {
        $this->ip = $ip;
        $this->port = $port;

        try {
            $this->connect();
        } catch (LightException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @param  int  $timeout
     * @return bool
     * @throws LightException
     */
    private function connect($timeout = 30)
    {
        $this->connection = fsockopen($this->ip, $this->port, $this->errno, $this->errstr, $timeout);

        try {
            $this->connection;
        } catch (Exception $e) {
            throw new LightException('Error: '.$e->getCode()."\n".'Message: '.$e->getMessage());
        }

        stream_set_blocking($this->connection, false);

        return true;
    }

    /**
     * @param $method
     * @param $args
     * @return $this
     */
    public function __call($method, $args)
    {
        $obj = (object) [];
        $obj->id = $this->getId();
        $obj->method = $method;
        $obj->params = $args;

        $this->jobs[] = $obj;

        return $this;
    }

    /**
     * @return int
     */
    public function getId()
    {
        if (!empty($this->jobs)) {
            return count($this->jobs);
        }

        return 0;
    }

    /**
     * @return bool
     */
    public function save()
    {
        foreach ($this->jobs as $job) {
            $str = json_encode($job);
            fwrite($this->connection, $str."\r\n");
            fflush($this->connection);

            usleep(100 * 1000);

            $out[] = fgets($this->connection);
        }

        $this->jobs = [];

        if (!empty($out)) {
            return $out;
        }

        return true;
    }

//    public function disconnect()
//    {
//        fclose($this->connection);
//    }
}
