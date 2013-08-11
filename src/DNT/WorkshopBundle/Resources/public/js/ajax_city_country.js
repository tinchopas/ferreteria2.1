$(document).ready(function () {


    $(".country_selector").change(function(){
        var data = {
            country_id: $(this).val()
        };

        $.ajax({
            type: 'post',
            //url: Routing.generate('province_list'),
            url: 'http://ferreteria/app_dev.php/ajax/provincelist',
            data: data,
            success: function(data) {
                $('.province_selector').html(data);
                $('.city_selector').html("<option>Ciudad</option>");
            }
        });
    });
    $(".province_selector").change(function(){
        var data = {
            province_id: $(this).val()
        };

        $.ajax({
            type: 'post',
            //url: '{{ path("select_cities") }}',
            url: 'http://ferreteria/app_dev.php/ajax/citylist',
            data: data,
            success: function(data) {
                $('.city_selector').html(data);
            }
        });
    });
});
