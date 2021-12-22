window.addEventListener('load', function(){
    let sts = 'none';
    let hospital_ID = 'hugahuga'
    get_defrost_info(hospital_ID,sts);
});


function get_defrost_info(hospital_ID,sts){
    let tmparray = {};
    tmparray['hospital_ID'] = hospital_ID;
    tmparray['sts'] = sts; 
    console.log(sts)
    sendJsonData = JSON.stringify(tmparray);
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[id="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        url: "/get_defrost_info",
        type: "POST",
        data: sendJsonData,
        dataType: "json",
        timeout: 500000
    }).done(function(data){
        if(data == 'exist'){
            sts = data;
            $('#banner_text').text('本日の出庫予定があります　解凍予定リストを確認してください');
            $('.news-banner').css({'background-color': 'red'});
            get_defrost_info(hospital_ID,sts);
        } else {
            sts = data;
            $('#banner_text').text('本日の出庫予定はありません');
            $('.news-banner').css({'background-color': 'orange'});
            get_defrost_info(hospital_ID,sts);
        }
    }).fail(function(XMLHttpRequest, status, e){
        console.log('erorrStatus:' + status + e);
        get_defrost_info(hospital_ID,sts);
    });
}

