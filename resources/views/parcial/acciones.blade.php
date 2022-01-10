<a class="btn btn-primary  fas fa-edit" wire:click="editar({{$row->id}})"  ></a>
<a class="btn btn-warning  far fa-eye" wire:click="mostrar({{$row->id}})"  ></a>
<a class="btn btn-danger  fas fa-trash-alt"  href="javascript:void(0);" onclick="confirmar('{{$row->id}}')"  ></a>

