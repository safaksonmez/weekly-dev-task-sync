<?php
namespace App\Repositories;

use App\Models\Provider;
use Illuminate\Database\Eloquent\Model;

class ProviderRepository extends Repository
{
    /**
     * @var Model
     */
    protected $model;

    public function __construct(Provider $model)
    {
        parent::__construct($model);
    }
}
