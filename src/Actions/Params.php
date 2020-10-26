<?php

namespace Yeelight\Actions;

class Params
{
    /**
     * @var null
     */
    private $state;

    /**
     * @var string
     */
    private string $effect;

    /**
     * @var int
     */
    private int $duration;

    /**
     * @var int
     */
    private int $mode;

    /**
     * @var
     */
    public $params;

    /**
     * Params constructor.
     */
    public function __construct()
    {
        $this->state = null;
        $this->effect = 'smooth';
        $this->duration = 500;
        $this->mode = 0;
    }

    /**
     * @return null
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     * @return $this
     */
    public function setState($state): Params
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getEffect(): string
    {
        return $this->effect;
    }

    /**
     * @param $effect
     * @return $this
     */
    public function setEffect($effect): Params
    {
        $this->effect = $effect;

        return $this;
    }

    /**
     * @return int
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param $duration
     * @return $this
     */
    public function setDuration($duration): Params
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @param $effect
     * @return $this
     */
    public function effect($effect): Params
    {
        $this->setEffect($effect);

        return $this;
    }

    /**
     * @param $duration
     * @return $this
     */
    public function duration($duration): Params
    {
        $this->setDuration($duration);

        return $this;
    }
}