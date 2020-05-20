$(document).ready(function() {
    let $btnSearch = $("button#btn-search");
    let $btnClearSearch = $("button#btn-clear-search");
    let $inputSearchValue= $("input[name = search_value]");
    let $inputSearchField= $("input[name = search_field]");
    $("a.select-field").click(function (e) {
        e.preventDefault();
         let field =$(this).data('field');// all, link , description
         let fieldName = $(this).html();
        $("button.btn-active-field").html(fieldName+'<span class="caret"></span>');
          $inputSearchField.val(field);
    });

    $btnSearch.click(function () {

            var pathname = window.location.pathname;
            let params = ['filter_status'];
            let searchparams = new URLSearchParams(window.location.search); // filter_status=active
            let link ='';
            $.each(params,function (key,param) { //filter_status
                if (searchparams.has(param)){
                    link+= param+ '=' +searchparams.get(param)+'&';
                    // searchparams.get(param) = active, inactive, all
                }
            })

        console.log(link); // link = filter_status=active&
            let searchFiled   = $inputSearchField.val();
            let searchValue   = $inputSearchValue.val();
            if (searchValue == ''){
                alert('Nhập giá trị cần tìm');
            }else window.location.href= pathname +'?'+ link + 'search_filed=' +searchFiled+'&search_value='+searchValue;

    });
    $btnClearSearch.click(function () {
        var pathname = window.location.pathname;
        var params = ['filter_status'];
        var clearSearch = new URLSearchParams(window.location.search); //filter_status = active
        let link = '';
        $.each( params,function (key , param) {
            if (clearSearch.has(param)){
                link += param + '='+clearSearch.get(param) ;
                console.log(link); // link = filter_status=inactive&
            }
        });
        window.location.href = pathname + "?" + link;
        //   +link.slice(0,-1);


    });
    $( '.btn-delete').on('click',function () {
        if(!confirm('Sure ??')) return false;
    })

    });

