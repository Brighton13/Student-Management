<?php

namespace App\Models;

use CodeIgniter\Model;

class Payment extends Model
{
    protected $table = 'payments';
    protected $primaryKey = 'ID';
    protected $useAutoIncrement = true;
    protected $returnType = 'Object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['Description', 'Amount', 'Date'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];
}
