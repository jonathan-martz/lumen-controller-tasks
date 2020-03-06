<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

/**
 * Class ProjectsController
 * @package App\Http\Controllers
 */
class TasksController extends Controller
{

    /**
     * @return mixed
     */
    public function select()
    {
        $validatedData = $this->request->validate([
            'limit' => 'integer',
            'highlight' => 'string'
        ]);

        $limit = $this->request->input('limit');
        $highlight = $this->request->input('highlight');
        $projects = DB::table('tasks');

        if($limit) {
            $projects->limit($limit);
        }

        if($highlight) {
            $projects->where('highlight', '=', true);
        }

        $this->addResult('tasks', $projects->get());

        return $this->getResponse();
    }
}
