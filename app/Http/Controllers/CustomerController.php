<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CustomerController extends Controller
{
    public function index(Request $request)
    {   
            
        $customers = Customer::when($request->search, function($query) use ($request){
            return $query->where('first_name', 'like', '%'.$request->search.'%')
            ->orWhere('last_name', 'like', '%'.$request->search.'%')
            ->orWhere('email', 'like', '%'.$request->search.'%')
            ->orWhere('phone', 'like', '%'.$request->search.'%')
            ->orWhere('bank_account_number', 'like', '%'.$request->search.'%');
        })->orderBy('created_at', $request->order ?? 'desc')->get();

        return view('customer.index', compact('customers'));
    }

    public function showView($id)
    {
      $customers = Customer::find($id);
      return view('customer.show', compact('customers'));
    }
    public function storeView()
    {
        return view('customer.store');
    }

    public function store(StoreCustomerRequest $request)
    {
        $request->validated();

        $image = $request->file('image');
        $caminhoArquivo = Storage::disk('public')->put('uploads', $image);

        $data = $request->all();
        $data['image'] = $caminhoArquivo;

        $customer = Customer::create($data);

        return redirect()->route('customer.index');
    }

    public function updateView($id)
    {
        $customers = Customer::find($id);
        return view('customer.update', compact('customers'));
    }
    public function update(StoreCustomerRequest $request, $id)
    {
        $request->validated();
        
        $customer = Customer::find($id);
        $image = $request->file('image');
        $caminhoArquivo = Storage::disk('public')->put('uploads', $image);

        $data = $request->all();
        $data['image'] = $caminhoArquivo;
        $customer->update($data);

        return redirect()->route('customer.index');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);
        Storage::disk('public')->delete('uploads/'.$customer->image);
        $customer->delete();
        return redirect()->route('customer.index');
    }
}
