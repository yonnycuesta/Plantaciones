{!! Toastr::message() !!}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LISTADO DE ETAPAS</h3>
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
                            <th>Nombre</th>
                            <th>Duración estimada</th>
                            <th>Etapa maestra</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach($etapas as $row)

                            <td> {{$row->id}}</td>
                            <td> {{$row->name}}</td>
                            <td> {{$row->duracionEstimada}}</td>
                            <td> 
                                @if($row->etapa_maestra == 1)
                                <span class="badge badge-success">Injertación</span>
                                @else
                                <span class="badge badge-danger">Patronaje</span>
                                @endif

                            </td>
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
                {{ $etapas->links() }}
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