@extends('customers.layouts')

@section('content') 

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Customer Information
                </div>
                <div class="float-end">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">

                    <div class="row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start"><strong>Name:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->name }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="tipo_id" class="col-md-4 col-form-label text-md-end text-start"><strong>Tipo de identificacion:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->tipo_id }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="identification" class="col-md-4 col-form-label text-md-end text-start"><strong>Identification:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->identification }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="cellphone" class="col-md-4 col-form-label text-md-end text-start"><strong>Celular:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->cellphone }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="telephone" class="col-md-4 col-form-label text-md-end text-start"><strong>Teléfono:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->telephone }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start"><strong>E-mail:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->email }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start"><strong>País:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->country }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start"><strong>Ciudad:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->city }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start"><strong>Dirección:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->address }}
                        </div>
                    </div>

                    <div class="row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start"><strong>Status:</strong></label>
                        <div class="col-md-6" style="line-height: 35px;">
                            {{ $customer->status }}
                        </div>
                    </div>
        
            </div>
        </div>
    </div>    
</div>
    
@endsection