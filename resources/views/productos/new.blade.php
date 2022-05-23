@extends('layouts.menu')

@section('contenido')
<div class="row">
    <h1 class="brown-text text-darken-4">Nuevo Producto</h1>
</div>
<div class="row">
    <form action="" class="col s8" method="POST">
        <div class="row">
            <div class="col s8 input-field">
                <input  type="text" id="nombre" name="nombre" placeholder="Nombre Producto" />
                <label for="nombre">Nombre Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <textarea name="desc" id="desc" class="materialize-textarea" placeholder="Descripcion Producto"></textarea>
                <label for="desc">Descripción</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 input-field">
                <input type="text" id="precio" name="precio" placeholder="Precio Producto">
                <label for="precio">Precio Producto</label>
            </div>
        </div>
        <div class="row">
            <div class="col s8 file-field input-field">
                <div class="btn"> 
                <span>Imagen Del Producto</span>
                <input type="file" name="imagen" />
             </div>
            <div class="file-path-wrapper">
                <input type="text" class="file-path">
            </div>
            </div>
        </div>
    </form>
</div>
@endsection