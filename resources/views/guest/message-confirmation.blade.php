@extends('layouts.app')

@section('content')
<div class="container">
    @if(session('message'))
    <h1>{{session('message')}}</h1>
    @endif
</div>
<!-- /.container -->
@endsection