<?php

namespace App\Sidecar;

use Hammerstone\Sidecar\LambdaFunction;
use Hammerstone\Sidecar\Package;
use Hammerstone\Sidecar\Runtime;

class Scraper extends LambdaFunction
{
    public function handler()
    {
        return 'index@handler';
    }

    public function package()
    {
        return Package::make()
            ->setBasePath('sidecar/scraper')
            ->include('*');
    }

    public function runtime()
    {
        return Runtime::PYTHON_38;
    }
}
