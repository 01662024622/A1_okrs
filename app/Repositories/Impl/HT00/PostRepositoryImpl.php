<?php
namespace App\Repositories\Impl\HT00;

use App\Models\{{ NamespaceEntity }};
use App\Repositories\AbstractRepository;
use App\Repositories\HT00\PostRepository;

class PostRepositoryImpl extends AbstractRepository implements PostRepository
{
   protected $model;
   public function __construct(Post $model)
        {
            parent::__construct($model);
        }
}