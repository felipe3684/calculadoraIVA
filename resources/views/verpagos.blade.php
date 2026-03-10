<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ver pagos</title>
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
    @if (session('message'))
        <div style="color:green">{{ session('message') }}</div>
    @endif
    <div class="card-container">
        <table class="tabla-pagos">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td ><a href="{{ route('form.iva') }}"id="crearPago">Crear pago</a></td>
            </tr>
            <tr>
                <td>Concepto</td>
                <td>Cantidad</td>
                <td>Iva%</td>
                <td>IVA€</td>
                <td>Total
                <td>Acciones</td>
            </tr>
            @foreach ($pagos as $pago)
                <tr>
                    <td>{{ $pago->concepto }}</td>
                    <td>{{ number_format($pago->cantidad, 2, ',', '.') }} €</td>
                    <td>{{ $pago->iva }} %</td>
                    <td>{{ number_format($pago->tIva, 2, ',', '.') }} €</td>
                    <td>{{ number_format($pago->total, 2, ',', '.') }} €</td>
                    <td>
                        <form action="{{ route('borrarPago', $pago->id) }}" method="POST">
                            @csrf
                            <input type="number" hidden name="id" value="{{ $pago->id }}">
                            <button class="btn-danger" onclick="return confirm('estas seguro de eliminar este pago?')">Eliminar</button>
                        </form>
                    </td>
            @endforeach
            </tr>
            <tr>
                <td>Totales:</td>
                <td>{{ number_format($cantidadT, 2, ',', '.') }} €</td>
                <td></td>
                <td>{{ number_format($ivaTotal, 2, ',', '.') }} €</td>
                <td>{{ number_format($pagoTotal, 2, ',', '.') }} €</td>
                <td></td>
            </tr>
        </table>
    </div>
</body>

</html>
