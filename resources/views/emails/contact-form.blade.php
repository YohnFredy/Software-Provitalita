<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Nuevo mensaje de contacto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        .header {
            background-color: #0056b3;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            padding: 20px;
            background: #f9f9f9;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #666;
        }

        .detail {
            margin-bottom: 10px;
        }

        .label {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Nuevo mensaje de contacto</h1>
        </div>
        <div class="content">
            <p>Se ha recibido un nuevo mensaje a través del formulario de contacto:</p>

            <div class="detail">
                <span class="label">Nombre:</span> {{ $data['nombre'] }}
            </div>
            <div class="detail">
                <span class="label">Correo electrónico:</span> {{ $data['email'] }}
            </div>
            <div class="detail">
                <span class="label">Teléfono:</span> {{ $data['telefono'] }}
            </div>
            <div class="detail">
                <span class="label">Interés:</span> {{ $data['interes'] }}
            </div>
            <div class="detail">
                <span class="label">Fecha de envío:</span> {{ $data['fecha'] }}
            </div>
            <div class="detail">
                <span class="label">Mensaje:</span>
                <p>{{ $data['mensaje'] }}</p>
            </div>
        </div>
        <div class="footer">
            <p>Este es un correo automático de fornuvi. Por favor no responda a este mensaje.</p>
        </div>
    </div>
</body>

</html>
