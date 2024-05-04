<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Account;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\AccountResource;
use App\Http\Resources\V1\AccountCollection;
use App\Http\Requests\V1\StoreAccountRequest;
use App\Http\Requests\V1\UpdateAccountRequest;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return new AccountCollection(Account::paginate());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAccountRequest $request)
    {
        return new AccountResource(Account::create($request->all()));
    }

    /**
     * Display the specified resource.
     */
    public function show(Account $account)
    {
        return new AccountResource($account);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Account $account)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAccountRequest $request, Account $account)
    {
        $account->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Account $account)
    {
        $account->delete();
    }
}
