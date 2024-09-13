<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ExportBladesToText extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'export:blades';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exports the content of all Blade files to a text file for review.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Define the directory where Blade files are stored
        $bladeDirectory = resource_path('views');

        // Define the output file
        $outputFile = storage_path('exports/blades_export.txt');

        // Ensure the export directory exists
        if (!is_dir(dirname($outputFile))) {
            mkdir(dirname($outputFile), 0755, true);
        }

        // Open the output file for writing
        $fileHandle = fopen($outputFile, 'w');

        if (!$fileHandle) {
            $this->error('Unable to open the output file for writing.');
            return 1;
        }

        // Recursively fetch all Blade files
        $bladeFiles = File::allFiles($bladeDirectory);

        // Loop through each Blade file and write its contents to the text file
        foreach ($bladeFiles as $bladeFile) {
            // Write the file path as a header
            fwrite($fileHandle, "File: " . $bladeFile->getRelativePathname() . "\n");
            fwrite($fileHandle, str_repeat('=', 50) . "\n");

            // Write the contents of the Blade file
            $content = File::get($bladeFile->getRealPath());
            fwrite($fileHandle, $content . "\n");

            // Separator between files
            fwrite($fileHandle, str_repeat('-', 50) . "\n\n");
        }

        // Close the file handle
        fclose($fileHandle);

        $this->info('Blade files exported successfully to ' . $outputFile);

        return 0;
    }
}
