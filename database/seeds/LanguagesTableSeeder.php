<?php

use App\Language;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class LanguagesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $languages = [
            'Afar',
            'Abkhaz',
            'Avestan',
            'Afrikaans',
            'Akan',
            'Amharic',
            'Aragonese',
            'Arabic',
            'Assamese',
            'Avaric',
            'Aymara',
            'Azerbaijani',
            'South Azerbaijani',
            'Bashkir',
            'Belarusian',
            'Bulgarian',
            'Bihari',
            'Bislama',
            'Bambara',
            'Bengali; Bangla',
            'Tibetan Standard, Tibetan, Central',
            'Breton',
            'Bosnian',
            'Catalan; Valencian',
            'Chechen',
            'Chamorro',
            'Corsican',
            'Cree',
            'Czech',
            'Old Church Slavonic, Church Slavonic, Old Bulgarian',
            'Chuvash',
            'Welsh',
            'Danish',
            'German',
            'Divehi; Dhivehi; Maldivian;',
            'Dzongkha',
            'Ewe',
            'Greek, Modern',
            'English',
            'Esperanto',
            'Spanish; Castilian',
            'Estonian',
            'Basque',
            'Persian (Farsi)',
            'Fula; Fulah; Pulaar; Pular',
            'Finnish',
            'Fijian',
            'Faroese',
            'French',
            'Western Frisian',
            'Irish',
            'Scottish Gaelic; Gaelic',
            'Galician',
            'GuaranÃ­',
            'Gujarati',
            'Manx',
            'Hausa',
            'Hebrew (modern)',
            'Hindi',
            'Hiri Motu',
            'Croatian',
            'Haitian; Haitian Creole',
            'Hungarian',
            'Armenian',
            'Herero',
            'Interlingua',
            'Indonesian',
            'Interlingue',
            'Igbo',
            'Nuosu',
            'Inupiaq',
            'Ido',
            'Icelandic',
            'Italian',
            'Inuktitut',
            'Japanese',
            'Javanese',
            'Georgian',
            'Kongo',
            'Kikuyu, Gikuyu',
            'Kwanyama, Kuanyama',
            'Kazakh',
            'Kalaallisut, Greenlandic',
            'Khmer',
            'Kannada',
            'Korean',
            'Kanuri',
            'Kashmiri',
            'Kurdish',
            'Komi',
            'Cornish',
            'Kyrgyz',
            'Latin',
            'Luxembourgish, Letzeburgesch',
            'Ganda',
            'Limburgish, Limburgan, Limburger',
            'Lingala',
            'Lao',
            'Lithuanian',
            'Luba-Katanga',
            'Latvian',
            'Malagasy',
            'Marshallese',
            'MÄori',
            'Macedonian',
            'Malayalam',
            'Mongolian',
            'Marathi (MarÄá¹­hÄ«)',
            'Malay',
            'Maltese',
            'Burmese',
            'Nauru',
            'Norwegian BokmÃ¥l',
            'North Ndebele',
            'Nepali',
            'Ndonga',
            'Dutch',
            'Norwegian Nynorsk',
            'Norwegian',
            'South Ndebele',
            'Navajo, Navaho',
            'Chichewa; Chewa; Nyanja',
            'Occitan',
            'Ojibwe, Ojibwa',
            'Oromo',
            'Oriya',
            'Ossetian, Ossetic',
            'Panjabi, Punjabi',
            'PÄli',
            'Polish',
            'Pashto, Pushto',
            'Portuguese',
            'Quechua',
            'Romansh',
            'Kirundi',
            'Romanian',
            'Russian',
            'Kinyarwanda',
            'Sanskrit (Saá¹ská¹›ta)',
            'Sardinian',
            'Sindhi',
            'Northern Sami',
            'Sango',
            'Sinhala, Sinhalese',
            'Slovak',
            'Slovene',
            'Samoan',
            'Shona',
            'Somali',
            'Albanian',
            'Serbian',
            'Swati',
            'Southern Sotho',
            'Sundanese',
            'Swedish',
            'Swahili',
            'Tamil',
            'Telugu',
            'Tajik',
            'Thai',
            'Tigrinya',
            'Turkmen',
            'Tagalog',
            'Tswana',
            'Tonga (Tonga Islands)',
            'Turkish',
            'Tsonga',
            'Tatar',
            'Twi',
            'Tahitian',
            'Uyghur, Uighur',
            'Ukrainian',
            'Urdu',
            'Uzbek',
            'Venda',
            'Vietnamese',
            'VolapÃ¼k',
            'Walloon',
            'Wolof',
            'Xhosa',
            'Yiddish',
            'Yoruba',
            'Zhuang, Chuang',
            'Chinese'
        ];
        $language = Language::where('name', $languages[0])->first();
        if ($language === null) {
            foreach($languages as $language) {
                Language::create(array(
                    'name' => $language
                ));
            }

        }

    }
}
