# View Presenters

A clean, reusable solution for separating presentation logic from models and views in PHP applications.≈

## ⚖️ License

Licensed under the [MIT license](https://opensource.org/licenses/MIT) and is free for private or commercial projects.

## ✨ Introduction

When models or views become bloated with formatting and derived data logic, **View Presenters** offer a way to offload that responsibility into dedicated presenter classes. This improves separation of concerns, testability, and reusability.

## 📦 Installation

Install via Composer:

```shell
composer require andrewdyer/view-presenters
```

## 🚀 Getting Started

### 1️⃣ Define a Presenter

Create a presenter class that extends `Anddye\ViewPresenters\Presenter`:

```php
<?php

namespace App\Presenters;

use App\Models\User;
use Anddye\ViewPresenters\Presenter;

class UserPresenter extends Presenter
{
    public function __construct(readonly private User $user) {}

    public function defaultAttributes(): array
    {
        return [
            'id' => $this->user->getId(),
            'forename' => $this->user->getForename(),
            'surname' => $this->user->getSurname(),
        ];
    }

    public function name(): string
    {
        return $this->user->getForename() . ' ' . $this->user->getSurname();
    }
}
```

### 2️⃣ Attach Presenter to Model

Use the `HasPresenters` trait in your model and define available presenters:

```php
<?php

namespace App\Models;

use App\Presenters\UserPresenter;
use Anddye\ViewPresenters\HasPresenters;

class User {
    use HasPresenters;

    protected int $id;
    protected string $forename;
    protected string $surname;
    protected array $presenters = [
        'default' => UserPresenter::class,
    ];

    public function getId(): int
    {
        return $this->id;
    }

    public function getForename(): string
    {
        return $this->forename;
    }

    public function getSurname(): string
    {
        return $this->surname;
    }
}
```

## 📖 Usage

Access presenter attributes via the present() method:

```php
$user = new User();
$user->setId(1);
$user->setForename('John');
$user->setSurname('Doe');

echo $user->present()->name; // "John Doe"
```
