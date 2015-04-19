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
   'columnName' => 'book_id',
   'fieldName' => 'bookId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'reader_id',
   'fieldName' => 'readerId',
   'type' => 'integer',
  ));
$metadata->mapField(array(
   'columnName' => 'reserved_at',
   'fieldName' => 'reservedAt',
   'type' => 'datetime',
  ));
$metadata->mapField(array(
   'columnName' => 'taken_at',
   'fieldName' => 'takenAt',
   'type' => 'datetimetz',
  ));
$metadata->mapField(array(
   'columnName' => '[A[A[B[B[Bto_return_at',
   'fieldName' => '[A[A[B[B[BtoReturnAt',
   'type' => 'datetimetz',
  ));
$metadata->mapField(array(
   'columnName' => 'returned_at',
   'fieldName' => 'returnedAt',
   'type' => 'datetime',
  ));
$metadata->setIdGeneratorType(ClassMetadataInfo::GENERATOR_TYPE_AUTO);