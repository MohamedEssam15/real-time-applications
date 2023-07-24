<?php

namespace App\Console\Commands;

use App\Events\TimeChange;
use App\Events\WinnerNumGene;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class GameExecuter extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:execute';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'start the Game';

    /**
     * Execute the console command.
     */
    private $time=15;
    public function handle()
    {

        while (true){

            broadcast(new TimeChange("{$this->time}s"));
            $this->time--;
            sleep(1);
            if($this->time==0){
                $this->time ="waiting to start";
                broadcast(new TimeChange($this->time));
                broadcast(new WinnerNumGene(mt_rand(1,12)));
                sleep(5);
                $this->time = 15;
            }
        }
    }
}
