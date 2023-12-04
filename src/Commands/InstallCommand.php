<?php

namespace ExtraToolkits\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    use ResolvesStubPath;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'starter-pack:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install all additional resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Generating User Resource...');
        $this->call('make:repository', ['name' => 'UserRepository']);

        $this->comment('Generating User Service...');
        $this->call('make:service', ['name' => 'UserService']);

        $this->comment('Creating Response class...');

        if (! file_exists(app_path('Http/Response.php'))) {
            copy($this->resolveStubPath('/stubs/response.stub'), app_path('Http/Response.php'));
            $this->newLine();
            $this->line("  <fg=white;bg=blue> INFO </> Response [app/Http/Response.php] created successfully.");
            $this->newLine();
        } else {
            $this->newLine();
            $this->line("  <fg=white;bg=red> ERROR </> Response already exists.");
            $this->newLine();
        }

        $this->comment('Creating Makeable trait...');

        if (! file_exists(app_path('Traits/Makeable.php'))) {
            if (! file_exists(app_path('Traits'))) {
                mkdir(app_path('Traits'));
            }

            copy($this->resolveStubPath('/stubs/makeable.stub'), app_path('Traits/Makeable.php'));
            $this->newLine();
            $this->line("  <fg=white;bg=blue> INFO </> Makeable [app/Http/Makeable.php] created successfully.");
            $this->newLine();
        } else {
            $this->newLine();
            $this->line("  <fg=white;bg=red> ERROR </> Makeable already exists.");
            $this->newLine();
        }

        $this->info('Additional scaffolding installed successfully.');
    }
}
