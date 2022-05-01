@extends('adminlte::page')

@section('title', 'Dashboard')
@livewireStyles
@section('content_header')
<br>
@stop


@section('content')
<livewire:detalle-pedido-controller />
@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">

@stop

@livewireScripts
@section('js')
<script src="sweetalert2.all.min.js"></script>

<script>

</script>
@stop
