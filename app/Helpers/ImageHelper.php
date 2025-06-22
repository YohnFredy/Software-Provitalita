<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Http\UploadedFile;

class ImageHelper
{
    /**
     * Optimiza una imagen y la guarda en disco.
     *
     * @param UploadedFile $file El archivo original subido.
     * @param string $folder Carpeta relativa dentro de /storage/app/public donde se guardará.
     * @param int $width Ancho máximo de la imagen.
     * @param int $quality Calidad de la compresión (0-100).
     * @return string Ruta relativa del archivo guardado (para guardar en base de datos).
     */
    public static function optimizeAndStore(UploadedFile $file, string $folder, int $width = 1080, int $quality = 75): string
    {
        $image = Image::make($file->getRealPath());

        $image->resize($width, null, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });

        $filename = uniqid() . '.' . $file->getClientOriginalExtension();
        $path = $folder . '/' . $filename;

        Storage::disk('public')->put($path, (string) $image->encode(null, $quality));

        return $path;
    }
}
