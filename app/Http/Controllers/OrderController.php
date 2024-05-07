<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderRequirementPhoto;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;



class OrderController extends Controller
{

//for mobile
public function myorder(){
    $member_id = JWTAuth::parseToken()->getPayload()->get('sub');
    $order = Order::where('member_id','=',$member_id)->get();
    if(!$order->isEmpty()){
        return response()->json([
            'status' => 'success',
            'message' => 'order retrieved successfully',
            'data' => $order
        ], 200);
    }
    return response()->json([
        'status' => 'faild',
        'message' => 'No order Yet!',
        'data' => []
    ], 200);
}

public function uploadrequirements(Request $request){
    $member_id = JWTAuth::parseToken()->getPayload()->get('sub');
    $order = Order::where('member_id','=',$member_id)->first();

    $validator = Validator::make($request->all(), [
        'photos.*' => ['required', 'image', 'max:2048'], 
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 400);
    }

    $photos = $request->file('photos');

    if (!$photos) {
        return response()->json([
            'status' => 'error',
            'message' => 'No photos uploaded',
        ], 400);
    }

    if (!is_array($photos)) {
        $photos = [$photos];
    }

        $successfulInsertions = 0;

        foreach ($photos as $photo) {
            $filename = 'requirement_photo_' . time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
    
            $path = $photo->storeAs('Photos', $filename, 'public');
    
            $orderRequirementPhoto = new OrderRequirementPhoto();
            $orderRequirementPhoto->order_id = $order->id; 
            $photoUrl = url('storage/' . $path);
            $orderRequirementPhoto->photo = $photoUrl; 
            if ($orderRequirementPhoto->save()) {
                $successfulInsertions++;
            }
        }

        if ($successfulInsertions == count($photos)) {
            $order->update(
                [
                    'apply_order' => true,
                ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Photos uploaded successfully',
        ], 200);

}



public function updatepackage(Request $request, $id)
{
    $request->validate([
        'package' => ['required', 'string', 'in:silver,premium,gold'],
    ]);

    try {
        $order = Order::findOrFail($id);

        $order->update([
            'package' => $request->package,
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'package added successfully',
            'order' => $order,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'error',
            'message' => 'Failed to update membership',
            'error' => $e->getMessage(),
        ], 500);
    }
}



    ///////////////////////////////////////

    public function index(){
        $orders = Order::with('member', 'major')->get();
        return view('order' , compact('orders'));
    }

    public function show($id){
        $order = Order::with('member', 'major')->find($id);
        
        return view('order-details' , compact('order'));

    }

   //method handle ajax onchange request for checkboxes
   public function updateRequirementStatus(Request $request){
    $order = Order::where('id' , '=' , $request->order_id)->first();
    if($request->requirement_id == 1){
        if($order->apply_order == 1){
            $order->apply_order = 0;
        }else{
            $order->apply_order = 1;
        }
    }
    elseif($request->requirement_id == 2){
        if($order->receiving_all_papers == 1){
            $order->receiving_all_papers = 0;
        }else{
            $order->receiving_all_papers = 1;
        }
    }
    elseif($request->requirement_id == 3){
        if($order->paid_link == 1){
            $order->paid_link = 0;
        }else{
            $order->paid_link = 1;
        }
    }
    elseif($request->requirement_id == 4){
        if($order->apply_at_university == 1){
            $order->apply_at_university = 0;
        }else{
            $order->apply_at_university = 1;
        }
    }
    elseif($request->requirement_id == 5){
        if($order->order_accepted == 1){
            $order->order_accepted = 0;
        }else{
            $order->order_accepted = 1;
        }
    }
    $order->save();
   }
   
}
