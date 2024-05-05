<?php

namespace App\Traits;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

trait Translations
{
    public function translation($column, $default = '')
    {
        $locale = App::getLocale();

        if ($this->locale == $locale) {
            return $default;
        }

        $translation = $this->translations()
            ->where('table', $this->table)
            ->where('column', $column)
            ->where('row_id', $this->id)
            ->where('locale', $locale)
            ->first();

        if ($translation) {
            return $translation->value;
        } else {
            return $default;
        }
    }
}
