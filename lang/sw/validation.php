<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines contain the default error messages used by
    | the validator class. Some of these rules have multiple versions such
    | as the size rules. Feel free to tweak each of these messages here.
    |
    */

    'accepted' => 'The :attribute lazima iweliwe.',
    'accepted_if' => ':attribute lazima ikubalike wakati :other ni :value.',
    'active_url' => ':attribute sio URL halali.',
    'after' => ':attribute lazima iwe tarehe baada ya :date.',
    'after_or_equal' => ':attribute lazima iwe tarehe baada au sawa na :date.',
    'alpha' => ':attribute lazima iwe na herufi pekee.',
    'alpha_dash' => ':attribute lazima iwe na herufi, nambari, deshi na mistari tu.',
    'alpha_num' => ':attribute lazima iwe na herufi na nambari.',
    'array' => ':attribute lazima iwe safu.',
    'ascii' => ':attribute lazima iwe na herufi na alama za alphanumeric za baiti moja.',
    'before' => ':attribute lazima iwe tarehe kabla ya :date.',
    'before_or_equal' => ':attribute lazima iwe tarehe kabla au sawa na :date.',
    'between' => [
        'array' => ':attribute lazima iwe na kati ya vipengee :min na :max.',
        'file' => 'The :attribute must be between :min and :max kilobytes.',
        'numeric' => ':attribute lazima iwe kati ya :min na :max.',
        'string' => ':attribute lazima iwe kati ya vibambo :min na :max.',
    ],
    'boolean' => 'Sehemu ya :attribute lazima iwe kweli au si kweli.',
    'confirmed' => 'Uthibitisho wa :attribute haulingani.',
    'current_password' => 'Nenosiri si sahihi.',
    'date' => ':attribute sio tarehe halali.',
    'date_equals' => ':attribute lazima iwe tarehe sawa na :date.',
    'date_format' => ':attribute hailingani na umbizo la :format.',
    'decimal' => ':attribute lazima iwe na :decimal sehemu za desimali.',
    'declined' => ':attribute lazima ikataliwe.',
    'declined_if' => ':attribute lazima ikataliwe wakati :other ni :value.',
    'different' => ':attribute na :other lazima ziwe tofauti.',
    'digits' => ':attribute lazima iwe :tarakimu.',
    'digits_between' => ':attribute lazima iwe kati ya tarakimu :min na :max.',
    'dimensions' => ':attribute ina vipimo batili vya picha.',
    'distinct' => 'Sehemu ya :attribute ina thamani iliyorudiwa.',
    'doesnt_end_with' => ':attribute inaweza isiishie na mojawapo ya yafuatayo: :values.',
    'doesnt_start_with' => ':attribute inaweza isianze na mojawapo ya yafuatayo: :values.',
    'email' => ':sifa lazima iwe barua pepe halali.',
    'ends_with' => ':sifa lazima imalizike na mojawapo ya yafuatayo: :values.',
    'enum' => ':attribute iliyochaguliwa ni batili.',
    'exists' => ':attribute iliyochaguliwa ni batili.',
    'file' => ':attribute lazima iwe faili.',
    'filled' => 'Sehemu ya :attribute lazima iwe na thamani.',
    'gt' => [
        'array' => ':attribute lazima iwe na zaidi ya :value vya thamani.',
        'file' => ':attribute lazima iwe chini ya :value kilobaiti.',
        'numeric' => ':sifa lazima iwe chini ya :value.',
        'string' => ':sifa lazima iwe chini ya vibambo :value.',
    ],
    'gte' => [
        'array' => ':sifa lazima iwe na :vipengee vya thamani au zaidi.',
        'file' => ':sifa lazima iwe kubwa kuliko au sawa na :value kilobaiti.',
        'numeric' => ':sifa lazima iwe kubwa kuliko au sawa na :value.',
        'string' => ':sifa lazima iwe kubwa kuliko au sawa na vibambo :value.',
    ],
    'image' => ':sifa lazima iwe picha.',
    'in' => ':attribute iliyochaguliwa ni batili.',
    'in_array' => 'Sehemu ya :attribute haipo katika :other.',
    'integer' => ':sifa lazima iwe nambari kamili.',
    'ip' => ':attribute lazima iwe ni anwani halali ya IP.',
    'ipv4' => ':attribute lazima iwe anwani halali ya IPv4.',
    'ipv6' => ':attribute lazima iwe anwani halali ya IPv6.',
    'json' => 'Lazima :attribute iwe ni mfuatano halali wa JSON.',
    'lowcase' => ':attribute lazima iwe herufi ndogo.',
    'lt' => [
        'array' => ':attribute lazima iwe na chini ya :value vya thamani.',
        'file' => ':sifa lazima iwe chini ya :value kilobaiti.',
        'numeric' => ':sifa lazima iwe chini ya :value.',
        'string' => ':sifa lazima iwe chini ya vibambo :value.',
    ],
    'lte' => [
        'array' => ':sifa lazima isiwe na zaidi ya vipengee :value.',
        'file' => ':sifa lazima iwe chini ya au sawa na :value kilobaiti.',
        'numeric' => ':sifa lazima iwe chini ya au sawa na :value.',
        'string' => ':sifa lazima iwe chini ya au sawa na vibambo :value.',
    ],
    'mac_address' => ':sifa lazima iwe anwani halali ya MAC.',
    'max' => [
        'array' => ':sifa lazima isiwe na zaidi ya vipengee :max.',
        'file' => ':sifa lazima isiwe kubwa kuliko :max kilobaiti.',
        'numeric' => ':sifa lazima isiwe kubwa kuliko :max.',
        'string' => ':sifa lazima isiwe kubwa kuliko herufi :max.',
    ],
    'max_digits' => ':sifa lazima isiwe na zaidi ya tarakimu :max.',
    'mimes' => ':attribute lazima iwe faili ya types: :values.',
    'mimetypes' => ':attribute lazima iwe faili ya types: :values.',
    'min' => [
        'array' => ':attribute lazima iwe faili ya type: :values.',
        'file' => ':sifa lazima iwe angalau :min kilobaiti.',
        'numeric' => ':sifa lazima iwe angalau :min.',
        'string' => ':sifa lazima iwe angalau vibambo :min.',
    ],
    'min_digits' => ':sifa lazima iwe na angalau tarakimu :min.',
    'missing' => 'Sehemu ya :attribute lazima ikosekana.',
    'missing_if' => 'Sehemu ya :attribute lazima ikosekana wakati :other ni :value.',
    'missing_unless' => 'Sehemu ya :attribute lazima ikosekana isipokuwa :other ni :value.',
    'missing_with' => 'Sehemu ya :attribute lazima ikosekana wakati :values ipo.',
    'missing_with_all' => 'Sehemu ya :attribute lazima ikosekana wakati :values zipo.',
    'multiple_of' => ':sifa lazima iwe mseto wa :value.',
    'not_in' => ':attribute iliyochaguliwa ni batili.',
    'not_regex' => 'Umbizo la :attribute ni batili.',
    'numeric' => ':sifa lazima iwe nambari.',
    'password' => [
        'letters' => ':sifa lazima iwe na angalau herufi moja.',
        'mixed' => ':sifa lazima iwe na angalau herufi moja kubwa na ndogo moja.',
        'numbers' => ':sifa lazima iwe na angalau nambari moja.',
        'symbols' => ':sifa lazima iwe na angalau ishara moja.',
        'uncompromised' => ':attribute iliyotolewa imeonekana katika uvujaji wa data. Tafadhali chagua :sifa tofauti.',
    ],
    'present' => 'Sehemu ya :attribute lazima iwepo.',
    'prohibited' => 'Sehemu ya :attribute hairuhusiwi.',
    'prohibited_if' => 'Sehemu ya :attribute hairuhusiwi wakati :other ni :value.',
    'prohibited_unless' => 'Sehemu ya :attribute hairuhusiwi isipokuwa :other iko katika :values.',
    'prohibits' => 'Sehemu ya :attribute inakataza :other kuwepo.',
    'regex' => 'Umbizo la :attribute ni batili.',
    'required' => 'Sehemu ya :attribute inahitajika.',
    'required_array_keys' => 'Sehemu ya :attribute lazima iwe na maingizo for: :values.',
    'required_if' => 'Sehemu ya :attribute inahitajika wakati :other ni :value.',
    'required_if_accepted' => 'Sehemu ya :attribute inahitajika wakati :other inakubaliwa.',
    'required_unless' => 'Sehemu ya :attribute inahitajika isipokuwa :other iko katika :values.',
    'required_with' => 'Sehemu ya :attribute inahitajika wakati :values ipo.',
    'required_with_all' => 'Sehemu ya :attribute inahitajika wakati :values zipo.',
    'required_without' => 'Sehemu ya :attribute inahitajika wakati :values haipo.',
    'required_without_all' => 'Sehemu ya :attribute inahitajika wakati hakuna :values yoyote iliyopo.',
    'same' => ':sifa na :other lazima zilingane.',
    'size' => [
        'array' => ':sifa lazima iwe na :size vya ukubwa.',
        'file' => ':sifa lazima iwe :size kilobaiti.',
        'numeric' => ':sifa lazima iwe :size.',
        'string' => ':sifa lazima iwe vibambo :size.',
    ],
    'starts_with' => ':sifa lazima ianze na mojawapo ya following: :values.',
    'string' => ':sifa lazima iwe kamba.',
    'timezone' => ':sifa lazima iwe saa za eneo halali.',
    'unique' => ':sifa tayari imechukuliwa.',
    'uploaded' => ':sifa imeshindwa kupakiwa.',
    'uppercase' => ':sifa lazima iwe herufi kubwa.',
    'url' => ':sifa lazima iwe herufi kubwa.',
    'ulid' => ':sifa lazima iwe ULID halali.',
    'uuid' => ':sifa lazima iwe UUID halali.',

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Language Lines
    |--------------------------------------------------------------------------
    |
    | Here you may specify custom validation messages for attributes using the
    | convention "attribute.rule" to name the lines. This makes it quick to
    | specify a specific custom language line for a given attribute rule.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'custom-message',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Validation Attributes
    |--------------------------------------------------------------------------
    |
    | The following language lines are used to swap our attribute placeholder
    | with something more reader friendly such as "E-Mail Address" instead
    | of "email". This simply helps us make our message more expressive.
    |
    */

    'attributes' => [],

];
