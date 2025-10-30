@extends('layouts.app')

@section('content')
<div class="row justify-content-center mt-5">
    <div class="col-md-8">
        <h3>Customers</h3>
        <div class="card">
            <div class="card-header">
                <div class="row">
                <div class="col-md-2">
                    <a href="{{ route('customer.storeView') }}" class="btn" style="background-color: #4643d3; color: white;"><i class="fas fa-plus"></i> Create Customer</a>
                </div>
                <div class="col-md-8">
                    <form action=" {{ route('customer.index') }} " method="GET">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Search anything..." aria-describedby="button-addon2" name="search">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Search</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-2">
                    <form action=" {{ route('customer.index') }} " method="GET" class="form-order">
                        <div class="input-group mb-3">
                            <select class="form-select" name="order" id="order" onchange="$('form.form-order').submit();">
                                <option value="desc" {{ request()->order == 'desc' ? 'selected' : '' }}>Newest to Old</option>
                                <option value="asc" {{ request()->order == 'asc' ? 'selected' : '' }}>Old to Newest</option>
                            </select>
                        </div>
                    </form>
                </div>
                </div>
                  
            </div>
            <div class="card-body">
                <table class="table table-bordered" style="border: 1px solid #dddddd">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">BAN</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($customers as $customer)
                      <tr>
                        <th scope="row">{{ $customer->id }}</th>
                        <td>{{ $customer->first_name }}</td>
                        <td>{{ $customer->last_name }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>{{ $customer->phone }}</td>
                        <td>{{ $customer->bank_account_number }}</td>
                        <td>
                            <a href="{{  route('customer.updateView', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-edit"></i></a>
                            <a href="{{  route('customer.showView', $customer->id) }}" style="color: #2c2c2c;" class="ms-1 me-1"><i class="far fa-eye"></i></a>
                            <a href="javascript:;" onclick="if(confirm('Tem certeza que deseja excluir este cliente?')) { $('form.form-{{ $customer->id }}').submit(); }" style="color: #2c2c2c;" class="ms-1 me-1"><i class="fas fa-trash-alt"></i></a>
                            <form class="form-{{ $customer->id }}" action="{{ route('customer.delete', $customer->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
</div>
@endsection