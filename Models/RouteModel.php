<?php

namespace App\Models;

use CodeIgniter\Model;

class RouteModel extends Model
{
    protected $table = 'routes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['start_point', 'end_point', 'distance', 'estimated_time', 'area'];

    public function getRoutesByFilter($distance = null, $area = null)
    {
        $builder = $this->db->table('routes');
        
        if ($distance !== null && $distance !== '') {
            $builder->where('distance <=', $distance);
        }
        
        if ($area !== null && $area !== '') {
            $builder->where('area', $area);
        }
        
        return $builder->get()->getResultArray();
    }

    public function getDistinctAreas()
    {
        return $this->select('DISTINCT(area) as area')
                    ->orderBy('area', 'ASC')
                    ->findAll();
    }
}

