<?php

namespace Anddye\ViewPresenters;

abstract class Presenter implements PresenterInterface
{
    public function __get(string $name)
    {
        if (method_exists($this, $name)) {
            return call_user_func([$this, $name]);
        }

        return null;
    }
}
