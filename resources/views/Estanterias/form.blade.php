@include('parcial.alert')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Crear Estanteria</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre Estanteria</label>
          <input type="text" wire:model="nombre"  class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre estanteria">
          @if($errors->has('nombre'))
              <p>{{$errors->first('nombre')}} </p>
         @endif
        </div>

      <!-- /.card-body -->

      <div class="card-footer">
        <button  wire:click="store" class="btn  d-flex justify-content-center btn-primary">Guardar</button>

      </div>

  </div>
