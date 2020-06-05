<?php

namespace Anddye\ViewPresenters;

/**
 * Class AbstractPresenter.
 */
abstract class AbstractPresenter implements PresenterInterface
{
    /**
     * @param string $name
     *
     * @return mixed|null
     */
    public function __get(string $name)
    {
        if (method_exists($this, $name)) {
            return call_user_func([$this, $name]);
        }

        return null;
    }
}
