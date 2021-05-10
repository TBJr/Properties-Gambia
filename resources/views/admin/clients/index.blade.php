@extends('layouts.admin')

@section('pageName')
  Customer List
@endsection

@section('content')

  @role('Developer')
    <user></user>  
  @endrole

  @role('CEO|Admin|Secretary')
    <userinfo></userinfo>
  @endrole

  @role('Admin')
    <client></client>
  @endrole

@endsection
