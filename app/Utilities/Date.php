<?php

namespace App\Utilities;
use DateTime;
class Date {
    public function isWeekend(){
        return (new DateTime)->format('N') >= 6;
    }
}