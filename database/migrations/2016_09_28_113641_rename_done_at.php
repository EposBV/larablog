<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDoneAt  extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('items', function (Blueprint $table) {
            $table->renameColumn('done_add', 'done_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('items', function (Blueprint $table) {
            $table->renameColumn('done_at', 'done_add');
        });
    }


}
