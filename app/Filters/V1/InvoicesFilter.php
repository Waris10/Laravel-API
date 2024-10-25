<?php

namespace App\Filters\V1;

use App\Filters\ApiFilter;
use Illuminate\Http\Request;



class InvoicesFilter extends ApiFilter
{

    protected $safeParams = [
        'customer_id' => ['eq', 'like'],
        'amount' => ['eq', 'gt', 'lt', 'lte', 'gte', 'like'],
        'status' => ['eq', 'like', 'ne'],
        'billedDate' => ['eq', 'gt', 'lt', 'lte', 'gte', 'like'],
        'paidDate' => ['eq', 'gt', 'lt', 'lte', 'gte', 'like'],

    ];

    protected $columnMap = [
        'postalCode' => 'postal_code',
        'billedDate' => 'billed_date',
        'paidDate' => 'paid_date',
    ];

    protected $operatorMap = [
        'eq' => '=',
        'lt' => '<',
        'lte' => '<=',
        'gt' => '>',
        'gte' => '>=',
        'like' => 'LIKE',
        'ne' => '!='

    ];
}
