<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<body>
    <h2>Solicitud de cotización desde el sitio web</h2>
    <div>
        <p><strong>Nombre y apellido:</strong> {{ $data['name'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>
        @isset($data['phone'])
            <p><strong>Teléfono:</strong> {{ $data['phone'] }}</p>
        @endisset
        @isset($data['company'])
            <p><strong>Empresa:</strong> {{ $data['company'] }}</p>
        @endisset
        <p><strong>Asunto:</strong> {{ $data['case'] }}</p>
        <p><strong>Mensaje:</strong> {{ $data['message'] }}</p>
    </div>
</body>
</html>