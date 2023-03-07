<?php

namespace Anddye\ViewPresenters;

final class PresenterNotFoundException extends \Exception
{
    public function __construct(string $message = 'Presenter not found')
    {
        parent::__construct($message);
    }
}
