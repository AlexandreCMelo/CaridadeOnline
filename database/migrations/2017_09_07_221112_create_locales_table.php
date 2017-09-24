<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Models\Locale;

class CreateLocalesTable extends Migration
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
        $sql = "INSERT INTO locales VALUES ('en', 'en_US', 'English (US)', TRUE);
                INSERT INTO locales VALUES ('es', 'es_ES', 'Spanish', TRUE);
                INSERT INTO locales VALUES ('de', 'de_DE', 'German', TRUE);
                INSERT INTO locales VALUES ('el', 'el_GR', 'Greek', TRUE);
                INSERT INTO locales VALUES ('fr', 'fr_FR', 'French', TRUE);
                INSERT INTO locales VALUES ('pt', 'pt_PT', 'Portuguese (Portugal)', TRUE);
                INSERT INTO locales VALUES ('br', 'pt_BR', 'Portuguese (Brazil)', TRUE);
                INSERT INTO locales VALUES ('gw', 'pt_GW', 'Portuguese (Guinea-Bissau)', TRUE);
                INSERT INTO locales VALUES ('mz', 'pt_MZ', 'Portuguese (Mozambique)', TRUE);
                INSERT INTO locales VALUES ('pl', 'pl_PL', 'Polish', TRUE);
                INSERT INTO locales VALUES ('eu', 'eu_ES', 'Basque', TRUE);
                INSERT INTO locales VALUES ('ca', 'ca_ES', 'Catalan', TRUE);
                INSERT INTO locales VALUES ('gl', 'gl_ES', 'Galician', TRUE);
                INSERT INTO locales VALUES ('bn', 'bn_IN', 'Bengali', TRUE);
                INSERT INTO locales VALUES ('bg', 'bg_BG', 'Bulgarian', TRUE);
                INSERT INTO locales VALUES ('zh', 'zh_Hant', 'Chinese', TRUE);
                INSERT INTO locales VALUES ('cs', 'cs_CZ', 'Czech', TRUE);
                INSERT INTO locales VALUES ('da', 'da_DK', 'Danish', TRUE);
                INSERT INTO locales VALUES ('nl', 'nl_NL', 'Dutch', TRUE);
                INSERT INTO locales VALUES ('fi', 'fi_FI', 'Finnish', TRUE);
                INSERT INTO locales VALUES ('hi', 'hi_IN', 'Hindi', TRUE);
                INSERT INTO locales VALUES ('hu', 'hu_HU', 'Hungarian', TRUE);
                INSERT INTO locales VALUES ('ga', 'ga_IE', 'Irish', TRUE);
                INSERT INTO locales VALUES ('it', 'it_IT', 'Italian', TRUE);
                INSERT INTO locales VALUES ('ja', 'ja_JP', 'Japanese', TRUE);
                INSERT INTO locales VALUES ('no', 'nb_NO', 'Norwegian', TRUE);
                INSERT INTO locales VALUES ('sv', 'sv_SE', 'Swedish', TRUE);";

        return DB::connection()->getPdo()->exec($sql);

    }
}
