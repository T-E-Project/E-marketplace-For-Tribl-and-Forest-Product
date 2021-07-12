<?php
    include 'includes/navigation_bar.php';
?>
<!-- Whether Body -->
        <div class="whether_container">
            <div class="info_logo d-flex">
                    <a href="#"><i class="fa fa-cloud" aria-hidden="true"></i>  &nbsp;<span>CURRENT WHETHER</span></a>
                </div>
                <div class="d-flex info">
                    <div class="current_time">
                        <h3 id="time">12 : 30 : 50 AM</h3>
                        <h4 id="date">Friday 30 June 2021</h4>
                    </div>
                    <div class="current_time">
                        <h3 id="time_Zone">Asia/Kolkata</h3>
                        <h4>lat- <span id="lat">91.00</span> / lon- <span id="lon">222</span></h4>
                    </div>
                </div>
            </div>
        </div>
    
    <!-- Current Whether Forcast -->
        <div class="container">
            <div class="row">
                <div class="col-xl-12" id="current">
                    
                </div>
            </div>
        </div>
    <!--X- Current Whether Forcast -X-->

    <!-- Daily Whether Forcast -->
        <div class="container">
            <div class="heading_whether">
                <h2>Daily Whether Forcast</h2>
            </div>
            <div class="row" id="daily">

            </div>
        </div>
    <!--X- Daily Whether Forcast -X-->

<!--X- Whether Body -X-->
<?php
    include 'includes/footer.php';
?>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
 <script type="text/javascript" src="js/whether.js"></script>