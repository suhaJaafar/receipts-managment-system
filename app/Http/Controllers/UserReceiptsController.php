<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReceipts;
use App\Models\User;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\DB;

class UserReceiptsController extends Controller
{
    public function ViewReceipts(){

        $items['alldata'] = UserReceipts::select('name', DB::raw('MIN(code) as code'), 'created_at', 'address')
        ->groupBy('name', 'created_at', 'address')
        ->orderBy('created_at', 'desc')
        ->get();
    return view('receipts_user.view_receipts', $items);
    }


    public function AddReceipts(){
    	return view('receipts_user.add_receipts');
    }

    public function StoreReceipts(Request $request){

        // Get the ID of the currently authenticated user/admin
        if (auth()->guard('admin')->check()) {    $admin_id = auth()->guard('admin')->user()->id; // For admin guard

        } else {    $user_id = auth()->user()->id; // For user guard

        }

        $count = count($request->item);

        for ($i=0; $i < $count; $i++) {
            $test_receipt = new UserReceipts();
            $test_receipt->name = $request->name;
            $test_receipt->created_at = now();
            $test_receipt->address = $request->address;
            $test_receipt->item = $request->item[$i];
            $test_receipt->count = $request->count[$i];
            $test_receipt->single_price = $request->single_price[$i];

            // Save the ID of the user/admin who created the receipt
        if (auth()->guard('admin')->check()) {
            $test_receipt->admin_id = $admin_id;
        } else {
            $test_receipt->user_id = $user_id;
        }
            $test_receipt->save();
        }
        // }
    	// // End If Condition

        // Calculate the amount for each receipt
        UserReceipts::where('name', $request->name)->get()->each(function ($receipt) {
        $receipt->amount = $receipt->count * $receipt->single_price;
        $receipt->save();

    });


    	$notification = array(
    		'message' => 'Fee Amount Inserted Successfully',
    		'alert-type' => 'success'
    	);

    	return redirect()->route('receipts_user.receipt.view')->with($notification);

    }  // End Method

    public function DetailsReceipts($name){
        $receipts = UserReceipts::where('name', $name)->get();
        $total_amount = $receipts->sum('amount');
        $url = route('receipts_user.receipt.details', ['name' => Str::slug($name)]);
        $qrCode = QrCode::size(120)->generate($url);
        return view('receipts_user.details_receipts', compact('receipts', 'total_amount', 'name', 'qrCode','url'));
    }



    public function deleteReceipt($name)
{
    UserReceipts::where('name', $name)->delete();

    $notification = array(
        'message' => 'Receipt Deleted Successfully',
        'alert-type' => 'success'
    );

    return redirect()->route('receipts_user.receipt.view')->with($notification);
}

public function edit($name)
{
    $data = UserReceipts::where('name', $name)->first();
    return view('receipts_user.edit_receipts', compact('data'));
}

public function update(Request $request, $name)
{
    $data = UserReceipts::where('name', $name)->firstOrFail();
    $data->address = $request->input('address');
    $data->save();

    $items = $request->input('item');
    $counts = $request->input('count');
    $single_prices = $request->input('single_price');
    $amounts = $request->input('amount');

    foreach ($data->items as $i => $item) {
        $item->item = $items[$i];
        $item->count = $counts[$i];
        $item->single_price = $single_prices[$i];
        $item->amount = $amounts[$i];
        $item->save();
    }

    $notification = array(
                        'message' => 'Receipt updated successfully',
                        'alert-type' => 'success'
                    );

                    return redirect()->route('receipts_user.receipt.view')->with($notification);
                }

    public function print($name)
{
    $receipts = UserReceipts::where('name', $name)->get();
    $url = route('receipts_user.receipt.details', ['name' => Str::slug($name)]);
        $qrCode = QrCode::size(120)->generate($url);
    $total_amount = $receipts->sum('amount');
    return view('receipts_user.print_receipt', compact('receipts', 'total_amount','url','qrCode'));
}
}
