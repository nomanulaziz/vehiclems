<?php
namespace Core;
// A file that helps you quickly add and remove contents in a container.
class Container {
    protected $bindings = [];

    public function bind($key, $resolver) 
    {
        $this->bindings[$key] = $resolver;
    }

    public function resolve($key) 
    {
        if(! array_key_exists($key, $this->bindings)) {
            throw new \Exception("No matching finding found for {$key}");
        }
    
        $resolver = $this->bindings[$key];

        return call_user_func($resolver);
        
    }
}