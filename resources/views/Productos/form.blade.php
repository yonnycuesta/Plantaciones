@include('parcial.alert')

<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Producto</h3>
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
                        <label for="exampleInputEmail1">Stock</label>
                        <input type="number" wire:model="stock" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tamaño</label>
                        <select class="form-control" wire:model="id_tamano" value=""
                            aria-label="Default select example">
                            <option value="">Escoger tamaño</option>
                            @foreach ($datosTamano as $tm)
                            <option value="{{ $tm->id }}">{{ $tm->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Precio Unitario</label>
                        <input type="number" wire:model="precio_unitario" class="form-control" value="">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Imagen</label>
                        <input type="file" wire:model="imagen" class="form-control" value="">
                    </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Etapa</label>
                    <select class="form-control" wire:model="id_etapa" value=""
                        aria-label="Default select example">
                        <option value="">Escoger etapa</option>
                        @foreach ($datosEtapa as $et)
                        <option value="{{ $et->id }}">{{ $et->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Descripción</label>
                        <textarea class="form-control" wire:model="descripcion" value=""
                            placeholder="Leave a comment here" id="floatingTextarea" cols="25" rows="3"
                            style="resize: none; overflow: scroll;"></textarea>
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
