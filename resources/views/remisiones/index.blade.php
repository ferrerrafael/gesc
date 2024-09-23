@extends('remisiones.layouts') 

@section('content')

<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">REMISIONES</div>
            <div class="card-body">
                <a href="{{ route('remisiones.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i>&nbsp;CREAR</a>
                <table class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Fecha</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Factura</th>
                        <th scope="col">E-mail</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($remisiones as $remision)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $remision->customer_id }}</td>
                            <td>0.0</td>
                            <td>
                                <form action="{{ route('remisiones.destroy', $remision->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <a href="{{ route('remisiones.show', $remision->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('remisiones.edit', $remision->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this product?');"><i class="bi bi-trash"></i> Delete</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                            <td colspan="6">
                                <span class="text-danger">
                                    <strong>No Product Found!</strong>
                                </span>
                            </td>
                        @endforelse
                    </tbody>
                  </table>

                  {{ $remisiones->links() }}

            </div>
        </div>
    </div>    
</div>
    
@endsection