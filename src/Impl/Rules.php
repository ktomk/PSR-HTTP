<?php

namespace Impl;

class Rules
{
    /**
     * @param $string
     * @return bool
     */
    public function isToken($string) {
        $pattern = '(
            (?(DEFINE)
                 (?<token>          # 1*<any CHAR except CTLs or separators>

                    [^\\0-\\x20\\x7f-\\xff()<>@,;:\\\\"/[\\]?={}]+
                )
            )
            ^ (?&token) $
        )x';
        return $this->isPattern($pattern, $string);
    }

    public function isFieldValue($string) {
        $pattern = '(
            (?(DEFINE)
                (?<LWS> \r\n [ \t]+ )

                (?<token>          # 1*<any CHAR except CTLs or separators>

                    [^\\0-\\x20\\x7f-\\xff()<>@,;:\\\\"/[\\]?={}]+
                )

                (?<separator> [()<>@,;:\\\\"/[\\]?={} \t] )

                (?<TEXT>            # <any OCTET except CTLs, but including LWS>

                    [^\0-\x1F\x7F]+ | (?&LWS)+
                )

                (?<qdtext>          # <any TEXT except <">>

                    [^\0-\x1F"\x7F]+? | (?&LWS)+?
                )

                (?<quoted_pair>     # "\" CHAR

                    \\\\ [\0-\x7F]
                )

                (?<quoted_string>   # ( <"> *(qdtext | quoted-pair ) <"> )

                    " ( (?&qdtext) | (?&quoted_pair) )* "
                )

                (?<field_content>   # <the OCTETs making up the field-value and consisting of either
                                    #  *TEXT or combinations of token, separators, and quoted-string>

                    (?&TEXT)* | ( (?&token) | (?&separator) | (?&quoted_string) )+
                )
            )
            ^ ( ( (?&TEXT)* | ( (?&token) | (?&separator) | (?&quoted_string) )+ ) | (?&LWS) )* $
        )x';
        return $this->isPattern($pattern, $string);
    }

    private function isPattern($pattern, $string) {
        $result = preg_match($pattern, $string);
        return (bool) $result;
    }
}
