<?php

namespace App\Models;

use CodeIgniter\Model;

class ScheduleModel extends Model
{
    protected $table = 'schedules';
    protected $primaryKey = 'id';
    protected $allowedFields = ['route_id', 'transport_id', 'departure_time', 'arrival_time'];

    public function getSchedulesWithTransport($routeId)
    {
        return $this->select('schedules.*, transports.type, transports.capacity')
                    ->join('transports', 'transports.id = schedules.transport_id')
                    ->where('route_id', $routeId)
                    ->findAll();
    }

    public function getSchedulesByPreference($preference)
    {
        return $this->select('schedules.*, routes.area, transports.type')
                    ->join('routes', 'routes.id = schedules.route_id')
                    ->join('transports', 'transports.id = schedules.transport_id')
                    ->like('routes.area', $preference)
                    ->findAll();
    }
}

