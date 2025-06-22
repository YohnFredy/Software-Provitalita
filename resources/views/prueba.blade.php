<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>fornuvi - Oportunidades Financieras en Salud y Bienestar</title>
    @vite('resources/css/app.css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>

<body>

    <form action="{{ route('image.upload.store') }}" method="POST" enctype="multipart/form-data">
            @csrf <!-- Directiva Blade para protección CSRF -->

            <div class="form-group">
                <label for="imagen">Seleccionar Imagen:</label>
                <input type="file" name="imagen" id="imagen" required>
                @error('imagen')
                    <span style="color: red; font-size: 0.9em;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit">Subir Imagen</button>
        </form>
    
</body>
</html>
