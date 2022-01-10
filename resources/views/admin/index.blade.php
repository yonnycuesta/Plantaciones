@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <livewire:estanteria-controller />
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!');

        window.livewire.on('tamanoStore', () => {
            $('#exampleModal').modal('hide');
        });

    </script>
@stop
