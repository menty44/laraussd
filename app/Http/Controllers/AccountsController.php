<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Account;
//use App\Transformer\TaskTransformer;
use App\Transformer\AccountTransformer;


class AccountsController extends Controller
{
    //
    protected $respose;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index()
    {
        //Get all task
        $accounts = Account::paginate(15);
        // Return a collection of $task with pagination
        return $this->response->withPaginator($accounts, new  AccountTransformer());
    }

    public function show($id)
    {
        //Get the task
        $account = Account::find($id);
        if (!$account) {
            return $this->response->errorNotFound('Account Not Found');
        }
        // Return a single task
        return $this->response->withItem($account, new  AccountTransformer());
    }

    public function destroy($id)
    {
        //Get the task
        $account = Account::find($id);
        if (!$account) {
            return $this->response->errorNotFound('Account Not Found');
        }

        if($account->delete()) {
             return $this->response->withItem($task, new  AccountTransformer());
        } else {
            return $this->response->errorInternalError('Could not delete a Account');
        }

    }

    public function store(Request $request)  {
        if ($request->isMethod('put')) {
            //Get the task
            $account = Account::find($request->account_id);
            if (!$account) {
                return $this->response->errorNotFound('Account Not Found');
            }
        } else {
            $account = new Account;
        }

        $account->id = $request->input('account_id');
        $account->name = $request->input('name');
        $account->description = $request->input('description');
        $account->user_id =  1; //$request->user()->id;

        if($account->save()) {
            return $this->response->withItem($account, new  AccountTransformer());
        } else {
             return $this->response->errorInternalError('Could not updated/created a Account');
        }

    }
}
