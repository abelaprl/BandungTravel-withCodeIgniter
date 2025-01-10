<?php

namespace App\Models;

use CodeIgniter\Model;

class DestinationModel extends Model
{
    protected $table = 'destinations';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'location', 'description', 'popularity', 'category'];

    public function getPopularDestinations()
    {
        return $this->orderBy('popularity', 'DESC')->findAll();
    }

    public function getDestinationsByCategory($category)
    {
        return $this->where('category', $category)->findAll();
    }

    public function getDestinationsByPreference($preference)
    {
        return $this->where('category', $preference)->findAll();
    }
}

