@extends('adminlte::page')

@section('title', 'Dashboard')
@livewireStyles
@section('content_header')
    <h1>Dashboard</h1>
@stop


@section('content')
<livewire:estanteria-controller />
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@stop

@livewireScripts
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>

    function confirmar(id){

        Swal.fire({
      title: 'CONFIRMAR',
      text: '¿DESEAS ELIMINAR EL ESTANTERIA',
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
