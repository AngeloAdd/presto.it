<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class MakeUserRevisor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'presto:makeUserRevisor';
    protected $description = 'Rendi un utente revisore';

    /**
     * The console command description.
     *
     * @var string
     */

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $email = $this->ask("Inserisci l'email dell'utente che vuoi rendere revisore");
        $user = User::where('email',$email);
        if (!$user) {
            $this->error('Utente non trovato'); 
            return;
        } 
        $user->update(['is_revisor'=>true]);
        // dd($user->name->get());
        $this->info("L'utente è diventato revisore");
    }

}
