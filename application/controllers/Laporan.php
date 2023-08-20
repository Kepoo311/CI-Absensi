<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class Laporan extends CI_Controller {

    public function __construct()
    {
      parent::__construct();
      $this->load->model('mlaporan');

    }
    
    public function cetak_laporan()
    {
      $bulan = $_POST['selectedMonth'];

      $guru = $this->db->get('data_guru')->result();

      $data = '';
      $data .= '<thead>
                  <tr>
                    <th rowspan="2" style="vertical-align : middle; text-align: center; width: 10px;">No</th>
                    <th rowspan="2" style="vertical-align : middle; text-align: center;">Nama</th>
                    <th rowspan="2" style="vertical-align : middle; text-align: center; width: 10px;">Jumlah Masuk Kelas</th>
                    <th colspan="4" style="vertical-align : middle; text-align: center;">Rekap Absensi</th>
                    <th rowspan="2" style="vertical-align : middle; text-align: center;  width: 20px;">Persentase Kehadiran</th>
                  </tr>
                  <tr>
                      <th>H</th>
                      <th>S</th>
                      <th>I</th>
                      <th>A</th>
                  </tr>
                </thead>';
      $data .= '<tbody>';
      $no = 1; 
      $guru = $this->mlaporan->get_data_guru();
      foreach ($guru as $row) 
      {
        $data .= '<tr>';
        $data .= '<td style="vertical-align : middle; text-align: center;">'. $no++ .'</td>';
        $data .= '<td >'. $row->nama_guru .'</td>';
        $data .= '<td style="vertical-align : middle; text-align: center;">5</td>';
        $absensi_data = $this->mlaporan->getAbsensiDataByMonth($bulan, $row->nama_guru);

        foreach ($absensi_data as $row) 
        {
          $data .= '<td style="vertical-align : middle; text-align: center;">' . $row->total_hadir .'</td>';
          $data .= '<td style="vertical-align : middle; text-align: center;">'. $row->total_sakit .'</td>';
          $data .= '<td style="vertical-align : middle; text-align: center;">'. $row->total_izin .'</td>';
          $data .= '<td style="vertical-align : middle; text-align: center;">'. $row->total_alpa .'</td>';
          $data .= '<td style="vertical-align : middle; text-align: center;">50%</td>';
        }

        $data .= '</tr>';
      }
      $data .= '</tbody>';
      echo $data;
    }

    public function exportToExcel() {
      $spreadsheet = new Spreadsheet();
      $sheet = $spreadsheet->getActiveSheet();

      $lastColumn = 'AN';
      $lastRow = 155;
      $sheet->getStyle('B4:' . $lastColumn . $lastRow)->applyFromArray([
          'borders' => ['allBorders' => ['borderStyle' => 'thin']],
      ]);

      $sheet->mergeCells('B2:AN2');
      $sheet->setCellValue('B2', 'Data laporan absensi guru');
      $sheet->getStyle('B2')->getFont()->setBold(true);

      $sheet->mergeCells('B4:B5');
      $sheet->setCellValue('B4', 'NO');
      $sheet->getStyle('B4')->getAlignment()->setHorizontal('center');
      $sheet->getColumnDimension('B')->setWidth(4);
      $sheet->getStyle('B4:B5')->applyFromArray([
          'alignment' => ['vertical' => 'center'],
      ]);

      $sheet->mergeCells('C4:C5');
      $sheet->getColumnDimension('C')->setWidth(30);
      $sheet->setCellValue('C4', 'Nama');
      $sheet->getStyle('C4:C5')->applyFromArray([
          'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
      ]);

      $sheet->mergeCells('D4:AH4');
      $sheet->setCellValue('D4', 'Bulan : Agustus');

      $dates = range(1, 31);
      $col = 'D';
      
      foreach ($dates as $date) 
      {
          $sheet->setCellValue($col . '5', $date);

          $alignment = $sheet->getStyle($col)->getAlignment();

          // Mengatur alignment menjadi tengah
          $alignment->setHorizontal(Alignment::HORIZONTAL_CENTER);
          $alignment->setVertical(Alignment::VERTICAL_CENTER);

          $absensi_data = $this->mlaporan->getAbsensiDataByDate($date);

          $rowNumber = 6;
          foreach ($absensi_data as $absensi) 
          {
              

              $absenText = '-';
              if ($absensi->hadir > 0) 
              {
                $absenText = 'H';
              } 
              elseif ($absensi->sakit > 0) 
              {
                  $absenText = 'S';
              } 
              elseif ($absensi->izin > 0) 
              {
                  $absenText = 'I';
              } 
              elseif ($absensi->alpa > 0) 
              {
                  $absenText = 'A';
              }

              $sheet->setCellValue($col . $rowNumber, $absenText);
              $rowNumber++;
          }

          $sheet->getColumnDimension($col)->setWidth(4);
          $col++;
          
      }

      $sheet->mergeCells('AI4:AL4');
      $sheet->setCellValue('AI4', 'Rekap absensi');
      $sheet->getStyle('AI4:AL4')->applyFromArray([
          'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
      ]);

      $sheet->setCellValue('AI5', 'H');
      $sheet->setCellValue('AJ5', 'S');
      $sheet->setCellValue('AK5', 'I');
      $sheet->setCellValue('AL5', 'A');

      $sheet->getColumnDimension('AI')->setWidth(4);
      $sheet->getColumnDimension('AJ')->setWidth(4);
      $sheet->getColumnDimension('AK')->setWidth(4);
      $sheet->getColumnDimension('AL')->setWidth(4);

      $absensi_data = $this->mlaporan->getLaporanData(date('m'));
      $rowNumber = 6;
      $no = 1;
      foreach ($absensi_data as $absensi) 
      {
          $sheet->setCellValue('B' . $rowNumber, $no++);
          $sheet->setCellValue('C' . $rowNumber, $absensi->nama_guru);

          $sheet->setCellValue('AI' . $rowNumber, $absensi->total_hadir);
          $sheet->setCellValue('AJ' . $rowNumber, $absensi->total_sakit);
          $sheet->setCellValue('AK' . $rowNumber, $absensi->total_izin);
          $sheet->setCellValue('AL' . $rowNumber, $absensi->total_alpa);

          $rowNumber++;
      }

      $sheet->mergeCells('AM4:AM5');
      $sheet->getColumnDimension('AM')->setWidth(15);
      $sheet->setCellValue('AM4', 'Total Kerja');
      $sheet->getStyle('AM4:AM5')->applyFromArray([
          'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
      ]);

      $sheet->mergeCells('AN4:AN5');
      $sheet->getColumnDimension('AN')->setWidth(15);
      $sheet->setCellValue('AN4', '(%) Kehadiran');
      $sheet->getStyle('AN4:AN5')->applyFromArray([
          'alignment' => ['horizontal' => 'center', 'vertical' => 'center'],
      ]);

      $sheet->setTitle("Laporan Data Absensi Guru");

      header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
      header('Content-Disposition: attachment; filename="Rekap Absensi.xlsx"');

      header('Cache-Control: max-age=0');
      $writer = new Xlsx($spreadsheet);
      $writer->save('php://output');
        
    }
}