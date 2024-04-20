@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css')}}">
@endsection

@section('link')
<form action="" method="post">
  @csrf
  <input class="header__link" type="submit" value="ホーム">
</form>
<form action="" method="post">
  @csrf
  <input class="header__link" type="submit" value="日付一覧">
</form>
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="ログアウト">
</form>
@endsection

@section('content')
<div class="content">
<p class="content__titlle">{{Auth::user()->name}}さんお疲れ様です</p>
<div class="button-form">
    <ul>
        <div>
            
            <form action="/punchin" method="post">
                @csrf
                <button type="submit" class="btn btn-success">出勤</button>
            </form>
        </div>
        <div>
            <form action="/punchout" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">退勤</button>
            </form>
        </div>
        <div>
            <form action="/startbreak" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">休憩開始</button>
            </form>
        </div>
        <div>
            <form action="/endbreak" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">休憩終了</button>
            </form>
        </div>
    </ul>
</div> 
</div>
@endsection