@include('parcial.alert')

<div class="card card-primary">
    <div class="card-header">
      <h3 class="card-title">Crear Injertación</h3>
    </div>
      <div class="card-body">
    <div class="container">
        <div class="row">

            <div class="col-md-6">
                <div class="form-group">
                    <label for="exampleInputEmail1">Fecha Estimada</label>
                    <input type="date" wire:model="fechaestimada" disabled class="form-control" id="exampleInputEmail1" value="{{old('fechaestimada')}}">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Cantidad</label>
                    <input type="number" wire:model.defer="cantidad" class="form-control" value="{{old('cantidad')}}">
                  </div>

            @if ($opc == 2)
            <div class="form-group">
                <label for="exampleInputEmail1">Estanteria</label>
                <select class="form-control" wire:model="id_estanteria" disabled value="{{old('id_estanteria')}}"  aria-label="Default select example">
                    @foreach ($datosEstanteria as $des)
                    <option  value="{{ $des->id }}">{{ $des->name }}</option>
                    @endforeach
                  </select>
              </div>
             @else
            <div class="form-group">
                <label for="exampleInputEmail1">Estanteria</label>
                <select class="form-control" wire:model="id_estanteria" value="{{old('id_estanteria')}}"  aria-label="Default select example">
                    @foreach ($datosEstanteria as $des)
                    <option  value="{{ $des->id }}">{{ $des->name }}</option>
                    @endforeach
                  </select>
              </div>
              @endif

            </div>
            <div class="col-md-6">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tamaño</label>
                    <select class="form-control" wire:model="id_tamano" value="{{old('id_tamano')}}" aria-label="Default select example">
                        @foreach ($datosTamano as $tm)
                        <option  value="{{ $tm->id }}">{{ $tm->name }}</option>
                        @endforeach
                      </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Etapa</label>
                    <select class="form-control" wire:model="id_etapa" value="{{old('id_etapa')}}" aria-label="Default select example">
                        @foreach ($datosEtapa as $de)
                        <option  value="{{ $de->id }}" >{{ $de->name }}</option>
                        @endforeach
                      </select>
                  </div>
@if($accion == 3)

@else
<div class="radio-btn">

    <div class="form-check">
        <input class="form-check-input" wire:model="opc" type="radio" name="p"  value="1" >
        <label class="form-check-label" for="flexRadioDefault1">
          Nueva injertación
        </label>
      </div>
      <div class="form-check">
        <input class="form-check-input" wire:model="opc" type="radio" name="p" value="2" >
        <label class="form-check-label" for="flexRadioDefault2">
          Patronaje
        </label>
      </div>
  </div>
@endif


                 @if($opc == 2 )
                  <div class="form-group">
                    <label for="exampleInputEmail1">Patronajes</label>
                    <select class="form-control" wire:model="option_patronaje" aria-label="Default select example">
                        @foreach ($patronaje as $p)
                        <option  value="{{ $p->id }}" >{{ $p->id }} - {{ $p->name_etap }}</option>
                        @endforeach

                      </select>
                  </div>
                  @endif


            </div>
        </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Observación</label>
                        <textarea class="form-control" wire:model="observacion" value="{{old('observacion')}}" placeholder="Leave a comment here" id="floatingTextarea" cols="25" rows="3" style="resize: none; overflow: scroll;"></textarea>
                      </div>
                </div>
            </div>
    </div>
      <!-- /.card-body -->

      <div class="card-footer">
        @if($accion == 1)
        <button  wire:click="store" class="btn  d-flex justify-content-center btn-primary">Guardar</button>
        @elseif ($accion == 3)
        <button  wire:click="actualizar" class="btn  d-flex justify-content-center btn-success">Actualizar</button>
        @endif
      </div>

  </div>
