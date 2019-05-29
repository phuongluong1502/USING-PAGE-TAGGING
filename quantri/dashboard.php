<?php
	include '../connectdatabase.php';	
		//đếm số lượng browser truy cập vào trang web
		$sql="SELECT USERAGENT FROM $collect";
		$kqbr=$db->query($sql);
		$chrome=0;$chromium=0; $opera=0; $edge=0; $IE=0; $firefox=0; $safari=0; $android=0; $ios=0; $windows=0; $windowsphone=0; $mac=0; $linux=0; $other=0;
		while($row_usrag=$kqbr->fetch_assoc()){ // lấy browser + OS
			if(strpos($row_usrag['USERAGENT'],"Chromium")) $chromium++;
			else if(strpos($row_usrag['USERAGENT'],"Opera") or strpos($row_usrag['USERAGENT'],"OPR")) $opera++ ;
			else if(strpos($row_usrag['USERAGENT'],"Edge")) $edge++;
			else if(strpos($row_usrag['USERAGENT'],"MSIE") or strpos($row_usrag['USERAGENT'],"Trident") or strpos($row_usrag['USERAGENT'],"IE")) $IE++;
			else if(strpos($row_usrag['USERAGENT'],"Firefox")) $firefox++;
			else if(strpos($row_usrag['USERAGENT'],"Chrome")) $chrome++;
			else if(strpos($row_usrag['USERAGENT'],"Safari")) $safari++;
			//if else for OS
			if(strpos($row_usrag['USERAGENT'],"Android")) $android++;
			else if(strpos($row_usrag['USERAGENT'],"iPhone") or strpos($row_usrag['USERAGENT'],"iPad") or strpos($row_usrag['USERAGENT'],"iPod")) $ios++;
			else if(strpos($row_usrag['USERAGENT'],"Windows")) $windows++;
			else if(strpos($row_usrag['USERAGENT'],"Windows Phone")) $windowsphone++;
			else if(strpos($row_usrag['USERAGENT'],"Mac")) $mac++;
			else if(strpos($row_usrag['USERAGENT'],"Linux") or strpos($row_usrag['USERAGENT'],"X11")) $linux++;
			else $other++;
			}
		// Lấy Phiên Truy Cập
		$sql = "SELECT count(DISTINCT(SESSION)) as cntses, count(DISTINCT(COOKIES_YEAR)) as cntuser , COUNT(ID) as pageview FROM $collect";
		$kq=$db->query($sql);
		$sesUser = $kq -> fetch_assoc();
?>
<?php include 'chart.php' ?>
<div class="container-fluid">
    <div class="block-header">
        <h2>Dữ Liệu Người Dùng</h2>
    </div>           
    <!-- Widgets -->
    <?php include 'widgets.php' ?>
    <!-- #END# Widgets -->
    <!-- Browser Usage -->
    <div class="row clearfix">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="header">                        
                <h2>BROWSER USAGE</h2>
                </div>
                <div class="body">
                    <div id="donutchart" style="height:400px;"></div>
                </div>
            </div>
        </div>
        <!-- #END# Browser Usage -->
		<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
            <div class="card">
                <div class="header">                        
                <h2>OS	</h2>
                </div>
                <div class="body">
                    <div id="chart_div" style="height:400px;">
                </div>
            </div>
        </div>
</div>
</div>
</div>