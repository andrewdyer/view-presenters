# View Presenters
A clean, reusable solution for tiding up cluttered models and views which have too much logic!
 
## License
Licensed under MIT. Totally free for private or commercial projects.

## Installation
```text
composer require andrewdyer/view-presenters
```

## Usage
```php
$user = new App\Models\User;
$user->setForename('Andrew');
$user->setSurname('Dyer');

var_dump($user->present()->name); // Andrew Dyer
```

### View Presenter
All presenters must be an instance of `Anddye\ViewPresenters\PresenterInterface` and ideally should extend
`Anddye\ViewPresenters\AbstractPresenter` - which will implement the required interface by default.

```php
namespace App\Presenters;

use Anddye\ViewPresenters\Presenter;
use App\Models\User;

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
```

### Use presenters
Models can use the `Anddye\ViewPresenters\UsesPresentersTrait` trait to access the `present()` method. Presenter types must
be defined in a `$presenters` property. By default the `default` type will be used when this method is called. Custom types
can be defined and used by passing the key as an argument to the `present()` method.

```php
namespace App\Models;

use Anddye\ViewPresenters\HasPresenters;
use App\Presenters\UserPresenter;
use App\Presenters\UserSubscriptionPresenter;

class User
{
    use HasPresenters;

    protected int $id;
    protected string $forename;
    protected string $surname;
    protected array $presenters = [
        'default' => UserPresenter::class,
        'subscription' => UserSubscriptionPresenter::class
        // ...
    ];

    // ...

}
```

```php
// ...

$data = $user->present('subscription')->defaultAttributes;
