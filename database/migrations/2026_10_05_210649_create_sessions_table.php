<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->id();

            $table->string('name_en');

            $table->string('name_ar');
            
            $table->decimal('price', 10, 2)->default(0);

            $table->date('date');

            $table->time('time');

            $table->integer('max_attendees')->default(1);

            $table->foreignId('coach_id')
                ->constrained('coaches')
                ->onDelete('cascade');

            $table->foreignId('category_id')
                ->constrained('categories')
                ->onDelete('cascade');

            $table->foreignId('sub_category_id')
                ->constrained('sub_categories')
                ->onDelete('cascade');

            $table->foreignId('type_id')
                ->constrained('types')
                ->onDelete('cascade');

            $table->foreignId('branch_id')
                ->constrained('branches')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}
