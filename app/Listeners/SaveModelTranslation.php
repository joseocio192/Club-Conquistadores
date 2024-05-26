<?php
// app/Listeners/SaveModelTranslation.php
namespace App\Listeners;

use App\Events\ClaseSaved;
use App\Events\ClubSaved;
use App\Events\ConquistadorSaved;
use App\Events\DirectivoSaved;
use App\Models\Translation;
use App\Services\TranslationService;

use App\Events\EspecialidadSaved;
use App\Events\RequisitosSaved;
use App\Events\TareaSaved;
use App\Events\UnidadSaved;
use App\Events\UserSaved;
use App\Models\Clase;

class SaveModelTranslation
{
    protected $translator;

    public function __construct(TranslationService $translator)
    {
        $this->translator = $translator;
    }

    public function handle($event)
    {
        $model = null;
        $table = '';
        $columns = [];

        if ($event instanceof ClaseSaved) {
            $model = $event->clase;
            $table = 'Clase';
            $columns = ['nombre', 'color'];
        } elseif ($event instanceof ClubSaved) {
            $model = $event->club;
            $table = 'Clubs';
            $columns = ['nombre', 'lema'];
        } elseif ($event instanceof ConquistadorSaved) {
            $model = $event->conquistador;
            $table = 'Conquistador';
            $columns = ['rol'];
        } elseif ($event instanceof DirectivoSaved) {
            $model = $event->directivo;
            $table = 'Directivo';
            $columns = ['rol'];
        } elseif ($event instanceof EspecialidadSaved) {
            $model = $event->especialidad;
            $table = 'Especialidad';
            $columns = ['nombre'];
        } elseif ($event instanceof RequisitosSaved) {
            $model = $event->requisitos;
            $table = 'Requisitos';
            $columns = ['nombre', 'descripcion'];
        } elseif ($event instanceof TareaSaved) {
            $model = $event->tarea;
            $table = 'Tarea';
            $columns = ['nombre', 'descripcion'];
        } elseif ($event instanceof UnidadSaved) {
            $model = $event->unidad;
            $table = 'Unidad';
            $columns = ['nombre', 'lema', 'sexo'];
        } elseif ($event instanceof UserSaved) {
            $model = $event->user;
            $table = 'User';
            $columns = ['name', 'apellido', 'sexo', 'rol'];
        }

        if ($model && $table && $columns) {
            $this->translateAndSave($model, $table, $columns);
        }
    }

    protected function translateAndSave($model, $table, $columns)
    {
        $idiomas_objetivo = ['es', 'en', 'ko', 'zh-Hans', 'ja', 'fr'];
        $idioma_origen = $model->locale;
        if (($key = array_search($idioma_origen, $idiomas_objetivo)) !== false) {
            unset($idiomas_objetivo[$key]);
        }

        foreach ($columns as $column) {
            $text = $model->$column;

            $translations = $this->translator->translate($text, $model->locale, $idiomas_objetivo);

            foreach ($translations[0]['translations'] as $translation) {
                $locale = $translation['to'];
                $translatedText = $translation['text'];

                Translation::create([
                    'table' => $table,
                    'column' => $column,
                    'row_id' => $model->id,
                    'locale' => $locale,
                    'content' => $translatedText,
                ]);
            }
        }
    }
}
