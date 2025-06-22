<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTimestampsToUsersTable extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->timestamps(); // ← これが created_at / updated_at を追加します
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropTimestamps(); // ← 戻すときに削除
        });
    }
}