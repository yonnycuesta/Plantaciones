{!! Toastr::message() !!}
<div class="row">
    <div class="col-12">
        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title"><b>Listado de productos</b></h3>
                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                    <thead>
                        <tr>

                            <th>Nombre</th>
                            <th>Stock</th>
                            <th>Precio</th>
                            <th>Cantidad demandada</th>
                            <th>Tamaño</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            @foreach ($productos as $row)

                            <td>{{ $row->name }}</td>
                            <td>{{ $row->stock }}</td>
                            <td>{{ $row->precio_unitario }}</td>
                            <td>{{ $row->cantidad_demandada }}</td>
                            <td>{{ $row->tamano_id }}</td>
                            <td>{{ $row->image }}</td>
                            <td>
                                @include('parcial.acciones')
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="margin:auto !important; background-color:white; ">
                {{ $productos->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

@section('scripts')

<script type="text/javascript">


</script>
@endsection
