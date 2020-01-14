<?php

namespace App\Modules\Adminpanel\Controllers;

use App\Modules\Adminpanel\Models\ComingProduct;
use App\Modules\Adminpanel\Models\UncomingProduct;
use App\Http\Controllers\Controller;

class ProposalLogsController extends Controller
{
    public function index()
    {
        $comingproposal_logs = ComingProduct::all();
        $uncomingproposal_logs = UncomingProduct::all();

        return view('Adminpanel::proposallogs.index',['comingproposal_logs'=>$comingproposal_logs, 'uncomingproposal_logs'=>$uncomingproposal_logs]);

    }

}
