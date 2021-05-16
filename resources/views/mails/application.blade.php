<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Buongiorno sig. admin</h1>
    <p>C'è una nuova candidatura da parte di {{$request['name']}}:</p>
    <ul>
        <li>Email: {{$request['email']}}</li>
        <li>Messaggio: {{$request['message']}}</li>
    </ul>
</body>
</html>
