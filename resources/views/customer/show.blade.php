@extends('layouts.app')

@section('content')
    <div class="row py-5 px-4" style="background-color: #f5f5f5;">
        <div class="col-md-5 mx-auto">
            <a href="{{ route('customer.index') }}" class="btn mb-3" style="background-color: #4643d3; color: white;"><i class="fas fa-chevron-left"></i> Back</a>
            <div class="bg-white shadow rounded overflow-hidden">
                <div class="px-4 pt-4 pb-4" style="background-color: #e8e8e8;">
                    <div class="media align-items-center profile-head d-flex flex-column">
                        <div class="profile mb-3">
                            <img
                                src=" {{ asset('storage/'.$customers->image) }}"
                                alt="..." width="150" height="150" style="object-fit: cover; border-radius: 8px;" class="img-thumbnail">
                        </div>
                        <div class="media-body text-center text-black">
                            <h4 class="mt-0 mb-0">{{ $customers->first_name }} {{ $customers->last_name }}</h4>
                            <p class="small mb-2">{{ $customers->email }}</p>
                        </div>
                    </div>
                </div>

                <div class="px-4 py-3">
                    <div class="p-4 rounded shadow-sm bg-light">
                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td style="width: 250px;">First Name</td>
                                    <td>{{ $customers->first_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Last Name</td>
                                    <td>{{ $customers->last_name }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Email</td>
                                    <td>{{ $customers->email }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Phone</td>
                                    <td>{{ $customers->phone }}</td>
                                </tr>
                                <tr>
                                    <td style="width: 250px;">Account Number</td>
                                    <td>{{ $customers->bank_account_number }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection