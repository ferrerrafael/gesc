@extends('customers.layouts')

@section('content') 

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Product
                </div>
                <div class="float-end">
                    <a href="{{ route('customers.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('customers.update', $customer->id) }}" method="post">
                    @csrf
                    @method("PUT")

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Name</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $customer->name }}">
                            @if ($errors->has('name'))
                                <span class="text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="tipo_id" class="col-md-4 col-form-label text-md-end text-start">Tipo de Identificación</label>
                        <div class="col-md-6">
                          <input type="text" class="form-control @error('tipo_id') is-invalid @enderror" id="tipo_id" name="tipo_id" value="{{ $customer->tipo_id }}">
                            @if ($errors->has('tipo_id'))
                                <span class="text-danger">{{ $errors->first('tipo_id') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="identification" class="col-md-4 col-form-label text-md-end text-start">Identificación</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('identification') is-invalid @enderror" id="identification" name="identification" value="{{ $customer->identification }}">
                            @if ($errors->has('identification'))
                                <span class="text-danger">{{ $errors->first('identification') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="cellphone" class="col-md-4 col-form-label text-md-end text-start">Celular</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('cellphone') is-invalid @enderror" id="cellphone" name="cellphone" value="{{ $customer->cellphone }}">
                            @if ($errors->has('cellphone'))
                                <span class="text-danger">{{ $errors->first('cellphone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="telephone" class="col-md-4 col-form-label text-md-end text-start">Teléfono</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('telephone') is-invalid @enderror" id="telephone" name="telephone" value="{{ $customer->telephone }}">
                            @if ($errors->has('telephone'))
                                <span class="text-danger">{{ $errors->first('telephone') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="email" class="col-md-4 col-form-label text-md-end text-start">E-mail</label>
                        <div class="col-md-6">
                          <input type="email"  class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $customer->email }}">
                            @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="country" class="col-md-4 col-form-label text-md-end text-start">País</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ $customer->country }}">
                            @if ($errors->has('country'))
                                <span class="text-danger">{{ $errors->first('country') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="city" class="col-md-4 col-form-label text-md-end text-start">Ciudad</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ $customer->city }}">
                            @if ($errors->has('city'))
                                <span class="text-danger">{{ $errors->first('city') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="address" class="col-md-4 col-form-label text-md-end text-start">Dirección</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ $customer->address }}">
                            @if ($errors->has('address'))
                                <span class="text-danger">{{ $errors->first('address') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="status" class="col-md-4 col-form-label text-md-end text-start">Status</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('status') is-invalid @enderror" id="status" name="status" value="{{ $customer->status }}">
                            @if ($errors->has('status'))
                                <span class="text-danger">{{ $errors->first('status') }}</span>
                            @endif
                        </div>
                    </div>

              
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection