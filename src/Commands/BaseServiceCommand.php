<?php

namespace ExtraToolkits\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class BaseServiceCommand extends GeneratorCommand
{
    use ResolvesStubPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:base-service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new base service class';

    /**
     * Indicates whether the command should be shown in the Artisan command list.
     *
     * @var bool
     */
    protected $hidden = true;

    /**
     * The type of class being generated.
     *
     * @var string
     */
    protected $type = 'Service';

    /**
     * Execute the console command.
     *
     * @return bool|null
     */
    public function handle()
    {
        parent::handle();
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/base-service.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Services';
    }
}
