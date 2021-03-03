<?php

namespace App\Http\Controllers;

use App\Models\Access;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Thenextweb\PassGenerator;

class AccessController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $access = '';
        $msg = '';
        if (isset($request->id)) {
            $access = Access::where('id', $request->id)->first();
            switch ($request->action) {
                case 'delete':
                    $access->delete();
                    $msg = 'Access has been deleted';
                    return response()->json(['success' => !!$access, 'message' => $msg]);
                    break;
                case 'update':
                    if (isset($request->inviter_id)) {
                        $access->inviter_id = $request->inviter_id;
                    }
                    if (isset($request->invitee_id)) {
                        $access->invitee_id = $request->invitee_id;
                    }
                    if (isset($request->invcode)) {
                        $access->invcode = $request->invcode;
                    }
                    $msg = 'Access has been updated';
                    $access->save();
                    return response()->json(['success' => !!$access, 'message' => $msg]);
                    break;
            }
        } else {
            $data = array();
            if (isset($request->inviter_id)) {
                $data['inviter_id'] = $request->inviter_id;
            }
            if (isset($request->invitee_id)) {
                $data['invitee_id'] = $request->invitee_id;
            }
            if (isset($request->invcode)) {
                $data['invcode'] = $request->invcode;
            }
            $access = Access::create($data);
            $msg = 'Access has been added';
            return response()->json(['success' => !!$access, 'message' => $msg]);
        }
    }

    public function invite(Request $request)
    {
        $loggeduser = Auth::user();
        $myuser = User::where('id', $loggeduser->id)->first();
        $validator = Validator::make($request->all(), [
            "invitation_code" => "required",
        ]);

        if ($validator->fails()) {
            return response()->json(["error" => $validator->errors(),  "status_code" => 0]);
        }
        $settings = Project::first();
        $user = User::where('invitation_code', $request->invitation_code)->first();
        if($user){
            if ($settings->currentinv < $settings->invlimit) {
                if ($user->invites < $settings->invperuser) {
                    $data = array();
                    $data['inviter_id'] = $user->id;
                    $data['invitee_id'] = $loggeduser->id;
                    $data['invcode'] = $request->invitation_code;
                    $accessuser = Access::where('invitee_id', $loggeduser->id)->first();
                    if ($accessuser != null) {
                        return response()->json(['error' => 'You have already been invited by another user.']);
                    } else {
                        $access = Access::create($data);
                        if($myuser->accessidentifier == null){

                            $this->createPass($myuser);
                        }
                        $msg = 'You have been invited successfully! You now have access.';
                        $user->invites += 1;
                        $user->points += $settings->invitepts;
                        $settings->currentinv += 1;
                        $settings->save();
                        $user->save();
                       
    
                        return response()->json(['success' => !!$access, 'message' => $msg]);
                    }
                } else {
                    return response()->json(['error' => 'This invitation code is not valid.']);
                }
            } else {
                return response()->json(['error' => 'Sorry, the Plenty Gold Access list is currently full.']);
            }
        }else {
            return response()->json(['error' => 'This invitation code is not valid.']);
        }
        
    }

    function createPass(User $user){
        $project = Project::first();
        $pass_identifier = $user->invitation_code . '-' . $project->passserial . '-' . 'G' . '-' . $user->id;
        $pass = new PassGenerator($pass_identifier);
        
        $pass_definition = [
            "description"       =>  $project->passadesc,
            "formatVersion"     => 1,
            "organizationName"  => $project->passorgname,
            "passTypeIdentifier" => $project->passtypeid,
            "serialNumber"      =>  $pass_identifier,
            "teamIdentifier"    => $project->teamid,
            // "logoText" => "Loyalty Card",
            "foregroundColor"   => $project->accessfcolor,
            "backgroundColor"   => $project->accessbcolor,
            "labelColor" => $project->accessfcolor,
            "barcode" => [
                "message"   => $pass_identifier,
                "format"    => $project->barcodeformat,
                "altText"   => $pass_identifier,
                "messageEncoding" => $project->barcodemsgencoding,
            ],
    
            "storeCard" => [
                // "headerFields" => [
                //     [
                //         "key" => "points",
                //         "label" => "POINTS",
                //         "value" => $user->points
                //     ]
                // ],
              
                "secondaryFields" => [
                    [
                        "key" => "cust-name",
                        "label" => "Name",
                        "value" => $user->name,
    
                    ],
                ],
                "backFields"=> [
                    [
                        "key"=>"c-name",
                        "label"=>"Invited by",
                        "value"=>"ME"
                    ],
                    [
                        "key"=>"c-type",
                        "label"=>"Member Type",
                        "value"=>"Gold Member"
                    ],
                    [
                        "key"=>"c-joind",
                        "label"=>"Invited on",
                        "value"=>$user->created_at
                    ],
                    
                    [
                        "key"=>"c-txt",
                        "label"=>"Description",
                        "value"=>"This is on an access card for electronic benefits."
                    ],
                    
                    [
                        "key"=>"c-txt2",
                        "label"=>"For more information visit",
                        "attributedValue"=>"<a href='http://plentyofthings.com/'>www.plentyofthings.com</a>"
                    ],
                ],
                
    
    
            ]
    
        ];

      
        $pass->setPassDefinition($pass_definition);
        $pass->addAsset(base_path('resources/assets/access/icon.png'));
        $pass->addAsset(base_path('resources/assets/access/logo.png'));
        $pass->addAsset(base_path('resources/assets/access/strip.png'));
        $pass->addAsset(base_path('resources/assets/access/icon@2x.png'));
        $pass->addAsset(base_path('resources/assets/access/logo@2x.png'));
        $pass->addAsset(base_path('resources/assets/access/strip@2x.png'));
        $pass->addAsset(base_path('resources/assets/access/icon@3x.png'));
        $pass->addAsset(base_path('resources/assets/access/logo@3x.png'));
        $pass->addAsset(base_path('resources/assets/access/strip@3x.png'));
        
        $pkpass = $pass->create();

        $user->accessidentifier = $pass_identifier.'.pkpass';
        $user->save();
    }

    function createPass1(User $user, User $inviter)
    {
        $project = Project::first();
        $pass_identifier = $user->invitation_code . '-' . $project->passserial . '-' . 'G' . '-' . $user->id;
        $pass = new PassGenerator($pass_identifier);

        $pass_definition = [
            "description"       =>  $project->passadesc,
            "formatVersion"     => 1,
            "organizationName"  => $project->passorgname,
            "passTypeIdentifier" => $project->passtypeid,
            "serialNumber"      =>  $pass_identifier,
            "teamIdentifier"    => $project->teamid,
            // "logoText" => "Loyalty Card",
            "foregroundColor"   => $project->accessfcolor,
            "backgroundColor"   => $project->accessbcolor,
            "labelColor" => $project->accessfcolor,
            "barcode" => [
                "message"   => $pass_identifier,
                "format"    => $project->barcodeformat,
                "altText"   => $pass_identifier,
                "messageEncoding" => $project->barcodemsgencoding,
            ],

            "storeCard" => [
                "headerFields" => [
                    [
                        "key" => "points",
                        "label" => "points",
                        "value" =>$user->points
                    ]
                ],

                "secondaryFields" => [
                    [
                        "key" => "cust-name",
                        "label" => "Name",
                        "value" => $user->name,

                    ],
                ],
                "backFields" => [
                    
                    [
                        "key" => "c-type",
                        "label" => "Member Type",
                        "value" => "Gold Member"
                    ],
                    [
                        "key" => "c-name",
                        "label" => "Invited By",
                        "value" => $inviter->name
                    ],
                    [
                        "key" => "c-status",
                        "label" => "Status",
                        "value" => "Active"
                    ],
                    [
                        "key" => "c-txt",
                        "label" => "Description",
                        "value" => "This is only an access card for electronic benefits."
                    ],

                    [
                        "key" => "c-txt2",
                        "label" => "For more information visit",
                        "attributedValue" => "<a href='http://plentyofthings.com/'>www.plentyofthings.com</a>"
                    ],
                ],



            ]

        ];


        $pass->setPassDefinition($pass_definition);
        $pass->addAsset(base_path('resources/assets/access/icon.png'));
        $pass->addAsset(base_path('resources/assets/access/logo.png'));
        $pass->addAsset(base_path('resources/assets/access/strip.png'));
        $pass->addAsset(base_path('resources/assets/access/icon@2x.png'));
        $pass->addAsset(base_path('resources/assets/access/logo@2x.png'));
        $pass->addAsset(base_path('resources/assets/access/strip@2x.png'));
        $pass->addAsset(base_path('resources/assets/access/icon@3x.png'));
        $pass->addAsset(base_path('resources/assets/access/logo@3x.png'));
        $pass->addAsset(base_path('resources/assets/access/strip@3x.png'));
        $pkpass = $pass->create();

        $user->accessidentifier = $pass_identifier . '.pkpass';
        $user->save();
    }


    public function checkList(Request $request)
    {
        $settings = Project::first();

        return response()->json(['available' => $settings->currentinv < $settings->invlimit]);
    }

    public function checkAccess(Request $request)
    {
        $user = Auth::user();
        $access = Access::where('invitee_id', $user->id)->first();

        if ($access) {
            return response()->json(['available' => true]);
        } else {
            return response()->json(['available' => false]);
        }
    }

    public function info(Request $request)
    {
        $user = Auth::user();
        if (isset($request->user_id)) {
        } else {
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function show(Access $access)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function edit(Access $access)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Access $access)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Access  $access
     * @return \Illuminate\Http\Response
     */
    public function destroy(Access $access)
    {
        //
    }
}
