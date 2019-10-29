<?php

/*
 * @copyright   2018 Mautic Contributors. All rights reserved
 * @author      Digital Media Solutions, LLC
 *
 * @link        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\MauticContactClientBundle\Entity;

use Doctrine\DBAL\Types\Type;
use Doctrine\ORM\Mapping\Builder\ClassMetadataBuilder;
use Doctrine\ORM\Mapping\ClassMetadata;

trait BigIntUnsignedTrait
{
    /**
     * Adds autogenerated ID field type of BIGINT UNSIGNED.
     *
     * @param ClassMetadataBuilder $builder
     * @param string               $fieldName
     * @param string               $columnName
     * @param bool                 $isPrimary
     * @param bool                 $isNullable
     */
    public static function addBigIntUnsignedIdField(
        ClassMetadataBuilder $builder,
        $fieldName = 'id',
        $columnName = 'id',
        $isPrimary = true,
        $isNullable = false
    ) {
        $cm = $builder->getClassMetadata();
        $cm->mapField(
            [
                'fieldName'  => $fieldName,
                'columnName' => $columnName,
                'id'         => $isPrimary,
                'nullable'   => $isNullable,
                'type'       => Type::BIGINT,
                'options'    => [
                    'unsigned' => true,
                ],
            ]
        );
        if ($isPrimary) {
            $cm->setIdGeneratorType(ClassMetadata::GENERATOR_TYPE_AUTO);
        }
    }
}