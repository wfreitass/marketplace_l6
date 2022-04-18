@extends('layouts.app')

@section('content')
<h1>Criar Loja</h1>
<form action="{{route('admin.stores.store')}}" method="post">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    <div class="form-group">
        <label for="">Nome Loja</label>
        <input type="text" name="name" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Descrição</label>
        <input type="text" name="description" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Telefone</label>
        <input type="text" name="phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Celular/Whatsapp</label>
        <input type="text" name="mobile_phone" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Slug</label>
        <input type="text" name="slug" class="form-control">
    </div>
    <div class="form-group">
        <label for="">Usuário</label>
        <select name="user" class="form-control">
            @foreach ($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg mt-1">Criar loja</button>
    </div>
</form>
@endsection
