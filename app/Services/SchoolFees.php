<?php

namespace App\Services;

/**
 * Class SchoolFees.
 */
class SchoolFees
{
    public static function department($departmentId)
    {

        if (in_array($departmentId, config('services.schoolfees.scienceDepartments'))) {

            return config('services.schoolfees.sciences');
        } else if (in_array($departmentId, config('services.schoolfees.socialScienceDepartments'))) {

            return config('services.schoolfees.socialSciences');
        } else {
            throw new \InvalidArgumentException("Invalid departmentId: $departmentId");
        }
    }
}
