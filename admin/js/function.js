Search
function DigilibSearch(){
    $("#notfound").hide();
    $('#search').keyup(function(){searchTable()});
    statusCheckUpdate();
}
function searchTable(){
    var inputVal = $("#search").val();
    var table = $("#results");
    var cfound = 0;

    table.find('tr').each(function(index, row)
    {
        var allCells = $(row).find('td');
        if(allCells.length > 0)
        {
            var found = false;
            $("#page-nav").hide();
            allCells.each(function(index, td)
            {
                var regExp = new RegExp(inputVal, 'i');
                if(regExp.test($(td).text()))
                {
                    found = true;
                    cfound++;
                    return false;
                }
            });
            if(found == true)$(row).fadeIn();else $(row).hide();
        }
    });

    //nav fadce
    if($('#search').val() == ""){
        SedapPager();
        $("#page-nav").fadeIn();
    }

    if(cfound < 1){
         $("#notfound").fadeIn();
         $("#page-nav").hide();
    }else{
        $("#notfound").hide();
    }
}