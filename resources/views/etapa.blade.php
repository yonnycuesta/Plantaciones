@extends('adminlte::page')

@section('title', 'Dashboard')
@livewireStyles
@section('content_header')
<br>
@stop


@section('content')
<livewire:etapa-controller />
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@livewireScripts
@section('js')
<script src="sweetalert2.all.min.js"></script>

<script>

function confirmar(id){

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
@stop
