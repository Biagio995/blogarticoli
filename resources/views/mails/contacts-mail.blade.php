<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <style>
        body {
            background-color: lightgrey;
            margin: 0 2%;
            padding: 2%;
        }

        .container {
            border: 1px solid black;
            width: 100vw;
            display: flex;
            flex-direction: column;
            align-items: start;
            padding: 2%;
            border-radius: 15px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <h1>Hai una nuova proposta</h1>
        <p>ti sta scrivendo
            <h3>{{$user_name}}</h3>
        </p>

        <p><strong>Dall'indirizzo email:</strong> {{$user_email}}</p>
        <p><strong>Con numero di telefono:</strong> {{$user_phone}} </p>

        <div>
            <h5>Messaggio:
                <p>{{$user_message}}</p>
            </h5>
        </div>
    </div>
</body>
</html>