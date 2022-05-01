@include('parcial.alert')


<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Crear Pedido</h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h1 class="card-title">Datos Cliente</h1><br>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nombre Cliente</label>
                        <select class="form-control" wire:model="id_cliente" aria-label="Default select example">
                            <option value="">Escoger cliente</option>
                            @foreach ($clientes as $cliente)
                            <option value="{{ $cliente->id }}">{{ $cliente->name }}</option>
                            @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">DNI</label>
                        <input type="text" wire:model="dni" disabled class="form-control" value="{{old('dni')}}"
                            id="exampleInputEmail1">
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="form-group mt-4">
                        <label for="exampleInputEmail1">Telféfono</label>
                        <input type="text" wire:model="telefono" disabled class="form-control"
                            value="{{old('telefono')}}" id="exampleInputEmail1">
                    </div>
                </div>
                <h1 class="card-title">Datos Producto</h1><br>

                <table class="mt-4">
                    <thead>
                        <tr>
                            <th class="item-table">Código</th>
                            <th class="item-table">Descripción</th>
                            <th class="item-table">Cantidad</th>
                            <th class="item-table">Precio</th>
                            <th class="item-table">Total</th>
                            <th class="item-table">Acción</th>
                        </tr>


                        <tr>
                            <td>

                                <input type="text" wire:model="codigo" class="form-control    inproducto"
                                    id="exampleInputEmail1">
                            </td>
                            <td>
                                <input type="text" wire:model="name_producto" disabled class="form-control    inproducto"
                                    id="exampleInputEmail1">
                            </td>
                            <td>

                                <input type="number" wire:model="cantidad"
                                    class="form-control  inproducto" id="exampleInputEmail1">
                            </td>
                            <td>
                                <input type="text" wire:model="precio" disabled class="form-control    inproducto"
                                    id="exampleInputEmail1" value="{{old('precio')}}">
                            </td>
                            <td>
                                <input type="text" wire:model="precio_total" value="{{old('precio_total')}}" disabled
                                    class="form-control  inproducto" id="exampleInputEmail1">
                            </td>
                            <td>
                                @if ($cantidad <= $cantidad_demandada) <button wire:click="add"
                                    class="btn btn-primary inproducto">Agregar</button>
                                    @else
                                    <button wire:click="add" class="btn btn-danger inproducto" disabled>Agregar</button>
                                    @endif

                            </td>
                        </tr>
                    </thead>
                </table>

                <table>
                    <thead>
                        <tr>
                            <th class="item-table">Código</th>
                            <th class="item-table">Descripción</th>
                            <th class="item-table">Cantidad</th>
                            <th class="item-table">Precio</th>
                            <th class="item-table">Total</th>
                            <th class="item-table">Acción</th>

                        </tr>
                    </thead>

                    <tbody class="text-center">
                        <tr>
                            @foreach ($myArray as $my)

                            <td>
                                <?php echo $my['codigo']; ?>
                            </td>
                            <td>
                                <?php echo $my['name_producto']; ?>
                            </td>

                            <td>
                                <?php echo $my['cantidad']; ?>
                            </td>


                            <td>
                                <?php echo $my['precio']; ?>
                            </td>
                            <td>
                                <?php echo $my['precio_total']; ?>
                            </td>

                            <td>
                                <a href="#" wire:click="eliminar" class="btn btn-danger"><i
                                        class="fas fa-trash-alt"></i></a>
                            </td>


                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="pt-4" style="float:right;">
                        <tr>
                            <th>Subtotal:</th>
                            <td class="textright"></td>

                        </tr>
                        <tr>
                            <th>IVA(%):</th>
                            <td class="textright"></td>

                        </tr>
                        <tr>
                            <th>Descuento:</th>
                            <td>.</td>

                        </tr>
                        <tr>

                            <th>TOTAL:</th>
                            <td class="textright">
                                <?php   
                                    echo '$'.$this->total;
                                    ?>
                            </td>
                        </tr>

                    </tfoot>

                   
                </table>


            </div>

        </div>
        <!-- /.card-body -->

        <div class="card-footer" style="float: right">
            <a href="#" wire:click='guardarPedido' class="btn btn-success">Guardar pedido</a>

        </div>

    </div>

    <style type="text/css">
        .item-table {
            padding: 50px 50px 0px 50px;
            text-align: center;
        }

        .inproducto {
            top: -30px;
            margin: 5px;
        }
    </style>
    @section('styles')
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css"
        integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.css"
        integrity="sha512-CbQfNVBSMAYmnzP3IC+mZZmYMP2HUnVkV4+PwuhpiMUmITtSpS7Prr3fNncV1RBOnWxzz4pYQ5EAGG4ck46Oig=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    @endsection
    @section('scripts')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"
        integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @endsection