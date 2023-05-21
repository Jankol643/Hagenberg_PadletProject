<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
            @foreach($padlets as $padlet)
                <div class="padlet">
                    Titel: <b>{{$padlet->title}}</b><br>
                    Benutzer: <b>{{$padlet->user_id}}</b>
                    <p>Erstellt am: {{$padlet->created_at}}, Letzte Aktualisierung: {{$padlet->updated_at}}</p>
                    <hr>
                </div>
            @endforeach
    </body>
</html>
