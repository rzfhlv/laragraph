<?php

namespace App\GraphQL\Queries\Category;

use Rebing\GraphQL\Support\Facades\GraphQL;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Query;
use App\Models\Category;

class CategoryQuery extends Query
{
    protected $attributes = [
        'name' => 'category',
    ];

    public function type(): Type
    {
        return GraphQL::type('Category');
    }

    public function args(): array
    {
        return [
            'id' => [
                'name' => 'id',
                'type' => Type::int(),
                'rules' => ['required']
            ]
        ];
    }

    public function resolve($root, $args)
    {
        return Category::findOrFail($args['id']);
    }
}