<?php

namespace business {

    /**
     * Description of Response
     *
     * @author albertord
     */
    class ErrorCodes {

        const EMAIL_NOT_FOUND = 1;
        const WRONG_PASSWORD = 2;
        const EMAIL_ALREADY_EXIST = 3;
        const CLIENT_DATA_NOT_FOUND = 4;
        const DB_ERROR = 5;
        const CLIENT_ID_NOT_FOUND = 6;

        public static $Messages = array(
            ErrorCodes::EMAIL_NOT_FOUND => "Email não encontrado",
            ErrorCodes::WRONG_PASSWORD => "O password não coiside para o email informado",
            ErrorCodes::EMAIL_ALREADY_EXIST => "O email informado ja existe",
            ErrorCodes::CLIENT_DATA_NOT_FOUND => "Os dados do cliente não foram encontrados",
            ErrorCodes::CLIENT_ID_NOT_FOUND => "Id de cliente não encontrado",
            ErrorCodes::DB_ERROR => "Database error"
        );

        public function __construct() {
            //$Messages[$this::EMAIL_NOT_FOUND] = "Email n\~ao encontrado";
            //$Messages[$this::WRON_PASSWORD] = "O password n\~ao coiside para o email informado";
        }

        static public function Defines($const) {
            $cls = new ReflectionClass(__CLASS__);
            foreach ($cls->getConstants() as $key => $value) {
                if ($value == $const) {
                    return true;
                }
            }

            return false;
        }

        static function getException(int $code) {
            $ex = new \Exception(ErrorCodes::$Messages[$code], $code);
            return $ex;
        }

    }

}
