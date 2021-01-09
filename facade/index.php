<?php
// This is a instruction about how to implement your Facade
class Fish
{
    public function swim()
    {
        return 'swimming';
    }

    public function eat()
    {
        return 'eating';
    }
}

app()->bind('fish', function(){
    return new Fish;
});

class Facade 
{
    /**
     * This is a magic function to get static function name
     * @param string $name static function name
     * @param 
     */
    public static function __callStatic($name, $args) 
    {
        return app()->make(static::getFacadeAccessor())->$name();
    }

    protected static function getFacadeAccessor()
    {
        // do nothing
    }
}

class FishFacade extends Facade
{
    protected static function getFacadeAccessor() 
    {
        return 'fish';
    }
}

dd(FishFacade::eat());