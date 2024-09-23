@extends('tasks.layouts')

@section('content')
<style>
canvas {box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px; margin: 1rem auto; width: 500px; height: 300px;}
</style>
<div class="row justify-content-center mt-3">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Task
                </div>
                <div class="float-end">
                    <a href="{{ route('tasks.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div> 
            <div class="card-body">
                <form action="{{ route('tasks.store') }}" method="post">
                    @csrf

                    <div class="mb-3 row">
                        <label for="title" class="col-md-4 col-form-label text-md-end text-start">Nombre</label>
                        <div class="col-md-6">
                            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @if ($errors->has('title'))
                            <span class="text-danger">{{ $errors->first('title') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="col-md-4 col-form-label text-md-end text-start">Descripción</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('description') is-invalid @enderror" id="description" name="description" value="{{ old('description') }}">
                            @if ($errors->has('description'))
                                <span class="text-danger">{{ $errors->first('description') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="due_date" class="col-md-4 col-form-label text-md-end text-start">Fecha Vencimiento</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('due_date') is-invalid @enderror" id="due_date" name="due_date" value="{{ old('due_date') }}">
                            @if ($errors->has('due_date'))
                                <span class="text-danger">{{ $errors->first('due_date') }}</span>
                            @endif
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="completed" class="col-md-4 col-form-label text-md-end text-start">Estado</label>
                        <div class="col-md-6">
                        <select class="form-select" class="form-control @error('completed') is-invalid @enderror" id="completed" name="completed" value="{{ old('completed') }}">
                            <option selected>Seleccione</option>
                            <option value="0">Active</option>
                            <option value="1">Completada</option>
                        </select> 
                          
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="user_id" class="col-md-4 col-form-label text-md-end text-start">User Id</label>
                        <div class="col-md-6">
                          <input type="text"  class="form-control @error('user_id') is-invalid @enderror" id="user_id" name="user_id" value="{{ old('user_id') }}">
                            @if ($errors->has('user_id'))
                                <span class="text-danger">{{ $errors->first('user_id') }}</span>
                            @endif
                        </div>
                    </div>

                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Save">
                    </div>
                    
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection