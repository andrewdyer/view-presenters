<?php

namespace Anddye\ViewPresenters\Tests\Fixtures\Presenters;

use Anddye\ViewPresenters\Presenter;
use Anddye\ViewPresenters\Tests\Fixtures\Models\User;

class UserPresenter extends Presenter
{
    protected User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
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
