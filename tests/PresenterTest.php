<?php

namespace Anddye\ViewPresenters\Tests;

use Anddye\ViewPresenters\PresenterNotFoundException;
use Anddye\ViewPresenters\Tests\Fixtures\Models\User;
use PHPUnit\Framework\TestCase;

class PresenterTest extends TestCase
{
    protected User $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = User::build(1, 'Andrew', 'Dyer');
    }

    public function testCannotPresentUndefinedAttribute(): void
    {
        $this->assertNull($this->user->present()->age);

        $this->expectException(\Error::class);
        $this->user->present()->age();
    }

    public function testCanPresentCustomAttribute(): void
    {
        $this->assertIsString($this->user->present()->name);
        $this->assertIsString($this->user->present()->name());

        $this->assertEquals('Andrew Dyer', $this->user->present()->name);
        $this->assertEquals('Andrew Dyer', $this->user->present()->name());
    }

    public function testCanPresentDefaultAttributes(): void
    {
        $this->assertIsArray($this->user->present()->defaultAttributes);
        $this->assertIsArray($this->user->present()->defaultAttributes());

        $expectedDefaultAttributes = ['id', 'forename', 'surname'];

        $this->assertEquals($expectedDefaultAttributes, array_keys($this->user->present()->defaultAttributes));
        $this->assertEquals($expectedDefaultAttributes, array_keys($this->user->present()->defaultAttributes()));
    }

    public function testPresenterNotFoundExceptionThrownIfTypeIsUndefined(): void
    {
        $this->expectException(PresenterNotFoundException::class);

        $this->user->present('Actor')->defaultAttributes;
    }
}
