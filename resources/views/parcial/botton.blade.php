@if($accion  == 2)
<button  wire:click="store" class="btn  d-flex justify-content-center btn-primary">Guardar</button>
@elseif($accion == 3 )
<button  wire:click="actualizar" class="btn  d-flex justify-content-center btn-primary">Actualizar</button>
@endif
