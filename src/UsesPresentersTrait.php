<?php

namespace Anddye\ViewPresenters;

/**
 * Trait UsesPresentersTrait.
 */
trait UsesPresentersTrait
{
    /**
     * @param string $type
     *
     * @return PresenterInterface
     *
     * @throws PresenterNotFoundException
     */
    public function present(string $type = 'default'): PresenterInterface
    {
        if (!isset($this->presenters[$type])) {
            throw new PresenterNotFoundException();
        }

        return new $this->presenters[$type]($this);
    }
}
