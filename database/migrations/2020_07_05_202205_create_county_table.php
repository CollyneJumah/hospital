<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateCountyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('county', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->integer('code')->nullable();
            $table->timestamps();
        });

        DB::table('county')->insert(
            array(
                ['name' => 'Mombasa','code' => 1,],
                ['name' => 'Kwale','code' => 2,],
                ['name' => 'Kilifi','code' => 3,],
                ['name' => 'Tana River','code' => 4,],
                ['name' => 'Lamu','code' => 5,],
                ['name' => 'Taita-Taveta','code' => 6,],
                ['name' => 'Grarissa','code' => 7,],
                ['name' => 'Wajir','code' => 8,],
                ['name' => 'Mandera','code' => 9,],
                ['name' => 'Marsabit','code' => 10,],
                ['name' => 'Isiolo','code' => 11,],
                ['name' => 'Meru','code' => 12,],
                ['name' => 'Tharaka-Nithi','code' => 13,],
                ['name' => 'Embu','code' => 14,],
                ['name' => 'Kitui','code' => 15,],
                ['name' => 'Machakos','code' => 16,],
                ['name' => 'Makueni','code' => 17,],
                ['name' => 'Nyandarua','code' => 18,],
                ['name' => 'Nyeri','code' => 19,],
                ['name' => 'Kirinyaga','code' => 20,],
                ['name' => 'Muranga','code' => 21,],
                ['name' => 'Kiambu','code' => 22,],
                ['name' => 'Turkana','code' => 23,],
                ['name' => 'West Pokot','code' => 24,],
                ['name' => 'Samburu','code' => 25,],
                ['name' => 'Trans-Nzoia','code' => 26,],
                ['name' => 'Uasin Gishu','code' => 27,],
                ['name' => 'Elgeyo-Marakwet','code' => 28,],
                ['name' => 'Nandi','code' => 29,],
                ['name' => 'Baringo','code' => 30,],
                ['name' => 'Laikipia','code' => 31,],
                ['name' => 'Nakuru','code' => 32,],
                ['name' => 'Narok','code' => 33,],
                ['name' => 'Kajiado','code' => 34,],
                ['name' => 'Kericho','code' => 35,],
                ['name' => 'Bomet','code' => 36,],
                ['name' => 'Kakamega','code' => 37,],
                ['name' => 'Vihiga','code' => 38,],
                ['name' => 'Bungoma','code' => 39,],
                ['name' => 'Busia','code' => 40,],
                ['name' => 'Siaya','code' => 41,],
                ['name' => 'Kisumu','code' => 42,],
                ['name' => 'Homabay','code' => 43,],
                ['name' => 'Migori','code' => 44,],
                ['name' => 'Kisii','code' => 45,],
                ['name' => 'Nyamira','code' => 46,],
                ['name' => 'Nairobi','code' => 47,],
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('county');
    }
}
