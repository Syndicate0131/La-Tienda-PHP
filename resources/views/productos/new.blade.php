@extends('layouts.menu')
@section('contenido')

<div class="row">
    <h1 class="teal-text ">Nuevo Producto</h1>
    <form action="" class="col s8" method="POST">
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
    </form>
</div>
@endsection