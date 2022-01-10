

 <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Responsive Hover Table</h3>

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
              <tr>

@foreach($Estanteria as $row)

<td> {{$row->id}}</td>
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
      </div>
      <!-- /.card -->
    </div>
  </div>

@section('scripts')

<script type="text/javascript">

function comfirmar(id){
    Swal.fire({
  title: 'CONFIRMAR',
  text: '¿DESEAS ELIMINAR EL CLIENTE?',
  type:'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Aceptar',
  cancelButtonText:'Cancelar',
  closeOnConfirme: false
    }).then((result) => {
     if (result.isConfirmed) {
     window.livewire.emit('deleteRow',id)
     swal.close()
}
})

}




</script>
@endsection
