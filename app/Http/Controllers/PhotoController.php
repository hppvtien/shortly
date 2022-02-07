<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use App\Models\Supplier\Supplier;
use App\Models\UniCampaign;
use App\Models\AdminCampaign;
use App\Models\Sessions;
use Carbon\Carbon;
use Illuminate\Support\Str;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request ,$page_ly)
    {
        
        $ip_client = $request->ip();
        $page_ly = $request->page_ly;
        // $abcccc = $data['ip_client'];
        $check = AdminCampaign::where('page_ly', $page_ly)->pluck('campaign_id')->first();
        $check_data = UniCampaign::where('id', $check)->first();
        $check_date = strtotime($check_data->finish_date) - strtotime("now");
        $check_status = $check_data->status;
        $check_data = AdminCampaign::where('page_ly', $page_ly)->first();
        $range_date = Supplier::where('id', $check_data->supplier_id)->pluck('set_date')->first();
        $user_id = $ip_client . '&' . Carbon::now()->toDateString();
        $set_date = strtotime(Carbon::now()) + strtotime("+".$range_date." day");
        $d_session = [
            'user_id' => $user_id,
            'ip_address' => $ip_client,
            'set_date' => $set_date,
            'user_agent' => $request->server('HTTP_USER_AGENT')
        ];
        $check_session = Sessions::where('user_id', $user_id)->pluck('id')->first();
        $check_set_date = Sessions::where('user_id', $user_id)->pluck('set_date')->first();
        if ($check_session == NULL && $check && $check_status == 1 && $check_date > 0 && $check_set_date < strtotime(Carbon::now())) {
            $id_session = Sessions::create($d_session);
            $total_count = (int)$check_data->pagely_view;

            $param = [
                'pagely_view' => $total_count + 1,
            ];
            if ($id_session != null) {
                $check_data->fill($param)->save();
            }
            $url_link = UniCampaign::where('id', $check)->pluck('content')->first();
            return redirect($url_link);
        } else {
            $url_link = UniCampaign::where('id', $check)->pluck('content')->first();
            // dd($url_link);
            return redirect($url_link);
            // return $this->sendResponse($url_link, 'User signed in');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
