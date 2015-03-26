<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| The following language lines contain the default error messages used by
	| the validator class. Some of these rules have multiple versions such
	| such as the size rules. Feel free to tweak each of these messages.
	|
	*/

	"accepted"              => "Das Feld :attribute muss akzeptiert werden.",
	"active_url"            => "Das Feld :attribute ist keine gültige URL.",
	"after"                 => "Das Feld :attribute muss ein Datum nach :date enthalten.",
	"alpha"                 => "Das Feld :attribute darf nur Buchstaben enthalten.",
	"alpha_dash"            => "Das Feld :attribute darf nur Buchstaben, Zahlen und Bindestriche enthalten.",
	"alpha_num"             => "Das Feld :attribute darf nur Buchstaben und Zahlen enthalten.",
	"before"                => "Das Feld :attribute muss ein Datum vor :date enthalten.",
	"between"               => array(
		"numeric" => "The :attribute must be between :min - :max.",
		"file"    => "The :attribute must be between :min - :max kilobytes.",
		"string"  => "The :attribute must be between :min - :max characters.",
	),
	"confirmed"             => "Die :attribute Bestätigung stimmt nicht überein.",
	"date"                  => "Das Feld :attribute enthält kein gültiges Datum.",
	"date_format"           => "The :attribute does not match the format :format.",
	"different"             => "The :attribute and :other must be different.",
	"digits"                => "Das Feld :attribute muss :digits Zeichen enthalten.",
	"digits_between"        => "Das Feld :attribute muss zwischen :min und :max Zeichen enthalten",
	"email"                 => "Das Feld :attribute enthält keine gültige E-Mail-Adresse.",
	"exists"                => "The selected :attribute is invalid.",
	"image"                 => "Das :attribute muss ein gültiges Bildformat enthalten.",
	"in"                    => "The selected :attribute is invalid.",
	"integer"               => "Das Feld :attribute muss eine ganze Zahl enthalten.",
	"ip"                    => "The :attribute must be a valid IP address.",
	"max"                   => array(
		"numeric" => "The :attribute may not be greater than :max.",
		"file"    => "The :attribute may not be greater than :max kilobytes.",
		"string"  => "The :attribute may not be greater than :max characters.",
	),
	"mimes"                 => "Das Feld :attribute muss eine Datei der folgenden Typen enthalten: :values.",
	"min"                   => array(
		"numeric" => "Das Feld :attribute muss mindestens :min sein.",
		"file"    => "The :attribute must be at least :min kilobytes.",
		"string"  => "The :attribute must be at least :min characters.",
	),
	"not_in"                => "The selected :attribute is invalid.",
	"numeric"               => "Das Feldes :attribute darf nur Zahlen enthalten.",
	"regex"                 => "The :attribute format is invalid.",
	"required"              => "Das Feld :attribute ist ein Pflichtfeld.",
	"required_if"           => "Das Feld :attribute ist ein Pflichtfeld, wenn :other den Wert :value hat.",
	"required_with"         => "The :attribute field is required when :values is present.",
	"required_without"      => "Das Feld :attribute ist ein Pflichtfeld, wenn :values nicht ausgefüllt wurde.",
	"same"                  => "The :attribute and :other must match.",
	"size"                  => array(
		"numeric" => "The :attribute must be :size.",
		"file"    => "The :attribute must be :size kilobytes.",
		"string"  => "The :attribute must be :size characters.",
	),
	"unique"                => ":attribute ist bereits belegt.",
	"url"                   => "Das Feld :attribute muss eine gültige URL enthalten.",
	"required_if_attribute" => "Das Feld :attribute ist ein Pflichtfeld.",
	'end_time'              => 'Das Feld :attribute muss ein späteres Datum enthalten.',
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

	'custom' => array(
		'text'                     => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine weiche Voraussetzung gewählt ist.'
		),
		'kpi_id'                   => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine harte Voraussetzung gewählt ist.'
		),
		'hard_value_min'           => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine harte Voraussetzung gewählt ist.'
		),
		'hard_value_max'           => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine harte Voraussetzung gewählt ist.'
		),
		'runtime_from'             => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine Einmalkampagne gewählt ist.'
		),
		'runtime_until'            => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine Einmalkampagne gewählt ist.',
		),
		'description_cancellation' => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn eine Dauerkampagne gewählt ist.'
		),
		'width'                    => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn ein neues Layout erstellt wird.'
		),
		'height'                   => array(
			'required_if' => 'Das Feld :attribute ist ein Pflichtfeld, wenn ein neues Layout erstellt wird.'
		),
		'recommended_duration_max' => array(
			'duration' => 'Die Laufzeit ist ungültig.'
		),
		'price'                    => array(
			'price' => 'Das Feld :attribute enthält keinen gültigen Preis'
		)

	),
	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| The following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	*/

	'attributes'       => array(
		"first_name"        => "Vorname",
		"last_name"         => "Nachname",
		"email"             => "E-Mail-Adresse",
		"address"           => "Adresse",
		"postal"            => "Postleitzahl",
		"city"              => "Ort",
		"phone"             => "Telefon",
		"birthday"          => "Geburtstag",
		"privacy_agreement" => "Datenschutzerklärung",
		"comment"           => "Kommentar",
		"file"              => "Bild",
		"message"           => "Kommentar",
		"name"              => "Name des Fahrzeugs",
		"model"             => "Fahrzeugmodell",
		"color"             => "Fahrzeugfarbe",
		"invitation"        => "Einladungsspruch",
		"service_reason"    => "Servicegrund",
		"title" => "Titel",
		"description" => "Beschreibung",
		"image" => "Bild",
	),

);
