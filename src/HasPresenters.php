<?php

namespace Anddye\ViewPresenters;

trait HasPresenters
{
    public function present(string $type = 'default'): PresenterInterface
    {
        if (!isset($this->presenters[$type])) {
            throw new PresenterNotFoundException();
        }

        return new $this->presenters[$type]($this);
    }
}
