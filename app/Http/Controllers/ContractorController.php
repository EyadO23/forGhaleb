<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Contractor;
use App\Models\Tender;
use App\Services\HelloSignService;
use Illuminate\Http\Request;

use Mpdf\Mpdf;


class ContractorController extends Controller
{
     public function index(Request $request)
{
    $contractors = Contractor::all();

    return response()->json([
        'Contractors' => $contractors
    ], 200);
}
    public function showByUserId($id)
{
    $contractor = Contractor::with('bids')->where('user_id', $id)->first();

    if (!$contractor) {
        return response()->json(['message' => 'المقاول غير موجود'], 404);
    }

    return response()->json([
        'contractor' => $contractor
    ], 200);
}
public function show(Request $request){
    $user=$request->user();
    $contractor = Contractor::with('bids')->where('user_id', $user->id)->first();
        return response()->json(["The Detail of Contactor:"=>$contractor],200);
    }

    /**
     * Store contractor data.
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'commercial_registration_number' => 'required|string|max:255',
            'company_email' => 'required|email|max:255',
            'country' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'phone_number' => 'required|string|max:20',
            'year_established' => 'required|digits:4|integer|min:1900|max:' . date('Y'),
            'projects_last_5_years' => 'required|integer|min:0',
            'quality_certificates' => 'required|array|',
            'quality_certificates.*' => 'string',
            'public_sector_successful_contracts' => 'nullable|string',
            'website_url' => 'nullable|url|max:255',
            'linkedin_profile' => 'nullable|url|max:255',
            'company_bio' => 'nullable|string',
            'official_documents' => 'nullable|file|mimes:pdf,doc,docx,zip',
        ]);

        $data = $request->except('official_documents');
        $data['user_id'] =$request->user()->id;

        if ($request->hasFile('official_documents')) {
            $filePath = $request->file('official_documents')->store('contractor_documents', 'public');
            $data['official_documents'] = $filePath;
        }

        Contractor::updateOrCreate(
             ['user_id' => $data['user_id']] ,

            $data
        );

        // return redirect()->back()->with('success', 'تم حفظ بيانات المقاول بنجاح.');
        return response()->json(["message:"=>'Success']);
    }

    public function checkProfile(Request $request)
{
    $user = $request->user();

    $hasProfile = $user->contractor()->exists(); 
    return response()->json([
        'has_profile' => $hasProfile,
    ], 200);
}

public function generateContractPdf($contractorId, $tenderId, $bidId)
{
    $contractor = Contractor::findOrFail($contractorId);
    $tender = Tender::findOrFail($tenderId);
    $bid = Bid::findOrFail($bidId);

    $html = view('contracts.contracts', compact('contractor', 'tender', 'bid'))->render();

    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        'default_font' => 'dejavusans',
        'autoLangToFont' => true,
        'autoScriptToLang' => true,
    ]);

    $mpdf->WriteHTML($html);

    $pdfPath = storage_path("app/contracts/contract_{$bidId}.pdf");

    $mpdf->Output($pdfPath, \Mpdf\Output\Destination::FILE);

    return $pdfPath; 

}
public function sendContractToSign($contractorId, $tenderId, $bidId, HelloSignService $signService)
{
    $contractor = Contractor::find($contractorId);
    if (!$contractor) {
        return response()->json(['message' => 'المقاول غير موجود'], 404);
    }

    $user = $contractor->user;
    if (!$user || !$user->email) {
        return response()->json(['message' => 'البريد الإلكتروني للمقاول غير متوفر'], 400);
    }

    $filePath = storage_path('app/contracts/contract_' . $bidId . '.pdf');

    if (!file_exists($filePath)) {
        return response()->json(['message' => 'ملف العقد غير موجود'], 404);
    }

  try {
    $response = $signService->sendSignatureRequest(
        $user->email,
        $user->name ?? 'المقاول',
        $filePath
    );

    $signatureRequest = $response->getSignatureRequest();
    $signatureRequestId = $signatureRequest->getSignatureRequestId();

    return response()->json([
        'message' => 'تم إرسال العقد للتوقيع بنجاح.',
        'signature_request_id' => $signatureRequestId,
    ]);
} catch (\Exception $e) {
    return response()->json(['message' => 'حدث خطأ أثناء إرسال العقد: ' . $e->getMessage()], 500);
}
}




}