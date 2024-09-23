@extends('inventory.layouts')

@section('content')


<div class="row justify-content-center mt-3">
    <div class="col-md-12">

        @if ($message = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $message }}
            </div>
        @endif

        <div class="card">
            <div class="card-header">Inventory List</div>
            <div class="card-body">
                <a href="{{ route('inventory.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Product</a>
                <table class="table table-striped table-bordered table_data">
                    <thead>
                      <tr>
                        <th scope="col">S#</th>
                        <th scope="col">Código</th>
                        <th scope="col">Tipo</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Estado</th>
                      </tr>
                    </thead>
                    <tbody>
                        @forelse ($inventory as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->type }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->price }}</td>
                            <td>
                                <form action="{{ route('inventory.destroy', $item->id) }}" method="post">
                                    @csrf
                                    
                                    <a href="{{ route('inventory.show', $item->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                                    <a href="{{ route('inventory.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>   

                                    <a href="{{ route('pdf.index') }}?item_id={{$item->id}}&type=ticket" class="btn btn-success btn-sm"><i class="bi bi-printer"></i> Etiqueta</a>
                                    <button type="button" class="btn btn-danger btn-sm createQR" data-id="{{$item->id}}" ><i class="bi bi-printer"></i>Etiqueta</button>

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

                  {{ $inventory->links() }} 

            </div>
        </div>
    </div>    
</div>
    
@endsection