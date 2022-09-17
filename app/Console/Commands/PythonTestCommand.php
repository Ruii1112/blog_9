<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class PythonTestCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'test:python';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Pythonファイルの実行テスト';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $process = new Process(['python', './app/Python/test.py']);
        
        try {
            $process->mustRun();
            // \Log::info();
            $response = $process->getOutput();
            //dd($response);
        } catch (ProcessFailedException $exception) {
            \Log::error($exception->getMessage());
        }
        
        return 0;
    }
}
