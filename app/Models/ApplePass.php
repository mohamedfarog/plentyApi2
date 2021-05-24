<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Http;
use Thenextweb\PassGenerator;

class ApplePass extends Model
{
    use HasFactory;

    public static function createLoyaltyPass(User $user)
    {
        $project = Project::first();
        $pass_identifier = $user->invitation_code . '-' . $project->passserial . '-' . $user->id;
        $pass = new PassGenerator($pass_identifier, true);

        $pass_definition = [
            "description"       =>  $project->passldesc,
            "formatVersion"     => 1,
            "organizationName"  => $project->passorgname,
            "passTypeIdentifier" => $project->passtypeid,
            "webServiceURL" => 'https://plentyapp.mvp-apps.ae/api/',
            "authenticationToken" => $project->authToken,
            "serialNumber"      =>  $pass_identifier,
            "teamIdentifier"    => $project->teamid,
            // "logoText" => "Loyalty Card",
            "foregroundColor"   => $project->accessfcolor,
            "backgroundColor"   => $project->accessbcolor,
            "labelColor" => $project->accessfcolor,
            "barcode" => [
                "message"   => '{"customer_name":"' . $user->name . '","customer_mobile_number":"' . substr($user->contact, 4) . '","mobile_country_code":' . intval(substr($user->contact, 1, 3)) . ',"reward_code":"' . $pass_identifier . '"}',
                
                "format"    => $project->barcodeformat,
                "altText"   => $pass_identifier,
                "messageEncoding" => $project->barcodemsgencoding,
            ],

            "storeCard" => [
                "headerFields" => [
                    [
                        "key" => "points",
                        "label" => "POINTS",
                        "value" => $user->points
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
                        "key" => "c-name",
                        "label" => "Customer Name",
                        "value" => $user->name
                    ],
                    [
                        "key" => "c-balance",
                        "label" => "Loyalty Points",
                        "value" => $user->points
                    ],
                    [
                        "key" => "c-joind",
                        "label" => "Join Date",
                        "value" => Carbon::parse($user->created_at)->format('m/Y')
                    ],

                    [
                        "key" => "c-txt",
                        "label" => "Description",
                        "value" => "Official loyalty card of Plenty of Things members.\n\nEarn points and enjoy exclusive rewards only on Plenty of Things stores."
                    ],

                    [
                        "key" => "c-txt2",
                        "label" => "For more information visit",
                        "value" => "www.plentyofthings.com",
                        "attributedValue" => "<a href='http://plentyofthings.com/'>www.plentyofthings.com</a>"
                    ],
                ],



            ]

        ];


        $pass->setPassDefinition($pass_definition);
        // $pass->addAsset(base_path('resources/assets/wallet/icon.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/logo.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/strip.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/icon@2x.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/logo@2x.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/strip@2x.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/icon@3x.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/logo@3x.png'));
        // $pass->addAsset(base_path('resources/assets/wallet/strip@3x.png'));

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

        $user->loyaltyidentifier = $pass_identifier . '.pkpass';
        $user->save();

        $passes = Pass::where('serialNumber', $pass_identifier)->update(['passesUpdatedSince' => Carbon::now(), 'updateTag' => 'changed']);
    }

    public static function createAccessPass($invitee_id = null, $id = null)
    {
        $project = Project::first();
        $access = '';
        if ($invitee_id != null) {
            $access = Access::with(['invitee', 'inviter'])->where('invitee_id', $invitee_id)->first();
        }
        if ($id != null) {
            $access = Access::with(['invitee', 'inviter'])->where('id', $id)->first();
        }

        $pass_identifier = $access->invitee->invitation_code . '-' . $project->passserial . '-' . 'G' . '-' . $access->invitee->id;
        $pass = new PassGenerator($pass_identifier, true);

        $pass_definition = [
            "description"       =>  $project->passadesc,
            "formatVersion"     => 1,
            "organizationName"  => $project->passorgname,
            "webServiceURL" => 'https://plentyapp.mvp-apps.ae/api/',
            "authenticationToken" => $project->authToken,
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


                "secondaryFields" => [
                    [
                        "key" => "cust-name",
                        "label" => "Name",
                        "value" => $access->invitee->name,

                    ],
                ],
                "backFields" => [
                    [
                        "key" => "c-name",
                        "label" => "Invited by",
                        "value" => $access->inviter->name
                    ],
                    [
                        "key" => "c-type",
                        "label" => "Member Type",
                        "value" => "Gold Member"
                    ],
                    [
                        "key" => "c-joind",
                        "label" => "Invited on",
                        "value" => Carbon::parse($access->created_at)->format('m/Y')
                    ],

                    [
                        "key" => "c-txt",
                        "label" => "Description",
                        "value" => "This is only an access card for electronic benefits."
                    ],

                    [
                        "key" => "c-txt2",
                        "label" => "For more information visit",
                        "value" => "www.plentyofthings.com",
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
        $user = User::where('id', $access->invitee->id)->first();
        $user->accessidentifier = $pass_identifier . '.pkpass';
        $user->save();

        $passes = Pass::where('serialNumber', $pass_identifier)->update(['passesUpdatedSince' => Carbon::now(), 'updateTag' => 'changed']);
    }

    public function sendNotif($pushToken)
    {
        // $response = Http::post("gateway.push.apple.com", [
        //     'AppSid' => env('APPSID'),
        //     'SenderID' => env('SENDERID'),
        //     'Body' => $body,
        //     'Recipient' => $recipient
        // ]);

        // if($response['success'] == true){
        //     return 'An OTP was sent to +' . $recipient.'.';
        // }else{
        //     return 'Please enter a valid KSA phone number.';
        // }
    }

    // public static function createAccessPass($id)
    // {
    //     $project = Project::first();


    //     $pass_identifier = $access->invitee->invitation_code . '-' . $project->passserial . '-' . 'G' . '-' . $access->invitee->id;
    //     $pass = new PassGenerator($pass_identifier, true);

    //     $pass_definition = [
    //         "description"       =>  $project->passadesc,
    //         "formatVersion"     => 1,
    //         "organizationName"  => $project->passorgname,
    //         "passTypeIdentifier" => $project->passtypeid,
    //         "serialNumber"      =>  $pass_identifier,
    //         "teamIdentifier"    => $project->teamid,
    //         // "logoText" => "Loyalty Card",
    //         "foregroundColor"   => $project->accessfcolor,
    //         "backgroundColor"   => $project->accessbcolor,
    //         "labelColor" => $project->accessfcolor,
    //         "barcode" => [
    //             "message"   => $pass_identifier,
    //             "format"    => $project->barcodeformat,
    //             "altText"   => $pass_identifier,
    //             "messageEncoding" => $project->barcodemsgencoding,
    //         ],

    //         "storeCard" => [


    //             "secondaryFields" => [
    //                 [
    //                     "key" => "cust-name",
    //                     "label" => "Name",
    //                     "value" => $access->invitee->name,

    //                 ],
    //             ],
    //             "backFields" => [
    //                 [
    //                     "key" => "c-name",
    //                     "label" => "Invited by",
    //                     "value" => $access->inviter->name
    //                 ],
    //                 [
    //                     "key" => "c-type",
    //                     "label" => "Member Type",
    //                     "value" => "Gold Member"
    //                 ],
    //                 [
    //                     "key" => "c-joind",
    //                     "label" => "Invited on",
    //                     "value" => Carbon::parse($access->created_at)->format('m/Y')
    //                 ],

    //                 [
    //                     "key" => "c-txt",
    //                     "label" => "Description",
    //                     "value" => "This is only an access card for electronic benefits."
    //                 ],

    //                 [
    //                     "key" => "c-txt2",
    //                     "label" => "For more information visit",
    //                     "attributedValue" => "<a href='http://plentyofthings.com/'>www.plentyofthings.com</a>"
    //                 ],
    //             ],



    //         ]

    //     ];


    //     $pass->setPassDefinition($pass_definition);
    //     $pass->addAsset(base_path('resources/assets/access/icon.png'));
    //     $pass->addAsset(base_path('resources/assets/access/logo.png'));
    //     $pass->addAsset(base_path('resources/assets/access/strip.png'));
    //     $pass->addAsset(base_path('resources/assets/access/icon@2x.png'));
    //     $pass->addAsset(base_path('resources/assets/access/logo@2x.png'));
    //     $pass->addAsset(base_path('resources/assets/access/strip@2x.png'));
    //     $pass->addAsset(base_path('resources/assets/access/icon@3x.png'));
    //     $pass->addAsset(base_path('resources/assets/access/logo@3x.png'));
    //     $pass->addAsset(base_path('resources/assets/access/strip@3x.png'));

    //     $pkpass = $pass->create();
    //     $user = User::where('id', $access->invitee->id)->first();
    //     $user->accessidentifier = $pass_identifier . '.pkpass';
    //     $user->save();
    // }
}
