<?php

namespace App\Models;

use CodeIgniter\Model;

class TransportModel extends Model
{
    protected $table = 'transports';
    protected $primaryKey = 'id';
    protected $allowedFields = ['type', 'capacity', 'availability'];

    public function getAvailableTransports()
    {
        return $this->where('availability', 1)->findAll();
    }

    public function getTransportsByCapacity($minCapacity)
    {
        return $this->where('capacity >=', $minCapacity)->findAll();
    }
}

