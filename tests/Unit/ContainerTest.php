<?php

use Core\Container;

test('example', function () {
    //arrange 
    $container = new Container;

    $container->bind('foo', fn() => 'bar');

    //act
    $result = $container->resolve('foo');
    
    //assert / accept
    expect($result)->toEqual('bar');
});
