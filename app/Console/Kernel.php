<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use App\Models\Clubs;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        //obtener la cantidad de conquistadores en cada club cada mes y guardarlas en ClubsNumbers
        $schedule->call(function () {
            $clubs = DB::table('Clubs')->get();
            $date = date('Y-m-d');
            foreach ($clubs as $club) {
                $conquistadores =  Clubs::find($club->id)->conquistadores()->count();
                DB::table('ClubsNumbers')->insert([
                    'id_club' => $club->id,
                    'cantidad' => $conquistadores,
                    'fecha' => $date
                ]);
            }
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
