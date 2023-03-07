<?php

namespace Anddye\ViewPresenters\Tests\Fixtures\Presenters;

use Anddye\ViewPresenters\Presenter;
use Anddye\ViewPresenters\Tests\Fixtures\Models\User;

/**
 * Class UserPresenter.
 */
class UserPresenter extends Presenter
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserPresenter constructor.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * @return array
     */
    public function defaultAttributes(): array
    {
        $data = [];
        $data['id'] = $this->user->getId();
        $data['forename'] = $this->user->getForename();
        $data['surname'] = $this->user->getSurname();

        return $data;
    }

    /**
     * @return string
     */
    public function name(): string
    {
        return $this->user->getForename() . ' ' . $this->user->getSurname();
    }
}
