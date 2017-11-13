<?php
/**
 * Created by PhpStorm.
 * User: fred
 * Date: 11/13/17
 * Time: 8:46 PM
 */

namespace App\Http\Controllers;


use App\Ussd;
use Illuminate\Http\Request;
use App\Http\Requests;
use EllipseSynergie\ApiResponse\Contracts\Response;
//use App\Account;
use App\Transformer\DepositTransformer;
use App\Transformer\AccountTransformer;
use App\Transformer\BalanceTransformer;
use App\Transformer\WithdrawalTransformer;
use Illuminate\Support\Facades\Input;
use DB;


class UssdController extends Controller
{

    protected $response;

    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function index(Request $request)
    {

        $serviceCode = $_REQUEST["serviceCode"];
        $sessionId = $_REQUEST["sessionId"];
        $phoneNumber = $_REQUEST["phoneNumber"];
        $text = $_REQUEST["text"];

        $remove_hash = explode("#", $serviceCode, -1);
        $filter = $remove_hash;
        // echo "CON Welcome".$serviceCode;
        // exit;
        // $extension = explode("*", $filter[0]);
//        print_r(array_filter($extension));exit;

        if ( $text == "" ) {
            // This is the first request. Note how we start the response with CON
            echo "CON Welcome".$serviceCode;
            // exit;
            $extension = explode("*", $filter[0]);
            echo "What would you want to check \n";
            echo "1. My Account \n";
            echo "2. My phone number \n";
            echo "3. My xxx \n";
            // echo "4. No Response";
        }

        else if ( $text == "1" ) {
            // Business logic for first level response
            echo "CON Choose account information you want to view \n";
            echo "1. Account number \n";
            echo "2. Account balance";

        }
        else if($text == "2") {
            // Business logic for first level response
            // This is a terminal request. Note how we start the response with END
            echo "END Your phone number is $phoneNumber";
        }
        else if($text == "3") {
            // Business logic for first level response
            // This is a terminal request. Note how we start the response with END
            echo "END hello fredy blaqueyard testing";
        }
        else if($text == "1*1") {
            // This is a second level response where the user selected 1 in the first instance
            $accountNumber  = "ACC1001";
            // This is a terminal request. Note how we start the response with END
            echo "END Your account number is $accountNumber";
        }

        else if ( $text == "1*2" ) {

            // This is a second level response where the user selected 1 in the first instance
            $balance  = "KES 10,000";
            // This is a terminal request. Note how we start the response with END
            echo "END Your balance is $balance";
        }

    }


}