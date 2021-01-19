<?php
namespace App\Repositories\Impl\HT30;

use App\Models\HT30\Key;
use App\Repositories\AbstractRepository;
use App\Repositories\HT30\KeyRepository;

class KeyRepositoryImpl extends AbstractRepository implements KeyRepository
{
   protected $model;
   public function __construct(Key $model)
        {
            parent::__construct($model);
        }
}
