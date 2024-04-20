@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/auth/register.css')}}">
@endsection

@section('link')
<a class="header__link" href="/login">ログイン</a>
@endsection

@section('content')
<div class="register-form">
  <h2 class="register-form__heading content__heading">会員登録</h2>
  <div class="register-form__inner">
    <form class="register-form__form" action="/register" method="post">
      @csrf
      <div class="register-form__group">
        
      <input type="text" name="name" placeholder="名前" value="{{ old('name') }}" /> 
        <p class="register-form__error-message">
          @error('name')
          {{ $message }}
          @enderror
        </p>
      </div>
      <div class="register-form__group">
        
        <input class="register-form__input" type="mail" name="email" placeholder="メールアドレス"  value="{{ old('email') }}" />
        <p class="register-form__error-message">
          @error('email')
          {{ $message }}
          @enderror
        </p>
      </div>
      <div class="register-form__group">
        
        <input class="register-form__input" type="password" name="password"  placeholder="パスワード"/>
        <p class="register-form__error-message">
          @error('password')
          {{ $message }}
          @enderror
        <input type="password" name="password_confirmation" placeholder="確認用パスワード"/>

        </p>
      </div>
      <input class="register-form__btn btn" type="submit" value="登録">
    </form>
  </div>
</div>
@endsection('content')