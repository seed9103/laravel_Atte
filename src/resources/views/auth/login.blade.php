@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/login.css')}}">
@endsection

@section('link')
<a class="header__link" href="/register">会員登録</a>
@endsection

@section('content')
<div class="login-form">
  <h2 class="login-form__heading content__heading">ログイン</h2>
  <div class="login-form__inner">
    <form class="login-form__form" action="/login" method="post">
      @csrf
      <div class="login-form__group">
        <input class="login-form__input" type="mail" name="email" id="email"placeholder="メールアドレス">
        <p class="register-form__error-message">
          @error('email')
          {{ $message }}
          @enderror
        </p>
      </div>
      <div class="login-form__group">
        <input class="login-form__input" type="password" name="password" id="password"placeholder="パスワード">
        <p>
          @error('password')
          {{ $message }}
          @enderror
        </p>
      </div>
      <input class="login-form__btn btn" type="submit" value="ログイン">
    </form>
  </div>
</div>
@endsection('content')
