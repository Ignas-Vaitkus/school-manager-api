<?php

use App\Models\School;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pupils', function (Blueprint $table) {
            $table->unsignedBigInteger('code');
            $table->string('first_name');
            $table->string('last_name');
            $table->tinyInteger('grade');
            $table->foreignIdFor(School::class)->nullable();
            $table->boolean('approved')->default(0);
            $table->timestamps();
            $table->primary('code');
            // $table->foreign('school_code')
            //     ->references('code')->on('schools')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pupils');
    }
};
