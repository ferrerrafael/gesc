@extends('remisiones.layouts')

@section('content')
<style>
canvas {box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin: 1rem auto; width: 500px; height: 300px;}
</style>
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Remision
                </div>
                <div class="float-end">
                    <a href="{{ route('remisiones.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div> 
            <div class="card-body">
                <form action="{{ route('remisiones.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="customer_id" class="col-md-4 col-form-label text-md-end text-start">Cliente</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('customer_id') is-invalid @enderror" id="customer_id" name="customer_id" value="{{ old('customer_id') }}">
                            @if ($errors->has('customer_id'))
                            <span class="text-danger">{{ $errors->first('customer_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="productos" class="col-md-4 col-form-label text-md-end text-start">Productos</label>
                        <div class="col-md-6">
                            <hr>
                            <table class="table">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Descripción</th>
                                </tr>
                            </thead>
                            <tbody id="productsTable">
                                
                            </tbody>
                            </table>
                            <div class="row" >
                                <div class="col-md-10" >
                                <input type="text" class="form-control" id="search" name="search" placeholder="Buscar...">
                                </div>
                                <div class="col-md-2" >
                                    <button class="btn btn-info openModalCamera" ><i class="bi bi-camera-fill"></i></buttom>
                                </div>
                            </div>
                        </div>
                    </div>
                    

                    <div class="mb-3 row">
                        <label for="sing" class="col-md-4 col-form-label text-md-end text-start">Firma</label>
                        
                        <div class="col-md-6">
                        <canvas id="firmaBox" ></canvas>
                        <p><button type="buttom"  class="btn btn-danger borrarFirma">BORRAR</button>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="sing_date" class="col-md-4 col-form-label text-md-end text-start">Fecha firma</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('sing_date') is-invalid @enderror" id="sing_date" name="sing_date" value="{{ old('sing_date') }}">
                            @if ($errors->has('sing_date'))
                                <span class="text-danger">{{ $errors->first('sing_date') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="comments" class="col-md-4 col-form-label text-md-end text-start">Comentarios</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('comments') is-invalid @enderror" id="comments" name="comments" value="{{ old('comments') }}">
                            @if ($errors->has('comments'))
                                <span class="text-danger">{{ $errors->first('comments') }}</span>
                            @endif
                        </div>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Add Product">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection