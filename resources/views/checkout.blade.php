@extends('layouts.front')
@section("content")
<div class="container">
    <div class="col-md-6">
        <div class="row">
            <div class="col-md-12">
                <h2>Dados para Pagamento</h2>
                <hr>
            </div>
        </div>
        <form action="" method="post">
            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Número do cartão</label>
                    <input type="text" name="card_number" id="" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-4">
                    <label for="">Mês de Expiração</label>
                    <input type="text" name="card_month" id="" class="form-control">
                </div>
                <div class="form-group col-md-4">
                    <label for="">ano de Expiração</label>
                    <input type="text" name="card_year" id="" class="form-control">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-5">
                    <label for="">Código de segurança</label>
                    <input type="text" name="card_cvv" id="" class="form-control">
                </div>
            </div>

            <button class="btn btn-success btn-lg">Efetuar pagamento</button>
        </form>
    </div>
</div>
@endsection
