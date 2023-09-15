<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Misc;
use App\Models\Coach;
use App\Models\CoachDetail;
use App\Models\CoachTransformation;
use App\Models\CoachCertification;
use App\Models\TeamCoach;
use Log;

class CoachController extends Controller
{
    public function __construct()
    {
        $this->no_data_message = 'No Data Found';
        $this->success_message_saved = 'Data saved successfully';
        $this->success_message_store = 'Data stored successfully';
        $this->success_message_get = 'Data retrieved successfully';
        $this->success_message_deleted = 'Document deleted successfully';
        $this->success_message_list = 'All data listed successfully';
        $this->success_message_status = 'Status updated successfully';
    }

    public function update_coach_slots($id)
    {
        Log::info("Updating slots for Coach Detail Id: " . $id);
        $slot_count = CoachDetail::where('id', $id)->value('slots');
        if (!is_null($slot_count)) {
            $new_count = $slot_count - 1;
            if ($new_count >= 0) {
                CoachDetail::where('id', $id)->update(['slots' => $new_count]);
                return true;
            }
        }
        return false;
    }

    public function premium_coaches()
    {
        $result = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
            ->selectRaw('coach.id, coach.first_name, coach.last_name, coach.mob_number, coach.email_id, coach.role, coach.is_disabled, coach.team, coach.profile_url, coach.coach_whatsapp, coach.gender, coach_details.id as coach_det_id, coach_details.designation, coach_details.coach_tier, coach_details.slots, coach_details.display_order, coach_details.cert_short, coach_details.instagram, coach_details.experience, coach_details.clients_trained, coach_details.about_coach, coach_details.focus_areas, coach_details.img_banner, coach_details.img_profile')
            ->where('coach.is_disabled', '=', 1)
            ->where('coach_details.coach_tier', '<>', 'plus')
            ->inRandomOrder()
            ->get();

        return response()->json(['message' => $this->success_message_get, 'data' => $result, 'status' => 200], 200);
    }

    public function premium_coach_profile_details($profile_url)
    {
        $coach_profile = Coach::leftJoin('coach_details', 'coach_details.coach_id', '=', 'coach.id')
                        ->selectRaw('coach.id,
                                    coach.first_name,
                                    coach.last_name,
                                    coach.mob_number,
                                    coach.email_id,
                                    coach.role,
                                    coach.is_disabled,
                                    coach.team,
                                    coach.profile_url,
                                    coach_details.coach_id,
                                    coach_details.id as coach_det_id,
                                    coach_details.designation,
                                    coach_details.coach_tier,
                                    coach_details.slots,
                                    coach_details.display_order,
                                    coach_details.cert_short,
                                    coach_details.instagram,
                                    coach_details.experience,
                                    coach_details.clients_trained,
                                    coach_details.about_coach,
                                    coach_details.focus_areas,
                                    coach_details.img_banner,
                                    coach_details.img_profile')
                                ->where('coach.profile_url', $profile_url)
                                ->get();

        return response()->json(['message' => $this->success_message_get, 'data' => $coach_profile, 'status' => 200], 200);
    }

    public function premium_coach_certificates($profile_url)
    {
        $certifications = CoachCertification::leftJoin('coach', 'coach_certificates.coach_id', '=', 'coach.id')->selectRaw('coach_certificates.id, coach_certificates.cert_image, coach_certificates.cert_name')->where(['coach.profile_url' => $profile_url])->get();

        return response()->json(['message' => $this->success_message_get, 'data' => $certifications, 'status' => 200], 200);
    }

    public function premium_coach_transformations($profile_url)
    {
        $transformations = CoachTransformation::leftJoin('coach', 'coach_transformations.coach_id', '=', 'coach.id')->selectRaw('coach_transformations.id AS id, coach_transformations.image AS image_url, coach_transformations.client_name AS name, coach_transformations.testimonials AS details')->where(['coach.profile_url' => $profile_url])->get();

        // Modify the keys in the collection
        $transformations = $transformations->map(function ($item) {
            return [
                'id'        => $item['id'],
                'image_url' => $item['image_url'],
                'name'      => $item['name'],
                'details'   => $item['details']
            ];
        });

        return response()->json(['message' => $this->success_message_get, 'data' => $transformations, 'status' => 200], 200);
    }
}
