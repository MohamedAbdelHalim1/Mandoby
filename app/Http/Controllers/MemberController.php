<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Order;
use App\Models\OrderRequirementPhoto;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;


class MemberController extends Controller
{

    //for mobile
public function getMemberById(Request $request)   //for profile
{
    try {
        $memberId = JWTAuth::parseToken()->getPayload()->get('sub');

        // Retrieve the member by ID
        $member = Member::findOrFail($memberId);

        return response()->json([
            'status' => 'success',
            'message'=> 'User retrieved successfully',
            'member' => $member,
        ], 200);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'failed',
            'message' => 'Failed to retrieve member data',
            'error' => $e->getMessage(),
        ], 500);
    }
}



//////////////////////////////////////////////

    public function index(){
        $members = Member::all();
        return view('member',compact('members'));
    }

    public function show($member_id) {
        $member = Member::find($member_id);
        $member_orders = Order::where('member_id', $member_id)->with('images')->get();
        
        return view('member-details', compact('member_orders','member'));
    }
    

    public function delete_photo($id){
        $photo = OrderRequirementPhoto::find($id);
        $photo->delete();
        return redirect()->back();
    }

    public function delete_order($order_id){
        $order = Order::find($order_id);
        $order->delete();
        return redirect()->back();
    }

    public function store_photo(Request $request , $order_id){
        $validator = Validator::make($request->all(), [
            'photos[].*' => ['required', 'image', 'max:2048'],
        ]);

        if($request->hasFile('photos')){
            $photos = $request->file('photos');

            foreach ($photos as $photo) {
                $filename = 'requirement_photo_' . date('Ymd').'_'.date('his') . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                $path = $photo->storeAs('Photos', $filename, 'public');
                $orderRequirementPhoto = new OrderRequirementPhoto();
                $orderRequirementPhoto->order_id = $order_id;
                $photoUrl = url('storage/' . $path);
                $orderRequirementPhoto->photo = $photoUrl;
                $orderRequirementPhoto->save();
            }
        }
        return redirect()->back();
    }


    public function store(Request $request)
    {

        //add nationality
        
        $validator = Validator::make($request->all(), [
            'name' => ['required','string'], 
            'phone' => ['required','string'], 
            'password' => ['required','string'], 
           ]);

    

        $member = new Member;
        $member->name = $request->name;
        $member->phone = $request->phone;
        $member->password = bcrypt($request->password);
      
        $member->save();
           return redirect()->back();
        
    }


}
