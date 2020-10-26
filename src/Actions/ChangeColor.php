<?php

namespace Yeelight\Actions;

use Yeelight\YeelightClient;

class ChangeColor
{
    /**
     * @var YeelightClient
     */
    private YeelightClient $light;

    /**
     * ChangeColor constructor.
     */
    public function __construct()
    {
        $this->light = new YeelightClient();
    }

    /**
     * @param $color
     * @param  string  $effect
     * @param  int  $duration
     */
    public function to($color, $effect = 'smooth', $duration = 500)
    {
        $color = str_replace('#', '0x', $color);

        $this->light->set_rgb(hexdec($color), $effect, $duration)
            ->save();
    }
}