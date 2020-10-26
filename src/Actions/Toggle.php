<?php

namespace Yeelight\Actions;

use Yeelight\YeelightClient;

class Toggle
{
    /**
     * @var YeelightClient
     */
    private YeelightClient $light;

    public function __construct()
    {
        $this->light = new YeelightClient();
    }

    /**
     * @return mixed
     */
    public function go() {
        return $this->light->toggle()->save();
    }
}