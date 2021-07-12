<?php 
    include 'includes/navigation_bar.php';
?>
    <div class="container-fluid p-5 bg-success market_price_current">
        <div class="row">
            <div class="col-xl-12">
                <h1 class="text-center text-white" id="description"></h1>
                <h3 class="text-center mt-3">Updated On : <span id="updatedOn"></span></h3>
            </div>
        </div>
    </div>
    <div class="container mt-3 table_market_current">
        <div class="row">
            <div class="col-xl-6">
                <select name="" id="select_state" onchange="state()">
                    <option value="Select State">Select State</option>
                    <option value="Andhra Pradesh">Andhra Pradesh</option>
                    <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                    <option value="Assam">Assam</option>
                    <option value="Bihar">Bihar</option>
                    <option value="Chhattisgarh">Chhattisgarh</option>
                    <option value="Goa">Goa</option>
                    <option value="Gujarat">Gujarat</option>
                    <option value="Haryana">Haryana</option>
                    <option value="Himachal Pradesh">Himachal Pradesh</option>
                    <option value="Jharkhand">Jharkhand</option>
                    <option value="Karnataka">Karnataka</option>
                    <option value="Kerala">Kerala</option>
                    <option value="Madhya Pradesh">Madhya Pradesh</option>
                    <option value="Maharashtra">Maharashtra</option>
                    <option value="Manipur">Manipur</option>
                    <option value="Meghalaya">Meghalaya</option>
                    <option value="Mizoram">Mizoram</option>
                    <option value="Nagaland">Nagaland</option>
                    <option value="Odisha">Odisha</option>
                    <option value="Punjab">Punjab</option>
                    <option value="Rajasthan">Rajasthan</option>
                    <option value="Sikkim">Sikkim</option>
                    <option value="Tamil Nadu">Tamil Nadu</option>
                    <option value="Telangana">Telangana</option>
                    <option value="Tripura">Tripura</option>
                    <option value="Uttarakhand">Uttarakhand</option>
                    <option value="Uttar Pradesh">Uttar Pradesh</option>
                    <option value="West Bengal">West Bengal</option>
                </select>
            </div>
            <div class="col-xl-6 search_box text-white">
                <input class="form-control" id="search_input" type="text" placeholder="Search top District name in Maharastra here.." onkeyup="search()">
            </div>
        </div>
    </div>
    <div class="mt-3 market_price_table_current">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="bg-info text-white">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">State</th>
                        <th scope="col">district</th>
                        <th scope="col">market</th>
                        <th scope="col">commodity</th>
                        <th scope="col">variety</th>
                        <th scope="col">min price</th>
                        <th scope="col">max price</th>
                        <th scope="col">modal price</th>
                    </tr>
                </thead>
                <tbody id="market_price_body">
                    <tr id="msg">
                        
                    </tr>
                </tbody>
            </table>
        </div>
    
    </div>
     
<?php 
    include 'includes/footer.php';
?>
<script type="text/javascript" src="js/prices.js"></script>
