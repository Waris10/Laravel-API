<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;



class CustomersFilter extends ApiFilter
{
    protected $safeParams = [
        'name' => ['eq', 'like'],
        'type' => ['eq', 'like'],
        'email' => ['eq', 'like'],
        'address' => ['eq', 'like'],
        'city' => ['eq', 'like'],
        'state' => ['eq', 'like'],
        'postalCode' => ['eq', 'gt', 'lt'],
    ];

    protected $columnMap = [
        'postalCode' => 'postal_code'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'like' => 'LIKE'

    ];
}