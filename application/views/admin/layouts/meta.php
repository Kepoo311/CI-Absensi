<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SMKN 4 - Absensi</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url()?>assets/dist/css/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/select2/css/select2.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
  <link rel="shortcut icon" href="<?= base_url()?>assets/images/faviconn.png" />
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Toastr -->
  <link rel="stylesheet" href="<?= base_url()?>assets/plugins/toastr/toastr.min.css">
  <style>
    
    .custom-table {
      width: 100%;
    }

    .custom-table td, th {
      white-space: nowrap;
      vertical-align : middle; 
      text-align: center;
    }

    .custom-td td {
      white-space: nowrap;
      vertical-align : middle; 
      text-align: center;
    }
  
    .custom-radio {
      display: inline-block;
      position: relative;
      cursor: pointer;
      margin-right: 12px;
    }

    .radio-input {
      display: none;
    }

    .radio-text {
      display: inline-block;
      border: 1px solid #999;
      border-radius: 50%;
      width: 30px;
      height: 30px;
      text-align: center;
      line-height: 30px;
      font-size: 15px;
      transition: background-color 0.3s, border-color 0.3s;
    }

    .radio-input:checked + .radio-text {
      background-color: #2196F3;
      border-color: #2196F3;
      color: #fff;
    }    
  </style>
</head>