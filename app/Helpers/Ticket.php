<?php

namespace App\Helpers;

use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Label\Alignment\LabelAlignmentCenter;
use Endroid\QrCode\Label\Font\NotoSans;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeMargin;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;
use Mpdf\Output\Destination;
use Picqer\Barcode\BarcodeGeneratorPNG;
use PDF;

class Ticket
{
    private string $data;
    private string $ticketNumber;

    function __construct(string $data, string $ticketNumber)
    {
        $this->data = $data;
        $this->ticketNumber = $ticketNumber;
    }


    public function genTickets(): array
    {
        $qrCode = $this->genQrCode();
        $barCode = $this->genBarCode();

        $pdf = PDF::loadView('pdf.document', [
            'qr_code' => $qrCode,
            'bar_code' => $barCode
        ]);

        $pdf->getMpdf()->Output(sprintf('%s\\%s.pdf', config('filesystems.disks.tickets.root'), $this->ticketNumber), Destination::FILE);

        return [
            'url' => Storage::disk('tickets')->url(sprintf("%s.pdf", $this->ticketNumber)),
            'file_name' => sprintf("%s.pdf", $this->ticketNumber)
        ];
    }


    private function genQrCode(): string
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->writerOptions([])
            ->data($this->data)
            ->encoding(new Encoding('UTF-8'))
            ->errorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->size(300)
            ->margin(10)
            ->roundBlockSizeMode(new RoundBlockSizeModeMargin())
            // ->logoPath(public_path('assets\logo.png'))
            ->labelText($this->ticketNumber)
            ->labelFont(new NotoSans(20))
            ->labelAlignment(new LabelAlignmentCenter())
            ->build();

        $result->saveToFile(sprintf("%s\\%s.png", config('filesystems.disks.qr-codes.root'), $this->data));

        return Storage::disk('qr-codes')->url(sprintf("%s.png", $this->data));
    }


    private function genBarCode(): string
    {
        $redColor = [255, 255, 255];

        $generator = new BarcodeGeneratorPNG();
        file_put_contents(sprintf("%s\\%s.png", config('filesystems.disks.bar-codes.root'), $this->data), $generator->getBarcode($this->data, $generator::TYPE_CODE_128, 3, 50, $redColor));

        return Storage::disk('bar-codes')->url(sprintf("%s.png", $this->data));
    }

}

