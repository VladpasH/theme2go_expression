<?php

return array(
    'label' => array(
      'en' => array('Banner', 'Creats a banner with an image and optional text'),
      'de' => array('Banner', 'Erzeugt einen Banner mit einem Bild und optionalen Text'),
    ),
    'types' => array('content', 'module'),
    'standardFields' => array('cssID'),
    'fields' => array(
        array(
            'inputType' => 'group',
            'label' => array(
                'en' => array('Image'),
                'de' => array('Bild'),
            ),
        ),
        'backgroundImage' => array(
            'label' => array(
                'en' => array('Banner image', 'Choose an image to show in the banner.'),
                'de' => array('Banner-Bild', 'Wählen Sie ein Bild für das Banner.'),
            ),
            'inputType' => 'fileTree',
            'eval' => array(
                'tl_class' => 'clr',
                'multiple' => true,
                'fieldType' => 'checkbox',
                'filesOnly' => true,
            ),
        ),
        'backgroundSize' => array(
            'label' => array(
                'en' => array('Background image size', ''),
                'de' => array('Hintergrundbildgröße', ''),
            ),
            'inputType' => 'select',
            'options' => array(
                'cover',
                '',
                '100% auto',
                'auto auto',
            ),
            'reference' => array(
                'cover' => array('en' => 'Cover', 'de' => 'Längste Seite'),
                '' => array('en' => 'Trimmed', 'de' => 'Beschnitten'),
                '100% auto' => array('en' => 'Proportional to width', 'de' => 'Proportional zur Breite'),
                'auto auto' => array('en' => 'Original', 'de' => 'Originalgröße'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        'backgroundPosition' => array(
            'label' => array(
                'en' => array('Background position', 'Adjust the visible part of the picture'),
                'de' => array('Hintergrundposition', 'Den sichtbaren Teil des Bildes einstellen.'),
        ),
        'inputType' => 'select',
            'options' => array(
                '0 0',
                '50% 0',
                '100% 0',
                '0 50%',
                '50% 50%',
                '100% 50%',
                '0 100%',
                '50% 100%',
                '100% 100%',
            ),
            'reference' => array(
                '0 0' => array('en' => 'Left | Top', 'de' => 'Links | Oben'),
                '50% 0' => array('en' => 'Center | Top', 'de' => 'Mitte | Oben'),
                '100% 0' => array('en' => 'Right | Top', 'de' => 'Rechts | Oben'),
                '0 50%' => array('en' => 'Left | Center', 'de' => 'Links | Mitte'),
                '50% 50%' => array('en' => 'Center | Center', 'de' => 'Mitte | Mitte'),
                '100% 50%' => array('en' => 'Right | Center', 'de' => 'Rechts | Mitte'),
                '0 100%' => array('en' => 'Left | Bottom', 'de' => 'Links | Unten'),
                '50% 100%' => array('en' => 'Center | Bottom', 'de' => 'Mitte | Unten'),
                '100% 100%' => array('en' => 'Right | Bottom', 'de' => 'Rechts | Unten'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        'backgroundColor' => array(
            'label' => array(
                'en' => array('Custom background color', 'Overwrites the predefined color - black. (visible if there is
                no picture).'),
                'de' => array('Eigene Hintergrundfarbe', 'Überschreibt die vordefinierte Einstellung - Schwarz. (
                sichtbar wenn es kein Bild gibt).'),
            ),
            'inputType' => 'text',
            'eval' => array(
                'colorpicker' => true,
                'tl_class' => 'w50 wizard',
            ),
        ),
        'backgroundBoxing' => array(
            'label' => array(
                'en' => array('Boxed or flowing image', 'Limit image size to 1920px width'),
                'de' => array('Begrenzt oder flißende Bildgröße', 'Bild-Breite auf 1920px begrenzen'),
            ),
            'inputType' => 'select',
            'options' => array(
                '',
                'boxed',
                'flow',
              ),
            'reference' => array(
                '' => array('en' => 'boxed (1920px)', 'de' => 'begrenzte Breite (1920px)'),
                'boxed' => array('en' => 'boxed (1366px)', 'de' => 'begrenzte Breite (1366px)'),
                'flow' => array('en' => 'flow', 'de' => 'fließend'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        array(
            'inputType' => 'group',
            'label' => array(
                'en' => array('Banner Text'),
                'de' => array('Banner Texte'),
            ),
        ),
        'bannerHeadline' => array(
            'label' => array(
                'en' => array('Headline' , ''),
                'de' => array('Überschrift' , ''),
            ),
            'inputType' => 'text',
            'eval' => array('tl_class' => 'long'),
        ),
        'bannerSubheadline' => array(
            'label' => array(
                'en' => array('USP Text' , ''),
                'de' => array('USP Text' , ''),
            ),
            'inputType' => 'text',
            'eval' => array(
                'tl_class' => 'long',
                'allowHtml' => true,
                ),
        ),
        'headlineBackgroundColor' => array(
            'label' => array(
                'en' => array('Headline Background Color', ''),
                'de' => array('Überschrift Hintergrundfarbe', ''),
            ),
            'inputType' => 'select',
            'options' => array(
                '--white',
                '--black',
                '--primary',
                '--text-white',
                '--text-black',
                '--text-gray',
            ),
            'reference' => array(
                '--white' => array('en' => 'transparent white', 'de' => 'durchsichtig weiß'),
                '--black' => array('en' => 'transparent black', 'de' => 'durchsichtig schwarz'),
                '--primary' => array('en' => 'Primary color background', 'de' => 'Primärfarbe Hintergrund'),
                '--text-white' => array('en' => 'white text', 'de' => 'weißer Text'),
                '--text-black' => array('en' => 'black text', 'de' => 'schwarzer Text'),
                '--text-gray' => array('en' => 'gray text', 'de' => 'grauer Text'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
        'headlinePosition' => array(
            'label' => array(
                'en' => array('Headline Position', ''),
                'de' => array('Überschrift Position', ''),
            ),
            'inputType' => 'select',
            'options' => array(
                'top--left',
                'top--right',
                'bottom--left',
                'bottom--right',
                'center',
                'top--center',
                'bottom--center',
                'center--left',
                'center--right',
            ),
            'reference' => array(
                'top--left' => array('en' => 'top left', 'de' => 'oben links'),
                'top--right' => array('en' => 'top right', 'de' => 'oben rechts'),
                'bottom--left' => array('en' => 'bottom left', 'de' => 'unten links'),
                'bottom--right' => array('en' => 'bottom right', 'de' => 'unten rechts'),
                'center' => array('en' => 'center center', 'de' => 'zentriert'),
                'top--center' => array('en' => 'center top', 'de' => 'zentriert oben'),
                'bottom--center' => array('en' => 'center bottom', 'de' => 'zentriert unten'),
                'center--left' => array('en' => 'left centered', 'de' => 'zentriert links'),
                'center--right' => array('en' => 'right centered', 'de' => 'zentriert rechts'),
            ),
            'eval' => array('tl_class' => 'w50'),
        ),
    ),
);
