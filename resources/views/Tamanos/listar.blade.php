{!! Toastr::message() !!}
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">LISTADO DE TAMAÑOS</h3>
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
                            <th>nombre</th>
                            <th>Acciones</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tamanos as $key=>$row)
                        <tr>
                            <td> {{$key + 1 }}</td>
                            <td> {{$row->name}}</td>

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
                {{ $tamanos->links() }}
            </div>
        </div>
        <!-- /.card -->
    </div>
</div>

