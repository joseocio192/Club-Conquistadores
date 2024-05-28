<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait UnidadMutator
{
    use Translations;

    public function getNombreAttribute($value)
    {
        return $this->Translation('nombre', $value);
    }

    public function getLemaAttribute($value)
    {
        return $this->Translation('lema', $value);
    }

    public function getSexoAttribute($value)
    {
        return $this->Translations('sexo', $value);
    }

    public function setSexoAttribute($value)
    {
        $locale = $this->locale ?? app()->getLocale();

        $allowedSexos = $this->getAllowedSexoByLocale($locale);
        $value = strtolower($value);

        if (in_array($value, $allowedSexos)) {
            $this->attributes['sexo'] = $value;
        } else {
            throw new \InvalidArgumentException("El sexo '{$value}' no es válido para el idioma '{$locale}'.");
        }
    }

    public function getAllowedSexoByLocale($locale): array
    {
        $sexos = [
            'es' => ['hombre', 'mujer'],
            'en' => ['man', 'women'],
            'ko' => ['남자', '여자'],
            'zh-Hans' => ['男人', '女人'],
            'ja' => ['男性', '女性'],
            'fr' => ['homme', 'femme']
        ];

        return $sexos[$locale] ?? $sexos['en'];
    }
}
