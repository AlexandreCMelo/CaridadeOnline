<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Charis\Timezone;

class CreateTimezoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(Timezone::TABLE_NAME, function (Blueprint $table) {
            $table->string(Timezone::ID);
            $table->primary(Timezone::ID);
            $table->string(Timezone::COUNTRY_CODE, 2);
            $table->string(Timezone::COORDINATES, 20);
            $table->string(Timezone::COMMENTS, 100);
            $table->string(Timezone::COORDINATED_UNIVERSAL_TIME_OFFSET, 100);
            $table->string(Timezone::COORDINATED_UNIVERSAL_TIME_DAYLIGHT_SAVING_TOME_OFFSET, 100);
            $table->string(Timezone::NOTES, 128);
        });

        $this->insertTimezones();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists(Timezone::TABLE_NAME);
    }

    /**
     * @see https://en.wikipedia.org/wiki/List_of_tz_database_time_zones
     * @return int
     */
    public function insertTimezones()
    {
        $sql = "INSERT INTO timezone VALUES ('Africa/Abidjan', 'CI', '+0519-00402', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Accra', 'GH', '+0533-00013', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Addis_Ababa', 'ET', '+0902+03842', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Algiers', 'DZ', '+3647+00303', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Asmara', 'ER', '+1520+03853', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Bamako', 'ML', '+1239-00800', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Bangui', 'CF', '+0422+01835', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Banjul', 'GM', '+1328-01639', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Bissau', 'GW', '+1151-01535', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Blantyre', 'MW', '-1547+03500', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Brazzaville', 'CG', '-0416+01517', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Bujumbura', 'BI', '-0323+02922', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Cairo', 'EG', '+3003+03115', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Casablanca', 'MA', '+3339-00735', '', '+00:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Ceuta', 'ES', '+3553-00519', 'Ceuta & Melilla', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Conakry', 'GN', '+0931-01343', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Dakar', 'SN', '+1440-01726', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Dar_es_Salaam', 'TZ', '-0648+03917', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Djibouti', 'DJ', '+1136+04309', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Douala', 'CM', '+0403+00942', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/El_Aaiun', 'EH', '+2709-01312', '', '+00:00', '+01:00', 'Assuming it follows Morocco DST rules.');
                INSERT INTO timezone VALUES ('Africa/Freetown', 'SL', '+0830-01315', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Gaborone', 'BW', '-2439+02555', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Harare', 'ZW', '-1750+03103', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Johannesburg', 'ZA', '-2615+02800', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Juba', 'SS', '+0451+03136', '', '+03:00', '+03:00', 'Link to Africa/Khartoum');
                INSERT INTO timezone VALUES ('Africa/Kampala', 'UG', '+0019+03225', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Khartoum', 'SD', '+1536+03232', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Kigali', 'RW', '-0157+03004', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Kinshasa', 'CD', '-0418+01518', 'west Dem. Rep. of Congo', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Lagos', 'NG', '+0627+00324', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Libreville', 'GA', '+0023+00927', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Lome', 'TG', '+0608+00113', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Luanda', 'AO', '-0848+01314', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Lubumbashi', 'CD', '-1140+02728', 'east Dem. Rep. of Congo', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Lusaka', 'ZM', '-1525+02817', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Malabo', 'GQ', '+0345+00847', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Maputo', 'MZ', '-2558+03235', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Maseru', 'LS', '-2928+02730', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Mbabane', 'SZ', '-2618+03106', '', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Africa/Mogadishu', 'SO', '+0204+04522', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Monrovia', 'LR', '+0618-01047', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Nairobi', 'KE', '-0117+03649', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Africa/Ndjamena', 'TD', '+1207+01503', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Niamey', 'NE', '+1331+00207', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Nouakchott', 'MR', '+1806-01557', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Ouagadougou', 'BF', '+1222-00131', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Porto-Novo', 'BJ', '+0629+00237', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Sao_Tome', 'ST', '+0020+00644', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Africa/Tripoli', 'LY', '+3254+01311', '', '+02:00', '+02:00', 'Assume revert to permanent UTC+2 rule before 2012.');
                INSERT INTO timezone VALUES ('Africa/Tunis', 'TN', '+3648+01011', '', '+01:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Africa/Windhoek', 'NA', '-2234+01706', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('America/Adak', 'US', '+515248-1763929', 'Aleutian Islands', '−10:00', '−09:00', '');
                INSERT INTO timezone VALUES ('America/Anchorage', 'US', '+611305-1495401', 'Alaska Time', '−09:00', '−08:00', '');
                INSERT INTO timezone VALUES ('America/Anguilla', 'AI', '+1812-06304', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Antigua', 'AG', '+1703-06148', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Araguaina', 'BR', '-0712-04812', 'Tocantins', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Argentina/Buenos_Aires', 'AR', '-3436-05827', 'Buenos Aires (BA, CF)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/Catamarca', 'AR', '-2828-06547', 'Catamarca (CT), Chubut (CH)', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES
                    ('America/Argentina/Cordoba', 'AR', '-3124-06411', 'most locations (CD, CC, CR, ER, FO, MN, SE, SF)', '−03:00',
                        '−03:00', '');
                INSERT INTO timezone VALUES ('America/Argentina/Jujuy', 'AR', '-2411-06518', 'Jujuy (JY)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/La_Rioja', 'AR', '-2926-06651', 'La Rioja (LR)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/Mendoza', 'AR', '-3253-06849', 'Mendoza (MZ)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/Rio_Gallegos', 'AR', '-5138-06913', 'Santa Cruz (SC)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/Salta', 'AR', '-2447-06525', '(SA, LP, NQ, RN)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/San_Juan', 'AR', '-3132-06831', 'San Juan (SJ)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/San_Luis', 'AR', '-3319-06621', 'San Luis (SL)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/Tucuman', 'AR', '-2649-06513', 'Tucuman (TM)', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Argentina/Ushuaia', 'AR', '-5448-06818', 'Tierra del Fuego (TF)', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Aruba', 'AW', '+1230-06958', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Asuncion', 'PY', '-2516-05740', '', '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES
                    ('America/Atikokan', 'CA', '+484531-0913718', 'Eastern Standard Time - Atikokan, Ontario and Southampton I, Nunavut',
                        '−05:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Bahia', 'BR', '-1259-03831', 'Bahia', '−03:00', '−02:00', '');
                INSERT INTO timezone VALUES
                    ('America/Bahia_Banderas', 'MX', '+2048-10515', 'Mexican Central Time - Bahia de Banderas', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Barbados', 'BB', '+1306-05937', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Belem', 'BR', '-0127-04829', 'Amapa, E Para', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Belize', 'BZ', '+1730-08812', '', '−06:00', '−06:00', '');
                INSERT INTO timezone VALUES
                    ('America/Blanc-Sablon', 'CA', '+5125-05707', 'Atlantic Standard Time - Quebec - Lower North Shore', '−04:00',
                        '−04:00', '');
                INSERT INTO timezone VALUES ('America/Boa_Vista', 'BR', '+0249-06040', 'Roraima', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Bogota', 'CO', '+0436-07405', '', '−05:00', '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Boise', 'US', '+433649-1161209', 'Mountain Time - south Idaho & east Oregon', '−07:00', '−06:00', '');
                INSERT INTO timezone
                VALUES ('America/Cambridge_Bay', 'CA', '+690650-1050310', 'Mountain Time - west Nunavut', '−07:00', '−06:00', '');
                INSERT INTO timezone
                VALUES ('America/Campo_Grande', 'BR', '-2027-05437', 'Mato Grosso do Sul', '−04:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Cancun', 'MX', '+2105-08646', 'Central Time - Quintana Roo', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Caracas', 'VE', '+1030-06656', '', '−04:30', '−04:30', '');
                INSERT INTO timezone VALUES ('America/Cayenne', 'GF', '+0456-05220', '', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Cayman', 'KY', '+1918-08123', '', '−05:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Chicago', 'US', '+415100-0873900', 'Central Time', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES
                    ('America/Chihuahua', 'MX', '+2838-10605', 'Mexican Mountain Time - Chihuahua away from US border', '−07:00',
                        '−06:00', '');
                INSERT INTO timezone VALUES ('America/Costa_Rica', 'CR', '+0956-08405', '', '−06:00', '−06:00', '');
                INSERT INTO timezone VALUES
                    ('America/Creston', 'CA', '+4906-11631', 'Mountain Standard Time - Creston, British Columbia', '−07:00', '−07:00',
                        '');
                INSERT INTO timezone VALUES ('America/Cuiaba', 'BR', '-1535-05605', 'Mato Grosso', '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Curacao', 'CW', '+1211-06900', '', '−04:00', '−04:00', '');
                INSERT INTO timezone
                VALUES ('America/Danmarkshavn', 'GL', '+7646-01840', 'east coast, north of Scoresbysund', '+00:00', '+00:00', '');
                INSERT INTO timezone
                VALUES ('America/Dawson', 'CA', '+6404-13925', 'Pacific Time - north Yukon', '−08:00', '−07:00', '');
                INSERT INTO timezone VALUES ('America/Dawson_Creek', 'CA', '+5946-12014',
                        'Mountain Standard Time - Dawson Creek & Fort Saint John, British Columbia', '−07:00',
                        '−07:00', '');
                INSERT INTO timezone VALUES ('America/Denver', 'US', '+394421-1045903', 'Mountain Time', '−07:00', '−06:00', '');
                INSERT INTO timezone
                VALUES ('America/Detroit', 'US', '+421953-0830245', 'Eastern Time - Michigan - most locations', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Dominica', 'DM', '+1518-06124', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Edmonton', 'CA', '+5333-11328', 'Mountain Time - Alberta, east British Columbia & west Saskatchewan',
                        '−07:00', '−06:00', '');
                INSERT INTO timezone VALUES ('America/Eirunepe', 'BR', '-0640-06952', 'W Amazonas', '−05:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/El_Salvador', 'SV', '+1342-08912', '', '−06:00', '−06:00', '');
                INSERT INTO timezone
                VALUES ('America/Fortaleza', 'BR', '-0343-03830', 'NE Brazil (MA, PI, CE, RN, PB)', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES
                    ('America/Glace_Bay', 'CA', '+4612-05957', 'Atlantic Time - Nova Scotia - places that did not observe DST 1966-1971',
                        '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Godthab', 'GL', '+6411-05144', 'most locations', '−03:00', '−02:00', '');
                INSERT INTO timezone
                VALUES ('America/Goose_Bay', 'CA', '+5320-06025', 'Atlantic Time - Labrador - most locations', '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Grand_Turk', 'TC', '+2128-07108', '', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Grenada', 'GD', '+1203-06145', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Guadeloupe', 'GP', '+1614-06132', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Guatemala', 'GT', '+1438-09031', '', '−06:00', '−06:00', '');
                INSERT INTO timezone VALUES ('America/Guayaquil', 'EC', '-0210-07950', 'mainland', '−05:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Guyana', 'GY', '+0648-05810', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Halifax', 'CA', '+4439-06336', 'Atlantic Time - Nova Scotia (most places), PEI', '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Havana', 'CU', '+2308-08222', '', '−05:00', '−04:00', '');
                INSERT INTO timezone
                VALUES ('America/Hermosillo', 'MX', '+2904-11058', 'Mountain Standard Time - Sonora', '−07:00', '−07:00', '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Indianapolis', 'US', '+394606-0860929', 'Eastern Time - Indiana - most locations', '−05:00',
                        '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Knox', 'US', '+411745-0863730', 'Central Time - Indiana - Starke County', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Marengo', 'US', '+382232-0862041', 'Eastern Time - Indiana - Crawford County', '−05:00', '−04:00',
                        '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Petersburg', 'US', '+382931-0871643', 'Eastern Time - Indiana - Pike County', '−05:00', '−04:00',
                        '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Tell_City', 'US', '+375711-0864541', 'Central Time - Indiana - Perry County', '−06:00', '−05:00',
                        '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Vevay', 'US', '+384452-0850402', 'Eastern Time - Indiana - Switzerland County', '−05:00', '−04:00',
                        '');
                INSERT INTO timezone VALUES ('America/Indiana/Vincennes', 'US', '+384038-0873143',
                        'Eastern Time - Indiana - Daviess, Dubois, Knox & Martin Counties', '−05:00', '−04:00',
                        '');
                INSERT INTO timezone VALUES
                    ('America/Indiana/Winamac', 'US', '+410305-0863611', 'Eastern Time - Indiana - Pulaski County', '−05:00', '−04:00',
                        '');
                INSERT INTO timezone VALUES
                    ('America/Inuvik', 'CA', '+682059-1334300', 'Mountain Time - west Northwest Territories', '−07:00', '−06:00', '');
                INSERT INTO timezone
                VALUES ('America/Iqaluit', 'CA', '+6344-06828', 'Eastern Time - east Nunavut - most locations', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Jamaica', 'JM', '+1800-07648', '', '−05:00', '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Juneau', 'US', '+581807-1342511', 'Alaska Time - Alaska panhandle', '−09:00', '−08:00', '');
                INSERT INTO timezone VALUES
                    ('America/Kentucky/Louisville', 'US', '+381515-0854534', 'Eastern Time - Kentucky - Louisville area', '−05:00',
                        '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Kentucky/Monticello', 'US', '+364947-0845057', 'Eastern Time - Kentucky - Wayne County', '−05:00', '−04:00',
                        '');
                INSERT INTO timezone
                VALUES ('America/Kralendijk', 'BQ', '+120903-0681636', '', '−04:00', '−04:00', 'Link to America/Curacao');
                INSERT INTO timezone VALUES ('America/La_Paz', 'BO', '-1630-06809', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Lima', 'PE', '-1203-07703', '', '−05:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Los_Angeles', 'US', '+340308-1181434', 'Pacific Time', '−08:00', '−07:00', '');
                INSERT INTO timezone
                VALUES ('America/Lower_Princes', 'SX', '+180305-0630250', '', '−04:00', '−04:00', 'Link to America/Curacao');
                INSERT INTO timezone VALUES ('America/Maceio', 'BR', '-0940-03543', 'Alagoas, Sergipe', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Managua', 'NI', '+1209-08617', '', '−06:00', '−06:00', '');
                INSERT INTO timezone VALUES ('America/Manaus', 'BR', '-0308-06001', 'E Amazonas', '−04:00', '−04:00', '');
                INSERT INTO timezone
                VALUES ('America/Marigot', 'MF', '+1804-06305', '', '−04:00', '−04:00', 'Link to America/Guadeloupe');
                INSERT INTO timezone VALUES ('America/Martinique', 'MQ', '+1436-06105', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Matamoros', 'MX', '+2550-09730',
                        'US Central Time - Coahuila, Durango, Nuevo Leon, Tamaulipas near US border', '−06:00',
                        '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Mazatlan', 'MX', '+2313-10625', 'Mountain Time - S Baja, Nayarit, Sinaloa', '−07:00', '−06:00', '');
                INSERT INTO timezone VALUES ('America/Menominee', 'US', '+450628-0873651',
                        'Central Time - Michigan - Dickinson, Gogebic, Iron & Menominee Counties', '−06:00',
                        '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Merida', 'MX', '+2058-08937', 'Central Time - Campeche, Yucatan', '−06:00', '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Metlakatla', 'US', '+550737-1313435', 'Metlakatla Time - Annette Island', '−08:00', '−08:00', '');
                INSERT INTO timezone
                VALUES ('America/Mexico_City', 'MX', '+1924-09909', 'Central Time - most locations', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Miquelon', 'PM', '+4703-05620', '', '−03:00', '−02:00', '');
                INSERT INTO timezone
                VALUES ('America/Moncton', 'CA', '+4606-06447', 'Atlantic Time - New Brunswick', '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Monterrey', 'MX', '+2540-10019',
                        'Mexican Central Time - Coahuila, Durango, Nuevo Leon, Tamaulipas away from US border',
                        '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Montevideo', 'UY', '-3453-05611', '', '−03:00', '−02:00', '');
                INSERT INTO timezone VALUES ('America/Montserrat', 'MS', '+1643-06213', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Nassau', 'BS', '+2505-07721', '', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/New_York', 'US', '+404251-0740023', 'Eastern Time', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Nipigon', 'CA', '+4901-08816',
                        'Eastern Time - Ontario & Quebec - places that did not observe DST 1967-1973', '−05:00',
                        '−04:00', '');
                INSERT INTO timezone
                VALUES ('America/Nome', 'US', '+643004-1652423', 'Alaska Time - west Alaska', '−09:00', '−08:00', '');
                INSERT INTO timezone VALUES ('America/Noronha', 'BR', '-0351-03225', 'Atlantic islands', '−02:00', '−02:00', '');
                INSERT INTO timezone VALUES
                    ('America/North_Dakota/Beulah', 'US', '+471551-1014640', 'Central Time - North Dakota - Mercer County', '−06:00',
                        '−05:00', '');
                INSERT INTO timezone VALUES
                    ('America/North_Dakota/Center', 'US', '+470659-1011757', 'Central Time - North Dakota - Oliver County', '−06:00',
                        '−05:00', '');
                INSERT INTO timezone VALUES ('America/North_Dakota/New_Salem', 'US', '+465042-1012439',
                        'Central Time - North Dakota - Morton County (except Mandan area)', '−06:00', '−05:00',
                        '');
                INSERT INTO timezone
                VALUES ('America/Ojinaga', 'MX', '+2934-10425', 'US Mountain Time - Chihuahua near US border', '−07:00', '−06:00', '');
                INSERT INTO timezone VALUES ('America/Panama', 'PA', '+0858-07932', '', '−05:00', '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Pangnirtung', 'CA', '+6608-06544', 'Eastern Time - Pangnirtung, Nunavut', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Paramaribo', 'SR', '+0550-05510', '', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES
                    ('America/Phoenix', 'US', '+332654-1120424', 'Mountain Standard Time - Arizona (except Navajo)', '−07:00', '−07:00',
                        '');
                INSERT INTO timezone VALUES ('America/Port_of_Spain', 'TT', '+1039-06131', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Port-au-Prince', 'HT', '+1832-07220', '', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Porto_Velho', 'BR', '-0846-06354', 'Rondonia', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Puerto_Rico', 'PR', '+182806-0660622', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Rainy_River', 'CA', '+4843-09434', 'Central Time - Rainy River & Fort Frances, Ontario', '−06:00', '−05:00',
                        '');
                INSERT INTO timezone
                VALUES ('America/Rankin_Inlet', 'CA', '+624900-0920459', 'Central Time - central Nunavut', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Recife', 'BR', '-0803-03454', 'Pernambuco', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES
                    ('America/Regina', 'CA', '+5024-10439', 'Central Standard Time - Saskatchewan - most locations', '−06:00', '−06:00',
                        '');
                INSERT INTO timezone VALUES
                    ('America/Resolute', 'CA', '+744144-0944945', 'Central Standard Time - Resolute, Nunavut', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('America/Rio_Branco', 'BR', '-0958-06748', 'Acre', '−05:00', '', '');
                INSERT INTO timezone VALUES
                    ('America/Santa_Isabel', 'MX', '+3018-11452', 'Mexican Pacific Time - Baja California away from US border', '−08:00',
                        '−07:00', '');
                INSERT INTO timezone VALUES ('America/Santarem', 'BR', '-0226-05452', 'W Para', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Santiago', 'CL', '-3327-07040', 'most locations', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('America/Santo_Domingo', 'DO', '+1828-06954', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Sao_Paulo', 'BR', '-2332-04637', 'S & SE Brazil (GO, DF, MG, ES, RJ, SP, PR, SC, RS)', '−03:00', '−02:00',
                        '');
                INSERT INTO timezone
                VALUES ('America/Scoresbysund', 'GL', '+7029-02158', 'Scoresbysund / Ittoqqortoormiit', '−01:00', '+00:00', '');
                INSERT INTO timezone
                VALUES ('America/Sitka', 'US', '+571035-1351807', 'Alaska Time - southeast Alaska panhandle', '−09:00', '−08:00', '');
                INSERT INTO timezone
                VALUES ('America/St_Barthelemy', 'BL', '+1753-06251', '', '−04:00', '−04:00', 'Link to America/Guadeloupe');
                INSERT INTO timezone
                VALUES ('America/St_Johns', 'CA', '+4734-05243', 'Newfoundland Time, including SE Labrador', '−03:30', '−02:30', '');
                INSERT INTO timezone VALUES ('America/St_Kitts', 'KN', '+1718-06243', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/St_Lucia', 'LC', '+1401-06100', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/St_Thomas', 'VI', '+1821-06456', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/St_Vincent', 'VC', '+1309-06114', '', '−04:00', '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Swift_Current', 'CA', '+5017-10750', 'Central Standard Time - Saskatchewan - midwest', '−06:00', '−06:00',
                        '');
                INSERT INTO timezone VALUES ('America/Tegucigalpa', 'HN', '+1406-08713', '', '−06:00', '−06:00', '');
                INSERT INTO timezone VALUES ('America/Thule', 'GL', '+7634-06847', 'Thule / Pituffik', '−04:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('America/Thunder_Bay', 'CA', '+4823-08915', 'Eastern Time - Thunder Bay, Ontario', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES
                    ('America/Tijuana', 'MX', '+3232-11701', 'US Pacific Time - Baja California near US border', '−08:00', '−07:00', '');
                INSERT INTO timezone VALUES
                    ('America/Toronto', 'CA', '+4339-07923', 'Eastern Time - Ontario & Quebec - most locations', '−05:00', '−04:00', '');
                INSERT INTO timezone VALUES ('America/Tortola', 'VG', '+1827-06437', '', '−04:00', '−04:00', '');
                INSERT INTO timezone
                VALUES ('America/Vancouver', 'CA', '+4916-12307', 'Pacific Time - west British Columbia', '−08:00', '−07:00', '');
                INSERT INTO timezone
                VALUES ('America/Whitehorse', 'CA', '+6043-13503', 'Pacific Time - south Yukon', '−08:00', '−07:00', '');
                INSERT INTO timezone
                VALUES ('America/Winnipeg', 'CA', '+4953-09709', 'Central Time - Manitoba & west Ontario', '−06:00', '−05:00', '');
                INSERT INTO timezone
                VALUES ('America/Yakutat', 'US', '+593249-1394338', 'Alaska Time - Alaska panhandle neck', '−09:00', '−08:00', '');
                INSERT INTO timezone VALUES
                    ('America/Yellowknife', 'CA', '+6227-11421', 'Mountain Time - central Northwest Territories', '−07:00', '−06:00', '');
                INSERT INTO timezone
                VALUES ('Antarctica/Casey', 'AQ', '-6617+11031', 'Casey Station, Bailey Peninsula', '+11:00', '+08:00', '');
                INSERT INTO timezone
                VALUES ('Antarctica/Davis', 'AQ', '-6835+07758', 'Davis Station, Vestfold Hills', '+05:00', '+07:00', '');
                INSERT INTO timezone VALUES
                    ('Antarctica/DumontDUrville', 'AQ', '-6640+14001', 'Dumont-d''Urville Station, Terre Adelie', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Antarctica/Macquarie', 'AQ', '-5430+15857', 'Macquarie Island', '+11:00', '+11:00', '');
                INSERT INTO timezone
                VALUES ('Antarctica/Mawson', 'AQ', '-6736+06253', 'Mawson Station, Holme Bay', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES
                    ('Antarctica/McMurdo', 'AQ', '-7750+16636', 'McMurdo, South Pole, Scott (New Zealand time)', '+12:00', '+13:00',
                        'Link to Pacific/Auckland');
                INSERT INTO timezone
                VALUES ('Antarctica/Palmer', 'AQ', '-6448-06406', 'Palmer Station, Anvers Island', '−04:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('Antarctica/Rothera', 'AQ', '-6734-06808', 'Rothera Station, Adelaide Island', '−03:00', '−03:00', '');
                INSERT INTO timezone
                VALUES ('Antarctica/Syowa', 'AQ', '-690022+0393524', 'Syowa Station, E Ongul I', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES
                    ('Antarctica/Troll', 'AQ', '-720041+0023206', 'Troll Station, Queen Maud Land', '+00:00', '+02:00',
                        'DST offset approximated, as parsing actual rules require zic from tzcode 2014b or later.');
                INSERT INTO timezone
                VALUES ('Antarctica/Vostok', 'AQ', '-7824+10654', 'Vostok Station, Lake Vostok', '+06:00', '+06:00', '');
                INSERT INTO timezone
                VALUES ('Arctic/Longyearbyen', 'SJ', '+7800+01600', '', '+01:00', '+02:00', 'Link to Europe/Oslo');
                INSERT INTO timezone VALUES ('Asia/Aden', 'YE', '+1245+04512', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Almaty', 'KZ', '+4315+07657', 'most locations', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Amman', 'JO', '+3157+03556', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Anadyr', 'RU', '+6445+17729', 'Moscow+09 - Bering Sea', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES
                    ('Asia/Aqtau', 'KZ', '+4431+05016', 'Atyrau (Atirau, Gur''yev), Mangghystau (Mankistau)', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Aqtobe', 'KZ', '+5017+05710', 'Aqtobe (Aktobe)', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Ashgabat', 'TM', '+3757+05823', '', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Baghdad', 'IQ', '+3321+04425', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Bahrain', 'BH', '+2623+05035', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Baku', 'AZ', '+4023+04951', '', '+04:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Bangkok', 'TH', '+1345+10031', '', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES ('Asia/Beirut', 'LB', '+3353+03530', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Bishkek', 'KG', '+4254+07436', '', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Brunei', 'BN', '+0456+11455', '', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Choibalsan', 'MN', '+4804+11430', 'Dornod, Sukhbaatar', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Colombo', 'LK', '+0656+07951', '', '+05:30', '+05:30', '');
                INSERT INTO timezone VALUES ('Asia/Damascus', 'SY', '+3330+03618', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Dhaka', 'BD', '+2343+09025', '', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Dili', 'TL', '-0833+12535', '', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Asia/Dubai', 'AE', '+2518+05518', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Asia/Dushanbe', 'TJ', '+3835+06848', '', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Gaza', 'PS', '+3130+03428', 'Gaza Strip', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Hebron', 'PS', '+313200+0350542', 'West Bank', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Ho_Chi_Minh', 'VN', '+1045+10640', '', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES ('Asia/Hong_Kong', 'HK', '+2217+11409', '', '+08:00', '+08:00', '');
                INSERT INTO timezone
                VALUES ('Asia/Hovd', 'MN', '+4801+09139', 'Bayan-Olgiy, Govi-Altai, Hovd, Uvs, Zavkhan', '+07:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Irkutsk', 'RU', '+5216+10420', 'Moscow+05 - Lake Baikal', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Jakarta', 'ID', '-0610+10648', 'Java & Sumatra', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES
                    ('Asia/Jayapura', 'ID', '-0232+14042', 'west New Guinea (Irian Jaya) & Malukus (Moluccas)', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Asia/Jerusalem', 'IL', '+3146+03514', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Kabul', 'AF', '+3431+06912', '', '+04:30', '+04:30', '');
                INSERT INTO timezone VALUES ('Asia/Kamchatka', 'RU', '+5301+15839', 'Moscow+09 - Kamchatka', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Asia/Karachi', 'PK', '+2452+06703', '', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Kathmandu', 'NP', '+2743+08519', '', '+05:45', '+05:45', '');
                INSERT INTO timezone
                VALUES ('Asia/Khandyga', 'RU', '+623923+1353314', 'Moscow+06 - Tomponsky, Ust-Maysky', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES
                    ('Asia/Kolkata', 'IN', '+2232+08822', '', '+05:30', '+05:30', 'Note: Different zones in history, see Time in India.');
                INSERT INTO timezone
                VALUES ('Asia/Krasnoyarsk', 'RU', '+5601+09250', 'Moscow+04 - Yenisei River', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES ('Asia/Kuala_Lumpur', 'MY', '+0310+10142', 'peninsular Malaysia', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Kuching', 'MY', '+0133+11020', 'Sabah & Sarawak', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Kuwait', 'KW', '+2920+04759', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Asia/Macau', 'MO', '+2214+11335', '', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Magadan', 'RU', '+5934+15048', 'Moscow+07 - Magadan', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES
                    ('Asia/Makassar', 'ID', '-0507+11924', 'east & south Borneo, Sulawesi (Celebes), Bali, Nusa Tengarra, west Timor',
                        '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Manila', 'PH', '+1435+12100', '', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Muscat', 'OM', '+2336+05835', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Asia/Nicosia', 'CY', '+3510+03322', '', '+02:00', '+03:00', '');
                INSERT INTO timezone
                VALUES ('Asia/Novokuznetsk', 'RU', '+5345+08707', 'Moscow+04 - Novokuznetsk', '+07:00', '+07:00', '');
                INSERT INTO timezone
                VALUES ('Asia/Novosibirsk', 'RU', '+5502+08255', 'Moscow+03 - Novosibirsk', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Omsk', 'RU', '+5500+07324', 'Moscow+03 - west Siberia', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Oral', 'KZ', '+5113+05121', 'West Kazakhstan', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Phnom_Penh', 'KH', '+1133+10455', '', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES ('Asia/Pontianak', 'ID', '-0002+10920', 'west & central Borneo', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES ('Asia/Pyongyang', 'KP', '+3901+12545', '', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Asia/Qatar', 'QA', '+2517+05132', '', '+03:00', '+03:00', '');
                INSERT INTO timezone
                VALUES ('Asia/Qyzylorda', 'KZ', '+4448+06528', 'Qyzylorda (Kyzylorda, Kzyl-Orda)', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Rangoon', 'MM', '+1647+09610', '', '+06:30', '+06:30', '');
                INSERT INTO timezone VALUES ('Asia/Riyadh', 'SA', '+2438+04643', '', '+03:00', '+03:00', '');
                INSERT INTO timezone
                VALUES ('Asia/Sakhalin', 'RU', '+4658+14242', 'Moscow+08 - Sakhalin Island', '+11:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Asia/Samarkand', 'UZ', '+3940+06648', 'west Uzbekistan', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Seoul', 'KR', '+3733+12658', '', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES
                    ('Asia/Shanghai', 'CN', '+3114+12128', 'east China - Beijing, Guangdong, Shanghai, etc.', '+08:00', '+08:00',
                        'Covering historic Chungyuan time zone.');
                INSERT INTO timezone VALUES ('Asia/Singapore', 'SG', '+0117+10351', '', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Taipei', 'TW', '+2503+12130', '', '+08:00', '+08:00', '');
                INSERT INTO timezone VALUES ('Asia/Tashkent', 'UZ', '+4120+06918', 'east Uzbekistan', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Tbilisi', 'GE', '+4143+04449', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Asia/Tehran', 'IR', '+3540+05126', '', '+03:30', '+04:30', '');
                INSERT INTO timezone VALUES ('Asia/Thimphu', 'BT', '+2728+08939', '', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Asia/Tokyo', 'JP', '+353916+1394441', '', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Asia/Ulaanbaatar', 'MN', '+4755+10653', 'most locations', '+08:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Asia/Urumqi', 'CN', '+4348+08735', 'most of Tibet & Xinjiang', '+08:00', '+08:00',
                        'Covering historic Sinkiang-Tibet time zone.');
                INSERT INTO timezone
                VALUES ('Asia/Ust-Nera', 'RU', '+643337+1431336', 'Moscow+07 - Oymyakonsky', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Asia/Vientiane', 'LA', '+1758+10236', '', '+07:00', '+07:00', '');
                INSERT INTO timezone
                VALUES ('Asia/Vladivostok', 'RU', '+4310+13156', 'Moscow+07 - Amur River', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Asia/Yakutsk', 'RU', '+6200+12940', 'Moscow+06 - Lena River', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Asia/Yekaterinburg', 'RU', '+5651+06036', 'Moscow+02 - Urals', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Asia/Yerevan', 'AM', '+4011+04430', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Azores', 'PT', '+3744-02540', 'Azores', '−01:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Bermuda', 'BM', '+3217-06446', '', '−04:00', '−03:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Canary', 'ES', '+2806-01524', 'Canary Islands', '+00:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Cape_Verde', 'CV', '+1455-02331', '', '−01:00', '−01:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Faroe', 'FO', '+6201-00646', '', '+00:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Madeira', 'PT', '+3238-01654', 'Madeira Islands', '+00:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Reykjavik', 'IS', '+6409-02151', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Atlantic/South_Georgia', 'GS', '-5416-03632', '', '−02:00', '−02:00', '');
                INSERT INTO timezone VALUES ('Atlantic/St_Helena', 'SH', '-1555-00542', '', '+00:00', '+00:00', '');
                INSERT INTO timezone VALUES ('Atlantic/Stanley', 'FK', '-5142-05751', '', '−03:00', '−03:00', '');
                INSERT INTO timezone VALUES ('Australia/Adelaide', 'AU', '-3455+13835', 'South Australia', '+09:30', '+10:30', '');
                INSERT INTO timezone
                VALUES ('Australia/Brisbane', 'AU', '-2728+15302', 'Queensland - most locations', '+10:00', '+10:00', '');
                INSERT INTO timezone
                VALUES ('Australia/Broken_Hill', 'AU', '-3157+14127', 'New South Wales - Yancowinna', '+09:30', '+10:30', '');
                INSERT INTO timezone
                VALUES ('Australia/Currie', 'AU', '-3956+14352', 'Tasmania - King Island', '+10:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Australia/Darwin', 'AU', '-1228+13050', 'Northern Territory', '+09:30', '+09:30', '');
                INSERT INTO timezone
                VALUES ('Australia/Eucla', 'AU', '-3143+12852', 'Western Australia - Eucla area', '+08:45', '+08:45', '');
                INSERT INTO timezone
                VALUES ('Australia/Hobart', 'AU', '-4253+14719', 'Tasmania - most locations', '+10:00', '+11:00', '');
                INSERT INTO timezone
                VALUES ('Australia/Lindeman', 'AU', '-2016+14900', 'Queensland - Holiday Islands', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Australia/Lord_Howe', 'AU', '-3133+15905', 'Lord Howe Island', '+10:30', '+11:00', '');
                INSERT INTO timezone VALUES ('Australia/Melbourne', 'AU', '-3749+14458', 'Victoria', '+10:00', '+11:00', '');
                INSERT INTO timezone
                VALUES ('Australia/Perth', 'AU', '-3157+11551', 'Western Australia - most locations', '+08:00', '+08:00', '');
                INSERT INTO timezone
                VALUES ('Australia/Sydney', 'AU', '-3352+15113', 'New South Wales - most locations', '+10:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Europe/Amsterdam', 'NL', '+5222+00454', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Andorra', 'AD', '+4230+00131', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Athens', 'GR', '+3758+02343', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Belgrade', 'RS', '+4450+02030', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Berlin', 'DE', '+5230+01322', 'most locations', '+01:00', '+02:00',
                        'In 1945, the Trizone did not follow Berlin''s switch to DST, see Time in Germany');
                INSERT INTO timezone
                VALUES ('Europe/Bratislava', 'SK', '+4809+01707', '', '+01:00', '+02:00', 'Link to Europe/Prague');
                INSERT INTO timezone VALUES ('Europe/Brussels', 'BE', '+5050+00420', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Bucharest', 'RO', '+4426+02606', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Budapest', 'HU', '+4730+01905', '', '+01:00', '+02:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Busingen', 'DE', '+4742+00841', 'Busingen', '+01:00', '+02:00', 'Link to Europe/Zurich');
                INSERT INTO timezone VALUES ('Europe/Chisinau', 'MD', '+4700+02850', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Copenhagen', 'DK', '+5540+01235', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Dublin', 'IE', '+5320-00615', '', '+00:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Europe/Gibraltar', 'GI', '+3608-00521', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Guernsey', 'GG', '+4927-00232', '', '+00:00', '+01:00', 'Link to Europe/London');
                INSERT INTO timezone VALUES ('Europe/Helsinki', 'FI', '+6010+02458', '', '+02:00', '+03:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Isle_of_Man', 'IM', '+5409-00428', '', '+00:00', '+01:00', 'Link to Europe/London');
                INSERT INTO timezone VALUES ('Europe/Istanbul', 'TR', '+4101+02858', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Jersey', 'JE', '+4912-00207', '', '+00:00', '+01:00', 'Link to Europe/London');
                INSERT INTO timezone
                VALUES ('Europe/Kaliningrad', 'RU', '+5443+02030', 'Moscow-01 - Kaliningrad', '+02:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Kiev', 'UA', '+5026+03031', 'most locations', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Lisbon', 'PT', '+3843-00908', 'mainland', '+00:00', '+01:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Ljubljana', 'SI', '+4603+01431', '', '+01:00', '+02:00', 'Link to Europe/Belgrade');
                INSERT INTO timezone VALUES ('Europe/London', 'GB', '+513030-0000731', '', '+00:00', '+01:00', '');
                INSERT INTO timezone VALUES ('Europe/Luxembourg', 'LU', '+4936+00609', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Madrid', 'ES', '+4024-00341', 'mainland', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Malta', 'MT', '+3554+01431', '', '+01:00', '+02:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Mariehamn', 'AX', '+6006+01957', '', '+02:00', '+03:00', 'Link to Europe/Helsinki');
                INSERT INTO timezone VALUES ('Europe/Minsk', 'BY', '+5354+02734', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Monaco', 'MC', '+4342+00723', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Moscow', 'RU', '+5545+03735', 'Moscow+00 - west Russia', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Oslo', 'NO', '+5955+01045', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Paris', 'FR', '+4852+00220', '', '+01:00', '+02:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Podgorica', 'ME', '+4226+01916', '', '+01:00', '+02:00', 'Link to Europe/Belgrade');
                INSERT INTO timezone VALUES ('Europe/Prague', 'CZ', '+5005+01426', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Riga', 'LV', '+5657+02406', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Rome', 'IT', '+4154+01229', '', '+01:00', '+02:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Samara', 'RU', '+5312+05009', 'Moscow+01 - Samara, Udmurtia', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Europe/San_Marino', 'SM', '+4355+01228', '', '+01:00', '+02:00', 'Link to Europe/Rome');
                INSERT INTO timezone
                VALUES ('Europe/Sarajevo', 'BA', '+4352+01825', '', '+01:00', '+02:00', 'Link to Europe/Belgrade');
                INSERT INTO timezone VALUES ('Europe/Simferopol', 'RU', '+4457+03406', 'Moscow+00 - Crimea', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Skopje', 'MK', '+4159+02126', '', '+01:00', '+02:00', 'Link to Europe/Belgrade');
                INSERT INTO timezone VALUES ('Europe/Sofia', 'BG', '+4241+02319', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Stockholm', 'SE', '+5920+01803', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Tallinn', 'EE', '+5925+02445', '', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Tirane', 'AL', '+4120+01950', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Uzhgorod', 'UA', '+4837+02218', 'Ruthenia', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Vaduz', 'LI', '+4709+00931', '', '+01:00', '+02:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Vatican', 'VA', '+415408+0122711', '', '+01:00', '+02:00', 'Link to Europe/Rome');
                INSERT INTO timezone VALUES ('Europe/Vienna', 'AT', '+4813+01620', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Vilnius', 'LT', '+5441+02519', '', '+02:00', '+03:00', '');
                INSERT INTO timezone
                VALUES ('Europe/Volgograd', 'RU', '+4844+04425', 'Moscow+00 - Caspian Sea', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Warsaw', 'PL', '+5215+02100', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Europe/Zagreb', 'HR', '+4548+01558', '', '+01:00', '+02:00', 'Link to Europe/Belgrade');
                INSERT INTO timezone VALUES
                    ('Europe/Zaporozhye', 'UA', '+4750+03510', 'Zaporozh''ye, E Lugansk / Zaporizhia, E Luhansk', '+02:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Europe/Zurich', 'CH', '+4723+00832', '', '+01:00', '+02:00', '');
                INSERT INTO timezone VALUES ('Indian/Antananarivo', 'MG', '-1855+04731', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Indian/Chagos', 'IO', '-0720+07225', '', '+06:00', '+06:00', '');
                INSERT INTO timezone VALUES ('Indian/Christmas', 'CX', '-1025+10543', '', '+07:00', '+07:00', '');
                INSERT INTO timezone VALUES ('Indian/Cocos', 'CC', '-1210+09655', '', '+06:30', '+06:30', '');
                INSERT INTO timezone VALUES ('Indian/Comoro', 'KM', '-1141+04316', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Indian/Kerguelen', 'TF', '-492110+0701303', '', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Indian/Mahe', 'SC', '-0440+05528', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Indian/Maldives', 'MV', '+0410+07330', '', '+05:00', '+05:00', '');
                INSERT INTO timezone VALUES ('Indian/Mauritius', 'MU', '-2010+05730', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Indian/Mayotte', 'YT', '-1247+04514', '', '+03:00', '+03:00', '');
                INSERT INTO timezone VALUES ('Indian/Reunion', 'RE', '-2052+05528', '', '+04:00', '+04:00', '');
                INSERT INTO timezone VALUES ('Pacific/Apia', 'WS', '-1350-17144', '', '+13:00', '+14:00', '');
                INSERT INTO timezone VALUES ('Pacific/Auckland', 'NZ', '-3652+17446', 'most locations', '+12:00', '+13:00', '');
                INSERT INTO timezone VALUES ('Pacific/Chatham', 'NZ', '-4357-17633', 'Chatham Islands', '+12:45', '+13:45', '');
                INSERT INTO timezone VALUES ('Pacific/Chuuk', 'FM', '+0725+15147', 'Chuuk (Truk) and Yap', '+10:00', '+10:00', '');
                INSERT INTO timezone
                VALUES ('Pacific/Easter', 'CL', '-2709-10926', 'Easter Island & Sala y Gomez', '−06:00', '−05:00', '');
                INSERT INTO timezone VALUES ('Pacific/Efate', 'VU', '-1740+16825', '', '+11:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Enderbury', 'KI', '-0308-17105', 'Phoenix Islands', '+13:00', '+13:00', '');
                INSERT INTO timezone VALUES ('Pacific/Fakaofo', 'TK', '-0922-17114', '', '+13:00', '+13:00', '');
                INSERT INTO timezone VALUES ('Pacific/Fiji', 'FJ', '-1808+17825', '', '+12:00', '+13:00', '');
                INSERT INTO timezone VALUES ('Pacific/Funafuti', 'TV', '-0831+17913', '', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Pacific/Galapagos', 'EC', '-0054-08936', 'Galapagos Islands', '−06:00', '−06:00', '');
                INSERT INTO timezone VALUES ('Pacific/Gambier', 'PF', '-2308-13457', 'Gambier Islands', '−09:00', '−09:00', '');
                INSERT INTO timezone VALUES ('Pacific/Guadalcanal', 'SB', '-0932+16012', '', '+11:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Guam', 'GU', '+1328+14445', '', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Honolulu', 'US', '+211825-1575130', 'Hawaii', '−10:00', '−10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Johnston', 'UM', '+1645-16931', 'Johnston Atoll', '−10:00', '−10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Kiritimati', 'KI', '+0152-15720', 'Line Islands', '+14:00', '+14:00', '');
                INSERT INTO timezone VALUES ('Pacific/Kosrae', 'FM', '+0519+16259', 'Kosrae', '+11:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Kwajalein', 'MH', '+0905+16720', 'Kwajalein', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Pacific/Majuro', 'MH', '+0709+17112', 'most locations', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Pacific/Marquesas', 'PF', '-0900-13930', 'Marquesas Islands', '−09:30', '−09:30', '');
                INSERT INTO timezone VALUES ('Pacific/Midway', 'UM', '+2813-17722', 'Midway Islands', '−11:00', '−11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Nauru', 'NR', '-0031+16655', '', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Pacific/Niue', 'NU', '-1901-16955', '', '−11:00', '−11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Norfolk', 'NF', '-2903+16758', '', '+11:30', '+11:30', '');
                INSERT INTO timezone VALUES ('Pacific/Noumea', 'NC', '-2216+16627', '', '+11:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Pago_Pago', 'AS', '-1416-17042', '', '−11:00', '−11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Palau', 'PW', '+0720+13429', '', '+09:00', '+09:00', '');
                INSERT INTO timezone VALUES ('Pacific/Pitcairn', 'PN', '-2504-13005', '', '−08:00', '−08:00', '');
                INSERT INTO timezone VALUES ('Pacific/Pohnpei', 'FM', '+0658+15813', 'Pohnpei (Ponape)', '+11:00', '+11:00', '');
                INSERT INTO timezone VALUES ('Pacific/Port_Moresby', 'PG', '-0930+14710', '', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Rarotonga', 'CK', '-2114-15946', '', '−10:00', '−10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Saipan', 'MP', '+1512+14545', '', '+10:00', '+10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Tahiti', 'PF', '-1732-14934', 'Society Islands', '−10:00', '−10:00', '');
                INSERT INTO timezone VALUES ('Pacific/Tarawa', 'KI', '+0125+17300', 'Gilbert Islands', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Pacific/Tongatapu', 'TO', '-2110-17510', '', '+13:00', '+13:00', '');
                INSERT INTO timezone VALUES ('Pacific/Wake', 'UM', '+1917+16637', 'Wake Island', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('Pacific/Wallis', 'WF', '-1318-17610', '', '+12:00', '+12:00', '');
                INSERT INTO timezone VALUES ('UTC', '', '', '', '+00:00', '+00:00', '');";

        return DB::connection()->getPdo()->exec($sql);
    }
}
