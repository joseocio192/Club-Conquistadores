<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait UserMutator
{
    use Translations;

    public function getNameAttribute($value)
    {
        return $this->Translation('name', $value);
    }

    public function getApellidoAttribute($value)
    {
        return $this->Translation('apellido', $value);
    }

    public function getNombreCompletoAttribute()
    {
        return $this->Translation('name', $this->name) . ' ' . $this->Translation('apellido', $this->apellido);
    }

    public function getDireccionAttribute()
    {
        return $this->calle . ' ' . $this->numero_exterior . ' ' . $this->numero_interior . ', '
            . $this->colonia . ', ' . $this->ciudad->nombre . ', '
            . $this->ciudad->municipio->nombre . ', ' . $this->ciudad->municipio->estado->nombre;
    }

    public function getSexoAttribute($value)
    {
        return $this->Translation('sexo', $value);
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

    public function getRolAttribute($value)
    {
        return $this->translation('rol', $value);
    }

    public function setRolAttribute($value)
    {
        $locale = $this->locale ?? app()->getLocale();
        $value = strtolower($value);

        $allowedRoles = $this->getAllowedRolesByLocale($locale);

        if (in_array($value, $allowedRoles)) {
            $this->attributes['rol'] = $value;
        } else {
            throw new \InvalidArgumentException("El rol '{$value}' no es válido para el idioma '{$locale}'.");
        }
    }

    protected function getAllowedRolesByLocale($locale): array
    {
        $roles = [
            'es' => ['administrador', 'conquistador', 'tutor', 'directivo', 'instructor'],
            'en' => ['administrator', 'conqueror', 'tutor', 'director', 'instructor'],
            'ko' => ['관리자', '정복자', '교사', '이사', '선생'],
            'zh-Hans' => ['管理员', '征服者', '导师', '董事', '教练'],
            'ja' => ['管理者', '征服者', 'チューター', 'ディレクター', 'インストラクター'],
            'fr' => ['administrateur', 'conquérant', 'tuteur', 'directeur', 'instructeur']
        ];

        return $roles[$locale] ?? $roles['en'];
    }
}
