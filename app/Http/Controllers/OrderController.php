<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderRequirementPhoto;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;




class OrderController extends Controller
{
//for mobile
public function myorder() {

    try {
        // Check if the token is valid
        JWTAuth::parseToken()->checkOrFail();
    } catch (TokenExpiredException $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Token expired',
        ], 401);
    } catch (TokenInvalidException $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Token invalid',
        ], 401);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Unauthorized',
        ], 401);
    }


    $member_id = JWTAuth::parseToken()->getPayload()->get('sub');
    
    $orders = Order::where('member_id', '=', $member_id)
                    ->orderBy('created_at', 'desc')
                    ->get();
    
    if (!$orders->isEmpty()) {
        return response()->json([
            'status' => 'success',
            'message' => 'Orders retrieved successfully',
            'data' => $orders
        ], 200);
    }
    
    return response()->json([
        'status' => 'failed',
        'message' => 'No orders yet!',
        'data' => []
    ], 200);
}


public function uploadRequirements(Request $request) {

    try {
        // Check if the token is valid
        JWTAuth::parseToken()->checkOrFail();
    } catch (TokenExpiredException $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Token expired',
        ], 401);
    } catch (TokenInvalidException $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Token invalid',
        ], 401);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Unauthorized',
        ], 401);
    }

//dd($request);
    // Extract member_id from the JWT token
    $member_id = JWTAuth::parseToken()->getPayload()->get('sub');

    // Validate request data including major_id
    $validator = Validator::make($request->all(), [
        'major_id' => 'nullable', 
        'basic_service' => 'required',
        'sub_service'=>'nullable',
        'nationality_id' => 'required',
        'photos[].*' => ['required', 'image', 'max:2048'],
    ]);

    if ($validator->fails()) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Validation failed',
            'errors' => $validator->errors(),
        ], 200);
    }

    // Extract major_id from the request
    
    $major_id = $request->input('major_id');
    $basic_service = $request->input('basic_service');
    $sub_service = $request->input('sub_service');
    $nationality_id = $request->input('nationality_id');

    // Begin a database transaction
    DB::beginTransaction();

    try {
        $order = new Order();
        $order->member_id = $member_id;
        if($major_id !== null){
        $order->major_id = $major_id;
        }
        $order->name = $basic_service;
        $order->sub_service = $sub_service;
        $order->apply_order = 1;
        $order->save();

        $member = Member::find($member_id);
        $member->nationality_id = $nationality_id;
        $member->save(); 

        // Save photos associated with the order
        if($request->hasFile('photos')){
            $photos = $request->file('photos');

            foreach ($photos as $photo) {
                $filename = 'requirement_photo_' . date('Ymd').'_'.date('his') . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('Photos', $filename, 'public');

                $orderRequirementPhoto = new OrderRequirementPhoto();
                $orderRequirementPhoto->order_id = $order->id;
                $photoUrl = url('storage/' . $path);
                $orderRequirementPhoto->photo = $photoUrl;
                $orderRequirementPhoto->save();
            }
        }
        // Commit the transaction
        DB::commit();

        return response()->json([
            'status' => 'success',
            'message' => 'Photos uploaded successfully',
            'data' => $order->id
        ], 200);
    } catch (\Exception $e) {
        DB::rollback();

        return response()->json([
            'status' => 'failed',
            'message' => 'Failed to upload photos',
            'error' => $e->getMessage(),
        ], 500);
    }
}



public function updatepackage(Request $request , $id)
{

    try {
        // Check if the token is valid
        JWTAuth::parseToken()->checkOrFail();
    } catch (TokenExpiredException $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Token expired',
        ], 401);
    } catch (TokenInvalidException $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Token invalid',
        ], 401);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Unauthorized',
        ], 401);
    }


    $member_id = JWTAuth::parseToken()->getPayload()->get('sub');

    $request->validate([
        'package' => ['required', 'string', 'in:silver,premium,gold'],
    ]);

    try {
        $order = Order::where('id','=',$id)
                        ->where('member_id','=',$member_id)
                        ->first();

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
    $order = Order::findOrFail($request->order_id);
//^= XOR bitwise switch between 0 and 1 without need of check their current value
    switch ($request->requirement_id) {
        case 1:
            $order->apply_order ^= 1;
            break;
        case 2:
            $order->receiving_all_papers ^= 1;
            break;
        case 3:
            $order->paid_link ^= 1;
            break;
        case 4:
            $order->apply_at_university ^= 1;
            break;
        case 5:
            $order->order_accepted ^= 1;
            break;
        default:
            break;
    }

    $order->save();
}

   
}
