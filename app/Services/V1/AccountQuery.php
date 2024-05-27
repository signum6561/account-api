<?php

namespace App\Services\V1;

use Illuminate\Http\Request;
use App\Models\Account;

class AccountQuery {
    protected $safeParms = [
        'email' => ['eq'],
        'fullname' => ['eq'],
        'username' => ['eq'],
        'department' => ['eq'],
        'position' => ['eq'],
        'createAt' => ['eq']
    ];

    protected $columnMap = [
        'createAt' => 'fake_create_at'
    ];

    protected $operatorMap = [
        'eq' => '=',
        'gt' => '>',
        'lt' => '<',
        'gte' => '>=',
        'lte' => '<='
    ];

    public function getEloQuery(Request $request)
    {
        $eloQuery = [];

        foreach($this->safeParms as $parms => $operators)
        {
            $query = $request->query($parms);
            if(isset($query))
            {
                $col = $this->columnMap[$parms] ?? $parms;
                foreach($operators as $operator)
                {
                    if(isset($query[$operator]))
                    {
                        $eloQuery[] = [$col, $this->operatorMap[$operator], $query[$operator]];
                    }
                }
            }
        }
        return $eloQuery;
    }

    public function transform(Request $request)
    {
        $eloQuery = $this->getEloQuery($request);
        $accounts = null;
        $perPage = $request->perPage;
        if(count($eloQuery) == 0)
        {
            $accounts = isset($perPage) ? Account::paginate($perPage) : Account::all();

        }
        else
        {
            $accounts = isset($perPage) ? Account::where($eloQuery)->paginate($perPage) : Account::where($eloQuery)->get();
        }
        return $accounts;
    }


}
