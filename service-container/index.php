<?php

class container 
{
    protected $bindings = [];

    public function bind($name, Callable $resolver)
    {
        $this->bindings[$name] = $resolver;
    }

    public function make($name)
    {
        return $this->bindings[$name]();
    }
}


$container = new container;

$container->bind('Game', function(){
    return 'Football';
});

print_r($container->make('Game'));