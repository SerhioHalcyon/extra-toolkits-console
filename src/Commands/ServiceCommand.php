<?php

namespace ExtraToolkits\Console\Commands;

use Illuminate\Console\GeneratorCommand;

class ServiceCommand extends GeneratorCommand
{
    use ResolvesStubPath;

    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'make:service';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service class';

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

        $this->callSilent('make:base-service', ['name' => 'Service']);
    }

    public function buildClass($name)
    {
        $serviceName = $this->argument('name');
        $trimName = str_replace('Service', '', $serviceName);

        $replace = [
            '{{ repositoryClass }}' => ucfirst($trimName) . 'Repository',
            '{{ repositoryVariable }}' => lcfirst($trimName) . 'Repository',
        ];

        $class = str_replace(
            array_keys($replace), array_values($replace), parent::buildClass($name)
        );

        return $class;
    }

    /**
     * Get the stub file for the generator.
     *
     * @return string
     */
    protected function getStub()
    {
        return $this->resolveStubPath('/stubs/service.stub');
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
