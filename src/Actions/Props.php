<?php

namespace Yeelight\Actions;

use Yeelight\YeelightClient;

class Props
{
    /**
     * @var YeelightClient
     */
    private YeelightClient $light;

    /**
     * @var
     */
    private $prop;

    public function __construct()
    {
        $this->light = new YeelightClient();
    }

    /**
     * @return mixed
     */
    public function get()
    {
        return $this->light->get_prop($this->getProp())
            ->save();
    }

    /**
     * @return mixed
     */
    public function getProp()
    {
        return $this->prop;
    }

    /**
     * @param $param
     * @return $this
     */
    public function setProp($param)
    {
        $this->prop = $param;

        return $this;
    }
}
