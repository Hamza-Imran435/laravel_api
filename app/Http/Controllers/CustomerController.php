<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Http\Resources\CustomerResource;
use App\Http\Resources\EditResource;
use App\Services\CustomerServices;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function __construct(private CustomerServices $customerService ){}

    /** Customer Get List */
    public function CustomerList(){
        $result=$this->customerService->getCustomer();
        $resources =  CustomerResource::collection($result);
            return response()->json([
                'status' => ' True ',
                'data' => $resources
            ]);


    }

    /**Add Customer*/
    public function insertCustomer(CustomerRequest $request){
        $result = $this->customerService->insertCustomerService($request);
        return response()->json([
            'status' => 'True',
            'message' => 'Customer Registered Successfully',
        ]);
    }

    /**Delete Customer */
    public function deleteCustomerRecord($id){
        $delete=$this->customerService->deleteCustomer($id);
        if($delete == true){
            return response()->json([
                'status' => 'True',
                'message' => 'Record Deleted Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'False',
                'message' => 'Record Not Found in Our Record',
            ]);
        }
    }

    /**Update Customer Record */
    public function updateCustomer(CustomerRequest $request , Customer $key){
        // dd($request);
        $update=$this->customerService->updateCustomer($request , $key);
        if($update==true){
            return response()->json([
                'status' => 'True',
                'message' => 'Record Updated Successfully',
            ]);
        }else{
            return response()->json([
                'status' => 'False',
                'message' => 'Record Not Found...!',
            ]);
        }
    }

    /**Single User Data Fetch */
    public function customer($id){
        $result = $this->customerService->edit($id);
        $resources =  EditResource::make($result);
        if($result){
            return response()->json([
                'status' => 'True',
                'data' => $resources,
            ]);
        }else{
            return response()->json([
                'status' => 'False',
                'message' => 'User is Not in Our Record...!',
            ]);
        }
    }
}
