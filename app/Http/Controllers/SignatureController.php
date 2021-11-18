<?php

namespace App\Http\Controllers;

use Elibyy\TCPDF\Facades\TCPDF;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
    protected $pdf;

    public function __construct(TCPDF $tcpdf)
    {
        $this->pdf = $tcpdf;
    }

    public function index(Request $request) {

        // Set certificate file
        $certificate = 'file://'.base_path().'/storage/app/tcpdf.crt';

        // Set additional information in the signature
        $info = array(
            'Name' => 'Akecel',
            'Location' => 'Paris',
            'Reason' => 'Demo',
        );

        // Set document signature
        $this->pdf::setSignature($certificate, $certificate, 'demo', '', 2, $info);


        // Decode signature image
        $encoded_image = explode(",", $request->sign)[1];
        $decoded_image = base64_decode($encoded_image);

        $this->pdf::AddPage();

        // Print the view
        $text = view('template/pdf');

        // Add view content
        $this->pdf::writeHTML($text, true, 0, true, 0);

        // Add image for signature
        $this->pdf::Image('@'.$decoded_image, "", 50, 75, "", 'PNG');

        // Define active area for signature appearance
        $this->pdf::setSignatureAppearance(10, 50, 75, 35);
        
        // Save pdf file
        $this->pdf::Output(public_path('signed-document.pdf'), 'FI');
    }
}