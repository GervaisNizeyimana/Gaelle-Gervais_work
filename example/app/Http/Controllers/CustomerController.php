<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Transaction;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home(){


        return view("customers.index");


    }
    public function logout() {
    Session::forget('customer');
    return redirect()->route('home')->with("logout", "You've successfully logged out");
}
    public function index()
    {

        

        
      


    }
    public function register(){


        return view("customers.register");


    }

    public function loginpage(){


        return view("customers.login");



    }
    public function login(Request $request){



        $request->validate([
        'fname' => 'required|string',
        'password' => 'required|string|min:8',
    ]);

    
    $fname = $request->input('fname');
    $password = $request->input('password');
    $customer = Customer::where('fname', $fname)->first();
    if($customer && Hash::check($password,$customer->password)){


        session::put("customer",$customer);



        return redirect()->route('go')->with("login","Successfully logged in");
    }
    else{


        return redirect()->route('login')->with("loginfail","Failed to log in");



    }






        



    }


    /**
     * Show the form for creating a new resource.
     */
 public function go()
{
    $sessionCustomer = session()->get('customer');

    // Get latest customer data
    $customer = Customer::find($sessionCustomer->id);

    if (!$customer) {
        return redirect()->route('login')->with('error', 'Customer not found.');
    }

    // Get transaction history (latest first)
    $transactions = Transaction::where('customer_id', $customer->id)
                                ->orderBy('created_at', 'desc')
                                ->get();

    return view("customers.dashboard", compact('customer', 'transactions'));
}



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $validateddata=$request->validate([

            "fname"=>"required|string|min:4",
            "lname"=>"required|string",
            'password' => 'required|string|confirmed|min:8',
            'gender' => 'required|string|in:male,female',
        ]);
        $existingCustomer = Customer::where('fname', $validateddata['fname'])
        ->orwhere('lname', $validateddata['lname'])
        ->first();

    if ($existingCustomer) {
        return redirect()->route('register')->with('fail','Customer with this name already exists.');
    }


        $validateddata['password']=Hash::make($validateddata['password']);

      
        

        Customer::create($validateddata);

        return redirect()->route('home')->with("success","Registration successfully");

       


        
    }

    /**
     * Display the specified resource.
     */
    public function show()



    {


        return['message'=>"hello"];




        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

 public function handleTransaction(Request $request)
{
    // Get the logged-in customer from session or auth (depending on your setup)
    $customer = session('customer'); // Or use Auth::user() if you're using Laravel Auth

    if (!$customer) {
        return redirect()->route('login')->with('error', 'Please log in first.');
    }

    // Determine which action was submitted
    $action = $request->input('action');

    // Find the customer model from the database
    $user = Customer::where('fname', $customer->fname)->first();

    switch ($action) {
        case 'deposit':
            $amount = $request->input('deposit');
            if ($amount > 0) {
                $user->balance += $amount;
                $user->save();
                Transaction::create([
                    "customer_id"=>$user->id,
                    "type"=>"deposit",
                    "amount"=>$amount
                ]
                );

                return back()->with('success', 'Deposit successful!');
                 exit();
            }
            return back()->with('error', 'Invalid deposit amount.');

        case 'withdraw':
            $amount = $request->input('withdraw');
            if ($amount > 0 && $user->balance >= $amount) {
                $user->balance -= $amount;
                $user->save();
                Transaction::create([
                    "customer_id"=>$user->id,
                    "type"=>"withdraw",
                    "amount"=>$amount
                ]
                );

                return back()->with('success', 'Withdrawal successful!');
            }
            return back()->with('error', 'Invalid or insufficient balance.');

        case 'transfer':
            $recipientName = $request->input('fname');
            $amount = $request->input('transfer'); // You reused 'deposit' input for transfer amount

            $recipient = Customer::where('fname', $recipientName)->first();
            if (!$recipient) {
                return back()->with('error', 'Recipient not found.');
            }

            if ($amount > 0 && $user->balance >= $amount) {
                $user->balance -= $amount;
                $recipient->balance += $amount;

                $user->save();
                $recipient->save();
                Transaction::create([
                    "customer_id"=>$user->id,
                    "recipient_id"=>$recipient->id,
                    "type"=>"transfer",
                    "amount"=>$amount
                ]
                );



                return back()->with('success', 'Transfer successful!');
            }
            return back()->with('error', 'Invalid amount or insufficient balance.');

        default:
            return back()->with('error', 'Invalid action.');
    }







}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
