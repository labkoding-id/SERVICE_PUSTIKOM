<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePustikomPmb extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('PUSTIKOM_PMB')->create('tokens', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->text('email');
            $table->text('token');
            $table->text('password');
            $table->integer('angkatan');
            $table->integer('gelombang');
            $table->integer('use_token')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::connection('PUSTIKOM_PMB')->create('calon_mahasiswa', function (Blueprint $table) {
            $table->integer('id', true, true);
            $table->bigInteger('biodata_id');
            $table->bigInteger('token_id');
            $table->text('email');
            $table->text('password');
            $table->timestamps();
            
        });

        Schema::connection('PUSTIKOM_PMB')->create('biodata_calon_mahasiswa', function (Blueprint $table) {
            $table->integer('id', true, true);

            $table->text('nama_lengkap');
            $table->string('no_registrasi');
            $table->string('tempat_lahir');
            $table->string('tanggal_lahir');
            $table->enum('gender', ['Laki-laki', 'Perempuan']);
            $table->string('asal_sekolah');
            $table->string('tahun_lulus');
            $table->enum('agama',['Islam', 'Protestan','Katolik', 'Hindu', 'Budha', 'Konghucu', 'lainnya']);
            $table->string('alamat');
            $table->string('telepon');
            $table->enum('ukuran_baju', ['XXL', 'XL', 'L', 'M', 'S']);
            $table->enum('pilihan_kelas', ['reguler', 'karyawan']);
            $table->integer('service_baak_id_program_studi');
            $table->integer('service_baak_id_fakultas');

            $table->string('ortu_name');
            $table->string('ortu_telpon');
            $table->string('ortu_alamat');
            $table->string('ortu_pekerjaan');
            
            $table->text('ijazah')->nullable();
            $table->text('passphoto')->nullable();
            $table->text('kartu_keluarga')->nullable();
            $table->text('akta')->nullable();
        
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
        Schema::connection('PUSTIKOM_PMB')->dropIfExists('calon_mahasiswa');
        Schema::connection('PUSTIKOM_PMB')->dropIfExists('biodata_calon_mahasiswa');
        Schema::connection('PUSTIKOM_PMB')->dropIfExists('tokens');
    }
}
