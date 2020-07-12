<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

// Models
use Carbon\Carbon;
use App\Place;
use App\Sponsor;
// Db Query
use Illuminate\Support\Facades\DB;
// BrainTree
use Braintree;


class PaymentController extends Controller
{
  // Payments main page
  function index($id){
    
    // Get Sponsors from DB
    $sponsors = DB::select('select * from sponsors');

    // Get Client Token from .env
    $clientToken = $this->gateway()->clientToken()->generate();

    return view('user.payment', compact('clientToken','id','sponsors'));
  }

  // Payments store transiction
  function store(Request $request, $id){

    // Get data from payment form
    $data = $request->all();

    // Get Place info
    $place_id = $id;

    // Get Sponsor info
    $sponsor_id = $data['amount'];
    $sponsor = DB::table('sponsors')->where('id', '=', $sponsor_id)->get();
    $sponsor_durate = $sponsor[0]->duration;
    $sponsor_price = $sponsor[0]->price;

    // Config Transaction
    $result = $this->gateway()->transaction()->sale([
      'amount' => $sponsor_price,
      'paymentMethodNonce' => $data['payment_method_nonce'],
      'options' => [
          'submitForSettlement' => true
      ]
    ]);

    // Check on Transiction
    if ($result->success || !is_null($result->transaction)) {
        $transaction = $result->transaction;
        
        // Get Actual DataTime
        $actualDate = Carbon::now();
        // Get DeadLine
        $deadline = Carbon::now()->addHours($sponsor_durate);

        // Get Transaction id
        $id = $transaction->id; 
        
        // Popolate Pivot Place_Sponsor Tabe
        $newPlace = new Place();    
        $newPlace->sponsors()->attach($place_id,
                                    [
                                    'start'=> $actualDate ,
                                    'end'=> $deadline,
                                    'id_transaction'=> $id,
                                    'place_id' => $place_id,
                                    'sponsor_id' => $sponsor_id
                                    ]);

    } else {
        var_dump('errore nella transazione');
      }

    return view('user.checkout', compact('transaction'));
  }

  // Get gateway info from .env
  private function gateway(){
    $gateway = new Braintree\Gateway([
      'environment' => getenv('BT_ENVIRONMENT'),
      'merchantId' => getenv('BT_MERCHANT_ID'),
      'publicKey' => getenv('BT_PUBLIC_KEY'),
      'privateKey' => getenv('BT_PRIVATE_KEY')
      ]);
    return $gateway;
  }
}
