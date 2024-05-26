<?php

namespace App\Models\Traits\Mutators;

use App\Traits\Translations;

trait ConquistadorMutator
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
            'es' => ['amigo', 'compañero', 'explorador', 'orientador', 'viajero', 'guia', 'guia mayor aspirante', 'guia mayor investido'],
            'en' => ['friend', 'companion', 'explorer', 'counselor', 'traveler', 'guide', 'guide major aspirant', 'guide major invested'],
            'ko' => ['친구', '동료', '탐험가', '상담자', '여행자', '가이드', '주요 가이드 지망생', '주요 가이드 투자'],
            'zh-Hans' => ['朋友', '同伴', '探险家', '辅导员', '旅行者', '指南', '主要指南渴望者', '主要指南已投资'],
            'ja' => ['友人', '同僚', '探検家', 'カウンセラー', '旅行者', 'ガイド', '主要ガイド志願者', '主要ガイド投資済み'],
            'fr' => ['ami', 'compagnon', 'explorateur', 'conseiller', 'Voyageur', 'guide', 'aspirant guide principal', 'guide principal investi'],
        ];

        return $roles[$locale] ?? $roles['en'];
    }
}
