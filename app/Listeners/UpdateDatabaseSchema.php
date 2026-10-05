<?php
namespace App\Listeners;

use App\Events\DatabaseUpdated;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\File;

class UpdateDatabaseSchema
{
    public function __construct()
    {
        // لا حاجة لتهيئة أي خصائص هنا
    }

    public function handle(DatabaseUpdated $event)
    {
        // استخرج الـ schema
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

        // حفظ الـ schema في JSON
        File::put(storage_path('app/db_schema.json'), json_encode($schema, JSON_PRETTY_PRINT));
    }
}

