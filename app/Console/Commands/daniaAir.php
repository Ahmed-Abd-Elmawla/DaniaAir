<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class daniaAir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'dania-air:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'install dania-air';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Run npm install
        $this->info("Running npm install...");
        shell_exec('npm install');
        $this->info("npm install completed.");

        // Run php artisan migrate --seed
        $this->info("Running migrations with seeding...");
        $this->call('migrate', ['--seed' => true]);
        $this->info("Migrations and seeding completed.");

        // Run php artisan storage:link
        $this->info("Creating storage symlink...");
        $this->call( 'storage:link');
        $this->info("Storage symlink created.");

        // Start the server in a background process
        $this->info("Starting the Laravel development server...");
        $this->call('serve');
        $this->info("Laravel development server started.");

        $this->info('All dependencies installed, migrations seeded, and server started successfully!');
    }
}
