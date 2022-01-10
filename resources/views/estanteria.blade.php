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
@stop

@livewireScripts
@section('js')

    <script> console.log('Hi!'); </script>
@stop
