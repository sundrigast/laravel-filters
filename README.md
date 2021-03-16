# Laravel Eloquent Filter
Easy and convenient filters for your **Laravel Eloquent** application
## Installation
Minimum **php** version to use the package: **7.1**\
Require this package with composer.

```
composer require sundrigast/laravel-filters
```
## Usage
```php
public function index(UserFilter $filter)
{
    return User::filter($filter)
      ->paginate();
}
```

## Configuration
### Basic configuration
Create a new class and extend from `QueryFilter`
```php
class UserFilter extends QueryFilter
{

}
```

Use trait for default filter method in your model:
```php
class User extends Model
{
    use HasFilters;
}
```

You are ready to write filters!

The following scheme is used for writing filters: Create a method with the following name which corresponds to the field for the filter.

>In the case of using snake_case (e.g. price_from), the name of the method must be in camelCase (priceFromFilter).

*Example*:
```php
class UserFilter extends Filter
{       
    protected function name(string $value)
    {
        return $this->builder->where('name', $value);
    }

    protected function nameArrayFilter(array $value)
    {
        return $this->builder->whereIn('name', $value);
    }

    protected function ageFromFilter(string $value) 
    {
        return $this->builder->where('age', '>=', $value);
    }
}
```
### Thank you
Any pull requests and suggestions are welcome!
