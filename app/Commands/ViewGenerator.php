<?php

namespace App\Commands;

use CodeIgniter\CLI\BaseCommand;
use CodeIgniter\CLI\CLI;
use CodeIgniter\CLI\GeneratorTrait;
use Exception;

class ViewGenerator extends BaseCommand
{
    use GeneratorTrait;

    protected $group       = 'Generators';
    protected $name        = 'make:view';
    protected $description = 'Creates a project specific view';
    protected $usage       = 'make:view <name>';
    protected $arguments   = [
        'name' => 'The view name.',
    ];
    protected $viewPath = APPPATH . 'Views';

    public function run(array $params)
    {
        try {
            if (isset($params[0])) {
                if (! file_exists($this->viewPath . '/' . $params[0] . '.php')) {
                    $myfile   = fopen($this->viewPath . '/' . $params[0] . '.php', 'wb');
                    $contents = file_get_contents(
                        APPPATH . 'Views/templates/site_scaffold.php'
                    );
                    $fileName = substr($params[0], strpos($params[0], '/') + 1);
                    $contents = str_replace('@:@', $fileName, $contents);
                    fwrite($myfile, $contents);
                    fclose($myfile);
                    CLI::write(
                        CLI::color(
                            'File created: APPPATH/Views/' . $params[0] . '.php',
                            'green'
                        )
                    );
                } else {
                    throw new Exception($params[0] . 'view already exists.');
                }
            } else {
                throw new Exception('View name not entered.');
            }
        } catch (Exception $e) {
            CLI::write($e->getMessage());
        }
    }
}
