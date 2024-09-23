@extends('inventory.layouts')

@section('content') 

<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Item Information
                </div>
                <div class="float-end">
                    <a href="{{ route('inventory.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                

            <div class="mb-3 row">
                        <label for="code" class="col-md-4 col-form-label text-md-end text-start">Código</label>
                        <div class="col-md-6">
                        {{ $inventory->code }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="name" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $inventory->name }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="type" class="col-md-4 col-form-label text-md-end text-start">Tipo</label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $inventory->type }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Descripción</label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $inventory->description }}
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="price" class="col-md-4 col-form-label text-md-end text-start">Precio</label>
                        <div class="col-md-6" style="line-height: 35px;">
                        {{ $inventory->price }}
                        </div>
                    </div>  
        
            </div>
        </div>
    </div>    
</div>
    
@endsection