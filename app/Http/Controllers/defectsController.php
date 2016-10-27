<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request as Request2;
use Request;

class defectsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
    
        public function __construct() 
        {
            notificationController::showNotificationAccordingToCurrentUser();
        }
        
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return view('researchDiary/diaryhome');
	}
        
        public function createdef()
	{
		return view('researchDiary/dupdate');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
        public function defectopen()
        {
            $Alldefects = \App\defect::all();
            return view('researchDiary/defects', compact('Alldefects'));
        }
        
	public function storeDefects(Request2 $reques)
        {

            \App\defect::create([
                'defect' => Request::get('entertask'),
                'description' => Request::get('desc'),
                'plantofinish' => Request::get('plantof'),
                'sdate' => Request::get('start'),
               'edate' => Request::get('end'),
                'hours' => Request::get('spenthours')

                ]);

            return redirect('defects');
        }
        
        public function destroy($id)
        {
            //$idi = Crypt::decrypt($id);
            //dd($id);
            $model = \App\defect::find($id);
            //dd($model);
            $model->delete();

            return redirect('defects')->with('message_success', 'Defect Deleted!');
        }

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
    {
        //

        /**
         * Update the specified resource in storage.
         *
         * @param  int $id
         * @return Response
         */
    }
        public function update($id)
    {
        //


        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return Response
         */
    }

}