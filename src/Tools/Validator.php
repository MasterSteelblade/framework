<?php 

namespace Steelblade\Tools;

/**
 * Class to provide basic validation of things. 
 */

 class Validator {

    public static function colour(string $input):bool {
        if (preg_match('/^[A-Fa-f0-9]{6}$/', $input) !== 0) {
            $matched = true;
        } else {
            $matched = false;
        }
        return $matched;
    }

    /** For the Americans. */
    public static function color(string $input):bool {
        return self::colour($input);
    }

    public static function username(string $input, array $restricted = array()):bool {
        if (preg_match('/^[-a-zA-Z0-9_]+$/', $input) !== 0) {
            $matched = true;
        } else {
            $matched = false;
        }
        return $matched;
    }

    public static function email(string $email):bool {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $matched = true;
        } else {
            $matched = false;
        }
        return $matched;
    }
 }
