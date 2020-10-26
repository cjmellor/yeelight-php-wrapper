# A PHP Wrapper for Yeelight Smart Bulb

This is a very small wrapper for the Yeelight API.

It was made just for experimental purposes and does not cover the whole API's abilities.

It is certainly very basic and could really do with a refactor but I just wanted to test out the capabilities fo the API. I had no real plans to do anything with it.

## How to use

Edit the `src/YeelightClient.php` file and add your **IP** and **Port** to the `__construct` method. I don't know if they are different or not, though I think the port is likely the same. You will have to check.

Now you can run some commands.

### Power On/Off

```php
use Yeelight\Actions\Power;

(new Power())
    ->on()
    ->commit();

// ->off() can also be used
```

### Toggle On/Off

```php
use Yeelight\Actions\Toggle;

(new Toggle())->go();
```

### Change Colour

```php
use Yeelight\Actions\ChangeColor;

$color = '#FF0000';

(new ChangeColor())->to($color);
```

You can edit the `effect` or the `duration` of the command as well.