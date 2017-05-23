<?php

namespace App\Providers;

use Log;

class CustomValidator extends \Illuminate\Validation\Validator
{
    /**
     * カタカナチェック
     *
     * @param string $attribute キー
     * @param string $value 値
     * @param array $parameters
     * @return bool
     */
    public function validateKatakana( $attribute, $value, $parameters )
    {
        return preg_match( '/^[ァ-ヾ ]+$/u', $value );
    }

    /**
     * 半角英数チェック
     *
     * @param string $attribute キー
     * @param string $value 値
     * @param array $parameters
     * @return bool
     */
    public function validateAlnum( $attribute, $value, $parameters )
    {
        return preg_match( '/^[\_\+\-\!\$\%\&\*a-zA-Z0-9]+$/u', $value );
    }
}
