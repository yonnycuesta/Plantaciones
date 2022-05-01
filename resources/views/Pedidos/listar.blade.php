{!! Toastr::message() !!}
<div class="row">
    <div class="col-12">
        <p>{{ $queryId }}</p>
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LISTADO DE PEDIDOS</h3>
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
                            <th>#</th>
                            <th>Nombre Cliente</th>
                            <th>Total</th>
                            <th>Estado</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach($pedidos as $row)

                            <td> {{$row->id}}</td>
                            <td> {{ $row->cliente_id }} </td>
                            <td>{{ $row->total }}</td>
                            <td>
                                @if ($row->status == 0)
                                <span class="badge badge-warning">Pendiente</span>
                                @elseif($row->status == 1)
                                <span class="badge badge-success">Facturado</span>
                                @else
                                <span class="badge badge-danger">Cancelado</span>

                                @endif
                            </td>
                            <td>
                                {{ $row->fecha_pedido }}
                            </td>
                            <td>
                                <a href="{{ route('detalle-pedido', $row->id) }}" class="btn btn-info mr-2">
                                    <i class="fas fa-eye"></i></a>

                                    <button class="btn btn-danger mr-2" wire:click="$emit('orderDetails', {{ $row->id }})">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                       

                                    <a href="#" wire:click="facturado" class="btn btn-success"><i
                                            class="fas fa-exchange-alt"></i></a>
                            </td>
                        </tr>


                        @endforeach

                    </tbody>

                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="margin:auto !important; background-color:white; ">

            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

@section('css')


@endsection

@section('scripts')


<script type="text/javascript">

</script>
@endsection
