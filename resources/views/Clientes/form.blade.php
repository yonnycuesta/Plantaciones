@include('parcial.alert')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Agregar Cliente</h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" wire:model="nombre" class="form-control" id="exampleInputEmail1" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Apellidos</label>
                        <input type="text" wire:model="apellidos" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="number" wire:model="dni" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">RUT</label>
                        <input type="text" wire:model="rut" class="form-control" value="">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Dirección</label>
                        <input type="text" wire:model="direccion" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Teléfono</label>
                        <input type="number" wire:model="telefono" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Celular</label>
                        <input type="number" wire:model="celular" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" wire:model="email" class="form-control" value="">
                    </div>
                </div>
            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer">

            @if ($accion == 1)
            <button wire:click="store" class="btn  d-flex justify-content-center btn-primary">Guardar</button>
            @endif
            @if ($accion == 3)
            <button wire:click="actualizar" class="btn  d-flex justify-content-center btn-success">Actualizar</button>
            @endif
        </div>

    </div>
