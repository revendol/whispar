<?php

namespace App\Http\Controllers\Admins;

use App\Models\EmailCampaign;
use App\Models\EmailTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EmailCampaignController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $campaigns = EmailCampaign::all();
        $templates = EmailTemplate::select('id','name')->get();
        return view('emails.campaign.index',compact('campaigns','templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $templates = EmailTemplate::select('id','name')->get();
//        return view('emails.campaign.create',compact('templates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|alpha_dash|min:5',
            'template_id'=>'required'
        ]);
        $emailCampaign = EmailCampaign::create(['title'=>$request->title,'template_id'=>$request->template_id]);
        if($emailCampaign)
        {
            return redirect()->route('admin.campaigns.index');
        }
        return abort(500);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $campaign = EmailCampaign::where('id',$id)->firstOrFail();
        return view('emails.campaign.view',compact('campaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $templates = EmailTemplate::select('id','name')->get();
        $campaign = EmailCampaign::where('id',$id)->firstOrFail();
        return view('emails.campaign.edit',compact('campaign','templates'));
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
        $campaign = EmailCampaign::where('id',$id)->firstOrFail();
        $this->validate($request,[
            'template_id'=>'required'
        ]);
        $campaign->template_id = $request->template_id;
        $campaign->save();
        return $this->show($id);
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
