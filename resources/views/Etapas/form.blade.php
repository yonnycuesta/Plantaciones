@include('parcial.alert')


<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Crear Etapa</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->

      <div class="card-body">
        <div class="form-group">
          <label for="exampleInputEmail1">Nombre</label>
          <input type="text" wire:model.defer="nombre"  class="form-control" id="exampleInputEmail1" placeholder="Ingrese Nombre">
        </div>
        <div class="form-group">
            <label for="exampleInputEmail1">Duración estimada</label>
            <input type="number" wire:model.defer="duracionestimada"  class="form-control" id="exampleInputEmail1">
          </div>

          <div class="form-group">
            <div class="radio-btn">
            <label for="">Elija a qué etapa maestra pertenece</label>
                <div class="form-check">
                    <input class="form-check-input" wire:model="etapamaestra" type="radio" name="e"  value="1" >
                    <label class="form-check-label" for="flexRadioDefault1">
                     Injertación
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" wire:model="etapamaestra" type="radio" name="e" value="2" >
                    <label class="form-check-label" for="flexRadioDefault2">
                      Patronaje
                    </label>
                  </div>
              </div>
          </div>
      <!-- /.card-body -->

      <div class="card-footer">

        @if ($accion == 1)
        <button  wire:click="store" class="btn  d-flex justify-content-center btn-primary">Guardar</button>
        @endif
        @if ($accion == 3)
         <button  wire:click="actualizar" class="btn  d-flex justify-content-center btn-success">Actualizar</button>
        @endif

      </div>

  </div>
