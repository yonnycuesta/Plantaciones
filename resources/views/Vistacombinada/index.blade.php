<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">ALL</h3>
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
                            <th>Estanteria</th>
                            <th>Fecha</th>
                            @foreach ($datosEtapa as $d)
                            <th>{{ $d->name }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        <tr>

                            @foreach($injertacion as $injer)

                            <td>
                                {{ $injer->name_estant }}
                            </td>

                            <td>{{ $injer->fechaInjertacion }}</td>


                            <td>2</td>
                            <td>2</td>


                            <td>

                            </td>


                            <td>1</td>
                            <td>1</td>

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
