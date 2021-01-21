<?php
namespace App\Repositories\Impl\HT30;

use App\Models\HT30\ObjectUser;
use App\Repositories\AbstractRepository;
use App\Repositories\HT30\ObjectUserRepository;

class ObjectUserRepositoryImpl extends AbstractRepository implements ObjectUserRepository
{
   protected $model;
   public function __construct(ObjectUser $model)
        {
            parent::__construct($model);
        }
}
