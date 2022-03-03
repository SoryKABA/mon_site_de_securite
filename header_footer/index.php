<script>
        $(document).ready(function(){
        // Mettre à jour la vue avec les notifications en utilisant ajaxfunction load_unseen_notification(view = ''){
            $.ajax({
                url:"fetch.php",
                method:"POST",
                data:{view:view},
                dataType:"json",
                success:function(data){
                    $('.notif').html(data.notification);
                    if(data.unseen_notification > 0){
                        $('.count').html(data.unseen_notification);
                    }
                }
            });
 
    load_unseen_notification();
        // Soumettre le formulaire et obtenir de nouveaux enregistrements
        $('#form_control').on('submit',  function(event){
            event.preventDefault();
            if($('#subject').val()  !=  ''  &&  $('#message').val()  !=  ''){
                var  form_data  =  $(this).serialize();
                $.ajax({
                    url:"message.php",
                    method:"POST",
                    data:form_data,
                    success:function(data){
                        $('#form_control')[0].reset();
                        load_unseen_notification();
                    }
                });
            }else{
                alert("Les deux champs sont obligatoires");
            }
    });
 
// Chargement des nouvelles notifications
    $(document).on('click',  '.liste',  function(){
            $('.count').html('');
            load_unseen_notification('yes');
    });
    setInterval(function(){
            load_unseen_notification();
            },  5000);
    });
</script>