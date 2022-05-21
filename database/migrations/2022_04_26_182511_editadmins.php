<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Editadmins extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('admins', function (Blueprint $table) {
           //$table->string('username',100)->change();
          // $table->string('Pic',100)->after('password');
            // $table->renamecolumn('Pic','IMG');
             //$table->string('Pic');
            // $table->dropColumn('IMG');
            $table->string('token',100)->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    { 


     
    //  if (Schema::hasColumn('admin', 'Pic')) {
         
    //     Schema::table('admin', function (Blueprint $table) {

    //         $table->dropColumn('Pic');


    //     });
    //  }
     
             Schema::table('admins', function (Blueprint $table) {
            //      //$table->string('username',225);
                
            //   //  $table->dropColumn('Pic');
                
             });
        }
        }
        
        
