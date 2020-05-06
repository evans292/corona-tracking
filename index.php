<?php  
$prov = json_decode(file_get_contents('https://api.kawalcorona.com/indonesia/provinsi/'), true);
$glob = json_decode(file_get_contents('https://api.kawalcorona.com/'), true);
$data = [
'prov' => $prov,
'glob' => $glob
];
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>API Kawal Corona</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
<link href="font/css/all.css" rel="stylesheet">
<style type="text/css">
body {
background-color: #f8f9fa;
height: 2000px;
}
.my-custom-scrollbar {
position: relative;
height: 500px;
overflow: auto;
}
.table-wrapper-scroll-y {
display: block;
}
footer {
background-color: white;
}
</style>
</head>
<body> 

<nav class="navbar navbar-expand-lg navbar-light bg-white">
<a class="navbar-brand" href="https://github.com/evans292"><img src="aku.jpg" height="50" class="rounded-circle shadow"></a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarNav">
<ul class="navbar-nav">
<li class="nav-item active">
<a class="nav-link" href="https://github.com/evans292">Fauzy <i class="fab fa-github"></i> github <span class="sr-only">(current)</span></a>
</li>

</ul>
<ul class="navbar-nav ml-auto">
<li class="nav-item active">
<a class="nav-link" href="index.php"><i class="fas fa-home"></i> Dashboard <span class="sr-only">(current)</span></a>
</li>
</div>
</li>
</ul>
</div>
</nav>


<div class="container">

<div class="row mt-4">
<div class="col-lg-12">
<h1 class="text-center" style="font-weight: lighter;">KAWAL CORONA</h1>
</div>
</div>
<div class="row mt-4">
<div class="col-lg-12">
<h3 class="text-center" style="font-weight: lighter;">Coronavirus Global & Indonesia Live Data</h3>
</div>
</div>


<div class="row mt-5">
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2 bg-danger">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="text-xs font-weight-light text-light text-uppercase mb-1">Total Positif</div>
<div class="h5 mb-0 font-weight-bold text-light" id="positif"></div>
<div class="text-xs font-weight-light text-light text-uppercase mt-1">Orang</div>
</div>
<div class="col-auto">
<i class="far fa-frown fa-2x text-light"></i>
</div>
</div>
</div>
</div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2 bg-success">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="text-xs font-weight-light text-light text-uppercase mb-1">Total Sembuh</div>
<div class="h5 mb-0 font-weight-bold text-light" id="sembuh"></div>
<div class="text-xs font-weight-light text-light text-uppercase mt-1">Orang</div>
</div>
<div class="col-auto">
<i class="far fa-smile-beam fa-2x text-light"></i>
</div>
</div>
</div>
</div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2 bg-dark">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="text-xs font-weight-light text-light text-uppercase mb-1">Total Meninggal</div>
<div class="h5 mb-0 font-weight-bold text-light" id="mati"></div>
<div class="text-xs font-weight-light text-light text-uppercase mt-1">Orang</div>
</div>
<div class="col-auto">
<i class="far fa-sad-tear fa-2x text-light"></i>
</div>
</div>
</div>
</div>
</div>

<!-- Pending Requests Card Example -->
<div class="col-xl-3 col-md-6 mb-4">
<div class="card border-left-primary shadow h-100 py-2 bg-warning">
<div class="card-body">
<div class="row no-gutters align-items-center">
<div class="col mr-2">
<div class="h5 mb-0 font-weight-bold text-light text-uppercase">Indonesia</div>
<div class="row">
<div class="col"> <div class="text-xs font-weight-light text-light text-uppercase mb-1" id="pos"></div></div>   
<div class="col text-center"> <div class="text-xs font-weight-light text-light text-uppercase mb-1" id="sem"></div></div> 
<div class="col text-center"> <div class="text-xs font-weight-light text-light text-uppercase mb-1" id="rip"></div></div>
</div>
<div class="row">
<div class="col"> <div class="text-xs font-weight-light text-light text-uppercase mb-1"><i class="far fa-frown fa-2x text-light"></i></div></div>   
<div class="col text-center"> <div class="text-xs font-weight-light text-light text-uppercase mb-1"><i class="far fa-smile-beam fa-2x text-light"></i></div></div> 
<div class="col text-center"> <div class="text-xs font-weight-light text-light text-uppercase mb-1"><i class="far fa-sad-tear fa-2x text-light"></i></div></div>
</div>
</div>
<div class="col-auto">
<i class="far fa-flag fa-2x text-light"></i>
</div>
</div>
</div>
</div>
</div>
</div>

<div class="row">
<div class="col-lg-12">
<h6 class="text-center" style="font-weight: lighter;">Sumber data : Kementerian Kesehatan & JHU</h6>
<h6 class="text-center" style="font-weight: lighter;" id="date"></h6>
</div>
</div>
</div>


<div class="container mt-4">
<!-- DataTales Example -->
<div class="card shadow mb-4" id="printThis">
<div class="card-header py-3 container-fluid bg-white">
<h7 class="m-0 font-weight-bold">Data Kasus Coronavirus di Indonesia Berdasarkan Provinsi</h7>
</div>
<div class="card-body">
<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar" id="printThis" >
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead class="text-uppercase">
<tr>
<td>No</td>
<td>Provinsi</td>
<td>Positif</td>    
<td>Sembuh</td>
<td>Meninggal</td>
</tr>
</thead>
<tbody>
<?php $i = 1; foreach($prov as $p) : ?>
<tr>
<td><?php echo $i++; ?></td>
<td><?= $p["attributes"]["Provinsi"]; ?></td>
<td><?= $p["attributes"]["Kasus_Posi"]; ?></td>
<td><?= $p["attributes"]["Kasus_Semb"]; ?></td>
<td><?= $p["attributes"]["Kasus_Meni"]; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

<div class="container mt-4">
<!-- DataTales Example -->
<div class="card shadow mb-4" id="printThis">
<div class="card-header py-3 container-fluid bg-white">
<h7 class="m-0 font-weight-bold">Kasus Coronavirus Global</h7>
</div>
<div class="card-body">
<div class="table-responsive table-wrapper-scroll-y my-custom-scrollbar" id="printThis" >
<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
<thead class="text-uppercase">
<tr>
<td>No</td>
<td>Negara</td>
<td>Positif</td>    
<td>Sembuh</td>
<td>Meninggal</td>
</tr>
</thead>
<tbody>
<?php $i = 1; foreach($glob as $g) : ?>
<tr>
<td><?php echo $i++; ?></td>
<td><?= $g["attributes"]["Country_Region"]; ?></td>
<td><?= $g["attributes"]["Confirmed"]; ?></td>
<td><?= $g["attributes"]["Recovered"]; ?></td>
<td><?= $g["attributes"]["Deaths"]; ?></td>
</tr>
<?php endforeach; ?>
</tbody>
</table>
</div>
</div>
</div>
</div>


<div class="container">

<div class="row row-cols-1 row-cols-md-2">

<div class="col mb-4">
<a href="https://www.unicef.org/indonesia/id/coronavirus" style="text-decoration: none;">
<div class="card shadow">
<div class="card-body bg-danger text-white rounded">
<h5 class="card-title">Novel coronavirus (COVID-19): Hal-hal yang perlu Anda ketahui</h5>
<p class="card-text">Unicef Indonesia</p>
</div>
</div>
</a>
</div>

<div class="col mb-4">
<a href="https://www.kompas.com/tren/read/2020/03/03/183500265/infografik-daftar-100-rumah-sakit-rujukan-penanganan-virus-corona" style="text-decoration: none;">
<div class="card shadow">
<div class="card-body bg-info text-white rounded">
<h5 class="card-title">Daftar 100 Rumah Sakit Rujukan Penanganan Virus Corona</h5>
<p class="card-text">Kompas</p>
</div>
</div>
</a>
</div>


<div class="col mb-4">
<a href="https://infeksiemerging.kemkes.go.id/" style="text-decoration: none;">
<div class="card shadow">
<div class="card-body bg-success text-white rounded">
<h5 class="card-title">Media Informasi Resmi Penyakit Infeksi Emerging</h5>
<p class="card-text">Kementrian Kesehatan </p>
</div>
</div>
</a>
</div>

<div class="col mb-4">
<a href="https://www.who.int/emergencies/diseases/novel-coronavirus-2019/advice-for-public" style="text-decoration: none;">
<div class="card shadow">
<div class="card-body bg-warning text-white rounded">
<h5 class="card-title">Coronavirus Disease (COVID-19) Advice for The Public</h5>
<p class="card-text">WHO</p>
</div>
</div>
</a>
</div>
</div>   
</div>

<footer>
<div class="footer border-top-0 footer-1">
<div class="container">
<div class="row align-items-center">
  <div class="col-lg-12 col-sm-12 mt-3 mt-lg-0 text-center">
    <br><br>
    Powered by <a href="https://kawalcorona.com/api/" target="_blank" style="text-decoration: none;">Kawal Corona API</a>. Made with <i class="fa fa-heart" style="color: salmon;"></i> by <a href="https://www.instagram.com/tubagusgf/" target="_blank" style="text-decoration: none;">Tubagus Gusti Fauzy</a>
  </div>
</div>
</div>
</div>
</div>
</div><!-- COL-END -->
</div>
</footer>



<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="script.js"></script>
</body>
</html>