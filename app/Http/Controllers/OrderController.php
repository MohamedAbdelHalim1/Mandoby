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
    
            $path = $photo->storeAs('requirement_photos', $filename, 'public');
    
            $orderRequirementPhoto = new OrderRequirementPhoto();
            $orderRequirementPhoto->order_id = $order->id; 
            $orderRequirementPhoto->photo = $path;
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
        if(!$orders->isEmpty()){
            return response()->json([
                'status' => 'success',
                'message' => 'Orders retrieved successfully',
                'data' => $orders
            ], 200);
        }
        return response()->json([
            'status' => 'failed',
            'message' => 'No Orders Yet!',
            'data' => []
        ], 200);
    }

    public function show($id){
        $order = Order::with('member', 'major')->find($id);
        if($order == null){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong!',
                'data' => []
            ], 500);
        }

        return response()->json([
            'status' => 'success',
            'message' => '',
            'data' => $order
        ], 200);

        // and in frontend i will check if appling processes is 0 or 1 and make them checked

    }

   //method handle ajax onchange request for checkboxes
   
}