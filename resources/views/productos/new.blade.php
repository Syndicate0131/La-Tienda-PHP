@extends('layouts.menu')
@section('contenido')

<div class="row">
    <h2 class="teal-text ">Formulario Nuevo Producto</h2>
    <h4 class="teal-text text-lighten-1">Digite los Datos</h4> 
    <form action="{{route ('productos.store') }}" class="col s8" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="nombre" name="nombre" placeholder="Nombre de Producto">
                <label for="nombre">Nombre de Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <textarea name="desc" id="desc" class="materialize-textarea" placeholder="Descripcion del Producto"></textarea>
                <label for="desc">Descripcion</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
            <input type="text" id="precio" name="precio" placeholder="Precio de Producto">
                <label for="precio">Precio de Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn">
                <span>Imagen del Producto</span>
                <input type="file" name="imagen">
                </div>
                <div class="file-path-wrapper">
                <input class="file-path" type="text">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <select name="marca" id="marca">
                    @foreach($marcas as $marca)
                    <option value=" {{ $marca->id }} ">
                        {{ $marca->nombre }}
                    </option>
                    @endforeach
                </select>
                <label>Seleccion de Marca</label>
            </div>
        </div>
        <div class="row">
        <div class="col s8 input-field">
                <select name="categoria" id="categoria">
                    @foreach($categorias as $categoria)
                    <option value=" {{ $categoria->id }} ">
                        {{ $categoria->nombre }}
                    </option>
                    @endforeach
                </select>
                <label>Seleccion de categoria</label>
            </div>
        </div>
        <div class="row">
        <button class="btn waves-effect-waves-ligth" type="submit">button</button>
        </div>
    </form>
</div>
@endsection