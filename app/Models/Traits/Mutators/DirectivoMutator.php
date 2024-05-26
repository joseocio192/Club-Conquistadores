<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait DirectivoMutator
{
    use Translations;

    public function getRolAttribute($value)
    {
        return $this->Translation('rol', $value);
    }

    public function setRolAttribute($value)
    {
        $locale = $this->locale ?? app()->getLocale();

        $allowedRoles = $this->getAllowedRolesByLocale($locale);
        $value = strtolower($value);

        if (in_array($value, $allowedRoles)) {
            $this->attributes['rol'] = $value;
        } else {
            throw new \InvalidArgumentException("El rol '{$value}' no es válido para el idioma '{$locale}'.");
        }
    }

    protected function getAllowedRolesByLocale($locale): array
    {
        $roles = [
            'es' => ['director', 'subdirector', 'tesorero', 'secretario', 'asesor', 'administrador', 'master'],
            'en' => ['director', 'subdirector', 'treasurer', 'secretary', 'advisor', 'administrator', 'master'],
            'ko' => ['이사', '부이사', '회계사', '비서', '고문', '관리자', '마스터'],
            'zh-Hans' => ['主任', '副主任', '财务主管', '秘书', '顾问', '管理员', '大师'],
            'ja' => ['ディレクター', 'サブディレクター', '会計係', '秘書', 'アドバイザー', '管理者', 'マスター'],
            'fr' => ['directeur', 'sous-directeur', 'trésorier', 'secrétaire', 'conseiller', 'administrateur', 'maître'],
        ];

        return $roles[$locale] ?? $roles['en'];
    }
}
