<?php 
include_once("header.php");

include_once("connect.php");
?>
<h2>Chào mừng đến với website</h2>

<body>
        <div class="container">
            <div class="row">
                </br>
                <h2 align="center">Advance Ajax product Filter in PHP</h2>
                </br>
                <div class="col-md-3">
                    <div class="list-group">
                        <h3>Price</h3>
                        <input type="hidden" id="hidden_minimum_price" value="0"/>
                        <input type="hidden" id="hidden_maximum_price" value="65000"/>
                        <p id="price_show">1000 - 65000</p>
                        <div id="price_range"></div>
                    </div>
                    <!--Brand-->
                    <div class="list-group">
                        <h3>Brand</h3>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $query = "SELECT DISTINCT(Brand) FROM product WHERE Status = '1' ORDER BY ProductID DESC";
                                $result = $conn->query($query);
                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector Brand" value="<?php echo $row['Brand']; ?>">
                                                <?php echo $row['Brand']; ?>
                                            </label>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                     <!--Ram-->
                    <div class="list-group">
                        <h3>Ram</h3>
                        <div style="height: 180px; overflow-y: auto; overflow-x: hidden;">
                            <?php
                                $query = "SELECT DISTINCT(Ram) FROM product WHERE Status = '1' ORDER BY ProductID DESC";
                                $result = $conn->query($query);
                                if($result->num_rows > 0) {
                                    while($row = $result->fetch_assoc()) {
                                        ?>
                                        <div class="list-group-item checkbox">
                                            <label>
                                                <input type="checkbox" class="common_selector Ram" value="<?php echo $row['Ram']; ?>">
                                                <?php echo $row['Ram']; ?>
                                            </label>
                                        </div>
                                        <?php
                                    }
                                }
                            ?>
                        </div>
                    </div>
                     
                </div>
            </div>
            <div>
                <div class="filter_data row">
                </div>
            </div>
        </div>
        

        <script>
            $(document).ready(function() {
                filter_data();

                function filter_data() {
                    $('.filter_data').html('<div id="loading" style=""></div>');
                    var action = 'fetch_data';
                    var minimum_price = $('#hidden_minium_price').val();
                    var maximum_price = $('#hidden_maximum_price').val();
                    var brand = get_filter('brand');
                    var ram = get_filter('ram');
                    var storage = get_filter('storage');
                    $.ajax({
                        url: "./config/Fetch_data.php",
                        method: "POST",
                        data: {
                            action: action,
                            minimum_price: minimum_price,
                            maximum_price: maximum_price,
                            brand: brand,
                            ram: ram,
                            storage: storage

                        },
                        success: function(data) {
                            $('.filter_data').html(data);
                        }
                    });
                }

                function get_filter(class_name) {
                    var filter = [];
                    $('.' + class_name + ':checked').each(function() {
                        filter.push($(this).val());
                    });
                    return filter;
                }

                $('.common_selector').click(function() {
                    filter_data();
                })

                $('#price_ranger').slider({
                    range: true,
                    min: 1000,
                    max: 65000,
                    values: [1000, 65000],
                    step: 500,
                    stop: function(event, ui) {
                        $('#price_show').html(ui.values[0] + ' - ' + ui.values[1]);
                        $('#hidden_minimun_price').val(ui.values[0]);
                        $('#hidden_maximun_price').val(ui.values[1]);
                        filter_data();
                    }
                });
            });
        </script>
    </body>




<?php
include_once("footer.php");
?>