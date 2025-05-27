<?php

namespace Anddye\ViewPresenters\Tests\Fixtures\Presenters;

use Anddye\ViewPresenters\Presenter;
use Anddye\ViewPresenters\Tests\Fixtures\Models\User;

class UserPresenter extends Presenter
{
    public function __construct(readonly protected User $user)
    {
    }

    public function defaultAttributes(): array
    {
        $data = [];
        $data['id'] = $this->user->getId();
        $data['forename'] = $this->user->getForename();
        $data['surname'] = $this->user->getSurname();

        return $data;
    }

    public function name(): string
    {
        return $this->user->getForename() . ' ' . $this->user->getSurname();
    }
}
