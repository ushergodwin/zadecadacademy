<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;

class SystemController extends Controller
{
    // Handle system task based on the passed task parameter
    public function handleSystemTask($task)
    {
        $message = '';
        $status = 'success';

        // Log the task received
        Log::info('Received task to execute', ['task' => $task]);

        try {
            switch ($task) {
                case 1: // Run Migrations
                    Artisan::call('migrate');
                    $message = 'Migrations ran successfully!';
                    break;

                case 2: // Seed the Database
                    Artisan::call('db:seed');
                    $message = 'Database seeded successfully!';
                    break;

                case 3: // Clear Cache
                    Artisan::call('cache:clear');
                    Artisan::call('config:clear');
                    Artisan::call('route:clear');
                    Artisan::call('view:clear');
                    $message = 'Cache cleared successfully!';
                    break;

                default:
                    $message = 'Unknown task selected!';
                    $status = 'error';
                    break;
            }
        } catch (\Exception $e) {
            // Log the error
            Log::error('Failed to execute task', [
                'task' => $task,
                'error' => $e->getMessage(),
            ]);

            $message = 'An error occurred while executing the task: ' . $e->getMessage();
            $status = 'error';
        }

        // Redirect back with a message
        return redirect()->back()->with($status, $message);
    }
    
}
