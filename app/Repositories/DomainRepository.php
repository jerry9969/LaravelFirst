<?php

namespace App\Repositories;

use App\Models\Domain;
use App\Repositories\BaseRepository;

/**
 * Class DomainRepository
 * @package App\Repositories
 * @version February 15, 2022, 2:44 pm UTC
*/

class DomainRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'client_id',
        'name',
        'expiry_date'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Domain::class;
    }
}
