<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Account;
use App\Transformer\DepositTransformer;
use App\Transformer\AccountTransformer;
use App\Transformer\BalanceTransformer;
use Illuminate\Support\Facades\Input;
use DB;


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
        if ($request->isMethod('post')) {

            //Get the deposit by id
            $account = Account::find($request->account_id);
            if (!$account) {
                return $this->response->errorNotFound('Balance Not Found');
            }
        } else {
            $account = new Account;
        }

        $account->id = $request->input('id');
        //$account->name = $request->input('name');
        $account->balance = $request->input('balance');

        $request->user()->id;
        $account->id =  1;

        if($account->save()) {
            return $this->response->withItem($account, new  DepositTransformer());
        } else {
             return $this->response->errorInternalError('Could not updated/created a Account');
        }

    }

    public function test()
    {
    return Account::all();
}

public function test1($id)
{

  //$someJSON = DB::select('SELECT * FROM accounts WHERE balance = ?' , ['45']);
  $someJSON = DB::select('SELECT balance FROM accounts WHERE id = ?',  [$id]);
  // Convert JSON string to Array
  $someArray = json_decode(json_encode($someJSON), true);
  print_r($someArray);        // Dump all data of the Array
  echo "";
  echo "";
  echo "";
  echo $someArray[0]["balance"]; // Access Array data
  //echo $someArray[0]["type"]; // Access Array data
  //echo $someArray[0]["notransdep"]; // Access Array data


}

public function testupdate($id)
    {
        $input = Input::json();
        $account = Account::findOrFail($id);
        //$fred = $account = DB::table('accounts')->where('id', $id)->value('balance');

        //$account->description = $input->get('description');
        //$account->location_id = $input->get('location_id');


        //print_r($someArray);        // Dump all data of the Array
        //$one =$someArray[1]["balance"]; // Access Array data
        //$two =$someArray[1]["type"]; // Access Array data
        $someJSON1 = DB::select('SELECT balance, notransdep FROM accounts WHERE id = ?',  [$id]);

        //changing json array to json object so that you may be able to parse the parameters
        $someArray1 = json_decode(json_encode($someJSON1), true);

        // Access Array data
        $someArray1[0]["balance"];

        $someJSON = DB::select('SELECT * FROM accounts WHERE balance = ?' , [$someArray1[0]["balance"]]);

        //changing json array to json object so that you may be able to parse the parameters
        $someArray = json_decode(json_encode($someJSON), true);

        // Access Array data
        $someArray[0]["balance"];
        $someArray[0]["notransdep"];

        //get the http put parameter
        $account->balance = $input->get('balance');

        $account2 = $account->balance = $input->get('balance') + $someArray[0]["balance"];

        # if less or equal to 40000 success and persist in the database
        while ($input->get('balance') <= 40000) {


              //Maximum Limit per day variable
              $num = "150000";

              //Account limit Variable
              $lim = "4";

              if($someArray[0]["notransdep"] =< $lim){

                $account->save();
                return $this->response->withItem($account, new  DepositTransformer());
              }else {
                # Deposit failure
                return $this->response->errorNotFound('Deposit not made Excess balance or Deposit count is more than 5');
              }
            }
              # Deposit failure
              return $this->response->errorNotFound('Deposit not made, Excess Deposit amount ');

          }
        }
