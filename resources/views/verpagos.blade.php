<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <tr>
            <td>Concepto</td>
            <td>Cantidad</td>
            <td>Iva%</td>
            <td>IVA€</td>
            <td>Total<td>
        </tr>
          @foreach ($pagos as $pago)
        <tr>
            <td>{{ $pago->concepto }}</td>
            <td>{{ number_format($pago->cantidad,2,",",".") }} €</td>
            <td>{{ $pago->iva }} %</td>
            <td>{{ number_format($pago->tIva,2,",",".")}} €</td>
            <td>{{ number_format($pago->total,2,",",".") }} €</td>
        </tr>
         @endforeach
    </table>
</body>
</html>
