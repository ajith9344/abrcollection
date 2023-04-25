<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\customer;
use App\Models\Staff;
use App\Models\User;
use App\Models\Admin;
use App\Models\Payments;
use App\Models\Sim;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\appLoginResource;
use App\Http\Resources\ShowResource;
use App\Http\Resources\UpdateResource;
use App\Http\Resources\ShowAdminsResource;
use App\Http\Resources\ShowSimResource;
use App\Http\Resources\UpdateSimResource;


class AppController extends Controller
{
    public function userRegister(request $request){
         $validator=validator::make($request->all(),
                ['name'=>'required',
                'email'=>'required|email|unique:users,email,id',
                'password'=>'required',
                'c_password'=>'required|same:password']);

        if($validator->fails()){
                return response()->json('N',200);
        }
                $data=$request->all();
                 $data['password']=Hash::make( $data['password']);
                
                $user=User::create($data);
                return response()->json('Y',200);
        
    }

    public function userLogin(request $request){
        
        if(Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')])){
            $user=Auth::user();
            return response()->json(['user details'=>new appLoginResource($user)],200);
        }      
        else{
            return response()->json('N',200);
        }
 
    }
 


//For customer page
    public function createCustomer(request $request){
        $validator= validator::make($request->all(),[
           'name'=>"required|max:50",
           'server'=>"required",
           'account'=>"required|min:12",
           'username'=>"required|max:50",
           'password'=>"required|max:50",
           'type'=>"required",
           'network'=>"required",
           'noofconn'=>"required|numeric",
           'phone'=>"required|min:10|unique:customers,phone,id",
           'rental'=>"required|max:50",
           'address'=>"required|max:250",
           'total'=>"required|max:4",
           'remark'=>"required|max:200"]);

    if ($validator->fails()){
        return  response()->json(['error'=>$validator->errors()],400);}
            $data=$request->only(['name','server','account','username','password','type','network','noofconn','phone','rental','address','total','remark']);
            $customer=Customer::create($data);
             return response()->json(['message'=>'record added successfully'],200);
   }
   

    public function viewCustomer(){
         $customers=customer::all();     
         if(count($customers) > 0){
               return response()->json($customers,200);}
            else{ 
                return response()->json(['message'=>'Product not Found'],404);}
   }

    public function showCustomer($id){
       $customers=Customer::find($id);
              
               if($customers){
                   return response()->json(new ShowResource($customers),200);}
               else{
                   return response()->json('Product not Found',404);}
           
       }


    public function updateCustomer(Request $request,$id){
        $customer=Customer::find($id);
               
            if($customer){
               $customer->update($request->all());
               return response()->json([new UpdateResource($customer)],200);}
            else{
               return response()->json(['message'=>'Product Not Found'],400);}
   }

       
    public function destroyCustomer($id){
        $customer=Customer::destroy($id);
            if($customer){
                return response()->json(['message'=>'delete success'],200);}
            else{
                return response()->json(['message'=>'product Not Found'],400);}
   } 
   
   



//For Staff page

public function createStaff(Request $request){
    $validator=Validator::make($request->all(),[  
        'staff_id'=>'required|unique:staff,staff_id,id',     
        'name'=>'required|max:100',
        'phone'=>'required|max:12',
        'email'=>'required|email|unique:staff,email,id',
        'imei'=>'required|unique:staff,imei,id']);

        if($validator->fails()){
            return response()->json($validator->errors(),400);
        }

    $data=$request->only(['staff_id','name','phone','email','imei']);
    // $data=$request->all();
    $staff=Staff::create($data);
    return response()->json('New Staff created successfully',200);
}


public function viewStaff(){
    $staffs=Staff::all();     
    if(count($staffs) > 0){
            return response()->json($staffs,200);}
        else{ 
             return response()->json(['message'=>'Product not Found'],404);}
}


public function showStaff($id){
    $staffs=Staff::find($id);   
        if($staffs){
                // return response()->json(new ShowResource($customers),200);}
            return response()->json(['data'=>$staffs],200);}
        else{
            return response()->json('Product not Found',404);}
        
}


public function updateStaff(Request $request,$id){
    $staff=Staff::find($id);            
        if($staff){
            $staff->update($request->all());
            return response()->json($staff,200);}
        else{
            return response()->json(['message'=>'Product Not Found'],400);}
}

    
public function destroyStaff($id){
    $staff=Staff::destroy($id);
        if($staff){
            return response()->json(['message'=>'delete success'],200);}
        else{
            return response()->json(['message'=>'product Not Found'],400);}
}      

  

//For Admin Page

public function createAdmin(request $request){
    $validator=validator::make($request->all(),
           ['username'=>'required|unique:admins,username,id',
           'admin_id'=>'required|unique:admins,admin_id,id',
        //    'email'=>'required|email|unique:users,email,id',
           'password'=>'required',
           'c_password'=>'required|same:password']);

   if($validator->fails()){
           return response()->json($validator->errors(),401);
   }
           $data=$request->all();
         //  $data['password']=Hash::make( $data['password']);
           $user=Admin::create($data);
           return response()->json('registration success ',200);
    }


    public function viewAdmin(){
        $admins=Admin::all();     
        if(count($admins) > 0){
                return response()->json($admins,200);}
            else{ 
                 return response()->json(['message'=>'Product not Found'],404);}
    }
    
    
    public function showAdmin($id){
        $admins=Admin::find($id);   
            if($admins){
                    // return response()->json(new ShowResource($customers),200);}
                return response()->json(['data'=>new ShowAdminsResource($admins)],200);}
            else{
                return response()->json('Product not Found',404);}
            
    }
    
    public function destroyAdmin($id){
        $admins=Admin::destroy($id);
            if($admins){
                return response()->json(['message'=>'delete success'],200);}
            else{
                return response()->json(['message'=>'product Not Found'],400);}
    }

    
    public function updateAdmin(Request $request,$id){
        $admins=Admin::find($id);            
            if($admins){
                $admins->update($request->all());
                return response()->json($admins,200);}
            else{
                return response()->json(['message'=>'Product Not Found'],400);}
    }



//For Payments page
 
public function createPayments(request $request){
    $validator= validator::make($request->all(),[
       'name'=>"required|max:50",
       'server'=>"required",
       'account'=>"required|min:12",
       'username'=>"required|unique:payments,username,id|max:50",
       'password'=>"required|max:50",
       'type'=>"required",
       'network'=>"required",

       'noofconn'=>"required|numeric",
       'phone'=>"required|min:10|unique:payments,phone,id",
       'rental'=>"required|max:50",
       'address'=>"required|max:250",
       'total'=>"required|max:4",   
       'collectionamount'=>"required|max:200",
        'collectiondate'=>"required"]);

    if ($validator->fails()){
        return  response()->json(['error'=>$validator->errors()],400);}
    $data=$request->only(['name','server','account','username','password','type','network','noofconn','phone','rental','address','total','collectionamount','collectiondate']);
    $payments=Payments::create($data);
    return response()->json(['message'=>'payment added successfully'],200);  

}




public function viewPayments(){
    $payments= Payments::all();     
        if(count($paymens) > 0){
            return response()->json($payments,200);}
        else{ 
            return response()->json(['message'=>'Product not Found'],404);}
}



public function showPayments($id){
   $payments=Payments::find($id);   
        if($payments){
            return response()->json($payments,200);}
       //     return response()->json(['data'=>$customers],200);}
        else{
            return response()->json('Product not Found',404);}
       
   }


public function updatePayments(Request $request,$id){
    $payments=Payments::find($id);   
        if($payments){
            $payments->update($request->all());
            return response()->json($payments,200);}
        else{
            return response()->json(['message'=>'Product Not Found'],400);}
}

   
public function destroyPayments($id){
    $payments=Payments::destroy($id);
        if($payments){
            return response()->json(['message'=>'delete success'],200);}
        else{
            return response()->json(['message'=>'product Not Found'],400);}
}                                        



//For Sim Page

public function createSim(request $request){
    $validator= validator::make($request->all(),[
       'name'=>"required|max:50",
       'network'=>"required",
       'noofconn'=>"required|numeric",
       'date'=>"required",
       'phone'=>"required|min:10|unique:sims,phone,id",
       'address'=>"required|max:250"]);
       

    if ($validator->fails()){
        return  response()->json(['error'=>$validator->errors()],400);}

        $data=$request->only(['name','network','noofconn','date','phone','address']);
        $sim=Sim::create($data);
        return response()->json(['message'=>'record added successfully'],200);
}




public function viewSim(){
    $sim=Sim::all();     
        if(count($sim) > 0){
            return response()->json($sim,200);}
        else{ 
            return response()->json(['message'=>'Product not Found'],404);}
}



public function showSim($id){
    $sim=Sim::find($id);
        if($sim){
            return response()->json(new ShowSimResource($sim),200);}
       //     return response()->json(['data'=>$customers],200);}
        else{
            return response()->json('Product not Found',404);}       
}


public function updateSim(Request $request,$id){
    $sim=Sim::find($id);   
        if($sim){
           $sim->update($request->all());
           return response()->json([new UpdateSimResource($sim)],200);}
        else{
           return response()->json(['message'=>'Product Not Found'],400);}
}

   
public function destroySim($id){
    $sim=Sim::destroy($id);
        if($sim){
            return response()->json(['message'=>'delete success'],200);}
        else{
            return response()->json(['message'=>'product Not Found'],400);}
}                                        


    
}
