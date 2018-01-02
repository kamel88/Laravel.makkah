@extends('admin.master')

@section('content')

    {{Auth::user()->name}}

@endsection