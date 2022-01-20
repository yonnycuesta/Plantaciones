{!! Toastr::message() !!}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Estanterias</h3>

                <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 150px;">
                        <input type="text" name="table_search" wire:model="table_search" class="form-control float-right" placeholder="Search">

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
                            <th>nombre</th>
                            <th>Estado</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach($Estanteria as $row)

                            <td> {{$row->id}}</td>
                            <td> {{$row->name}}</td>
                            <td>
                                @if($row->status == 'available')
                                <span class="badge badge-success">Habilitada</span>
                                @else
                                <span class="badge badge-danger">Inhabilitada</span>
                                @endif
                            </td>

                            <td>
                                @include('parcial.acciones')

                                @if ($row->status == 'available')
                                <a class="btn btn-info  fa fa-thumbs-down" title="Inhabilitar" wire:click="inactivar({{$row->id}})"  ></a>
                                @else
                                <a class="btn btn-info  fa fa-thumbs-up" title="Habilitar" wire:click="activar({{$row->id}})"  ></a>

                                @endif
                            </td>
                        </tr>


                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="margin:auto !important; background-color:white; ">
                {{ $Estanteria->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

@section('scripts')

<script type="text/javascript">


    




</script>
@endsection
