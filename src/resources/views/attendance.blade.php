@extends('layouts/app')


@section('css')
<link rel="stylesheet" href="{{ asset('css/attendance.css')}}">
@endsection

@section('link')
<form action="/logout" method="post">
  @csrf
  <input class="header__link" type="submit" value="logout">
</form>
@endsection

@section('content')
<div class="timestamp">
  <div class="timestamp__inner">
    <table class="admin__table">
      <tr class="admin__row">
        <th class="admin__label">名前</th>
        <th class="admin__label">勤務開始</th>
        <th class="admin__label">勤務終了</th>
        <th class="admin__label">休憩時間</th>
        <th class="admin__label">勤務時間</th>
      </tr>
      @foreach($timeStamps as $timeStamp)
      <tr>
        <td> {{ $timeStamp->user->name}}</td>
        <td> {{ $timeStamp->punch_in }}</td>
        <td>{{ $timeStamp->punch_out }}</td>
        <td>{{ $timeStamp->total_work }}</td>
        <td>{{ $timeStamp->total_break }}</td>
      </tr>
@endforeach
    </table>
  </div>
  {{ $timeStamps->links('vendor.pagination.default') }}
</div>

</div>
@endsection