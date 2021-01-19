<?php
namespace App\Repositories\Impl\HT30;

use App\Models\HT30\Objects;
use App\Repositories\AbstractRepository;
use App\Repositories\HT30\ObjectRepository;

class ObjectRepositoryImpl extends AbstractRepository implements ObjectRepository
{
   protected $model;
   public function __construct(Objects $model)
        {
            parent::__construct($model);
        }
}
