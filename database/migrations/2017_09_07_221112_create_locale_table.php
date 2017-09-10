<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Locale;

class CreateLocaleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Locale::TABLE_NAME, function (Blueprint $table) {
            $table->string(Locale::ID, 8);
            $table->primary(Locale::ID);
            $table->string(Locale::CODE)->unique();
            $table->string(Locale::NAME);
            $table->boolean(Locale::ENABLED)->default('true');
        });

        $this->insertLocales();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Locale::TABLE_NAME);
    }

    public function insertLocales()
    {
        $sql = "INSERT INTO locale VALUES ('en', 'en_US', 'English (US)', TRUE);
                INSERT INTO locale VALUES ('es', 'es_ES', 'Spanish', TRUE);
                INSERT INTO locale VALUES ('de', 'de_DE', 'German', TRUE);
                INSERT INTO locale VALUES ('el', 'el_GR', 'Greek', TRUE);
                INSERT INTO locale VALUES ('fr', 'fr_FR', 'French', TRUE);
                INSERT INTO locale VALUES ('pt', 'pt_PT', 'Portuguese (Portugal)', TRUE);
                INSERT INTO locale VALUES ('br', 'pt_BR', 'Portuguese (Brazil)', TRUE);
                INSERT INTO locale VALUES ('gw', 'pt_GW', 'Portuguese (Guinea-Bissau)', TRUE);
                INSERT INTO locale VALUES ('mz', 'pt_MZ', 'Portuguese (Mozambique)', TRUE);
                INSERT INTO locale VALUES ('pl', 'pl_PL', 'Polish', TRUE);
                INSERT INTO locale VALUES ('eu', 'eu_ES', 'Basque', TRUE);
                INSERT INTO locale VALUES ('ca', 'ca_ES', 'Catalan', TRUE);
                INSERT INTO locale VALUES ('gl', 'gl_ES', 'Galician', TRUE);
                INSERT INTO locale VALUES ('bn', 'bn_IN', 'Bengali', TRUE);
                INSERT INTO locale VALUES ('bg', 'bg_BG', 'Bulgarian', TRUE);
                INSERT INTO locale VALUES ('zh', 'zh_Hant', 'Chinese', TRUE);
                INSERT INTO locale VALUES ('cs', 'cs_CZ', 'Czech', TRUE);
                INSERT INTO locale VALUES ('da', 'da_DK', 'Danish', TRUE);
                INSERT INTO locale VALUES ('nl', 'nl_NL', 'Dutch', TRUE);
                INSERT INTO locale VALUES ('fi', 'fi_FI', 'Finnish', TRUE);
                INSERT INTO locale VALUES ('hi', 'hi_IN', 'Hindi', TRUE);
                INSERT INTO locale VALUES ('hu', 'hu_HU', 'Hungarian', TRUE);
                INSERT INTO locale VALUES ('ga', 'ga_IE', 'Irish', TRUE);
                INSERT INTO locale VALUES ('it', 'it_IT', 'Italian', TRUE);
                INSERT INTO locale VALUES ('ja', 'ja_JP', 'Japanese', TRUE);
                INSERT INTO locale VALUES ('no', 'nb_NO', 'Norwegian', TRUE);
                INSERT INTO locale VALUES ('sv', 'sv_SE', 'Swedish', TRUE);";

        return DB::connection()->getPdo()->exec($sql);

    }
}
