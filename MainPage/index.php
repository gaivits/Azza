<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard Design</title>
<link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<style>
	.header-part{
background-color:#3E8BB9;
height:50px;
color:#fff;
position: fixed !important;
z-index: 1;
border-bottom:2px solid #357E9F;
}
.header-part .logo-part{
width:20%;
}
.header-part .logo-part h1{
font-size:33px;
}
.header-part .logo-part h1 a{
color:#fff;
text-decoration: none;
}
.header-part .header-center-part{
padding: 10px;
width:60%;
}
.header-right{
padding:13px 10px;
width:20%;
}
.header-right i{
font-size: 20px;
margin-right: 20px;
}
.header-right i:hover{
color:#797979;
}
.header-right img{
border-radius: 50%;
height:20px;
margin-top:-5px;
}
.dropdown-toggle{
background-color: transparent !important;
border:none !important;
box-shadow: none !important;
margin-top:-5px;
}
.show{
top:4px !important;
}
.sidebar{
background-color:#212C2E;
color:#fff;
width:20%;
top:50px;
height:625px;
position: fixed !important;
overflow-y:auto;
}
.sidebar .main-menu{
margin:0px;
padding:0px;
}
.sidebar .main-menu li{
list-style: none;
margin:0px;
}
.sidebar .main-menu li a{
text-decoration: none;
display: inline-block;
padding: 15px 20px;
color:#fff;
width: 100%;
}
.sidebar .main-menu li .sub-menu{
padding: 0px;
display: none;
background-color: #2C3A3D;
}
.sidebar .main-menu li .sub-menu li a{
width: 100%;
padding-left:40px;
}
.sub-active{
background-color:#1a2732;
}
.content-main{
margin:51px 275px;
padding:15px;
}
.fa-angle-right{
float:right;
transition:transform 0.4s ease-in-out;
}
.active{
background-color:#3E8BB9;
}
</style>
<body>
<div class="container-fluid">
<div class="row">
<div class="col-lg-12 col-sm-12 col-12 header-part">
<div class="row">
<div class="text-center logo-part">
<h1><a href="#">Nice Snippets</a></h1>
</div>
<div class="header-center-part text-center">
<span>SOMETHING</span>
</div>
<div class="header-right text-right">
<i class="far fa-envelope"></i>
<i class="far fa-bell"></i>
<img src="https://lh3.googleusercontent.com/uFp_tsTJboUY7kue5XAsGA=s46">
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
Admin
</button>
<div class="dropdown-menu">
<a class="dropdown-item" href="#">Sign in</a>
<a class="dropdown-item" href="#">Log Out</a>
</div>
</div>
<div style="clear:both;"></div>
</div>
</div>
</div>
<div class="row">
<div class="sidebar">
<ul class="main-menu">
<li class="active"><a href="#"><i class="fas fa-tasks"></i> Dashboard</a></li>
<li class="main-sub-menu"><a href="#"><i class="fas fa-home"></i> Home <i class="fas fa-angle-right"></i></a>
<ul class="sub-menu">
<li><a href="#p">sub home</a></li>
<li><a href="#"> sub home</a></li>
</ul>
</li>
<li class="main-sub-menu"><a href="#"><i class="fas fa-images"></i> Gallery <i class="fas fa-angle-right"></i></a>
<ul class="sub-menu">
<li><a href="#p"> 2017</a></li>
<li class="sub-active"><a href="#"> 2018</a></li>
<li><a href="#"> 2019</a></li>
<li><a href="#"> 2020</a></li>
</ul>
</li>
<li class="main-sub-menu"><a href="#"><i class="fas fa-phone"></i> Contact <i class="fas fa-angle-right"></i></a>

<li class="main-sub-menu"><a href="http://127.0.0.1/xampp/Azza/Customer/customer.php"><i class="fas fa-users"></i> Customer <i class="fas fa-angle-right"></i></a>

</div>
<div class="col-lg-9 content-main">
<div class="content">

</div>
</div>
</div>
</div>
</body>
</html>
<script>
$(".main-sub-menu").on("click",function(){
$(".sub-menu").css({"display":"none"});
$('.main-sub-menu').find(".fa-angle-right").css({"transform":"rotate(0deg)"});
$(this).find("ul").slideToggle();
$(".main-menu .main-sub-menu").removeClass("active");
$(this).addClass("active");
$(this).find(".fa-angle-right").css({"transform":"rotate(90deg)"});
});
</script>