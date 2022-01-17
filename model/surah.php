<?php

class Surah {  
    function __construct($_quran_file) {
        $quran_file = file_get_contents($_quran_file);
        $quran_json = json_decode($quran_file, true)["data"];
        $this->quran = $quran_json;
    }

    function _checkSurah($_surah) {
        if ($_surah < 1 || $_surah > 114) {
            return false;
        }
    }

    function _checkAyah($_surah, $_ayah) {
        if ($_ayah < 0 || $_ayah > $this->quran[$_surah]["numberOfVerses"]) {
            return false;
        }
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
        $this->_checkSurah($_surah);
        $surah = $this->quran[$_surah - 1];
        return $surah;
    }

    function getAyahFromSurah($_surah, $_ayah) {
        $surah = $this->getSurah($_surah);
        $this->_checkAyah($surah, $_ayah);
        $ayah = $surah["verses"][$_ayah - 1];
        return $ayah;
    }
}