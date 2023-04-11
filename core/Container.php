<?php


namespace Core;


class Container
{
    protected array $registry = [];

    public function bind($key, $value)
    {
        $this->registry[$key] = $value;
    }

    public function get($key)
    {
        if (!array_key_exists($key, $this->registry)) {
            throw new \Exception('No {key} bound in the container');
        }

        if (is_callable($this->registry[$key])) {
            return call_user_func($this->registry[$key]);
        }

        return $this->registry[$key];
    }
}
