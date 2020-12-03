<?php

namespace App\Http\Controllers\Customers;

use App\Events\NewCustomerHasRegisteredEvent;
use App\Http\Controllers\Controller;
use App\Mail\WelcomeNewUserMail;
use App\Models\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Models\Company;



class CustomersController extends Controller
{
//    2 вариант ->middleware('auth') в web.php напротив ресурссного

    public function __construct(){
        $this->middleware('auth')->except(['index']);;
    }


    public function index()
    {
//        $activeCustomers = Customer::where('active', 1)->get();
//        $activeCustomers = Customer::active()->get();


//        $inactiveCustomers = Customer::where('active', 0)->get();
//        $inactiveCustomers = Customer::inactive()->get();

//      $customers = Customer::all();


//        return view('customers.customers', [
//            'activeCustomers'=>$activeCustomers,
//            'inactiveCustomers'=>$inactiveCustomers
//        ]);

        // уменьшили количество запросов в бд , загружать только что нужно (чем)Customer::all
        $customers = Customer::with('company')->paginate(15);

//        dd($customers->toArray());

        return view('customers.index', compact('customers'));
    }

    public function create(){

        $companies = Company::all();
        $customer = new Customer();
        return view('customers.create', compact('companies', 'customer'));
    }

//    public function show($customer){
//
////        $customer = Customer::find($customer);
//        $customer = Customer::where('id', $customer)->firstOrFail();
//
//        return view('customers.show', compact('customer'));
//    }

    public function show(Customer $customer){
        return view('customers.show', compact('customer'));
    }

    public function edit(Customer $customer){

        $companies = Company::all();
        return view('customers.edit', compact('customer', 'companies'));
    }

    public function store()
    {
        //
        $this->authorize('create', Customer::class);

        //вынесли в отдельный метод validateRequest
//        $data = request()->validate([
//            'name'=>'required|min:3',
//            'email'=>'required|email',
//            'phone'=>'required|numeric',
//            'active'=>'required',
//            'company_id'=>'required|integer'
//            ]);

//        $customer = new Customer();
//        $customer->name = request('name');
//        $customer->email= request('email');
//        $customer->phone=request('phone');
//        $customer->active=request('active');
//        $customer->save();

//        Customer::create($data);
        $customer = Customer::create($this->validateRequest());

        $this->storeImage($customer);

        event(new NewCustomerHasRegisteredEvent($customer));

//        Mail::to($customer->email)->send(new WelcomeNewUserMail());


        //Register to Newsletter
//        dd('Register to Newsletter');

        return redirect('/customers');
    }



    public function update(Customer $customer){

        ////вынесли в отдельный метод validateRequest
//        $data = request()->validate([
//            'name'=>'required|min:3',
//            'email'=>'required|email',
//            'phone'=>'required|numeric',
//            'active'=>'required',
//            'company_id'=>'required|integer'
//        ]);

//        $customer->update($data);



        $customer->update($this->validateRequest());

        $this->storeImage($customer);




        return redirect('customers/'.$customer->id);


    }



    public function destroy(Customer $customer){

        $this->authorize('delete', $customer);


        $customer->delete();


        return redirect('/customers');
    }

    public function validateRequest()
    {
        //1-q способ

//        return request()->validate([
//            'name'=>'required|min:3',
//            'email'=>'required|email',
//            'phone'=>'required|numeric',
//            'active'=>'required',
//            'company_id'=>'required|integer'
//            ]);

        //после добавления картинки
//        $validateData=request()->validate([
//            'name'=>'required|min:3',
//            'email'=>'required|email',
//            'phone'=>'required|numeric',
//            'active'=>'required',
//            'company_id'=>'required|integer'
//            ]);
//        if(request()->hasFile('image')){
//            dd(request()->image);
//
//            request()->validate([
//                'image'=>'file|image|max:5000'
//            ]);
//        }
//        return $validateData;

//        3-й способ после добавл картинки
        return request()->validate([
            'name'=>'required|min:3',
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'active'=>'required',
            'company_id'=>'required|integer',
            'image'=>'sometimes|file|image|max:5000'
            ]);

    }

    public function storeImage($customer)
    {
        if( request()->has('image')){
            $customer->update([
                'image'=> request()->image->store('uploads', 'public')
            ]);
        }

    }

}
