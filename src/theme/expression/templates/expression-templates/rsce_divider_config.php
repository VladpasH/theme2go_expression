<?php

return array(
	'label' => array(
		'en' => array('Divider, optional Headline', 'Creates a horizontal line to divide content elements'),
		'de' => array('Trennlinie, optionale Überschrift', 'Erzeugt eine horizontale Linie um Inhalte von einander zu trennen'),
	),
	'types' => array('content', 'module'),
	'standardFields' => array('cssID', 'headline', 'space'),
	'fields' => array(
		'align' => array(
			'label' => array(
				'en' => array('Alignment', ''),
				'de' => array('Ausrichtung', ''),
			),
			'inputType' => 'select',
			'options' => array(
				'',
				'align-left',
				'align-right',
			),
			'reference' => array(
			    '' => array('en' => 'centered', 'de' => 'Zentriert'),
				'align-left' => array('en' => 'left', 'de' => 'Links'),
				'align-right' => array('en' => 'right', 'de' => 'Rechts'),
			),
			'eval' => array('tl_class' => 'w50'),
		),
		'color' => array(
            'label' => array(
                'en' => array('Color', ''),
                'de' => array('Farbe', ''),
            ),
            'inputType' => 'select',
            'options' => array(
                'standard',
                'grey',
                'dark',
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
		'symbol' => array(
			'label' => array(
				'en' => array('Symbol', ''),
				'de' => array('Symbol', ''),
			),
			'inputType' => 'select',
			'options' => array(
                '',
                'circle',
                'square',
                'arrow',
                'diamond'
            ),
            'eval' => array('tl_class' => 'w50'),
		),
	),
);
