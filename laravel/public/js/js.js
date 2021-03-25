var url = 'http://dsm.safetydogs.online'
var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
    var label	 = input.nextElementSibling,
        labelVal = label.innerHTML;

    input.addEventListener( 'change', function( e )
    {
        var fileName = '';
        if( this.files && this.files.length > 1 )
            fileName = ( this.getAttribute( 'data-multiple-caption' ) || '' ).replace( '{count}', this.files.length );
        else
            fileName = e.target.value.split('\\').pop();

        if( fileName )
            label.querySelector( 'strong' ).innerHTML = fileName;
        else
            label.innerHTML = labelVal;
    });
});

window.addEventListener("load", function(){
    
    $('.btn-like').css('cursor', 'pointer');
    $('.btn-dislike').css('cursor', 'pointer');


    function dislike(){
        $('.btn-dislike').unbind('click').click( function(){
            $(this).addClass('btn-like').removeClass('btn-dislike');
            $(this).attr("src",url+"img/like.png");

            $.ajax({
                url: url+'usuario/like/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        //paso
                    }else{
                        //error
                    }
                }
            });

            like();
        });
    }
    like();

    function like(){
        $('.btn-like').unbind('click').click( function(){
            $(this).addClass('btn-dislike').removeClass('btn-like');
            $(this).attr("src", url+"img/like_pulsado.png");

            $.ajax({
                url: url+'usuario/dislike/'+$(this).data('id'),
                type: 'GET',
                success: function(response){
                    if(response.like){
                        //paso
                    }else{
                        //error
                    }
                }
            });

            dislike();
        });
    }
    dislike();
    

});