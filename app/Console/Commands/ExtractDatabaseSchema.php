<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class ExtractDatabaseSchema extends Command
{
    protected $signature = 'extract:schema';
    protected $description = 'Extract the database schema and save it as JSON';

    public function handle()
    {
        $tables = DB::select('SHOW TABLES');
        $schema = [];

        foreach ($tables as $tableObj) {
            $table = array_values((array)$tableObj)[0];
            $columns = Schema::getColumnListing($table);
            $foreignKeys = DB::select("SELECT COLUMN_NAME, REFERENCED_TABLE_NAME 
                FROM information_schema.KEY_COLUMN_USAGE 
                WHERE TABLE_NAME = ? AND REFERENCED_TABLE_NAME IS NOT NULL", [$table]);

            $schema[$table] = [
                'columns' => $columns,
                'foreign_keys' => collect($foreignKeys)->map(fn($fk) => [
                    'column' => $fk->COLUMN_NAME,
                    'references' => $fk->REFERENCED_TABLE_NAME,
                ])->toArray()
            ];
        }

        file_put_contents(storage_path('app/db_schema.json'), json_encode($schema, JSON_PRETTY_PRINT));
        $this->info('Database schema exported successfully.');
    }
}
