<?php

class Surah {
    
    function __construct($_quran_file) {
        $quran_file = file_get_contents($_quran_file);
        $quran_json = json_decode($quran_file, true)["data"];
        $this->quran = $quran_json;
    }

    function getAllSurah() {
        $surah_list = [];
        foreach ($this->quran as $value) {
            unset($value["verses"]);
            unset($value["preBismillah"]);
            array_push($surah_list, $value);
        }
        return $surah_list;
    }

    function getSurah($_surah) {
        if ($_surah < 0 || $_surah > 114) {
            return;
        }
        $surah = $this->quran[$_surah - 1];
        return $surah;
    }
}