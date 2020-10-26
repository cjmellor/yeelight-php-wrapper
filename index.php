<?php

require 'vendor/autoload.php';

use Yeelight\Actions\ChangeColor;

//use Yeelight\Actions\Props;

//(new Power())
//    ->off()
//    ->commit();

//(new Toggle())->go();

//$props = new Props();

//$bright = $props->setProp('bright');

//print_r($props->get());

$color = '#B4DA55';

(new ChangeColor())->to($color);