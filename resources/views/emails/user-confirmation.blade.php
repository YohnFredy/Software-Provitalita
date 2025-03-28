<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Confirmación de mensaje recibido</title>
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
            padding: 0;
        }
        .header {
            background-color:  #0D4E8F;
            color: white;
            padding: 20px;
            text-align: center;
        }
        .content {
            padding: 30px;
            background: #ffffff;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 12px;
            color: #666;
            background-color: #f5f5f5;
        }
        .thank-you {
            font-size: 22px;
            font-weight: bold;
            margin-bottom: 20px;
            color:  #0D4E8F;
        }
        .details {
            background-color: #f9f9f9;
            padding: 15px;
            border-radius: 5px;
            margin: 20px 0;
        }
        .social {
            margin-top: 20px;
        }
        .social a {
            display: inline-block;
            margin: 0 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Fornuvi</h1>
        </div>
        <div class="content">
            <p class="thank-you">¡Gracias por contactarnos!</p>
            
            <p>Estimado/a <strong>{{ $data['nombre'] }}</strong>,</p>
            
            <p>Hemos recibido tu mensaje y queremos agradecerte por ponerte en contacto con nosotros. Uno de nuestros representantes revisará tu solicitud y se pondrá en contacto contigo a la brevedad posible.</p>
            
            <div class="details">
                <p><strong>Tu interés:</strong> {{ $data['interes'] }}</p>
                <p><strong>Fecha de recepción:</strong> {{ $data['fecha'] }}</p>
            </div>
            
            <p>Si tienes alguna duda adicional, no dudes en contactarnos. Estamos aquí para ayudarte.</p>
            
            <p>Saludos cordiales,<br><br>
            <strong>Equipo de Fornuvi</strong></p>
            
            <div class="social">
                <p><strong>Síguenos en redes sociales:</strong></p>
                <a href="#">Facebook</a> | <a href="#">Instagram</a> | <a href="#">Twitter</a> | <a href="#">LinkedIn</a>
            </div>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Fornuvi. Todos los derechos reservados.</p>
            {{-- <p>Av. Principal #123, Ciudad Capital</p> --}}
            <p>Este es un correo automático, por favor no responda a este mensaje.</p>
        </div>
    </div>
</body>
</html>