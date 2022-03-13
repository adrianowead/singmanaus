@extends('adminlte::page')

@section('title', 'Perfil')

@section('content_header')
    <h1>Perfil</h1>
@stop

@section('content')
    @include('partials.alerts')

    <x-adminlte-card title="Perfil" theme="info" icon="fas fa-fw fa-user"
    theme-mode="outline"
    class="elevation-3" header-class="bg-light"
    footer-class="border-top rounded border-light">

    <form action="{{ route('profileUpdate') }}" method="post">
        @csrf

        <x-adminlte-input value="{{ $userId }}" name="id" type="hidden"/>

        <x-adminlte-input value="{{ old('nome') ? old('nome') : $profile->name }}" name="nome" placeholder="Nome" required/>
        <x-adminlte-input value="{{ old('email') ? old('email') : $profile->email }}" name="email" placeholder="E-mail" type="email" required/>

        <x-adminlte-input name="senha" type="password" placeholder="Senha" minlength="5" required/>

        @php
        $config = [
            'onColor' => 'success',
            'offColor' => 'danger',
            'onText' => 'Sim',
            'offText' => 'Não',
            'indeterminate' => false,
            'labelText' => '<i class="fas fa-power-off text-muted"></i>',
        ];
        @endphp
        <x-adminlte-input-switch name="isAdmin" label="Administrador"
            igroup-size="sm" :config="$config" enable-old-support="true"/>

        <x-adminlte-button class="d-flex ml-auto" theme="light" type="submit" label="Salvar"/>
    </form>

    </x-adminlte-card>
@stop