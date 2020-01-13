<?php

function create($class, $amount = null, $attributes = [])
{
    return factory($class, $amount)->create($attributes);
}

function make($class, $amount = null, $attributes = [])
{
    return factory($class, $amount)->make($attributes);
}
