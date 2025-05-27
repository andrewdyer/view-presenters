<?php

namespace Anddye\ViewPresenters\Tests\Fixtures\Models;

use Anddye\ViewPresenters\HasPresenters;
use Anddye\ViewPresenters\Tests\Fixtures\Presenters\UserPresenter;

class User
{
    use HasPresenters;
    protected string $forename;
    protected int $id;
    protected array $presenters = ['default' => UserPresenter::class];
    protected string $surname;

    public static function build(int $id, string $forename, string $surname): User
    {
        $user = new self();
        $user->setId($id);
        $user->setForename($forename);
        $user->setSurname($surname);

        return $user;
    }

    public function getForename(): string
    {
        return $this->forename;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }

    public function setForename(string $forename): self
    {
        $this->forename = $forename;

        return $this;
    }

    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }
}
