<body>

    <form action="" method="get">
        <select name="maand" onchange="submit()">
            @for ($i = 0; $i <= 12; $i++)
            <option value="{{$i}}" >{{$maandnamen[$i]}}</option>
            @endfor
        </select>
    </form>

    <h1>{{ $maandnamen[$maand] }}</h1>
    <table>
        <tr><th>Dag</th><th>Minimum</th><th>Maximum</th></tr>
            @foreach ($metingen as $m)
                <tr>
                    <td> {{ $m->dagnr }} </td>
                    <td> {{ Number_format($m->minimum,1) }} &deg;C </td>
                    <td> {{ Number_format($m->maximum,1) }} &deg;C </td>
                </tr>
            @endforeach
    </table>
</body>
