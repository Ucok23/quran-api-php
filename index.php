<?php

require "./model/surah.php";

$surah = new Surah("data/quran.json");

print_r($surah->getSurah(114));