<?php

namespace Anddye\ViewPresenters\Tests\Stubs\Models;

use Anddye\ViewPresenters\Tests\Stubs\Presenters\UserPresenter;
use Anddye\ViewPresenters\UsesPresentersTrait;

/**
 * Class User.
 */
class User
{
    use UsesPresentersTrait;

    /**
     * @var string
     */
    protected $forename;

    /**
     * @var int
     */
    protected $id;

    /**
     * @var array
     */
    protected $presenters = ['default' => UserPresenter::class];

    /**
     * @var string
     */
    protected $surname;

    /**
     * @param int    $id
     * @param string $forename
     * @param string $surname
     *
     * @return User
     */
    public static function build(int $id, string $forename, string $surname): User
    {
        $user = new self();
        $user->setId($id);
        $user->setForename($forename);
        $user->setSurname($surname);

        return $user;
    }

    /**
     * @return string
     */
    public function getForename(): string
    {
        return $this->forename;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getSurname(): string
    {
        return $this->surname;
    }

    /**
     * @param string $forename
     *
     * @return $this
     */
    public function setForename(string $forename): self
    {
        $this->forename = $forename;

        return $this;
    }

    /**
     * @param int $id
     *
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @param string $surname
     *
     * @return $this
     */
    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

        return $this;
    }
}
