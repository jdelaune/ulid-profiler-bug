<?php

namespace App\Doctrine;

use App\Entity\PersonTrait;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;

class PersonFilter extends SQLFilter
{
    const NAME = 'person_filter';
    const PARAMETER = 'person_id';

    /**
     * Gets the SQL query part to add to a query.
     *
     * @param ClassMetaData $targetEntity
     * @param string $targetTableAlias
     *
     * @return string The constraint SQL if there is available, empty string otherwise.
     */
    public function addFilterConstraint(ClassMetadata $targetEntity, $targetTableAlias): string
    {
        // Check if the entity has the tenant trait
        $traits = $targetEntity->reflClass->getTraitNames();
        if (!in_array(PersonTrait::class, $traits)) {
            return '';
        }

        return sprintf('%s.id = %s', $targetTableAlias, $this->getParameter(self::PARAMETER));
    }
}
