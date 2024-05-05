<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')->references('id')->on('members')->onDelete('cascade');
            $table->unsignedBigInteger('major_id')->nullable();
            $table->foreign('major_id')->references('id')->on('majors')->onDelete('cascade');
            $table->tinyInteger('apply_order')->default(0);
            $table->tinyInteger('receiving_all_papers')->default(0);
            $table->tinyInteger('paid_link')->default(0);
            $table->tinyInteger('apply_at_university')->default(0);
            $table->tinyInteger('order_accepted')->default(0);
            $table->enum('package', ['silver', 'premium', 'gold'])->nullable();
            $table->boolean('attached_card')->default(false);
            $table->enum('order_type',['تعليم جامعي' , 'تعليم الثانوي' , 'تعليم بعد الجامعي'])->default('تعليم جامعي');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
