<?php

use App\Models\Bantuan;
use App\Models\Daerah;
use App\Models\Info_kampung;
use App\Models\Negeri;
use App\Models\Pendapatan;
use App\Models\Simpanan;
use App\Models\User;
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
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->longText('nama')->nullable();
            $table->string('no_kad_pengenalan')->nullable();

            // $table->foreignIdFor(Lokaliti::class)->nullable();
            // $table->foreignIdFor(Negeri_mukim::class)->nullable();
            // $table->foreignIdFor(Negeri_parlimen::class)->nullable();

            $table->foreignIdFor(Negeri::class)->nullable();
            $table->foreignIdFor(Daerah::class)->nullable();
            $table->string('mukim')->nullable();
            $table->string('parlimen')->nullable();
            $table->string('dun')->nullable();
            $table->string('strata')->nullable();
            $table->string('alamat1')->nullable();
            $table->string('alamat2')->nullable();
            $table->string('alamat3')->nullable();
            $table->string('poskod')->nullable();

            $table->string('jumlah_pendapatan_per_kapita')->nullable();
            $table->string('jumlah_isi_rumah')->nullable();
            $table->string('status_miskin')->nullable();
            $table->string('status_terkeluar')->nullable();

            $table->string('no_telefon_tetap')->nullable();
            $table->string('no_telefon_bimbit')->nullable();
            $table->string('tarikh_lahir')->nullable();
            $table->string('umur')->nullable();
            $table->string('tahun_kelahiran')->nullable();
            $table->string('jantina')->nullable();
            $table->string('kumpulan_etnik')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('agama')->nullable();
            $table->string('status_perkahwinan')->nullable();
            $table->string('taraf_pendidikan')->nullable();
            $table->string('maklumat_institusi_pendidikan')->nullable();
            $table->string('taraf_sijil_tertinggi')->nullable();
            $table->string('kemahiran_yang_dimiliki')->nullable();
            $table->string('status_pekerjaan_utama')->nullable();
            $table->string('jenis_pekerjaan')->nullable();
            $table->string('status_produktiviti')->nullable();
            $table->string('punca_pendapatan')->nullable();
            $table->string('kumpulan_perbelanjaan')->nullable();
            $table->string('jenis_bantuan_kebajikan_yang_diterima')->nullable();
            $table->string('jenis_bantuan_kebajikan_yang_diperlukan')->nullable();
            $table->string('jumlah_kasar_isi_rumah_sebulan')->nullable();
            $table->string('kategori')->nullable();
            $table->string('keterangan')->nullable();
            $table->string('current_bahagian')->nullable();
            $table->string('daftar_oku')->nullable();
            $table->string('anggaran_perbelanjaan_isi_rumah')->nullable();
            $table->string('jumlah_bantuan')->nullable();
            $table->string('jumlah_impak_bantuan')->nullable();
            $table->string('jumlah_pendapatan_kasar')->nullable();

            $table->foreignIdFor(User::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Info_kampung::class)->nullable();
            $table->foreignIdFor(Pendapatan::class)->nullable();
            $table->foreignIdFor(Simpanan::class)->nullable();
            $table->foreignIdFor(Bantuan::class)->nullable();

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
        Schema::dropIfExists('profils');
    }
};
