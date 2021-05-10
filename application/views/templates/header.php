<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/fontawesome-free-5.15.3-web/css/all.min.css') ?>">
    <link href="<?php echo base_url('assets/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/dist/css/style.css') ?>" rel="stylesheet">

    <title><?php echo $title; ?></title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="<?php echo site_url('dashboard'); ?>">PRACTICE</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('dashboard'); ?>">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('soal'); ?>">List Soal</a>
        </li>
      </ul>
    </div>
  </nav>
