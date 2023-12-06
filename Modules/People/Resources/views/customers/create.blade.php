@extends('layouts.app')

@section('title', 'Create Customer')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('customers.index') }}">Customers</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('customers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-primary">Create Customer <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                 <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_phone">Customer Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="customer_phone" required>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="customer_name"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="customer_name" value="name" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>



                                <div class="col-lg-6">
                   <div class="form-group">
                        <label for="customer_email"><span class="text-danger"></span></label>
                           <input type="hidden" class="form-control" name="customer_email" value="welcome123@gmail.com" required>
                 </div>
                     </div>
                        <button type="submit" class="btn btn-primary" hidden>Submit</button>





                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="city" value="hyderabad" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="country"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="country" value="india" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="address" value="malakpet" required>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" hidden>Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

