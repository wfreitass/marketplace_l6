@extends('layouts.app')

@section('content')
    <a href="{{route('admin.products.create')}}" class="btn btn-lg btn-success">Criar Produto</a>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Produto</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product )
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->price}}</td>
                <td>
                    <a href="{{route('admin.products.edit',['product'=>$product->id])}}" class="btn btn-sm btn-primary">EDITAR</a>
                    <a href="{{route('admin.products.destroy',['product'=>$product->id])}}" class="btn btn-sm btn-danger">REMOVER</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{$products->links()}}
@endsection
