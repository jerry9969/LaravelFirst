<?php

namespace App\Repositories;

use App\Models\tld;
use App\Repositories\BaseRepository;

/**
 * Class tldRepository
 * @package App\Repositories
 * @version February 18, 2022, 10:04 am UTC
*/

class tldRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'price'
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
        return tld::class;
    }
}
