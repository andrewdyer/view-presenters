<?php

namespace Anddye\ViewPresenters;

use Exception;

/**
 * Class PresenterNotFoundException.
 */
final class PresenterNotFoundException extends Exception
{
    /**
     * PresenterNotFoundException constructor.
     *
     * @param string $message
     */
    public function __construct(string $message = 'Presenter not found')
    {
        parent::__construct($message);
    }
}
