<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Activity;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Activity::TABLE_NAME, function (Blueprint $table) {
            $table->increments(Activity::ID);
            $table->string(Activity::NAME);
        });

        $this->insertActivities();

    }

    /**
     * Inserts all default activities
     */
    public function insertActivities()
    {
        $activities = [
            [Activity::NAME => 'Administrativo'],
            [Activity::NAME => 'Contabilidade'],
            [Activity::NAME => 'Apoio Jurídico'],
            [Activity::NAME => 'Arquitetura Engenharia'],
            [Activity::NAME => 'Artesanato Artes'],
            [Activity::NAME => 'Assistência Geração de Renda'],
            [Activity::NAME => 'Atendimento Recepção'],
            [Activity::NAME => 'Biblioteca Brinquedoteca'],
            [Activity::NAME => 'Cabelereiro Manicure'],
            [Activity::NAME => 'Campanhas Doações'],
            [Activity::NAME => 'Captação de Recursos Projetos'],
            [Activity::NAME => 'Computação Informática'],
            [Activity::NAME => 'Comunic. Propaganda Jornalismo'],
            [Activity::NAME => 'Contação de Histórias Leitura'],
            [Activity::NAME => 'Cozinha Culinária Nutrição'],
            [Activity::NAME => 'Cuidado com animais Veterinária'],
            [Activity::NAME => 'Dança Teatro Música Museus'],
            [Activity::NAME => 'Doação de Sangue'],
            [Activity::NAME => 'Educação Ambiental Reciclagem'],
            [Activity::NAME => 'Escrever Cartas'],
            [Activity::NAME => 'Esporte Atividade Física Recreação'],
            [Activity::NAME => 'Eventos Bazar Vendas'],
            [Activity::NAME => 'Fotografia'],
            [Activity::NAME => 'Jardinagem Horta'],
            [Activity::NAME => 'Manutenção Limpeza'],
            [Activity::NAME => 'Medicina Odontologia Farmácia'],
            [Activity::NAME => 'Oficinas de Idiomas'],
            [Activity::NAME => 'Palestras Cursos'],
            [Activity::NAME => 'Reforço Escolar Orient. Profissional'],
            [Activity::NAME => 'Site Internet Redes Sociais'],
            [Activity::NAME => 'Terapias Psico Fisio Fono'],
            [Activity::NAME => 'Tradução'],
            [Activity::NAME => 'Voluntariado Internacional'],
        ];

        \DB::table(Activity::TABLE_NAME)->insert($activities);

    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Activity::TABLE_NAME);
    }
}
