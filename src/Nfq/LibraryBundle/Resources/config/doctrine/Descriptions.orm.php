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
   'columnName' => 'author',
   'fieldName' => 'author',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'title',
   'fieldName' => 'title',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'cover_url',
   'fieldName' => 'coverUrl',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'language',
   'fieldName' => 'language',
   'type' => 'string',
   'length' => '2',
  ));
$metadata->mapField(array(
   'columnName' => 'description',
   'fieldName' => 'description',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'publisher',
   'fieldName' => 'publisher',
   'type' => 'string',
   'length' => '255',
  ));
$metadata->mapField(array(
   'columnName' => 'year',
   'fieldName' => 'year',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'page_no',
   'fieldName' => 'pageNo',
   'type' => 'smallint',
  ));
$metadata->mapField(array(
   'columnName' => 'isbn',
   'fieldName' => 'isbn',
   'type' => 'string',
   'length' => '13',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);