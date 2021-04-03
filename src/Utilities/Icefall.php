<?php 

namespace Steelblade\Utilities;

/**
 * Get an Icefall snowflake from the server configured at $_ENV['ICEFALL']
 * 
 * 
 * @author Benjamin Clarke <mastersteelblade@protonmail.com>
 */

    class Icefall {
        public static function get() {
            $icefall = file_get_contents($_ENV['ICEFALL'].'/plain');
            $snowflake = intval($icefall);
            return $snowflake;
        }
    }