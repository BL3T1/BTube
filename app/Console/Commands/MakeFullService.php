<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Symfony\Component\Console\Command\Command as CommandAlias;

class MakeFullService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:full-service
                            {name : The name of the controller}
                            {--methods= : Comma-separated list of methods to create}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate a controller, custom methods, request files, DTOs, a contract, and a service file.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        $controllerName = $this->argument('name');
        $methods = explode(',', $this->option('methods') ?? 'add,update,delete');

        // Total steps to complete the process
        $totalSteps = count($methods) * 4 + 3; // Controller + Contract + Service + Methods for DTO, Request, and Controller
        $this->output->progressStart($totalSteps);

        // 1️⃣ Create the controller
        $this->createController($controllerName, $methods);
        $this->output->progressAdvance();

        // 2️⃣ Create the contract
        $this->createContract($controllerName, $methods);
        $this->output->progressAdvance();

        // 3️⃣ Create the service
        $this->createService($controllerName);
        $this->output->progressAdvance();

        $this->createFacade($controllerName, $methods);
        $this->output->progressAdvance();

        // 4️⃣ Create request and DTO files for each method
        foreach ($methods as $method) {
            $this->createRequest($controllerName, $method);
            $this->output->progressAdvance();

            $this->createDTO($controllerName, $method);
            $this->output->progressAdvance();
        }

        $this->output->progressFinish();
        $this->info('All files have been created successfully!');

        return CommandAlias::SUCCESS;
    }

    /**
     * Create the controller file.
     *
     * @param $name
     * @param $methods
     * @return void
     */
    protected function createController($name, $methods): void
    {
        $path = app_path("Http/Controllers/{$name}Controller.php");
        $request = '$request';
        $methodsCode = '';
        foreach ($methods as $method) {
            $methodName = $method . $name;
            $requestName = Str::studly($methodName) . $name . 'Request';

            $methodsCode .= <<<EOT

                public function {$methodName}({$requestName} {$request}): JsonResponse
                {
                    // TODO: {$method} a {$name} functionality.
                }

            EOT;
        }

        $stub = <<<EOT
        <?php

        namespace App\Http\Controllers;

        use Illuminate\Http\JsonResponse;
        use App\Traits\ApiResponseTrait;

        class {$name}Controller extends Controller
        {
            use ApiResponseTrait;

            {$methodsCode}
        }
        EOT;

        File::put($path, $stub);
    }

    /**
     * Create the service file.
     *
     * @param $name
     * @return void
     */
    protected function createService($name): void
    {
        $path = app_path("Services/Services/{$name}Service.php");

        $stub = <<<EOT
        <?php

        namespace App\Services;

        use App\Services\Contracts\\{$name}Contract;

        class {$name}Service implements {$name}Contract
        {
            //
        }
        EOT;

        File::put($path, $stub);
    }

    /**
     * Create the contract file.
     *
     * @param $name
     * @param $methods
     * @return void
     */
    protected function createContract($name, $methods): void
    {
        $path = app_path("Services/Contracts/{$name}Contract.php");
        $data = '$data';
        $methodCode = '';

        foreach($methods as $method)
        {
            $dtoName = Str::studly($method) . $name . 'Dto';

            $methodCode .= <<<EOT

                public function {$method}({$dtoName} {$data}): string;

            EOT;

        }

        $stub = <<<EOT
        <?php

        namespace App\Services\Contracts;

        interface {$name}Contract
        {
            {$methodCode}
        }
        EOT;

        File::put($path, $stub);
    }

    /**
     * Create the request file.
     *
     * @param $controllerName
     * @param $methodName
     * @return void
     */
    protected function createRequest($controllerName, $methodName): void
    {
        $requestName = Str::studly($methodName) . $controllerName . 'Request';
        $pathh = app_path("Http/Requests/{$controllerName}");

        if (!File::exists($pathh)) {
            File::makeDirectory($pathh, 0755, true);
        }

        $path = app_path("Http/Requests/{$controllerName}/{$requestName}.php");

        $stub = <<<EOT
        <?php

        namespace App\Http\Requests\\{$controllerName};

        use Illuminate\Foundation\Http\FormRequest;

        class {$requestName} extends FormRequest
        {
            public function authorize()
            {
                return true;
            }

            public function rules()
            {
                return [
                    // Define your validation rules
                ];
            }
        }
        EOT;

        File::put($path, $stub);
    }

    /**
     * Create the DTO file.
     *
     * @param $controllerName
     * @param $methodName
     * @return void
     */
    protected function createDTO($controllerName, $methodName): void
    {
        $requestName = Str::studly($methodName) . $controllerName . 'Request';
        $dtoName = Str::studly($methodName) . $controllerName . 'Dto';
        $path = app_path("DTO/{$controllerName}/{$dtoName}.php");
        $request = '$request';
        $pathh = app_path("DTO/{$controllerName}");

        if (!File::exists($pathh)) {
            File::makeDirectory($pathh, 0755, true);
        }

        $stub = <<<EOT
        <?php

        namespace App\DTO\\{$controllerName};

        readonly class {$dtoName}
        {
            public function __construct(

        )
        {
        }
            public static function rate($requestName $request)
            {
                return new self(

            );
            }
        }
        EOT;

        File::put($path, $stub);
    }

    /**
     * Create the Facade file.
     *
     * @param $controllerName
     * @param $methodName
     * @return void
     */
    protected function createFacade($controllerName, $methodName):void
    {
        $path = app_path("Services/Facades/{$controllerName}Facade.php");

        $stub = <<<EOT
        <?php

        namespace App\Services\Facades;

        use Illuminate\Support\Facades\Facade;

        class {$controllerName}Facade extends Facade
        {
            protected static function getFacadeAccessor(): string
            {
                return '{$controllerName}Service';
            }
        }
        EOT;

        File::put($path, $stub);
    }
}
