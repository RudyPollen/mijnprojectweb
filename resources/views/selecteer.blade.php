<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Temperatuurtjes</title>
</head>
<body>
    <form action="overzicht" method="get"> <!--selecteer.blade.php -->
        <select name="maand" onchange="submit()"> <!-- VIEW -->
            @for ($i = 0; $i <= 12; $i++)
            <option value="{{$i}}" >{{$maandnamen[$i]}}</option>
            @endfor
        </select>
    </form>
    <form action="nieuwsbrief" method="post" novalidate> <!-- novalidate later uitzetten-->
        @csrf <!-- bescherming tegen CSRF -->
        <label>E-mailadres:</label>
        <input type="email" required name="emailadres"/>
        <button type="submit">Vraag nieuwsbrief aan</button>
    </form>
</body>
</html>
