
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Calcular IVA</title>
<style>
    .negrita{
        font-weight: bold;
    }
</style>
</head>
<body>

    <form action="{{ route('calcularconiva') }}" method="post">
        @csrf
    <label for="concepto_id">Concepto</label>
    <input type="text" id="concepto_id" name="concepto" placeholder="pago a ..">
    <label for="cantidad_id">Cantidad:</label>
    <input id="cantidad_id" name="cantidad" type="number" step="0.01" min="0" placeholder="25" value="{{ old('cantidad') }}"><span>€</span>
    <select name="iva" id="iva">
        <option value="21" @selected(old('iva')==21)>21%</option>
        <option value="10" @selected(old('iva')==10)>10%</option>
        <option value="4" @selected(old('iva')==4)>4%</option>
        <option value="0" @selected(old('iva')==0)>0%</option>

    </select>
    <button>Enviar</button>
    </form>
    @isset($concepto,$res,$cantidad,$iva)
        <div class="resultado">
            <p>Se ha pagado con concepto de:<span class="negrita"> {{ $concepto }}</span> una cantidad de: <span class="negrita">{{ $cantidad }}</span>€,
                 tiene un iva de <span class="negrita">{{ $iva }}</span>€ ,el total es de : <span class="negrita">{{ $res }}</span>€</p>
        </div>
    @endisset

    <p>Ver los pagos actuales <a href="{{route('pagos') }}">Pagos</a></p>
</body>
</html>
