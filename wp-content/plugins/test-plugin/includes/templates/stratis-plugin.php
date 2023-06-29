<div style='background: bisque;
    display: flex;
    height: 100%;
    justify-content: center;
    align-items: center;'>



<div id="form_success" style="background:green;color:#fff;"></div>
<div id="form_error" style="background:red;color:#fff;"></div>


<form id="enquiry_form" style="    width: 100%;
    justify-content: center;
    display: flex;
    align-items: center;
    flex-direction: column;">

    <?php wp_nonce_field('wp_rest');?>
    <label style="    font-weight: bold;
    display: block;">Titre</label>
<input style="    box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
    width: 200px;
    border: none;
    height: 40px;
    border-radius: 10px;" type="text" name="titre"><br /><br />

<label style="    font-weight: bold;
    display: block;">Texte</label>
<textarea style="    box-shadow: 0 1px 2px 0 rgba(0,0,0,.05);
    width: 200px;
    border: none;
    height: 80;
    border-radius: 10px;
    " name="texte"></textarea><br /><br />

<button type="submit" style="    background: black;
    color: white;
    padding: 20px 30px;
    border: none;
    border-radius: 10px;">Envoyer</button>

</form>
</div>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>


<script>
window.jQuery || document.write('<script src="http://mysite.com/jquery.min.js"><\/script>')
</script>

<script>

    jQuery(document).ready(function($){
        $("#enquiry_form").submit( function(event){
            event.preventDefault();
            var form = $(this);
            console.log(form.serialize());
            $.ajax({
                type: "POST",
                url: "<?php echo get_rest_url(null, "v1/stratis-plugin/submit");?>",
                data: form.serialize(),
                success:function(res){
                    form.hide();
                    $('#form_success').html(res).fadeIn(); 
                },
                error: function(){
                    $('#form_error').html("Une erreur s'est produite lors de la soumission de votre formulaire").fadeIn(); 
                }
            })
        });
    });
</script>