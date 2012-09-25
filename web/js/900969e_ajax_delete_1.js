  function delete_item(action, id, token, texto)
    {
        if (confirm(texto))
        {
            $.ajax({
                type: "POST",
                url: action,
                data: "form[id]="+id+"&form[_token]="+token,

                success: function(html){
//                    window.location.reload();
                    $('#' + id).remove();
                    $('#confirmMsg').show('fast');
                    $('#confirmMsg').find('span').html('El elemento se borró exitosamente.');
                    setTimeout(function() { $('#confirmMsg').hide('fast'); }, 3000);
                }
            });
        }
        return false;
    }

