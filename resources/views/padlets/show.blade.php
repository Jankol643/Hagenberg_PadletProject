<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
</head>
<body>
        <h1>{{$padlet->title}}</h1><br>
        <p>Benutzer: <b>{{$padlet->user_id}}</b></p>
        <p>Erstellt am: {{$padlet->created_at}}, Letzte Aktualisierung: {{$padlet->updated_at}}</p>
        <!-- Einträge -->
        <a href="../padlets/">Zurück zur Padletliste</a>
        <hr>
</body>
</html>
