<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Party;
use LaravelDaily\Invoices\Invoice;

class RemitaController extends Controller
{

    public $remitaData = array();

    public function confirmPayment(Request $request)
    {
        $data = array(

            'amount' => $request->input('amount'),
            'orderID' => $request->input('transactionId'),
            'payerName' => $request->input('payerName'),
            'payerEmail' => $request->input('payerEmail'),
            'payerPhone' => $request->input('payerPhone'),
            'paymenttype' => $request->input('paymenttype'),

        );

        return view('livewire.processpayment')->with($data);

    }
    public function generateInvoice(Request $request)
    {
      try{

        if ($request->get('orderID') != null) {
             
            $response = $this->remitaTransactionDetails($request->get('orderID'));

            $response_code = $response['status'];

            $amot = $response['amount'];
            $rrr = $response['RRR'];
            $orderId = $response['orderId'];
           
            $message = $response['message'];
            $time = $response['transactiontime'];

            $transactionTime = $response['transactiontime'];
            $user = Auth::user();

            if ($orderId != '') {

                $sql = DB::update('update transaction_tb set RRR = ?,status= ? where transactionId = ?', [$rrr, $response_code, $orderId]);

            }
            $userTransaction = DB::table('transaction_tb')
                ->where('transactionId', '=', $response['orderId'])
                ->first();
            $merchantId = config('Remita.MERCHANTID');

            $api_key = config('Remita.APIKEY');

            $concatString2 = $merchantId . $rrr . $api_key;

            $hash2 = hash('sha512', $concatString2);

            $responseurl2 = config('Remita.PATH') . "/dashboard";

            $this->remitaData = array(
                'orderId' => $orderId,
                'fullname' => $user->surname . ' ' . $user->firstname . ' ' . $user->m_name,
                'phone' => $user->p_number,
                'email' => $user->email,
                'message' => $message,
                'response' => $response_code,
                'time' => $time,
                'RRR' => $rrr,
                'resource' => $userTransaction->resource,
                'amount' => $userTransaction->amount,
                'merchantId' => $merchantId,
                'api_key' => $api_key,
                'concatString2' => $concatString2,
                'hash2' => $hash2,
                'responseurl2' => $responseurl2,
            );

            return view('receipt')->with($this->remitaData);

        }
      } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
    public function getStatus(Request $request)
    {
        try{
        $orderId = $request->get('orderID');
        } catch (Exception $e) {
            dd($e->getMessage());
        }

    }
    public function pdfDownload($id)
    {

        $user = Auth::user();
        ini_set('max_execution_time', 300);
        $userTransaction = DB::table('transaction_tb')
            ->where('transactionId', '=', $id)
            ->first();
        $data = array(
            'orderId' => $userTransaction->transactionId,
            'fullname' => $user->surname . ' ' . $user->firstname . ' ' . $user->m_name,
            'phone' => $user->p_number,
            'email' => $user->email,
            'time' => $userTransaction->date,
            'RRR' => $userTransaction->RRR,
            'resource' => $userTransaction->resource,
            'status' => $userTransaction->status,
            'amount' => $userTransaction->amount,

        );

        $client = new Party([
            'name' => 'Waziri Umaru Federal Polytechnic',

        ]);
        $customer = new Buyer([
            'name' => $user->surname . ' ' . $user->firstname . ' ' . $user->m_name,
            'phone' => $user->p_number,
            'custom_fields' => [
                'email' => $user->email,
                'time' => $userTransaction->date,
                'RRR' => $userTransaction->RRR,
                'resource' => $userTransaction->resource,

                'amount' => $userTransaction->amount,
            ],
        ]);
        $item = (new InvoiceItem())->title($userTransaction->resource)->pricePerUnit($userTransaction->amount);

        $invoice = Invoice::make()
            ->buyer($customer)
            ->seller($client)
            ->status($userTransaction->status)
            ->addItem($item);

        return $invoice->stream();
        //  return view('printReceipt')->with($data);
        //Invoice::make('receipt')->template('default');

    }
    public function remitaTransactionDetails($orderId)
    {
        try{
        $mert = config('Remita.MERCHANTID');

        $api_key = config('Remita.APIKEY');

        $concatString = $orderId . $api_key . $mert;

        $hash = hash('sha512', $concatString);

        $url = config('Remita.CHECKSTATUSURL') . '/' . $mert . '/' . $orderId . '/' . $hash . '/' . 'orderstatus.reg';

        //  Initiate curl

        $ch = curl_init();

        // Disable SSL verification

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        // Will return the response, if false it print the response

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Set the url

        curl_setopt($ch, CURLOPT_URL, $url);

        // Execute

        $result = curl_exec($ch);
      

        // Closing

        curl_close($ch);

        $response = json_decode($result, true);
       

        return $response;
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    

    public function render()
    {
        return view('livewire.processpayment');
    }

}
