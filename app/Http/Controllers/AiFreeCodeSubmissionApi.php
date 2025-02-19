<?php

namespace App\Http\Controllers;

use App\Models\CodeReview;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Validator;

class AiFreeCodeSubmissionApi extends Controller
{
   public function AiCodeDetector(Request $request){

    $validator = Validator::make($request->all(), [
        'code' => ['required', 'string', function ($attribute, $value, $fail) {
            if (!preg_match('/^[A-Za-z0-9+\/=]+$/', $value) || base64_decode($value, true) === false) {
                $fail($attribute . ' must be a valid Base64-encoded string.');
            }
        }],
        'webhook_url' => 'nullable|url',
    ]);

    if($validator->fails()){
        return response()->json("You have not input Base64 Encoded Code for Ai-generated code Detection");
    }

    $review = CodeReview::create([
        'student_id'=>$request->student_id,
        'code' => $request->code,
        'status' => 'in review',
        'webhook_url' => $request->webhook_url, 
    ]);
    $apiKey = env('GEMINI_API_KEY');
    $response = Http::post("https://generativelanguage.googleapis.com/v1beta/models/gemini-1.5-flash:generateContent?key=$apiKey", [
        "contents" => [
            ["parts" => [["text" => "Analyze if this code is AI-generated:\n\n" . base64_decode($review->code)]]]
        ]
    ]);
    $aiResponse = $response->json();
$isAiGenerated = false;
if (!empty($aiResponse['candidates'])) {
    foreach ($aiResponse['candidates'] as $candidate) {
        if (!empty($candidate['content']['parts'])) {
            foreach ($candidate['content']['parts'] as $part) {
                if (isset($part['text']) && str_contains(strtolower($part['text']), 'ai-generated')) {
                    $isAiGenerated = true;
                    break 2; 
                }
            }
        }
    }
}
$status = $isAiGenerated ? 'AI-generated' : 'Human-written';
    $review->update([
        'status' => $status,
        'ai_response' => json_encode($aiResponse),
    ]);


    return response()->json([
        'message' => $status === 'AI-generated' 
            ? 'Rejected: AI-generated code detected' 
            : 'Accepted: Human-written code detected'
    ], 200);
    }
 
   }




