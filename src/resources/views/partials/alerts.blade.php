@if(Session::has('error'))
    <x-adminlte-callout theme="danger" title="Erro" dismissable>
        {{ Session::get('error') }}
    </x-adminlte-callout>
@endif

@if(Session::has('success'))
    <x-adminlte-callout theme="success" title="Sucesso" dismissable>
        {{ Session::get('success') }}
    </x-adminlte-callout>
@endif