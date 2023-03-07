<?php

namespace Anddye\ViewPresenters\Tests;

use Anddye\ViewPresenters\PresenterNotFoundException;
use Anddye\ViewPresenters\Tests\Fixtures\Models\User;
use Error;
use PHPUnit\Framework\TestCase;

/**
 * Class PresenterTest.
 */
class PresenterTest extends TestCase
{
    /**
     * @var User
     */
    protected $user;

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::build(1, 'Andrew', 'Dyer');
    }

    /**
     * @test
     */
    public function cannotPresentUndefinedAttribute(): void
    {
        $this->assertNull($this->user->present()->age);

        $this->expectException(Error::class);
        $this->user->present()->age();
    }

    /**
     * @test
     */
    public function canPresentCustomAttribute(): void
    {
        $this->assertIsString($this->user->present()->name);
        $this->assertIsString($this->user->present()->name());

        $this->assertEquals('Andrew Dyer', $this->user->present()->name);
        $this->assertEquals('Andrew Dyer', $this->user->present()->name());
    }

    /**
     * @test
     */
    public function canPresentDefaultAttributes(): void
    {
        $this->assertIsArray($this->user->present()->defaultAttributes);
        $this->assertIsArray($this->user->present()->defaultAttributes());

        $expectedDefaultAttributes = ['id', 'forename', 'surname'];

        $this->assertEquals($expectedDefaultAttributes, array_keys($this->user->present()->defaultAttributes));
        $this->assertEquals($expectedDefaultAttributes, array_keys($this->user->present()->defaultAttributes()));
    }

    /**
     * @test
     */
    public function presenterNotFoundExceptionThrownIfTypeIsUndefined(): void
    {
        $this->expectException(PresenterNotFoundException::class);

        $this->user->present('Actor')->defaultAttributes;
    }
}
