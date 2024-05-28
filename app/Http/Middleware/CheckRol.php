<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\App;

class CheckRol
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        if ($user && $this->hasAnyRole($user, $roles)) {
            Log::info("Es verdadero");
            return $next($request);
        }
        return redirect('/', 403, ['message' => 'No tienes permisos para acceder a esta página']);
    }

    private function hasAnyRole($user, $roles)
    {
        $roleTranslations = [
            'es' => ['administrador' => 'administrator', 'conquistador' => 'conqueror', 'tutor' => 'tutor', 'directivo' => 'director', 'instructor' => 'instructor'],
            'en' => ['administrator', 'conqueror', 'tutor', 'director', 'instructor'],
            'ko' => ['관리자' => 'administrator', '정복자' => 'conqueror', '교사' => 'tutor', '이사' => 'director', '강사' => 'instructor'],
            'zh-Hans' => ['管理员' => 'administrator', '征服者' => 'conqueror', '导师' => 'tutor', '董事' => 'director', '教练' => 'instructor'],
            'ja' => ['管理者' => 'administrator', '征服者' => 'conqueror', 'チューター' => 'tutor', 'ディレクター' => 'director', 'インストラクター' => 'instructor'],
            'fr' => ['administrateur' => 'administrator', 'conquérant' => 'conqueror', 'tuteur' => 'tutor', 'directeur' => 'director', 'instructeur' => 'instructor']
        ];

        $firstRole = $roles[0];
        Log::info($firstRole);

        foreach ($roleTranslations[$user->locale] as $key => $value) {
            if (in_array($key, $roles) || in_array($value, $roles)) {
                return true;
            }
        }
        return false;
    }
}
