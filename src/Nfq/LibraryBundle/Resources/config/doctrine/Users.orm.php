<?php

use Doctrine\ORM\Mapping\ClassMetadataInfo;

$metadata->setInheritanceType(ClassMetadataInfo::INHERITANCE_TYPE_NONE);
$metadata->setChangeTrackingPolicy(ClassMetadataInfo::CHANGETRACKING_DEFERRED_IMPLICIT);
$metadata->mapField(array(
   'fieldName' => 'id',
   'type' => 'integer',
   'id' => true,
   'columnName' => 'id',
  ));
$metadata->mapField(array(
   'columnName' => 'firstname',
   'fieldName' => 'firstname',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'lastname',
   'fieldName' => 'lastname',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'email',
   'fieldName' => 'email',
   'type' => 'string',
   'length' => '254',
  ));
$metadata->mapField(array(
   'columnName' => 'password',
   'fieldName' => 'password',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'salt',
   'fieldName' => 'salt',
   'type' => 'string',
   'length' => '100',
  ));
$metadata->mapField(array(
   'columnName' => 'is_admin',
   'fieldName' => 'isAdmin',
   'type' => 'boolean',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);