$('.no-more').hide();
var paginate = 1;

var singleMediaCall = document.getElementById('mediafiles')
const bsOffcanvasSingle = new bootstrap.Offcanvas(singleMediaCall)

singleMediaCall.addEventListener('hidden.bs.offcanvas', function () {
  $('.media-area').removeClass('active');
  $("#getdata").html('');
  var paginate = 1;
})
function loadMediaFiles(element, openType) {

    bsOffcanvasSingle.show();
    mediafiles(paginate, openType);
    element.parent().addClass('active')

}

$('#load-more-mediafiles').click(function() {
    var current_page = parseInt($(this).attr('current-page'));
    var last_page = parseInt($(this).attr('last-page'));

    if(current_page < last_page){

        let page = current_page+1;
        mediafiles(page);
    }
    else{
        aler('Ended');
    }

});

function mediafiles(paginate, search='') {
    
    var type = $('.select-mediatype').attr('mediatype');
    var search = $('#mediafilesearch').val();

    $.ajax({
        url: '/admin/media/get/single?opentype='+type+'&search='+search+'&page=' + paginate,
        type: 'get',
        datatype: 'html',
        beforeSend: function() {
            $('#load-more-mediafiles').text('Loading...');
        }
    })
    .done(function(data) {
       $("#getdata").html('');
        $("#getdata").append(data);

        $( ".media-area.active .media-file-value input" ).each(function() {
            var active_file =  $( this ).val();
            $("#mediaid"+active_file).prop('checked',true)
        });
        var current_page = paginate;
        var last_page = parseInt($('#load-more-mediafiles').attr('last-page'))
        var next_page = current_page;
        $('#load-more-mediafiles').text('Loadmore');
        if (last_page <= next_page) {
            $('#load-more-mediafiles').text('No More Files');
            $('#load-more-mediafiles').removeClass('btn-soft-success');
            $('#load-more-mediafiles').addClass('btn-soft-danger');
        }
        $('#load-more-mediafiles').attr('current-page', next_page);

           
    })
    .fail(function(jqXHR, ajaxOptions, thrownError) {
      alert('Something went wrong.');
  });
}



$("#mediafilesearch").keyup(function(){
    var type = $('.select-mediatype').attr('mediatype');
    var search = $(this).val();
    if(search.length > 1){
        $("#getdata").html('');
        mediafiles(1,search)
    }else{
        mediafiles(1)
    }
});




function selectSingleFile() {
    if ($("input[name='media[]']").is(':radio')) {
        $(".media-area.active .media-file-value").html('');
        $(".media-area.active .media-file").html('');
    }

    var file_name = $(".media-area.active").attr('file-name');
    //alert(file_name);

    var checkboxes = document.getElementsByName('media[]');

    

    var result = "";
    var image = "";

    for (var i = 0; i < checkboxes.length; i++) {
        if (checkboxes[i].checked) {

            $( ".media-area.active .media-file-value input" ).each(function() {
                $(".media-area.active .fileid"+checkboxes[i].value).remove();
            });

            result += '<input type="hidden" name="'+file_name+'[]" value="'+checkboxes[i].value+'" class="fileid'+checkboxes[i].value+'">';
            var myimage = $("#getmedia-"+checkboxes[i].value).html();
            image += '<div  class="file-container d-inline-block fileid'+checkboxes[i].value+'"><span data-id="'+checkboxes[i].value+'" class="remove-file">&#x2715;</span>'+myimage+"</div>";
        }
    }
    
    $(".media-area.active .media-file-value").append(result);
    $(".media-area.active .media-file").append(image);

    bsOffcanvasSingle.hide();
}

$("body").on("click", ".remove-file", function(){
    $(this).parent().parent().parent().addClass('active');
    var image_id = $(this).attr("data-id");
    $(".media-area.active .fileid"+image_id).remove();
   $(".media-area.active #mediaid"+image_id+":checked").prop('checked',false);
   $(".media-area").removeClass('active');
});


$("body").on("click", ".get-all-media input", function(){
    $(".media-area.active .fileid"+$(this).val()).remove();
});





$(window).on('hashchange', function() {
    if (window.location.hash) {
        var page = window.location.hash.replace('#', '');
        if (page == Number.NaN || page <= 0) {
            return false;
        }else{
            mediafiles(page);
        }
    }
});


$(document).ready(function()
{
    $(document).on('click', '.pagination a',function(event)
    {
        $('li').removeClass('active');
        $(this).parent('li').addClass('active');
        event.preventDefault();


        var myurl = $(this).attr('href');
        var page=$(this).attr('href').split('page=')[1];


        mediafiles(page);
    });
});
