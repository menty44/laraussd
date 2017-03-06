<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Account;
use App\Transformer\DepositTransformer;
use App\Transformer\AccountTransformer;
use App\Transformer\BalanceTransformer;


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

    public function balance()
    {
        //Get all balance
        $accounts = Account::paginate(15);

        // Return a collection of $balance with pagination
        return $this->response->withPaginator($accounts, new  BalanceTransformer());
    }

    public function balancebyid($id)
    {
        //Get the balance
        $account = Account::find($id);
        if (!$account) {
            return $this->response->errorNotFound('Balance Not Found');
        }
        // Return single balance
        return $this->response->withItem($account, new  BalanceTransformer());
    }

    public function depositstore(Request $request)  {
        if ($request->isMethod('put')) {

            //Get the deposit by id
            $account = Account::find($request->account_id);
            if (!$account) {
                return $this->response->errorNotFound('Account Not Found');
            }
        } else {
            $account = new Account;
        }

        $account->id = $request->input('account_id');
        //$account->name = $request->input('name');
        $account->balance = $request->input('balance');

        //$request->user()->id;
        $account->id =  1;

        if($account->save()) {
            return $this->response->withItem($account, new  DepositTransformer());
        } else {
             return $this->response->errorInternalError('Could not updated/created a Account');
        }

    }
}
