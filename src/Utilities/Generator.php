<?php 

namespace Steelblade\Utilities;

/**
 * This is a very simple class designed to generate IDs, keys, etc.
 * 
 * 
 * @author Benjamin Clarke <mastersteelblade@protonmail.com>
 */

    class Generator {
      public static function fingerprint() {
         $uuid = Ramsey\Uuid\Uuid::uuid4();
         return $uuid->toString();
      }

      public static function randomstring($length = 32) {
         $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
         $charactersLength = strlen($characters);
         $randomString = '';
         for ($i = 0; $i < $length; $i++) {
             $randomString .= $characters[rand(0, $charactersLength - 1)];
         }
         return $randomString;
      }

      public static function sessionID() {
         return bin2hex(random_bytes(32));
      }

      public static function base32Key($secretLength = 16) {
         $validChars = array(
            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', //  7
            'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', // 15
            'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', // 23
            'Y', 'Z', '2', '3', '4', '5', '6', '7', // 31
            '=',  // padding char
        );
        // Valid secret lengths are 80 to 640 bits
         if ($secretLength < 16 || $secretLength > 128) {
            throw new Exception('Bad secret length');
         }
         $secret = '';
         $rnd = false;
         if (function_exists('random_bytes')) {
            $rnd = random_bytes($secretLength);
         } elseif (function_exists('openssl_random_pseudo_bytes')) {
            $rnd = openssl_random_pseudo_bytes($secretLength, $cryptoStrong);
            if (!$cryptoStrong) {
               $rnd = false;
            }
         }
         if ($rnd !== false) {
            for ($i = 0; $i < $secretLength; ++$i) {
               $secret .= $validChars[ord($rnd[$i]) & 31];
            }
         } else {
            throw new Exception('No source of secure random');
         }
         return $secret;
      }
   }