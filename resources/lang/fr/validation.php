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

  'accepted' => 'Le champ :attribute must be accepted.',
  'accepted_if' => 'Le champ :attribute must be accepted when :other is :value.',
  'active_url' => 'Le champ :attribute is not a valid URL.',
  'after' => 'Champs :attribute doit être postérieure à maintenant.',
  'after_or_equal' => 'Champs :attribute doit être une date postérieure ou égale à :date.',
  'alpha' => 'Le champ :attribute must only contain letters.',
  'alpha_dash' => 'Le champ :attribute must only contain letters, numbers, dashes and underscores.',
  'alpha_num' => 'Le champ :attribute must only contain letters and numbers.',
  'array' => 'Le champ :attribute must be an array.',
  'before' => 'Le champ :attribute doit être une date avant :date.',
  'before_or_equal' => 'Le champ :attribute être une date avant ou égale à :date.',
  'between' => [
    'numeric' => 'Le champ :attribute doit être entre :min and :max.',
    'file' => 'Le champ :attribute doit être entre :min and :max kilobytes.',
    'string' => 'Le champ :attribute doit être entre :min and :max characters.',
    'array' => 'Le champ :attribute doit avoir entre :min and :max items.',
  ],
  'boolean' => 'Le champ :attribute field must be true or false.',
  'confirmed' => 'La confirmation ne correspond pas.',
  'current_password' => 'Le mot de passe est incorrect.',
  'date' => 'Champs :attribute Ce n\'est pas une date valide.',
  'date_equals' => 'Le champ :attribute must be a date equal to :date.',
  'date_format' => 'Le champ :attribute does not match the format :format.',
  'declined' => 'Le champ :attribute must be declined.',
  'declined_if' => 'Le champ :attribute must be declined when :other is :value.',
  'different' => 'Le champ :attribute and :other must be different.',
  'digits' => 'Le champ :attribute must be :digits digits.',
  'digits_between' => 'Le champ :attribute doit être entre :min and :max digits.',
  'dimensions' => 'dimensions de l\'image invalide  .',
  'distinct' => 'Le champ :attribute field has a duplicate value.',
  'email' => 'Le champ :attribute doit être une adresse e-mail valide.',
  'ends_with' => 'Le champ :attribute must end with one of the following: :values.',
  'enum' => 'Le champ selected :attribute is invalid.',
  'exists' => 'Le champ selected :attribute is invalid.',
  'file' => 'fichier requis.',
  'filled' => 'Le champ :attribute field must have a value.',
  'gt' => [
    'numeric' => 'Le champ :attribute doit être supérieur à :value.',
    'file' => 'Le champ :attribute doit être supérieur à :value kilobytes.',
    'string' => 'Champs :attribute doit être supérieur à :value characters.',
    'array' => 'Le champ :attribute must have more than :value items.',
  ],
  'gte' => [
    'numeric' => 'Le champ :attribute doit être supérieur à or equal to :value.',
    'file' => 'Le champ :attribute doit être supérieur à or equal to :value kilobytes.',
    'string' => 'Le champ :attribute doit être supérieur à or equal to :value characters.',
    'array' => 'Le champ :attribute must have :value items or more.',
  ],
  'image' => 'Ce champs doit etre image.',
  'in' => 'Le champ selected :attribute is invalid.',
  'in_array' => 'Le champ :attribute le champ n\'existe pas dans :other.',
  'integer' => 'Ce champs est entier.',
  'ip' => 'Le champ :attribute doit être une adresse IP valide.',
  'ipv4' => 'Le champ :attribute must be a valid IPv4 address.',
  'ipv6' => 'Le champ :attribute must be a valid IPv6 address.',
  'json' => 'Le champ :attribute must be a valid JSON string.',
  'lt' => [
    'numeric' => 'Le champ :attribute must be less than :value.',
    'file' => 'Le champ :attribute must be less than :value kilobytes.',
    'string' => 'Le champ :attribute must be less than :value characters.',
    'array' => 'Le champ :attribute must have less than :value items.',
  ],
  'lte' => [
    'numeric' => 'Le champ :attribute must be less than or equal to :value.',
    'file' => 'Le champ :attribute must be less than or equal to :value kilobytes.',
    'string' => 'Le champ :attribute must be less than or equal to :value characters.',
    'array' => 'Le champ :attribute must not have more than :value items.',
  ],
  'mac_address' => 'Le champ :attribute must be a valid MAC address.',
  'max' => [
    'numeric' => 'pas supérieur à :max.',
    'file' => 'pas supérieur à :max kilobytes.',
    'string' => 'pas supérieur à :max characters.',
    'array' => 'Le champ :attribute must not have more than :max items.',
  ],
  'mimes' => 'Le fichier doit etre de type :values.',
  'mimetypes' => 'Le fichier doit etre de type :values.',
  'min' => [
    'numeric' => 'Ce champs doit etre un nombre de caractere minimum :min.',
    'file' => 'Doit être au moins :min kilobytes.',
    'string' => 'Doit être au moins :min characteres.',
    'array' => 'Doit avoir au moins :min items.',
  ],
  'multiple_of' => 'Le champ :attribute must be a multiple of :value.',
  'not_in' => 'Le champ selected :attribute is invalid.',
  'not_regex' => 'Le champ :attribute format is invalid.',
  'numeric' => 'Ce champs doit etre un nombre.',
  'password' => 'Verifiez le mot de passe.',
  'present' => 'Le champ :attribute field must be present.',
  'prohibited' => 'Le champ :attribute field is prohibited.',
  'prohibited_if' => 'Le champ :attribute field is prohibited when :other is :value.',
  'prohibited_unless' => 'Le champ :attribute field is prohibited unless :other is in :values.',
  'prohibits' => 'Le champ :attribute field prohibits :other from being present.',
  'regex' => 'Le format est invalide.',
  'required' => 'Ce  champs est requis.',
  'required_array_keys' => 'Le champ :attribute field must contain entries for: :values.',
  'required_if' => 'Champs :attribute est obligatoire quand champs :other vaut :value.',
  'required_unless' => 'Le champ :attribute field is required unless :other is in :values.',
  'required_with' => 'Le champ :attribute field is required when :values is present.',
  'required_with_all' => 'Le champ :attribute field is required when :values are present.',
  'required_without' => 'Le champ :attribute field is required when :values is not present.',
  'required_without_all' => 'Le champ :attribute field is required when none of :values are present.',
  'same' => 'Le champ :attribute et :other doivent être identique.',
  'size' => [
    'numeric' => 'Ce champs doit etre un nombre de taille :size.',
    'file' => 'Ce champs doit etre un fichier de taille :size kilobytes.',
    'string' => 'Le champ :attribute must be :size characters.',
    'array' => 'Ce tableau doit contenir :size items.',
  ],
  'starts_with' => 'Le champ :attribute must start with one of the following: :values.',
  'string' => 'Champs :attribute doit être une chaîne.',
  'timezone' => 'Le champ :attribute must be a valid timezone.',
  'unique' => 'Saisie invalide.',
  'uploaded' => 'Téléchargement échoué.',
  'url' => 'Le champ :attribute must be a valid URL.',
  'uuid' => 'Le champ :attribute must be a valid UUID.',
  'photo' => "Le fichier de type 'jpg,png' exigé pour le champ :attribute",
  '1an' => "Le champ :attribute doit être égal à 1 an!",
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