@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.update',['store'=>$store->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method("PUT")
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"> --}}
    <div class="form-group">
        <label for="">Nome Loja</label>
        <input type="text" name="name" class="form-control" value="{{$store->name}}">
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control" value="{{$store->description}}">
    </div>
    <div class="form-group">
        <label for="">Telefone</label>
        <input type="text" name="phone" class="form-control" value="{{$store->phone}}">
    </div>
    <div class="form-group">
        <label for="">Celular/Whatsapp</label>
        <input type="text" name="mobile_phone" class="form-control" value="{{$store->mobile_phone}}">
    </div>
    <div class="form-group">
        <p>
            <img src="{{asset('storage/' . $store->logo)}}" alt="">
        </p>
        <label for="photos">Logo da loja</label>
        <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror">
        @error('logo')
            <div class="invalid-feedback">
                {{$message}}
            </div>
        @enderror
    </div>
    {{-- <div class="form-group">
        <label for="">Slug</label>
        <input type="text" name="slug" class="form-control" value="{{$store->slug}}">
    </div> --}}

    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg mt-1">Atualizar loja</button>
    </div>
</form>
@endsection
