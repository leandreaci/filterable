# Filterable

Filter model by query string

Example: domain.com/route?id=1

## Install package
composer require leandreaci/filterable *@dev

## Using
Create a file in your Laravel/Lumen project
- app/Filters/ExampleFilter.php
    
```php
<?php


namespace App;


use Carbon\Carbon;
use Leandreaci\Filterable\QueryFilter;

class ExampleFilter extends QueryFilter
{

    public function id($id)
    {
        return $this->builder->where('id', $id);
    }

    public function start($date)
    {
        try{
            $formattedDate = Carbon::createFromFormat('Y-m-d', $date)->startOfDay()->toDateTimeString();
            return $this->builder->where('created_at','>', $formattedDate);
        }catch (\Exception $exception)
        {
            return $this->builder;
        }
    }
    

}

```

- Use the Trait **Filterable** to you Model want to Filter

```php

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Leandreaci\Filterable\Filterable;

class ExampleModel extends Model
{
    use Filterable;
}

?>

```

- In Controller 

```php

<?php

namespace App\Http\Controllers;

use App\ExampleModel;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ExampleFilter $filter
     * @return TransactionsCollection
     */
    public function index(ExampleFilter $filter)
    {
        return  ExampleModel::filter($filter)
                               ->paginate(10);
    }
}
?>
```