<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeRepository extends Command
{
    protected $signature = 'make:repository {name : The name of the repository}';
    protected $description = 'Create a new repository and its interface';

    public function handle()
    {
        $repositoryName = $this->argument('name');
        $repositoryInterfaceName = $repositoryName . 'Interface';

        // Create repository interface
        $this->generateRepositoryInterface($repositoryInterfaceName);

        // Create repository
        $this->generateRepository($repositoryName);

        $this->info("Repository [app/Repositories/$repositoryName] generated successfully!");
        $this->info("Repository Interface [app/Repositories/$repositoryInterfaceName] generated successfully!");
    }

    private function generateRepositoryInterface($repositoryInterfaceName)
    {
        $interfaceStub = File::get(base_path('stubs/repository_interface.stub'));
        $interfaceContent = str_replace('DummyInterface', $repositoryInterfaceName, $interfaceStub);
        File::put(app_path('Repositories/' . $repositoryInterfaceName . '.php'), $interfaceContent);
    }

    private function generateRepository($repositoryName)
    {
        $repositoryStub = File::get(base_path('stubs/repository.stub'));
        $repositoryContent = str_replace('DummyRepository', $repositoryName, $repositoryStub);
        File::put(app_path('Repositories/' . $repositoryName . '.php'), $repositoryContent);
    }
}
