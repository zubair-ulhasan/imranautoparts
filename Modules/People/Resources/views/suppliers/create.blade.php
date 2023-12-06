@extends('layouts.app')

@section('title', 'Create Supplier')

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item"><a href="{{ route('suppliers.index') }}">Suppliers</a></li>
        <li class="breadcrumb-item active">Add</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <form action="{{ route('suppliers.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-lg-12">
                    @include('utils.alerts')
                    <div class="form-group">
                        <button class="btn btn-primary">Create Supplier <i class="bi bi-check"></i></button>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="form-row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_name">Supplier Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="supplier_name" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <label for="address">Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="address" required>
                                    </div>
                                </div>
                            </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="supplier_email"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="supplier_email" value="we12@gmail.com" >
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="supplier_phone"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="supplier_phone" value="1" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="city"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="city" value="h" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="country"><span class="text-danger"></span></label>
                                        <input type="hidden" class="form-control" name="country" value="i" required>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" hidden>Submit</button>
                            </div-->


                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
