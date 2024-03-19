<?php


namespace App\Providers;


trait ProviderLoaderUtil
{
    /**
     * @var array
     */
    protected $loadServiceContracts;
    /**
     * @var array
     */
    protected $loadServices;
    /**
     * @var array
     */
    protected $loadPatterns;

    protected $loadContracts = [];

    protected $loadRepositories = [];

    protected function loadServices()
    {
        $_root_directory = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Services' . DIRECTORY_SEPARATOR;
        $dir = new \DirectoryIterator($_root_directory);
        $folders = [];

        foreach ($dir as $file_info) {
            if ($file_info->isDir() && !$file_info->isDot()) {
                $folders[] = $file_info->getFilename();
            }
        }

        $namespace = 'App\Services';

        foreach ($folders as $folder) {
            $contract = count(scandir($_root_directory . $folder)) >= 6 ? 4 : 3;
            $service = count(scandir($_root_directory . $folder)) >= 6 ? 3 : 2;
            $pattern = count(scandir($_root_directory . $folder)) >= 6 ? 2 : null;

            $contract_file = str_replace('.php', '', scandir($_root_directory . $folder)[$contract]);
            $service_file = str_replace('.php', '', scandir($_root_directory . $folder)[$service]);

            $this->loadServiceContracts[] = "$namespace\\$folder\\$contract_file";
            $this->loadServices[] = "$namespace\\$folder\\$service_file";
            $this->app->bindIf("$namespace\\$folder\\$contract_file", "$namespace\\$folder\\$service_file");

            if ($pattern) {
                $pattern_file = str_replace('.php', '', scandir($_root_directory . $folder)[$pattern]);
                $patterns = "$namespace\\$folder\\$pattern_file";
                $this->app->singleton(strtolower($folder) . 'Pattern', fn() => app()->make($patterns));
                $this->loadPatterns[] = $patterns;
            }
        }
    }

    protected function contractRepo()
    {
        $_root_directory = base_path() . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'Repositories' . DIRECTORY_SEPARATOR;
        $dir = new \DirectoryIterator($_root_directory);

        $folders = [];

        foreach ($dir as $file_info) {
            if ($file_info->isDir() && !$file_info->isDot()) {
                $folders[] = $file_info->getFilename();
            }
        }

        $namespace = 'App\Repositories';

        foreach ($folders as $folder) {
            $contract_file = str_replace('.php', '', scandir($_root_directory . $folder)[3]);
            $repo_file = str_replace('.php', '', scandir($_root_directory . $folder)[2]);

            $this->loadContracts[] = $contract_file;
            $this->loadRepositories[] = $repo_file;

            $this->app->bindIf("$namespace\\$folder\\$contract_file", "$namespace\\$folder\\$repo_file");
        }
    }
}
