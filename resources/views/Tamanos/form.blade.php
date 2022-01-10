@include('parcial.alert')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Crear Tamaño</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" wire:model.defer="nombre"  class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
        </div>


      <!-- /.card-body -->

      <div class="card-footer">
       @if ($accion == 1)
       <button  wire:click="store" class="btn  d-flex justify-content-center btn-primary">Guardar</button>
       @endif
       @if ($accion == 3)
        <button  wire:click="actualizar" class="btn  d-flex justify-content-center btn-primary">Actualizar</button>
       @endif

      </div>

  </div>
