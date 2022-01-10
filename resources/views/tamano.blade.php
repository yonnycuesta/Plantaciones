@extends('adminlte::page')

@section('title', 'Dashboard')
@livewireStyles
@section('content_header')
   <br>
@stop


@section('content')
<livewire:tamanos/>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@livewireScripts
@section('js')

    <script> console.log('Hi!'); </script>
@stop
