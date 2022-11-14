<?php

namespace App\Services;
use App\Models\Customer;
use App\Http\Requests\CustomerRequest;

class CustomerServices{

    /**Service For Register Customer */
    public function insertCustomerService(CustomerRequest $request){
        $result = Customer::create($request->validated());
    }

    /**Service To Get Customer List */
    public function getCustomer(){
        return  Customer::all();
    }

    /**Service To Update Customer Data */
    public function updateCustomer( CustomerRequest $request , Customer $key){
        $update=Customer::find($request->id || $key );
        if($update){
            $update->name = $request->name;
            $update->age = $request->age;
            $update->country = $request->country;
            $update->private_image = $request->private_image;
            $update->private_videos = $request->private_videos;
            $update->image_url = $request->image_url;
            $update->save();
            return true;
        }
        else{
            return false;
        }
    }

    /**Service To Delete Customer Record */
    public function deleteCustomer($id){
        $delete=Customer::find($id);
        if($delete){
            $delete->delete($id);
             return true;
        }else{
            return false;
        }
    }

    /**Single Customer Fetch */
    public function edit($id){
        $result=Customer::where('id', $id)->first();
        return $result;
        if($result){
            return $result;
        }else{
            return false;
        }

    }

}
