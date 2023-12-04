<?php

namespace ExtraToolkits\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class BaseRepositoryCommand extends GeneratorCommand
{
    use ResolvesStubPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:base-repository';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new base repository class';

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
    protected $type = 'Repository';

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
        return $this->resolveStubPath('/stubs/base-repository.stub');
    }

    /**
     * Get the default namespace for the class.
     *
     * @param  string  $rootNamespace
     * @return string
     */
    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace.'\Repositories';
    }
}
