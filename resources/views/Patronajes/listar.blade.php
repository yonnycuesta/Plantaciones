{!! Toastr::message() !!}
<div class="row">
    <div class="col-12">
       <div class="form-group">
        <label for="" class="exampleInputEmail1">Seleccionar vista</label>
        <select class="form-control" wire:model="vista" value="" aria-label="Default select example">
            <option  value="" >Vista 1</option> 
            <option  value="" >Vista 2</option> 
          </select>
       </div>

        <div class="card mt-4">
            <div class="card-header">
                <h3 class="card-title">Patronajes</h3>
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
                            
                            <th>Fecha</th>
                            <th>Fecha estimada</th>
                            <th>Observación</th>
                            <th>Cantidad</th>
                            <th>Estanteria</th>
                            <th>Tamaño</th>
                            <th>Etapa</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach($patronaje as $row)
                            
                            <td> {{ $row->fechaPatronaje }} </td>
                            <td> {{ $row->fechaEstimada }} </td>
                            <td> {{ $row->observacion }} </td>
                            <td> {{ $row->cantidad }} </td>
                            <td> {{ $row->name_estant }} </td>
                            <td> {{ $row->name_tama }} </td>
                            <td> {{ $row->name_etap }}</td>
                            <td>
                                @include('parcial.acciones')
                            </td>
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
</div>

@section('scripts')

<script type="text/javascript">


</script>
@endsection