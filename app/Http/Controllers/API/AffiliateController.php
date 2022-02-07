<?php
   
namespace App\Http\Controllers\API;
   
use Illuminate\Http\Request;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Support\Facades\Auth;
use App\Models\UniCampaign;
use App\Models\AdminCampaign;
use App\Models\Sessions;
use Carbon\Carbon;
use Validator;
use App\Models\User;

class AffiliateController extends BaseController
{
 
    public function affiliate(Request $request)
    {
        $asmid = $request->input('asmid');
        $shortlink = AdminCampaign::where('code_share', $asmid)->first();
        $d_session = [
            'user_id' => $request->ip() . '&' . Carbon::now()->toDateString(),
            'ip_address' => $request->ip(),
            'user_agent' => $request->server('HTTP_USER_AGENT'),
            'payload' => 'share link'
        ];
        $check_session = Sessions::where('user_id', $request->ip() . '&' . Carbon::now()->toDateString())->pluck('id')->first();
        
        if ($check_session == NULL && $shortlink) {
            $data['page_view'] = $shortlink->page_view + 1;
            $shortlink->fill($data)->save();
            Sessions::create($d_session);
            $message = "Success complete -".$data['page_view'];
            $token = $shortlink->createToken('auth_token')->plainTextToken;
        } else {
            $message = "Success complete 2";
            $token = $shortlink->createToken('auth_token')->plainTextToken;
        }
        return response()->json([
            'message' => $message,
            'asmid' => $asmid,
            'access_token' => $token
        ]);
    }
 
}