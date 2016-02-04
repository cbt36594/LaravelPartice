<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameDataNameInTestrename extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('testRename',function (Blueprint $table){

//            $table->renameColumn('data','dataRename');

//            $table->dropColumn('data');
            $table->string('dataRename')->after('id');

            $table->boolean('YesNo');
            $table->integer('數字');
            $table->text('內容');
            $table->date('日期');
            $table->dateTime('日期時間');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('testRename',function (Blueprint $table){

        $table->dropColumn('dataRename');
            $table->string('data');

            $table->dropColumn('YesNo');
            $table->dropColumn('數字');
            $table->dropColumn('內容');
            $table->dropColumn('日期');
            $table->dropColumn('日期時間');


        });
    }
}
