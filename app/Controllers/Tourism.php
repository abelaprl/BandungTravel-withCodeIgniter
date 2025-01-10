<?php

namespace App\Controllers;

use App\Models\RouteModel;
use App\Models\TransportModel;
use App\Models\ScheduleModel;
use App\Models\DestinationModel;

class Tourism extends BaseController
{
    public function __construct()
    {
        // Check if user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('recommendation/login');
        }
    }

    public function index()
    {
        $routeModel = new RouteModel();
        $destinationModel = new DestinationModel();

        // Get preference from query string if available, otherwise from session
        $preference = $this->request->getGet('preference') ?? session()->get('preference');
        
        // Store preference in session if it came from query string
        if ($this->request->getGet('preference')) {
            session()->set('preference', $preference);
        }

        // Get distinct areas for the filter
        $areas = $routeModel->getDistinctAreas();

        $data = [
            'routes' => $routeModel->findAll(),
            'destinations' => $destinationModel->findAll(),
            'areas' => $areas,
            'preference' => $preference,
            'title' => 'Transportation Management'
        ];

        return view('transportation/home', $data);
    }

    public function destination($id)
    {
        $destinationModel = new DestinationModel();
        $destination = $destinationModel->find($id);

        if (!$destination) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('transportation/destination', [
            'destination' => $destination,
            'title' => $destination['name']
        ]);
    }

    public function route($id)
    {
        $routeModel = new RouteModel();
        $transportModel = new TransportModel();

        $route = $routeModel->find($id);
        
        if (!$route) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'route' => $route,
            'transports' => $transportModel->findAll(),
            'title' => 'Route Details'
        ];

        return view('transportation/route', $data);
    }

    public function schedule($id)
    {
        $scheduleModel = new ScheduleModel();
        $routeModel = new RouteModel();

        $route = $routeModel->find($id);
        
        if (!$route) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $data = [
            'schedules' => $scheduleModel->getSchedulesWithTransport($id),
            'route' => $route,
            'title' => 'Schedule Details'
        ];

        return view('transportation/schedule', $data);
    }

    public function filterRoutes()
    {
        $routeModel = new RouteModel();
        $distance = $this->request->getGet('distance');
        $area = $this->request->getGet('area');

        $data = [
            'routes' => $routeModel->getRoutesByFilter($distance, $area),
            'preference' => session()->get('preference')
        ];
        
        return view('transportation/route_list', $data);
    }
}

