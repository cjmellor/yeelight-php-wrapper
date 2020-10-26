<?php

namespace Yeelight\Actions;

use Yeelight\YeelightClient;

class Power
{
    /**
     * @var Params
     */
    public Params $params;

    /**
     * @var YeelightClient
     */
    private YeelightClient $light;

    /**
     * @var mixed|string
     */
    private $effect;

    /**
     * @var int|mixed
     */
    private $duration;

    /**
     * @var int|mixed
     */
    private $mode;

    /**
     * Power constructor.
     * @param  string  $effect
     * @param  int  $duration
     * @param  int  $mode
     */
    public function __construct($effect = 'smooth', $duration = 500, $mode = 0)
    {
        $this->light = new YeelightClient();
        $this->params = new Params();

        $this->effect = $effect;
        $this->duration = $duration;
        $this->mode = $mode;
    }

    /**
     * Power the light on
     *
     * @return $this
     */
    public function on()
    {
        $this->params->setState('on');

        return $this;
    }

    /**
     * Power the light off
     *
     * @return $this
     */
    public function off()
    {
        $this->params->setState('off');

        return $this;
    }

    /**
     * Save all states and run
     *
     * @return mixed
     */
    public function commit()
    {
        return $this->light->set_power(
            $this->params->getState(),
            $this->params->getEffect(),
            $this->params->getDuration(),
            $mode = 0
        )->save();
    }
}
